
<h2 class="mb-4">Super Admin</h2>

<div>Welcome , {{ Auth::user()->f_name }} </div>
<li>
    <a class="custom-btn" href="{{ route('logout') }}">Logout</a>
</li>



