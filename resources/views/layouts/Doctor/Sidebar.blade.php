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
            <a href="{{ route('doctor.dashboard') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">System</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
             <i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-medical" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v.634l.549-.317a.5.5 0 1 1 .5.866L9 6l.549.317a.5.5 0 1 1-.5.866L8.5 6.866V7.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L7 6l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V4.5A.5.5 0 0 1 8 4M5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                  </svg>
             </i>
                <span>Medical Record Managment</span></a>
            <ul class="dropdown-menu">
                <br>
                <li><a class="nav-link" href="{{ route('doctor.medicalRecord.index') }}">Medical Record Table</a></li>
                <br>
                <li><a class="nav-link" href="{{ route('doctor.medicalRecord.create') }}">Add Medical Record</a></li>
                <br>
                <li><a class="nav-link" href="{{ route('doctor.medicalRecord.archive') }}">Medical Record Archive </a></li>
            </ul>
        </li>
        <br>

        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse-fill" viewBox="0 0 16 16">
                        <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5"/>
                        <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5M9.98 5.356 11.372 10h.128a.5.5 0 0 1 0 1H11a.5.5 0 0 1-.479-.356l-.94-3.135-1.092 5.096a.5.5 0 0 1-.968.039L6.383 8.85l-.936 1.873A.5.5 0 0 1 5 11h-.5a.5.5 0 0 1 0-1h.191l1.362-2.724a.5.5 0 0 1 .926.08l.94 3.135 1.092-5.096a.5.5 0 0 1 .968-.039Z"/>
                      </svg>
                </i>
                    <span>Medical Machine Request</span></a>
            <ul class="dropdown-menu">
                <br>
                <li><a class="nav-link" href="{{ route('doctor.medicalMachineRequest.index') }}">Medical Machine Request Table</a></li>
                <br>
                <li><a class="nav-link" href="{{ route('doctor.medicalMachineRequest.create') }}">Add Medical Machine Request</a></li>
                {{-- <li><a class="nav-link" href="{{ route('admin.specialization.archive') }}">Specialization Archive </a> --}}
                </li>
            </ul>
        </li>
        <br>
        <li class="menu-header"></li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                        <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9z"/>
                        <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1zm1.038 3.018a6 6 0 0 1 .924 0 6 6 0 1 1-.924 0M0 3.5c0 .753.333 1.429.86 1.887A8.04 8.04 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5M13.5 1c-.753 0-1.429.333-1.887.86a8.04 8.04 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1"/>
                      </svg>
                </i>
                Available TimeManage <span>
                    </span></a>
            <ul class="dropdown-menu">
                <br>
                <li><a class="nav-link" href="{{ route('doctor.availableTime.index') }}">Available Time Table</a></li>
                <br>
                <li><a class="nav-link" href="{{ route('doctor.availableTime.create') }}">Add Available Time</a></li>
   
            </ul>
        </li>
        <br>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar4" viewBox="0 0 16 16">
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
                      </svg>
                </i>
                 <span>Appointment
                    Manager</span></a>
            <ul class="dropdown-menu">
                <br>
                <li><a class="nav-link" href="{{ route('doctor.appointment.index') }}">Appointment Table</a></li>
                <br>
                <li><a class="nav-link" href="{{ route('doctor.appointment.create1') }}">Add Appointment </a></li>
                {{-- <li><a class="nav-link" href="{{ route('admin.storeKeeper.archive') }}">StoreKeeper Archive</a></li> --}}
            </ul>
        </li>
        <br>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-pulse-fill" viewBox="0 0 16 16">
                        <path d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9z"/>
                        <path d="M.88 8C-2.427 1.68 4.41-2 7.823 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8z"/>
                      </svg>
                </i> 
                <span>Surgeries Manager
                    
                </span></a>
            <ul class="dropdown-menu">
                
                <li><a href="{{ route('doctor.surgeries.index') }}">Surgeries Table</a></li>
                <br>
                <li><a href="{{ route('doctor.surgeries.finished') }}">Finished Surgeries Table</a></li>
                {{-- <li><a href="{{ route('admin.departmentEmploye.archive') }}">Dep Employe Archive</a></li> --}}
            </ul>
        </li>

    </ul>
<br>
<br>
</aside>
