@if ( Auth::check())
<li><a href="{{ url('dashboard') }}">Dashboard</a></li>
@endif
<li><a href="{{ url('/') }}">Home</a></li>
<li><a href="#">Showcase</a></li>
<li><a href="{{ url('about') }}">About</a></li>
<li><a href="{{ url('contact') }}">Contact</a></li>
@if ( Auth::check())
<li><a href="{{ url('auth/logout') }}">Logout</a></li>
@else
<li><a href="{{ url('auth/login') }}">Login</a></li>
@endif