<div class="sidebar">

    <div class="sidebar-logo text-center">
        <div class="logo-circle mx-auto mb-2">
            S
        </div>

        <h5 class="mb-0 fw-bold">
            SinodTech ERP
        </h5>

        <small class="text-muted">
            Inventory System
        </small>
    </div>

    <ul class="nav flex-column mt-3">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('branch.index') }}" class="nav-link {{ request()->routeIs('branch.*') ? 'active' : '' }}">
                <i class="bi bi-box-seam me-2"></i>
                Branches
            </a>
        </li>
    </ul>
</div>
