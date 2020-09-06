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
                <a href="{{ url('/owner') }}" id="dashboard-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/owner/pembayaran-supplier') }}" id="pembayaran-supplier-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-file-invoice"></i>
                    </span>
                    <span>Pembayaran ke Supplier</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/owner/pembayaran-customer') }}" id="pembayaran-customer-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-file-invoice"></i>
                    </span>
                    <span>Pembayaran Customer</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/owner/sales') }}" id="sales-menu">
                    <span class="nav-link-icon">
                        <i class="fas fa-users"></i>
                    </span>
                    <span>Sales</span>
                </a>
            </li>
        </ul>
    </div>
</div>