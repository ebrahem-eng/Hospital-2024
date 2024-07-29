<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Reception Dashboard</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">SK</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown active">
            <a href="{{ route('reception.dashboard') }}">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-house" viewBox="0 0 16 16">
                        <path
                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                    </svg>
                </i>
                <span>Dashboard</span></a>
        </li>
        <li class="menu-header">System</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                      </svg>
                </i>
                <span>Patient Managment</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('reception.patient.index') }}">Patient Table</a></li>
                <li><a class="nav-link" href="{{ route('reception.patient.create') }}">Add Patient</a></li>
                <li><a class="nav-link" href="{{ route('reception.patient.archive') }}">Patient Archive</a></li>

            </ul>
        </li>

        <br>

        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-medical-fill" viewBox="0 0 16 16">
                        <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M8.5 4.5v.634l.549-.317a.5.5 0 1 1 .5.866L9 6l.549.317a.5.5 0 1 1-.5.866L8.5 6.866V7.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L7 6l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V4.5a.5.5 0 1 1 1 0M5.5 9h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1m0 2h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1"/>
                      </svg>
                </i>
                <span>Medical Record Managment</span></a>
            <ul class="dropdown-menu">
                <br>
                <li><a class="nav-link" href="{{ route('reception.medicalRecord.index') }}">Medical Record Table</a>
                </li>
                <li><a class="nav-link" href="{{ route('reception.medicalRecord.create') }}">Add Medical Record</a>
                </li>

        </li>
    </ul>
    </li>
    <br>
    </ul>
    <br>
    <br>
</aside>
