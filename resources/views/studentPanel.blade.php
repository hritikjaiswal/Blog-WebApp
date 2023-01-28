<head>
</head>
@include('header')
@include('sidebar')

<div class="container">
<h1> Student Panel </h1>


<br><br>
<table border="1">

    <tbody>
        <th>ID</th>
        <th>Name</th>
        <th>username</th>
        <th>operation</th>
    </tbody>
    @foreach ($members as $item)
    <tr>
        <td>{{$item['id']}}</td>
        <td>{{$item['s_name']}}</td>
        <td>{{$item['username']}}</td>

        <td><a href="view_studentdata/{{$item['id']}}">view</a> | <a href="updateStudent/{{$item['id']}}">edit</a> | <a  onclick="return confirm('Are you sure?')" href="delete/{{$item['id']}}">delete</a></td>
    </tr>
    @endforeach
</table>
<div>{{$members->links()}}</div>
</div>
@include('footer')
