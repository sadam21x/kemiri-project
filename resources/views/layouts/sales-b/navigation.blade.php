<div class="navigation">
    <div class="navigation-header">
        <span>Navigation</span>
        <a href="#">
            <i class="ti-close"></i>
        </a>
    </div>
    <div class="navigation-menu-body">
        <ul>
            <li>
                <a href="{{ url('/sales-b') }}" id="dashboard-menu" class="">
                    <span class="nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/sales-b/customer') }}" id="customer-menu" class="">
                    <span class="nav-link-icon">
                        <i class="fas fa-user"></i>
                    </span>
                    <span>Customer</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/sales-b/order-barang') }}" id="order-barang-menu" class="">
                    <span class="nav-link-icon">
                        <i class="fas fa-cart-plus"></i>
                    </span>
                    <span>Order Barang</span>
                </a>
            </li>
        </ul>
    </div>
</div>