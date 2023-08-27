
<h2 class="mb-4">Head Family Dashboard</h2>

<div>Welcome , {{ Auth::user()->f_name }} </div>
<li>
    <a class="custom-btn" href="{{ route('logout') }}">Logout</a>
</li>
<li>
    <a class="custom-btn" href="{{ route('change.password') }}">Change Password</a>
</li>
<li>
    <a class="custom-btn" href="{{ route('profile.page') }}">Update Profile</a>
</li>
<li>
    <a class="custom-btn" href="{{ route('event.page') }}">Add Event</a>
</li>
<li>
    <a class="custom-btn" href="{{ route('get.events') }}">Events</a>
</li>



