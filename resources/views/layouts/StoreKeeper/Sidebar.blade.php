<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Store Keeper Dashboard</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">SK</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown active">
            <a href="{{ route('storeKeeper.dashboard') }}">
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-capsule" viewBox="0 0 16 16">
                        <path
                            d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429z" />
                    </svg>
                </i>
                <span>Medicine Managment</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('storeKeeper.medicine.index') }}">Medicine Table</a></li>
                <li><a class="nav-link" href="{{ route('storeKeeper.medicine.create') }}">Add Medicine</a></li>

            </ul>
        </li>

        <br>

        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-heart-pulse" viewBox="0 0 16 16">
                        <path
                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857q.09.083.176.171a3 3 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01zM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5" />
                        <path
                            d="M10.464 3.314a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162z" />
                    </svg>
                </i>
                <span>Medical Machine
                    Managment</span></a>
            <ul class="dropdown-menu">
                <br>
                <li><a class="nav-link" href="{{ route('storeKeeper.medicalMachine.index') }}">Medical Machine Table</a>
                </li>
                <li><a class="nav-link" href="{{ route('storeKeeper.medicalMachine.create') }}">Add Medical Machine</a>
                </li>

        </li>
    </ul>
    </li>
    <br>

    {{-- <li class="menu-header">Stisla</li> --}}
    <li class="dropdown">
        <a href="#" class="nav-link has-dropdown">
            <i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-prescription2" viewBox="0 0 16 16">
                    <path d="M7 6h2v2h2v2H9v2H7v-2H5V8h2z" />
                    <path
                        d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v10.5a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 3 14.5V4a1 1 0 0 1-1-1zm2 3v10.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V4zM3 3h10V1H3z" />
                </svg>
            </i>
            <span>Medical Supplies
                Manager</span></a>
        <ul class="dropdown-menu">
            <br>
            <li><a class="nav-link" href="{{ route('storeKeeper.medicalSupplies.index') }}">Medical Supplies Table</a>
            </li>
            <li><a class="nav-link" href="{{ route('storeKeeper.medicalSupplies.create') }}">Add Medical Supplies</a>
            </li>
            {{-- <li><a class="nav-link" href="{{ route('admin.reception.archive') }}">Reception Archive</a></li> --}}
        </ul>
    </li>

    <br>

    <li class="dropdown">
        <a href="#" class="nav-link has-dropdown">
            <i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-clipboard2-pulse" viewBox="0 0 16 16">
                    <path
                        d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5z" />
                    <path
                        d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5z" />
                    <path
                        d="M9.979 5.356a.5.5 0 0 0-.968.04L7.92 10.49l-.94-3.135a.5.5 0 0 0-.926-.08L4.69 10H4.5a.5.5 0 0 0 0 1H5a.5.5 0 0 0 .447-.276l.936-1.873 1.138 3.793a.5.5 0 0 0 .968-.04L9.58 7.51l.94 3.135A.5.5 0 0 0 11 11h.5a.5.5 0 0 0 0-1h-.128z" />
                </svg>
            </i>
            <span>Medical Machine Requests</span></a>
        <ul class="dropdown-menu">
            <br>
            <li><a class="nav-link" href="{{ route('storeKeeper.medicalMachineRequest.new') }}">New Medical Machine Request</a>
            </li>
            <br>
            <li><a class="nav-link" href="{{ route('storeKeeper.medicalMachineRequest.history') }}">Medical Machine History</a>
            </li>
        </ul>
    </li>
    </ul>
    <br>
    <br>
</aside>
