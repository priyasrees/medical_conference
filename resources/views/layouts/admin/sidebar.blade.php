<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"><a href="{{ url('admin/dashboard') }}" aria-expanded="false">
                <i class="material-symbols-outlined">home</i>
                <span class="nav-text">Dashboard</span>
                </a>
            </li>
           <li class="{{ Request::is('admin/onsite') || Request::is('admin/onsite_registration') ? 'active' : '' }}">
                <a href="{{ route('onsite.list') }}" aria-expanded="false">
                          <i class="material-symbols-outlined">person</i>
                        <span class="nav-text">Onsite Registration</span>
                        </a>
            </li>
            <li class="{{ Request::is('admin/onsite_payment') ? 'active' : '' }}"><a href="{{ url('admin/onsite_payment') }}" aria-expanded="false">
                <i class="material-symbols-outlined">person</i>
                <span class="nav-text">Onsite Payment</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/vip-members') ? 'active' : '' }}"><a href="{{ url('admin/vip-members') }}" aria-expanded="false">
                <i class="material-symbols-outlined">person</i>
                <span class="nav-text">VIP Members</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/airs-members') ? 'active' : '' }}"><a href="{{ url('admin/airs-members') }}" aria-expanded="false">
                <i class="material-symbols-outlined">person</i>
                <span class="nav-text">AIRS Members</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/gala-dinner') ? 'active' : '' }}"><a href="{{ url('admin/gala-dinner') }}" aria-expanded="false">
                <i class="material-symbols-outlined">person</i>
                <span class="nav-text">Gala Dinner</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/residential-package') ? 'active' : '' }}"><a href="{{ url('admin/residential-package') }}" aria-expanded="false">
                <i class="material-symbols-outlined">person</i>
                <span class="nav-text">Residential Package</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/become-airs-members') ? 'active' : '' }}"><a href="{{ url('admin/become-airs-members') }}" aria-expanded="false">
                <i class="material-symbols-outlined">person</i>
                <span class="nav-text">Become An AIRS Members</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/non-members') ? 'active' : '' }}"><a href="{{ url('admin/non-members') }}" aria-expanded="false">
                <i class="material-symbols-outlined">person</i>
                <span class="nav-text">Non-Members</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/pg-student') ? 'active' : '' }}"><a href="{{ url('admin/pg-student') }}" aria-expanded="false">
                <i class="material-symbols-outlined">person</i>
                <span class="nav-text">PG Student</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/international') ? 'active' : '' }}"><a href="{{ url('admin/international') }}" aria-expanded="false">
                <i class="material-symbols-outlined">person</i>
                <span class="nav-text">International</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/spouse') ? 'active' : '' }}"><a href="{{ url('admin/spouse') }}" aria-expanded="false">
                <i class="material-symbols-outlined">person</i>
                <span class="nav-text">Spouse / Accompanying</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/resident-rooms') ? 'active' : '' }}"><a href="{{ url('admin/resident-rooms') }}" aria-expanded="false">
                <i class="material-symbols-outlined">person</i>
                <span class="nav-text">Resident Rooms</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/hands-on-training') ? 'active' : '' }}"><a href="{{ url('admin/hands-on-training') }}" aria-expanded="false">
                <i class="material-symbols-outlined">person</i>
                <span class="nav-text">Hands On  Training</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/abstract-data') ? 'active' : '' }}"><a href="{{ url('admin/abstract-data') }}" aria-expanded="false">
                <i class="material-symbols-outlined">person</i>
                <span class="nav-text">Abstract</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/payment') ? 'active' : '' }}"><a href="{{ url('admin/payment') }}" aria-expanded="false">
                <i class="material-symbols-outlined">person</i>
                <span class="nav-text">Payment</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/package') ? 'active' : '' }}"><a href="{{ url('admin/package') }}" aria-expanded="false">
                <i class="material-symbols-outlined">person</i>
                <span class="nav-text">Package</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/plan') ? 'active' : '' }}"><a href="{{ url('admin/plan') }}" aria-expanded="false">
                <i class="material-symbols-outlined">person</i>
                <span class="nav-text">Plan</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/dinner') ? 'active' : '' }}"><a href="{{ url('admin/dinner') }}" aria-expanded="false">
                <i class="material-symbols-outlined">person</i>
                <span class="nav-text">Dinner</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/training') ? 'active' : '' }}"><a href="{{ url('admin/training') }}" aria-expanded="false">
                <i class="material-symbols-outlined">person</i>
                <span class="nav-text">Training</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/attendance') ? 'active' : '' }}"><a href="{{ url('admin/attendance') }}" aria-expanded="false">
                <i class="material-symbols-outlined">person</i>
                <span class="nav-text">Attendance</span>
                </a>
            </li>
        </ul>
        <div class="copyright">
            <p><strong></strong></p>
            <p class="fs-15 text-white">Developed by <a href="https://bhivetechnologies.in/" class="text-white"
                target="_blank">Bhive
                Technologies</a>
            </p>
        </div>
    </div>
</div>