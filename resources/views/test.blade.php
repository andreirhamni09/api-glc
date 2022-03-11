<form method="POST" action="{{ url('/profile/1') }}">
    @csrf
    <input type="submit" value="submit">
</form>

<form method="POST" action="{{ url('/profile/2') }}">
    @csrf
    
    <input type="submit" value="submit">
</form>