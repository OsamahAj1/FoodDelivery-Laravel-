@props(['logout', 'btn'])
<form action="{{ route($logout) }}" method="POST">
    @csrf
    <button class="{{ $btn }} nav-link active" type="submit" style="border: none">Logout</button>
</form>
