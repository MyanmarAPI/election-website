@if ( Auth::check())
<li><a href="{{ url('dashboard') }}">Dashboard</a></li>
<li><a href="http://myanmarapi.github.io">Documentation</a></li>
<li><a href="{{ route('profile') }}">Edit Profile</a></li>
<li><a href="{{ route('profile.password') }}">Edit Password</a></li>
<li><a href="{{ url('auth/logout') }}">Logout</a></li>
@else
<li><a href="{{ url('/') }}">Home</a></li>
<!--<li><a href="{{ url('showcase') }}">Showcase</a></li>-->
<li><a href="{{ url('about') }}">About</a></li>
<li><a href="{{ url('beta') }}">Beta</a></li>
<li><a href="{{ url('faq') }}">FAQ</a></li>
<li><a href="http://maepaysoh.tumblr.com">Blog</a></li>
<li><a href="http://myanmarapi.github.io">Documentation</a></li>
<li><a href="{{ url('contact') }}">Contact</a></li>
<li><a href="{{ url('auth/login') }}">Login</a></li>
@endif