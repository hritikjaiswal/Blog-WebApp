
<style>
  div.container{
  text-align: center;
  width: 100%;
}
table{
  margin: auto; 
  padding: 2px;   
}
td{
  padding: 8px;
}
</style>
@include('header')
@include('sidebar')

<div class="container">
{{-- <a href="/studentblog">Back</a> --}}

<h1>this is create blog page</h1>
<form action="" method="POST">
    @csrf

    <span>Select Category </span><br>
    <select name="category" id="">
      @foreach($categories as $category)
      <option value={{$category->cate_name}}>{{$category->cate_name}}</option>
      @endforeach
    </select><br><br>
  
    <input type="text" name="title" placeholder="Enter Title" />
    <span style="color: red">@error('title'){{$message}}@enderror</span>

  <br><br>
    {{-- <input type="text" name="data" placeholder="Enter Description" /> --}}

    <textarea name="data" id="" cols="30" rows="10" placeholder="Enter Description"></textarea>
    <span style="color: red">@error('data'){{$message}}@enderror</span>

    <br><br>
    
    <button type="submit">Create blog</button>     
    <button type="reset">Clear</button>

</form>
</div>
@include('footer')

