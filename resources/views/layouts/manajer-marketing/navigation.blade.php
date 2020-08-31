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
                <a href="{{ url('/admin-gudang') }}" id="dashboard-menu" class="">
                    <span class="nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/manajer-marketing/order-barang') }}" id="order-barang-menu" class="">
                    <span class="nav-link-icon">
                        <i class="fas fa-cart-plus"></i>
                    </span>
                    <span>Order Barang</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/manajer-marketing/sales') }}" id="sales-menu" class="">
                    <span class="nav-link-icon">
                        <i class="fas fa-users"></i>
                    </span>
                    <span>Sales</span>
                </a>
            </li>
        </ul>
    </div>
</div>