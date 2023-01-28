<style>
    .header{
        color: black;
        height: 10%;
        width: 100%;
        text-align: center;
    
    }
    .head-5{
        float: right;
        margin-right: 40px;
        margin-bottom: 20px
    }
    a{
        margin: 5px;
    }
    .w-5{
        display: none;
    }
</style>
<header class="header">
    <h1>Header view</h1>
    {{-- <a href="/">Home</a> --}}
    
    @if(session()->has('LoggedUser') && !empty(session()->has('LoggedUser')))

    <a class="head-5" href="/logout">Logout</a>
    @endif
    @if(session()->has('LoggedStudent')  && !empty(session()->has('LoggedStudent')))
    <a class="head-5" href="/logout_student">Logout</a>
    @endif
    
    <hr>
</header>