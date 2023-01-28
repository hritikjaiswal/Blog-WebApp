@include('header')
<button onclick="history.back()">Go Back</button>
<h2> Student Panel Edit</h2>

<form action="/updateStu" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value={{$data['id']}} ><br>
    <input type="text" name="name" placeholder="Enter name" value ="{{$data['s_name']}}"/>
    <span style="color: red">@error('name'){{$message}}@enderror</span>
    <br><br>
    <input type="text" name="username" placeholder="Enter username" value ="{{$data['username']}}"/>
    <span style="color: red">@error('username'){{$message}}@enderror</span>
  <br><br>
  <small>Date Of Birth</small><br>
    <input type="date" name="datePicker" value ="{{$data['dob']}}"><br><br>
    {{-- <span style="color: red">@error('datePicker'){{$message}}@enderror</span><br><br> --}}
    <small>Department:</small><br> 
    <input class="form-check-input" type="radio" name="department" value="Commerce" checked/>
    <label class="" for="commerceDepartment">Commerce</label>
    <input class="form-check-input" type="radio" name="department" value="Science"/>
    <label class="" for="scienceDepartment">Science</label>
    <br><br>
  <small>Address:</small><br> 
    <textarea name="address" id="address" cols="15" rows="5" placeholder="Enter Address">{{$data['address']}}</textarea>
    <span style="color: red">@error('address'){{$message}}@enderror</span><br><br>
    
  <small>Upload Image:</small><br>
  <input type="file" name="imageUpload" id="" value="{{$data['image_path']}}"> 
  <br>
  <small>{{$data['image_path']}}</small>
  <span style="color: red">@error('imageUpload'){{$message}}@enderror</span>
  <br><br>
  {{-- <a href="/updateStudent/{{$data['id']}}/resetPassword">Reset Password</a><br><br> --}}
  <small>Confirm current password:</small><br> 
  <input type="password" name="confpassword" placeholder="Enter confirm password" />
  <span style="color: red">@error('password'){{$message}}@enderror</span><small style="color: red">{{ Session::get('fail')}}</small>
  <br><br>
  
  <small>Reset password:</small><br> 
  <input type="password" name="password" placeholder="Enter reset password"  />
  <span style="color: red">@error('password'){{$message}}@enderror</span><br>
  <small style="color: rgb(102, 102, 102)">first you need to confirm your password before<br> reseting password else it won't be change.</small><br> 
  <br><br>
    <button type="submit">submit</button>
</form>
@include('footer')