
<style>
    div.container{
    text-align: center;
    width: 100%;
}
table{
    /* margin-left: 15%;  */
    padding: 2px;   
}
td{
    padding: 8px;
}
.midterm{
    margin-left: 15%;
}

</style>
<div class="container">
@include('header')
@include('sidebar')

<h1>Student blog page</h1>
<div class = "midterm">
<table border="1">
    <tr>
        <td>ID</td>
        <td>Category</td>
        <td>title</td>
        <td>desc</td>
        <td>operation</td>
    </tr>

        @foreach($distinct as $user)
            @if($user->id==session('LoggedStudent'))
            <h4>{{$user->username}}</h4>
            @endif
        @endforeach
   
    @foreach ($members as $item)
    @if($item['s_loginid']==session('LoggedStudent'))
    <tr>
        <td>{{$item['id']}}</td>
        <td>{{$item['category']}}</td>
        <td>{{$item['title']}}</td>
        <td>{{$item['description']}}</td>
        <td><a href="view_studentblog/{{$item['id']}}">view</a> | <a href="update/{{$item['id']}}">edit</a>|<a onclick="return confirm('Are you sure?')" href="deleteblog/{{$item['id']}}">delete</a> </td>
    </tr>
    @endif
    @endforeach
    

</table>
</div>
<div>{{$members->links()}}</div> 

</div>
@include('footer')