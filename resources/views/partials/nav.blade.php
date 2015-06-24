@if ( Auth::check())
<li><a href="/dashboard">Dashboard</a></li>
@endif
<li><a href="/">Home</a></li>
<li><a href="#">Showcase</a></li>
<li><a href="/about">About</a></li>
<li><a href="/contact">Contact</a></li>
@if ( Auth::check())
<li><a href="/auth/logout">Logout</a></li>
@else
<li><a href="/auth/login">Login</a></li>
@endif