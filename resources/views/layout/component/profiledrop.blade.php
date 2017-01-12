<ul class="dropdown-menu pull-right dropdown-menu--icon">
    @if(Auth::user())
    <li>
        <a href="profile-about.html"><i class="zmdi zmdi-account"></i> Profile</a>
    </li>
    @else
    <li>
        <a href="/login"><i class="zmdi zmdi-account"></i> Login</a>
    </li>
    @endif
</ul>