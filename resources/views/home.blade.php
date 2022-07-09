<h1>Coucou {{ Auth::user()->name }}</h1>
<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('form').submit()">Se déconnecter</a>
<form action="{{ route('logout') }}" method="post" id="form">@csrf</form>
