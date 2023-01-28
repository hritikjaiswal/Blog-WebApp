
<link rel="stylesheet" href="{{url('css/style.css')}}">
@if(session()->has('LoggedUser') && !empty(session()->has('LoggedUser')))
    {{-- <a class="head-5" href="logout">Logout</a> --}}
<div class="sidebar">
    <a class="active" href="/">Home</a>
    <a class="active" href="studentpanel">Student Panel</a>
    <a class="active" href="addstudent">Create Student</a>
    <a class="active" href="student_view_blog_panel">Student Blog</a>
</div>
@endif

@if(session()->has('LoggedStudent')  && !empty(session()->has('LoggedStudent')))
{{-- <a class="head-5" href="logout_student">Logout</a> --}}
<div class="sidebar">
<a class="active" href="/">Home</a>
    <a class="active" href="studentblog">Student Blog</a>
    <a class="active" href="createblog">Create Blog</a>
    {{-- <a class="active" href="student_view_blog_panel">Student Blog</a> --}}
    </div>
@endif

