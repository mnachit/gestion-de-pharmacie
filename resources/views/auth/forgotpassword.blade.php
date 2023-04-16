<form action="{{route('password.request')}}" method="POST">
    @csrf
<input type="email" name="email">
<button type="submit"></button>
</form>