@include('header')

<div>
<h1>Teacher Login Page</h1>
{{session('LoggedUser')}}
{{-- @if(Session::has('login')) --}}
{{-- <h3>Data Saved for user {{session('login')}}</h3> --}}
{{-- @endif --}}
<form action="auth" method="POST">
    @csrf

    @if(Session::get('fail'))
    <small style="color: red">{{ Session::get('fail')}}</small><br><br>
    @endif
    <input type="text" name="username" placeholder="Enter user ID" onchange="teacherEnableInput()" id="username" />
    <span style="color: red">@error('username'){{$message}}@enderror</span>
    <br><br>
    <input type="password" name="password" id="password" placeholder="Enter password" onchange="teacherEnableInput()" id="teacher-login-pass">
    <span style="color: red">@error('password'){{$message}}@enderror</span>
    <br><br>
    <button type="submit" id="teacher-submit" disabled>Login</button>
    <button type="reset">Clear</button>

</form>
</div>

<script src="{{url('js/jquery-3.6.1.min.js')}}"></script>
<script src="{{url('js/index.js')}}"></script>
@include('footer')