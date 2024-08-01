<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Nurse Dashboard</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">ND</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown active">
            <a href="{{ route('nurse.dashboard') }}"><i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-house" viewBox="0 0 16 16">
                        <path
                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                    </svg>
                </i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">System</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-capsule" viewBox="0 0 16 16">
                        <path
                            d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429z" />
                    </svg>
                </i>
                <span>Medicine Patient Managment</span></a>
            <ul class="dropdown-menu">
                <br>
                
                <li><a class="nav-link" href="{{ route('nurse.new.medicine.medicalSupplies.patient') }}">New Medicine
                        Patient</a></li>
                <li><a class="nav-link" href="{{ route('nurse.history.medicine.medicalSupplies.patient') }}">History
                        Medicine Patient</a></li>
                {{-- <li><a class="nav-link" href="{{ route('admin.doctor.archive') }}">Doctor Archive </a></li> --}}
            </ul>
        </li>

    </ul>
    <br>
    <br>
</aside>
