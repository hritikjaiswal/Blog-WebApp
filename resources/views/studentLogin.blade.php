@include('header')
<h1>Student Login Page</h1>
{{-- @if(Session::has('login')) --}}
{{-- <h3>Data Saved for user {{session('login')}}</h3> --}}
{{-- @endif --}}
<form action="blogpage" method="POST">
    @csrf
    @if(Session::get('fail'))
    <small style="color: red">{{ Session::get('fail')}}</small><br><br>
    @endif
    <input type="text" name="username" placeholder="Enter username" onchange="studentEnableInput()" id="username" />
    <span style="color: red">@error('username'){{$message}}@enderror</span>
    <br><br>
    <input type="password" name="password" placeholder="Enter password" onchange="studentEnableInput()" id="password"/>
    <span style="color: red">@error('password'){{$message}}@enderror</span>
    <br><br>
    <button type="submit" id="student-login" disabled>Login</button>
    <button type="reset">Clear</button>
</form>
<script src="{{url('js/jquery-3.6.1.min.js')}}"></script>
<script src="{{url('js/index.js')}}"></script>
@include('footer')