@include('header')
<button onclick="history.back()">Go Back</button>
<h2> update Student Blog</h2>

{{-- {{}} --}}

<form action="/edit" method="POST">
    @csrf
    {{-- <p>Selected Category:{{$data['category']}}</p> --}}
    <span>Select Category </span><br>
    <select name="category" id="">
      @foreach($categories as $category)
      <option value= {{$category->cate_name}}>{{ $category->cate_name}}</option>
      @endforeach
    </select><br><br>
  
    <input type="hidden" name="id" value={{$data['id']}} >
    <input type="text" name="title" placeholder="Enter Title" value ="{{$data['title']}}"/>
  <br><br>
    {{-- <input type="text" name="data" placeholder="Enter Description"  value="{{$data['description']}}"/> --}}
    <textarea id="" cols="30" rows="10" name="data" placeholder="Enter Description">{{$data['description']}}</textarea>
    
    <br><br>
    
    <button type="submit">submit</button>
</form>
@include('footer')