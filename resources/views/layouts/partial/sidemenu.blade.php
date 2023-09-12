<div class="bg-white p-2 rounded menu">
    <div class="text-center">
        <img class="logosdit" src="{{ asset('img/logosdit.png') }}" alt="logo" />
    </div>
    <p class="text-center mt-2 py-1 fw-bold text-capitalize ">
        {{ Auth::user()->name }}
    </p>
    <hr>

    <!-- ini menu untuk admin -->
    @if (Auth::user()->hasRole('admin'))
        <ul class="nav flex-row flex-md-column justify-content-between">
            <li class="nav-item my-1">
                <a class="nav-link hover rounded {{ Route::currentRouteName() == 'home' ? 'bg-menu' : '' }}"
                    href="{{ route('home') }}">
                    <i class="menu-icon bi bi-bar-chart me-0 me-md-2"></i>
                    <span class="d-none d-md-inline-block">Home</span></a>
            </li>

            <li class="nav-item my-1">
                <a class="nav-link hover rounded {{ Route::currentRouteName() == 'user.index' ? 'bg-menu' : '' }}"
                    href="{{ route('user.index') }}">
                    <i class="menu-icon bi bi-person-circle me-0 me-md-2"></i>
                    <span class="d-none d-md-inline-block">Users</span>
                </a>
            </li>
            <li class="nav-item my-1">
                <a class="nav-link hover rounded {{ Route::currentRouteName() == 'admstudent.index' ? 'bg-menu' : '' }}"
                    href="{{ route('student.index') }}">
                    <i class="menu-icon bi bi-people-fill me-0 me-md-2"></i>
                    <span class="d-none d-md-inline-block">Students</span>
                </a>
            </li>

            <li class="nav-item my-1">
                <a class="nav-link hover rounded {{ Route::currentRouteName() == 'set.reg' ? 'bg-menu' : '' }}"
                    href="{{ route('set.reg') }}">
                    <i class="menu-icon bi bi-coin me-0 me-md-2"></i>
                    <span class="d-none d-md-inline-block">Re-Registrasi</span>
                </a>
            </li>

            <li class="nav-item my-1">
                <a class="nav-link hover rounded {{ Route::currentRouteName() == 'setting.index' ? 'bg-menu' : '' }}"
                    href="{{ route('setting.index') }}">
                    <i class="menu-icon bi bi bi-sliders me-0 me-md-2"></i>
                    <span class="d-none d-md-inline-block">Settings</span>
                </a>
            </li>
        </ul>
    @endif


    <!-- ini menu untuk user -->
    @if (Auth::user()->hasRole('akun_isi_formulir') || Auth::user()->hasRole('akun_diterima'))
        <ul class="nav flex-row flex-md-column justify-content-around">
            <li class="nav-item my-0 my-md-1">
                <a class="nav-link hover rounded text-center text-md-start 
                {{ Route::currentRouteName() == 'student.home' ? 'bg-menu' : '' }} "
                    href="{{ route('student.home') }}">
                    <i class="menu-icon bi bi-house-door me-0 me-md-2"></i>
                    <span class="d-none d-md-inline-block">Home</span>
                    <small class="d-block d-md-none m-0">Home</small></a>
            </li>
            <li class="nav-item my-0 my-md-1">
                <a class="nav-link hover rounded text-center text-md-start 
                {{ Route::currentRouteName() == 'student.timeline' ? 'bg-menu' : '' }}"
                    href="{{ route('student.timeline') }}">
                    <i class="menu-icon bi bi-calendar-week me-0 me-md-2"></i>
                    <span class="d-none d-md-inline-block">Timeline</span>
                    <small class="d-block d-md-none ">Timeline</small></a>
            </li>
            <li class="nav-item my-0 my-md-1">
                <a class="nav-link hover rounded text-center text-md-start 
                {{ Route::currentRouteName() == 'student.profile' ? 'bg-menu' : '' }}"
                    href="{{ route('student.profile') }}">
                    <i class="menu-icon bi bi-person-circle me-0 me-md-2"></i>
                    <span class="d-none d-md-inline-block">Data User</span>
                    <small class="d-block d-md-none ">Data User</small></a>
            </li>

            @if (Auth::user()->hasRole('akun_diterima'))
                <li class="nav-item my-0 my-md-1">
                    <a class="nav-link hover rounded text-center text-md-start 
                {{ Route::currentRouteName() == 'student.profile' ? 'bg-menu' : '' }}"
                        href="{{ route('student.profile') }}">
                        <i class="menu-icon bi bi-coin me-0 me-md-2"></i>
                        <span class="d-none d-md-inline-block">Daftar Ulang</span>
                        <small class="d-block d-md-none">Daftar Ulang</small></a>
                </li>
            @endif

        </ul>
    @endif
</div>
