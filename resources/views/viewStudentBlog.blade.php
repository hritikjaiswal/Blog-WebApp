@include('header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style>
        img {
            border-radius: 50%;
            border: 1px solid #ddd;
            padding: 5px;
            width: 150px; 
        }
    </style>
</head>
<body>
    <button onclick="history.back()">Go Back</button>
    <h1>View Student Blog</h1>

    @foreach ($members as $key=>$val)
   
    <p>Category: {{$val->category}}</p><br>
    <p>Title: {{$val->title}}</p><br>
    <pre>Description: {{$val->description}}</pre><br>
    {{-- <p>Department: {{$val->department}}</p><br>
    <p>Address: {{$val->address}}</p><br> --}}
    @endforeach
 
</body>
</html>
@include('footer')