<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('pages/dashboard') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-header">Practitioners</li>
<li class="nav-item">
	<a href="{{ route('list-practitioners') }}" class="nav-link {{ request()->is('pages/practitioners/list-practitioners') || request()->is('pages/practitioners/profile-practitioner/*') ? 'active' : '' }}">
		<i class="nav-icon fas fa-user-md"></i>
		<p>Practitioners</p>
	</a>
</li>
<li class="nav-item">
	<a href="{{ route('list-certifications') }}" class="nav-link {{ request()->is('pages/practitioners/list-certifications') ? 'active' : '' }}">
		<i class="nav-icon fas fa-certificate"></i>
		<p>Certifications</p>
	</a>
</li>
<li class="nav-header">Facilities/ Organizations</li>
<li class="nav-item">
	<a href="{{ route('list-facilities') }}" class="nav-link {{ request()->is('pages/facilities/list-facilities') || request()->is('pages/facilities/profile-facility/*') ? 'active' : '' }}">
		<i class="nav-icon fas fa-clinic-medical"></i>
		<p>Facilities</p>
	</a>
</li>
<li class="nav-item">
	<a href="{{ route('list-accreditations') }}" class="nav-link {{ request()->is('pages/facilities/list-accreditations') ? 'active' : '' }}">
		<i class="nav-icon fas fa-certificate"></i>
		<p>Accreditations</p>
	</a>
</li>

@if(Auth::user()->userlevel_id == 1)
<li class="nav-header">Admin Menu</li>
<li class="nav-item">
	<a href="{{ route('list-users') }}" class="nav-link {{ request()->is('pages/users/list-users') ? 'active' : '' }}">
		<i class="nav-icon fas fa-users"></i>
		<p>Users</p>
	</a>
</li>
@endif
<li class="nav-header">Account Settings</li>
<li class="nav-item">
	<a href="" class="nav-link ">
  		<i class="nav-icon fas fa-user"></i>
  		<p>User Profile</p>
	</a>
</li>
<li class="nav-item">
	<a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form2').submit();">
	  	<i class="nav-icon fas fa-sign-out-alt"></i>
	  	<p>Logout</p>
	</a>
	<form id="logout-form2" action="{{ route('logout') }}" method="POST" class="d-none">
	    @csrf
	</form>
</li>