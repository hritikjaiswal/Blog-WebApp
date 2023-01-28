
<style>
    div.container{
    text-align: center;
    width: 100%;
    
}
table{
    margin: auto; 
    padding: 2px;  
    
}
.midterm{
    margin-left: 15%;
}
td{
    padding: 8px;
}
</style>

@include('header')
@include('sidebar')
<div class="container">
<h1>Student Blog Panel</h1>

<br><br>
{{-- <a href="studentpanel">Student Panel</a> --}}
<div class = "midterm">
<table border="1">

    <tbody>
        <th>ID</th>
        <th>Student Name</th>
        <th>Username</th>
        <th>Category</th>
        <th>Title</th>
        <th>Description</th>
        <th>operation</th>
    </tbody>
    {{-- {{$members}} --}}
     @foreach ($members as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->s_name}}</td>
        <td>{{$item->username}}</td>
        <td>{{$item->category}}</td>
        <td>{{$item->title}}</td>
        <td>{{$item->description}}</td>
        <td><a href="update_teacher_blog/{{$item->id}}">edit</a> | <a class="show_confirm" title='Delete'  onclick="return confirm('Are you sure?')" href="delete_teacher_blog/{{$item->id}}">delete</a></td>
    </tr>
    @endforeach 
</table>
</div>
{{-- <div>{{$members->links()}}</div> --}}
</div>
<script>
    // $('.show_confirm').click(function(event) {
    //       var form =  $(this).closest("form");
    //       var name = $(this).data("name");
    //       event.preventDefault();
    //       swal({
    //           title: `Are you sure you want to delete this record?`,
    //           text: "If you delete this, it will be gone forever.",
    //           icon: "warning",
    //           buttons: true,
    //           dangerMode: true,
    //       })
    //       .then((willDelete) => {
    //         if (willDelete) {
    //           form.submit();
    //         }
    //       });
    //   });
</script>
@include('footer')