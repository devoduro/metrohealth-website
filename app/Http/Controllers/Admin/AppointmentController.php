<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\ClinicService;
use App\Models\Doctor;
use App\Models\Patient;
use App\Services\PastechSmsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Appointment::with(['patient', 'clinicService', 'doctor'])->latest('appointment_date');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('clinic_service_id')) {
            $query->where('clinic_service_id', $request->clinic_service_id);
        }

        if ($request->filled('date')) {
            $query->whereDate('appointment_date', $request->date);
        }

        $appointments = $query->paginate(20)->withQueryString();

        $stats = [
            'total' => Appointment::count(),
            'scheduled' => Appointment::where('status', 'scheduled')->count(),
            'completed' => Appointment::where('status', 'completed')->count(),
            'cancelled' => Appointment::where('status', 'cancelled')->count(),
        ];

        $clinicServices = ClinicService::ordered()->get();

        return view('admin.appointments.index', compact('appointments', 'stats', 'clinicServices'));
    }

    /**
     * Past appointments — every appointment whose date has already gone by.
     * Doctors only see appointments for their own assigned service(s); everyone
     * else (admin, nurse, receptionist) sees every service.
     */
    public function past(Request $request)
    {
        $user = Auth::user();

        $query = Appointment::with(['patient', 'clinicService', 'doctor'])
            ->whereDate('appointment_date', '<', now()->toDateString())
            ->orderByDesc('appointment_date')
            ->orderByDesc('appointment_time');

        if ($user->isDoctor()) {
            $query->whereIn('clinic_service_id', $user->clinicServices->pluck('id'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if (!$user->isDoctor() && $request->filled('clinic_service_id')) {
            $query->where('clinic_service_id', $request->clinic_service_id);
        }

        $appointments = $query->paginate(20)->withQueryString();

        $clinicServices = $user->isDoctor()
            ? $user->clinicServices
            : ClinicService::ordered()->get();

        return view('admin.appointments.past', compact('appointments', 'clinicServices'));
    }

    public function create()
    {
        $clinicServices = ClinicService::active()->ordered()->get();
        $doctors = Doctor::active()->orderBy('name')->get(['id', 'name', 'clinic_service_id', 'days']);

        return view('admin.appointments.create', compact('clinicServices', 'doctors'));
    }

    public function store(Request $request, PastechSmsService $sms)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:1000',
            'services' => 'required|array|min:1',
            'services.*.clinic_service_id' => 'required|exists:clinic_services,id',
            'services.*.doctor_id' => 'nullable|exists:doctors,id',
            'services.*.appointment_date' => 'required|date|after_or_equal:today',
            'services.*.appointment_time' => 'required',
            'notes' => 'nullable|string|max:1000',
        ]);

        $normalizedPhone = PastechSmsService::normalizePhone($validated['phone']);

        $patient = Patient::where('phone', $normalizedPhone)->first();
        if ($patient) {
            $patient->update([
                'full_name' => $validated['full_name'],
                'address' => $validated['address'] ?? $patient->address,
            ]);
        } else {
            $patient = Patient::create([
                'full_name' => $validated['full_name'],
                'phone' => $normalizedPhone,
                'address' => $validated['address'] ?? null,
            ]);
        }

        $clinicServiceNames = ClinicService::whereIn('id', collect($validated['services'])->pluck('clinic_service_id'))
            ->pluck('name', 'id');

        $doctorNames = Doctor::whereIn('id', collect($validated['services'])->pluck('doctor_id')->filter())
            ->pluck('name', 'id');

        $createdAppointments = [];
        $messageLines = [];

        foreach ($validated['services'] as $serviceSlot) {
            $appointment = Appointment::create([
                'patient_id' => $patient->id,
                'clinic_service_id' => $serviceSlot['clinic_service_id'],
                'doctor_id' => $serviceSlot['doctor_id'] ?? null,
                'appointment_date' => $serviceSlot['appointment_date'],
                'appointment_time' => $serviceSlot['appointment_time'],
                'notes' => $validated['notes'] ?? null,
                'created_by' => Auth::id(),
            ]);

            $createdAppointments[] = $appointment;

            $when = \Carbon\Carbon::parse($serviceSlot['appointment_date'])->format('D, M j')
                . ' at ' . \Carbon\Carbon::parse($serviceSlot['appointment_time'])->format('g:i A');
            $line = $clinicServiceNames[$serviceSlot['clinic_service_id']] . ' - ' . $when;
            if (!empty($serviceSlot['doctor_id']) && isset($doctorNames[$serviceSlot['doctor_id']])) {
                $line .= ' (Dr. ' . $doctorNames[$serviceSlot['doctor_id']] . ')';
            }
            $messageLines[] = $line;
        }

        $message = "Hi {$patient->full_name}, your appointments at Metro Health Hospital: "
            . implode('; ', $messageLines)
            . '. Call 0241850091 for changes.';

        $result = $sms->send($patient->phone, $message, $patient->id, 'confirmation');

        foreach ($createdAppointments as $appointment) {
            $appointment->update(['sms_status' => $result['success'] ? 'sent' : 'failed']);
        }

        $successMessage = count($createdAppointments) > 1
            ? count($createdAppointments) . ' appointments booked successfully!'
            : 'Appointment booked successfully!';

        if (!$result['success']) {
            return redirect()->route('admin.appointments.index')
                ->with('success', $successMessage)
                ->with('warning', 'However, the SMS confirmation to the patient could not be sent. Check SMS logs for details.');
        }

        return redirect()->route('admin.appointments.index')->with('success', $successMessage . ' SMS confirmation sent to patient.');
    }

    /**
     * Bulk booking: one clinic service, many patients — each gets their own
     * appointment slot and their own SMS confirmation.
     */
    public function bulkCreate()
    {
        $clinicServices = ClinicService::active()->ordered()->get();
        $doctors = Doctor::active()->orderBy('name')->get(['id', 'name', 'clinic_service_id', 'days']);

        return view('admin.appointments.bulk-create', compact('clinicServices', 'doctors'));
    }

    public function bulkStore(Request $request, PastechSmsService $sms)
    {
        $validated = $request->validate([
            'clinic_service_id' => 'required|exists:clinic_services,id',
            'patients' => 'required|array|min:1',
            'patients.*.full_name' => 'required|string|max:255',
            'patients.*.phone' => 'required|string|max:20',
            'patients.*.address' => 'nullable|string|max:1000',
            'patients.*.doctor_id' => 'nullable|exists:doctors,id',
            'patients.*.appointment_date' => 'required|date|after_or_equal:today',
            'patients.*.appointment_time' => 'required',
            'patients.*.notes' => 'nullable|string|max:1000',
        ]);

        $clinicService = ClinicService::find($validated['clinic_service_id']);
        $doctorNames = Doctor::whereIn('id', collect($validated['patients'])->pluck('doctor_id')->filter())
            ->pluck('name', 'id');

        $booked = 0;
        $smsSent = 0;
        $smsFailed = 0;

        foreach ($validated['patients'] as $patientSlot) {
            $normalizedPhone = PastechSmsService::normalizePhone($patientSlot['phone']);

            $patient = Patient::where('phone', $normalizedPhone)->first();
            if ($patient) {
                $patient->update([
                    'full_name' => $patientSlot['full_name'],
                    'address' => $patientSlot['address'] ?? $patient->address,
                ]);
            } else {
                $patient = Patient::create([
                    'full_name' => $patientSlot['full_name'],
                    'phone' => $normalizedPhone,
                    'address' => $patientSlot['address'] ?? null,
                ]);
            }

            $appointment = Appointment::create([
                'patient_id' => $patient->id,
                'clinic_service_id' => $validated['clinic_service_id'],
                'doctor_id' => $patientSlot['doctor_id'] ?? null,
                'appointment_date' => $patientSlot['appointment_date'],
                'appointment_time' => $patientSlot['appointment_time'],
                'notes' => $patientSlot['notes'] ?? null,
                'created_by' => Auth::id(),
            ]);

            $booked++;

            $when = \Carbon\Carbon::parse($patientSlot['appointment_date'])->format('D, M j')
                . ' at ' . \Carbon\Carbon::parse($patientSlot['appointment_time'])->format('g:i A');
            $message = "Hi {$patient->full_name}, your appointment at Metro Health Hospital, {$clinicService->name} is confirmed for {$when}";
            if (!empty($patientSlot['doctor_id']) && isset($doctorNames[$patientSlot['doctor_id']])) {
                $message .= ' with Dr. ' . $doctorNames[$patientSlot['doctor_id']];
            }
            $message .= '. Call 0241850091 for changes.';

            $result = $sms->send($patient->phone, $message, $patient->id, 'confirmation');
            $appointment->update(['sms_status' => $result['success'] ? 'sent' : 'failed']);

            if ($result['success']) {
                $smsSent++;
            } else {
                $smsFailed++;
            }
        }

        $message = "{$booked} appointment(s) booked for {$clinicService->name}! SMS: {$smsSent} sent, {$smsFailed} failed.";

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'booked' => $booked,
                'sms_sent' => $smsSent,
                'sms_failed' => $smsFailed,
            ]);
        }

        return redirect()->route('admin.appointments.index')->with('success', $message);
    }

    public function edit(Appointment $appointment)
    {
        $this->authorizeAppointmentAccess($appointment);

        $clinicServices = ClinicService::active()->ordered()->get();
        $doctors = Doctor::active()->orderBy('name')->get(['id', 'name', 'clinic_service_id', 'days']);
        $appointment->load(['patient', 'clinicService', 'doctor']);

        return view('admin.appointments.edit', compact('appointment', 'clinicServices', 'doctors'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $this->authorizeAppointmentAccess($appointment);

        // Doctors can't move an appointment to a different service, so their edit
        // form doesn't submit clinic_service_id at all — keep it fixed instead of requiring it.
        $isDoctor = Auth::user()->isDoctor();

        $validated = $request->validate([
            'clinic_service_id' => $isDoctor ? 'sometimes' : 'required|exists:clinic_services,id',
            'doctor_id' => 'nullable|exists:doctors,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'notes' => 'nullable|string|max:1000',
            'status' => 'required|in:scheduled,completed,cancelled',
        ]);

        if ($isDoctor) {
            $validated['clinic_service_id'] = $appointment->clinic_service_id;
        }

        $appointment->update($validated);

        $redirectRoute = Auth::user()->isDoctor() ? 'admin.staff-dashboard' : 'admin.appointments.index';

        return redirect()->route($redirectRoute)->with('success', 'Appointment updated successfully!');
    }

    /**
     * Doctors may only view/edit appointments for a service they're assigned to.
     */
    private function authorizeAppointmentAccess(Appointment $appointment): void
    {
        $user = Auth::user();

        if ($user->isDoctor() && !$user->clinicServices->pluck('id')->contains($appointment->clinic_service_id)) {
            abort(403, 'You are not authorized to access this appointment.');
        }
    }

    public function updateStatus(Request $request, Appointment $appointment)
    {
        $request->validate([
            'status' => 'required|in:scheduled,completed,cancelled',
        ]);

        $appointment->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Appointment status updated successfully!');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('admin.appointments.index')->with('success', 'Appointment deleted successfully!');
    }

    /**
     * AJAX: search existing patients by name or phone for autocomplete during booking.
     */
    public function searchPatient(Request $request)
    {
        $query = trim($request->input('q', ''));

        if (strlen($query) < 3) {
            return response()->json([]);
        }

        $digits = preg_replace('/[^0-9]/', '', $query);

        $patients = Patient::where('full_name', 'like', '%' . $query . '%')
            ->orWhere('address', 'like', '%' . $query . '%')
            ->when($digits !== '', function ($q) use ($digits) {
                $q->orWhere('phone', 'like', '%' . $digits . '%');
            })
            ->limit(8)
            ->get(['id', 'full_name', 'phone', 'address']);

        return response()->json($patients);
    }
}
