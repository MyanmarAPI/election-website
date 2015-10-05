@if ( Auth::check())
<li>
    <a href="{{ url('dashboard') }}" data-ga-event="Navigation|Click|Dashboard">
        Dashboard
    </a>
</li>
<li>
    <a href="http://myanmarapi.github.io" data-ga-event="Navigation|Click|Documentation">
        Documentation
    </a>
</li>
<li>
    <a href="{{ route('profile') }}" data-ga-event="Navigation|Click|EditProfile">
        Edit Profile
    </a>
</li>
<li>
    <a href="{{ route('profile.password') }}" data-ga-event="Navigation|Click|EditPassword">
        Edit Password
    </a>
</li>
<li>
    <a href="{{ url('auth/logout') }}" data-ga-event="Navigation|Click|Logout">
        Logout
    </a>
</li>
@else
<li>
    <a href="{{ url('/') }}" data-ga-event="Navigation|Click|Home">Home</a>
</li>
<li>
    <a href="{{ url('showcase') }}" data-ga-event="Navigation|Click|Showcae">Showcase</a>
</li>
<li>
    <a href="{{ url('about') }}" data-ga-event="Navigation|Click|About">About</a>
</li>
<!-- <li>
    <a href="{{ url('hackchallenge') }}" data-ga-event="Navigation|Click|HacKChellenge">Hack Challenge</a>
</li>
<li>
    <a href="{{ url('pressrelease') }}" data-ga-event="Navigation|Click|PressRelease">Press Release</a>
</li> -->
<li>
    <a href="{{ url('faq') }}" data-ga-event="Navigation|Click|FAQ">FAQ</a>
</li>
<li>
    <a href="http://maepaysoh.tumblr.com" data-ga-event="Navigation|Click|Blog">Blog</a>
</li>
<li>
    <a href="http://myanmarapi.github.io" data-ga-event="Navigation|Click|Documentation">Documentation</a>
</li>
<li>
    <a href="{{ url('auth/login') }}" data-ga-event="Navigation|Click|Login">Login</a>
</li>
@endif