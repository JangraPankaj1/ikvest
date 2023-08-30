<h1>Hi, {{ $fullName }}</h1>
<h2>Invite Link for Join Family Member</h2>

You can Join to click following link:
<a href="{{ route('invite.link', ['token' => $token]) }}">Invite Link</a>
