<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Management | Metro Health Admin</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/ashlocs-custom.css') }}">
</head>
<body style="background: #f8f9fa;">
    
    @include('admin.partials.sidebar')

    <div class="admin-content">
        @section('page-title', 'Orders Management')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-shopping-cart me-2"></i>All Orders</h5>
                    <div class="d-flex gap-2">
                        <select class="form-select form-select-sm" id="statusFilter" style="width: auto;">
                            <option value="">All Status</option>
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="shipped">Shipped</option>
                            <option value="delivered">Delivered</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>
                <div class="admin-card-body">
                    @if($orders->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Customer</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td><strong>{{ $order->order_number }}</strong></td>
                                    <td>
                                        <strong>{{ $order->customer_name }}</strong><br>
                                        <small class="text-muted">{{ $order->customer_email }}</small><br>
                                        <small class="text-muted">{{ $order->customer_phone }}</small>
                                    </td>
                                    <td>{{ $order->items->count() }} item(s)</td>
                                    <td><strong>£{{ number_format($order->total, 2) }}</strong></td>
                                    <td>
                                        <span class="badge bg-{{ $order->payment_status == 'paid' ? 'success' : ($order->payment_status == 'failed' ? 'danger' : 'warning') }}">
                                            {{ ucfirst($order->payment_status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $order->status == 'pending' ? 'warning' : ($order->status == 'delivered' ? 'success' : 'info') }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#orderModal{{ $order->id }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Order Detail Modal -->
                                <div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Order {{ $order->order_number }} Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row g-4">
                                                    <div class="col-md-6">
                                                        <h6 class="text-muted">Customer Information</h6>
                                                        <p><strong>Name:</strong> {{ $order->customer_name }}</p>
                                                        <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                                                        <p><strong>Phone:</strong> {{ $order->customer_phone }}</p>
                                                        <p><strong>Address:</strong><br>{{ $order->shipping_address }}<br>{{ $order->city }}, {{ $order->postcode }}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6 class="text-muted">Order Summary</h6>
                                                        <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
                                                        <p><strong>Order Date:</strong> {{ $order->created_at->format('M d, Y H:i') }}</p>
                                                        <p><strong>Payment Method:</strong> {{ $order->payment_method ?? 'N/A' }}</p>
                                                        <p><strong>Subtotal:</strong> £{{ number_format($order->subtotal, 2) }}</p>
                                                        <p><strong>Shipping:</strong> £{{ number_format($order->shipping_cost, 2) }}</p>
                                                        <p><strong>Total:</strong> <span class="text-primary fs-5">£{{ number_format($order->total, 2) }}</span></p>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="text-muted">Order Items</h6>
                                                        <table class="table table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th>Product</th>
                                                                    <th>Price</th>
                                                                    <th>Quantity</th>
                                                                    <th>Subtotal</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($order->items as $item)
                                                                <tr>
                                                                    <td>{{ $item->product_name }}</td>
                                                                    <td>£{{ number_format($item->price, 2) }}</td>
                                                                    <td>{{ $item->quantity }}</td>
                                                                    <td>£{{ number_format($item->subtotal, 2) }}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    @if($order->notes)
                                                    <div class="col-12">
                                                        <h6 class="text-muted">Order Notes</h6>
                                                        <p class="bg-light p-3 rounded">{{ $order->notes }}</p>
                                                    </div>
                                                    @endif
                                                    <div class="col-12">
                                                        <h6 class="text-muted">Update Order</h6>
                                                        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row g-3">
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Order Status</label>
                                                                    <select name="status" class="form-select" required>
                                                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                                                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                                                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                                                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Payment Status</label>
                                                                    <select name="payment_status" class="form-select">
                                                                        <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                                        <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                                                                        <option value="failed" {{ $order->payment_status == 'failed' ? 'selected' : '' }}>Failed</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-12">
                                                                    <button type="submit" class="btn btn-primary">
                                                                        <i class="fas fa-save me-2"></i>Update Order
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $orders->links() }}
                    </div>
                    @else
                    <div class="text-center py-5 text-muted">
                        <i class="fas fa-shopping-cart fa-4x mb-3"></i>
                        <h5>No orders found</h5>
                        <p>Orders will appear here once customers make purchases.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
