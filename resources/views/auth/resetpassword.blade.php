<form action="{{route('password.update')}}" method="POST">
@csrf

<input type="password" name="password">
<input type="password" name="password_confirmation">
<button type="submit"></button>
<input type="text" name="token" value="{{request()->route('token')}}">
<input type="email" name="email" value="{{request('email')}}">
{{-- <input type="hidden" name="token" value="{{request()->route('token')}}"> --}}
</form>