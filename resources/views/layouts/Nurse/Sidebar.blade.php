<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Admin Dashboard</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">AD</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown active">
            <a href="{{ route('admin.dashboard') }}"><i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                  </svg>
            </i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">System</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
               <i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                  </svg>
               </i>
                <span>Doctor Managment</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.doctor.index') }}">Doctor Table</a></li>
                <li><a class="nav-link" href="{{ route('admin.doctor.create') }}">Add Doctor</a></li>
                <li><a class="nav-link" href="{{ route('admin.doctor.archive') }}">Doctor Archive </a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-layers" viewBox="0 0 16 16">
                    <path d="M8.235 1.559a.5.5 0 0 0-.47 0l-7.5 4a.5.5 0 0 0 0 .882L3.188 8 .264 9.559a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882L12.813 8l2.922-1.559a.5.5 0 0 0 0-.882zm3.515 7.008L14.438 10 8 13.433 1.562 10 4.25 8.567l3.515 1.874a.5.5 0 0 0 .47 0zM8 9.433 1.562 6 8 2.567 14.438 6z"/>
                  </svg>    
            </i> <span>Specialization
                    Managment</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.specialization.index') }}">Specialization Table</a></li>
                <li><a class="nav-link" href="{{ route('admin.specialization.create') }}">Add Specialization</a></li>
                <li><a class="nav-link" href="{{ route('admin.specialization.archive') }}">Specialization Archive </a>
                </li>
            </ul>
        </li>
        <li class="menu-header">System</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                    <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492z"/>
                  </svg>    
            </i> <span>Reception
                    Manager</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.reception.index') }}">Reception Table</a></li>
                <li><a class="nav-link" href="{{ route('admin.reception.create') }}">Add Reception</a></li>
                <li><a class="nav-link" href="{{ route('admin.reception.archive') }}">Reception Archive</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5v-1a2 2 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693Q8.844 9.002 8 9c-5 0-6 3-6 4m7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1"/>
                  </svg>
                </i> <span>StoreKeeper
                    Manager</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.storeKeeper.index') }}">StoreKeeper Table</a></li>
                <li><a class="nav-link" href="{{ route('admin.storeKeeper.create') }}">Add StoreKeeper </a></li>
                <li><a class="nav-link" href="{{ route('admin.storeKeeper.archive') }}">StoreKeeper Archive</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown">
                <i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-border-all" viewBox="0 0 16 16">
                    <path d="M0 0h16v16H0zm1 1v6.5h6.5V1zm7.5 0v6.5H15V1zM15 8.5H8.5V15H15zM7.5 15V8.5H1V15z"/>
                  </svg>    
            </i> 
            <span>Department
                    Employe
                </span></a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('admin.departmentEmploye.index') }}">Department Employe Table</a></li>
                <li><a href="{{ route('admin.departmentEmploye.create') }}">Add Department Employe</a></li>
                <li><a href="{{ route('admin.departmentEmploye.archive') }}">Dep Employe Archive</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                    <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5"/>
                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z"/>
                  </svg>    
            </i> <span>Nurse Manager</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.nurse.index') }}">Nurse Table</a></li>
                <li><a class="nav-link" href="{{ route('admin.nurse.create') }}">Add Nurse</a></li>
                <li><a class="nav-link" href="{{ route('admin.nurse.archive') }}">Nurse Archive</a></li>

            </ul>
        </li>
        <li class="menu-header">Pages</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown">   <i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-border-all" viewBox="0 0 16 16">
                    <path d="M0 0h16v16H0zm1 1v6.5h6.5V1zm7.5 0v6.5H15V1zM15 8.5H8.5V15H15zM7.5 15V8.5H1V15z"/>
                  </svg>    
            </i>  <span>Department
                    Manager</span></a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('admin.department.index') }}">Department Table</a></li>
                <li><a href="{{ route('admin.department.create') }}">Add Department</a></li>
                <li><a href="{{ route('admin.department.archive') }}">Department Archive</a></li>

            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
                    <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3zm1 13h8V2H4z"/>
                    <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0"/>
                  </svg>
            </i>
                <span>Room Manager</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.room.index') }}">Room Table</a></li>
                <li><a class="nav-link" href="{{ route('admin.room.create') }}">Add Room</a></li>
                <li><a class="nav-link" href="{{ route('admin.room.archive') }}">Room Archive</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                  </svg>
                </i> <span>Admin
                    Manager</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.admin.index') }}">Admin Table</a></li>
                <li><a class="nav-link" href="{{ route('admin.admin.create') }}">Add Admin</a></li>
                <li><a class="nav-link" href="{{ route('admin.admin.archive') }}">Admin Archive</a></li>

            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                    <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022M6 8.694 1 10.36V15h5zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5z"/>
                    <path d="M2 11h1v1H2zm2 0h1v1H4zm-2 2h1v1H2zm2 0h1v1H4zm4-4h1v1H8zm2 0h1v1h-1zm-2 2h1v1H8zm2 0h1v1h-1zm2-2h1v1h-1zm0 2h1v1h-1zM8 7h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zM8 5h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zm0-2h1v1h-1z"/>
                  </svg>
            </i>
                <span>Floor Manager</span></a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('admin.floor.index') }}">Floor Table</a></li>
                <li><a href="{{ route('admin.floor.create') }}">Add Floor</a></li>
                <li><a class="nav-link" href="{{ route('admin.floor.archive') }}">Floor Archive</a></li>
            </ul>
        </li>

        <br>

        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
                    <path d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429z"/>
                  </svg>
            </i>
                <span>Medicine And Medical Supplies Archive Manager</span></a>
            <ul class="dropdown-menu">
                <br>
                <li><a href="{{ route('admin.medicineMedicalSupplies.index.archive') }}">Archive Table</a></li>
            </ul>
        </li>
        <br>

        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                    <path d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                  </svg>
            </i>
                <span>Complaints Manager</span></a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('admin.complaint.index') }}">Complaints Table</a></li>
                <li><a class="nav-link" href="{{ route('admin.complaint.archive') }}">Complaints Archive</a></li>
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
                <li><a class="nav-link" href="{{ route('admin.medicalMachineRequest.new') }}">New Medical Machine Request</a>
                </li>
                <br>
                <li><a class="nav-link" href="{{ route('admin.medicalMachineRequest.history') }}">Medical Machine History</a>
                </li>
            </ul>
        </li>

    </ul>
<br>
<br>
</aside>
