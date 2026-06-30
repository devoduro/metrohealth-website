<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->enum('customer_category', ['walk-in', 'home-service'])->after('service_id');
            $table->enum('service_location', ['within-reading', 'outside-reading'])->nullable()->after('customer_category');
            $table->string('street_address')->nullable()->after('service_location');
            $table->string('postcode', 20)->nullable()->after('street_address');
            $table->decimal('deposit_amount', 8, 2)->default(0)->after('estimated_price');
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending')->after('deposit_amount');
            $table->string('stripe_payment_intent_id')->nullable()->after('payment_status');
            $table->string('stripe_session_id')->nullable()->after('stripe_payment_intent_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn([
                'customer_category',
                'service_location',
                'street_address',
                'postcode',
                'deposit_amount',
                'payment_status',
                'stripe_payment_intent_id',
                'stripe_session_id'
            ]);
        });
    }
};
