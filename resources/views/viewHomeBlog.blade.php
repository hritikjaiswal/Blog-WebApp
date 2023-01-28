@include('header')
<h1>View Student Blog</h1>

{{-- {{$data}} --}}
    @foreach ($data as $key=>$val)
   

    <p>Category: {{$val->category}}</p><br>
    <p>Title: {{$val->title}}</p><br>
    <p>Description: {{$val->description}}</p><br>
    <p>auther: {{"@".$val->s_name}}</p><br>

    @endforeach

    @include('footer')