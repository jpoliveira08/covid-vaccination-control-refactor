<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
    <li class="nav-item mb-2">
        <a href="{{ route('employee.index') }}" class="nav-link px-2 align-middle @if (Route::is('employee.*')) active @endif">
            <i class="fa-solid fa-users"></i>
            <span>Employees</span>
        </a>
    </li>
    <li class="nav-item mb-2">
        <a href="{{ route('vaccine.index') }}" class="nav-link px-3 align-middle @if (Route::is('vaccine.*')) active @endif">
            <i class="fa-solid fa-syringe "></i>
            <span>Vaccines</span>
        </a>
    </li>
</ul>
