
<h2 class="mb-4">Family Member</h2>
<div>Welcome , {{ Auth::user()->f_name }} </div>
<li>
    <a class="custom-btn" href="{{ route('logout') }}">Logout</a>
</li>
<li>
    <a class="custom-btn" href="{{ route('profile') }}">Profile Update</a>
</li>
<li>
    <a class="custom-btn" href="{{ route('get.timeline') }}">Timeline</a>
</li>



