<nav class="navbar top-navbar navbar-expand-lg px-4">

    <div class="container-fluid">

        <button
            class="btn btn-outline-primary d-lg-none"
            id="sidebarToggle">

            <i class="bi bi-list"></i>

        </button>

        <h5 class="mb-0 fw-semibold ms-2">
            Dashboard
        </h5>

        <div class="ms-auto">
            <div class="dropdown">
                <button
                    class="btn btn-light border rounded-pill dropdown-toggle"
                    data-bs-toggle="dropdown">

                    <i class="bi bi-person-circle me-1"></i>

                    {{ auth()->user()->name }}
                </button>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>
                        <form action="{{ route('logout') }}" method="POST">

                            @csrf
                            <button
                                class="dropdown-item text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
