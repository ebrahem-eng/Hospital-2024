<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown active">
            <a href="{{ route('storeKeeper.dashboard') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">System</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                <svg style="margin-right: 20px; margin-left:10px;" xmlns="http://www.w3.org/2000/svg" height="17px"
                    viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path
                        d="M224 48a80 80 0 1 1 0 160 80 80 0 1 1 0-160zM96 128a128 128 0 1 0 256 0A128 128 0 1 0 96 128zm64 225c5.2-.7 10.6-1 16-1h96c5.4 0 10.8 .3 16 1v49c-27.6 7.1-48 32.2-48 62v32c0 8.8 7.2 16 16 16h24c8.8 0 16-7.2 16-16s-7.2-16-16-16h-8V464c0-17.7 14.3-32 32-32s32 14.3 32 32v16h-8c-8.8 0-16 7.2-16 16s7.2 16 16 16h24c8.8 0 16-7.2 16-16V464c0-29.8-20.4-54.9-48-62V361.3c46.9 19 80 65 80 118.7v8c0 13.3 10.7 24 24 24s24-10.7 24-24v-8c0-97.2-78.8-176-176-176H176C78.8 304 0 382.8 0 480v8c0 13.3 10.7 24 24 24s24-10.7 24-24v-8c0-53.7 33.1-99.7 80-118.7v41c-23.1 6.9-40 28.3-40 53.7c0 30.9 25.1 56 56 56s56-25.1 56-56c0-25.4-16.9-46.8-40-53.7V353zm-16 79a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                </svg>
                <span>Medicine Managment</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('storeKeeper.medicine.index') }}">Medicine Table</a></li>
                <li><a class="nav-link" href="{{ route('storeKeeper.medicine.create') }}">Add Medicine</a></li>
                {{-- <li><a class="nav-link" href="{{ route('admin.doctor.archive') }}">Doctor Archive </a></li> --}}
            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Medical Machine
                    Managment</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('storeKeeper.medicalMachine.index') }}">Medical Machine Table</a></li>
                <li><a class="nav-link" href="{{ route('storeKeeper.medicalMachine.create') }}">Add Medical Machine</a></li>
                {{-- <li><a class="nav-link" href="{{ route('admin.specialization.archive') }}">Specialization Archive </a> --}}
                </li>
            </ul>
        </li>
        <li class="menu-header">Stisla</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Medical Supplies
                    Manager</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('storeKeeper.medicalSupplies.index') }}">Medical Supplies Table</a></li>
                <li><a class="nav-link" href="{{ route('storeKeeper.medicalSupplies.create') }}">Add Medical Supplies</a></li>
                {{-- <li><a class="nav-link" href="{{ route('admin.reception.archive') }}">Reception Archive</a></li> --}}
            </ul>
        </li>
    
    

        {{-- <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li> --}}
    </ul>
<br>
<br>
</aside>