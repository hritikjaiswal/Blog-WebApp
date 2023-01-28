<style>
    .card {
        
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        /* margin: auto; */
        text-align: center;
        margin: auto;
    
        }

        .title {
        color: grey;
        font-size: 18px;
        }

        button {
        border: none;
        /* outline: 0; */
        /* display: inline-block; */
        padding: 8px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 50%;
        font-size: 18px;
        }

        a {
        text-decoration: none;
        font-size: 22px;
        color: black;
        }

        button:hover, a:hover {
        opacity: 0.7;
        }
        h1{
            margin-top: 35px;
            text-align: center;
        }
</style>
@include('header')
@include('sidebar')
<body>
    {{ Session::get('fail')}}
    <h1> Homepage </h1>

    @foreach ($members as $val)
    <div class="card">
      <h1>{{$val['category']}}</h1>
      <p class="title">{{$val['title']}}</p>
      <p>{{$val['description']}}</p>

      <a href="view_student_home_blog/{{$val['id']}}"><button>Read</button></a>
    </div> 
    @endforeach

@include('footer')

