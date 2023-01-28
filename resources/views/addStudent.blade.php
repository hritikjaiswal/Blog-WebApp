
@include('header')
@include('sidebar')
<style>
    .center{
        margin: auto;
        width: 40%;
        /* border: 3px solid green; */
        padding: 10px;
    }
</style>
{{-- <a href="studentpanel">Back</a> --}}
<div class="center">
<h2 class="" > Add Student Credential</h2>

<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <small>Name:</small><br>
    <input type="text" name="name" id="firstName" placeholder="Enter name" onchange="enableInput()"/>
    <span style="color: red">@error('name'){{$message}}@enderror</span>
    <br><br>

    <small>Email:</small><br>
    <input type="text" name="username" id="username" placeholder="Enter Username"  onchange="enableInput()"/>
    <span style="color: red">@error('username'){{$message}}@enderror</span>
    <br><br>

    <small>Date Of Birth</small><br>
    <input type="date" name="datePicker" id = "dob"  onchange="enableInput()">
    <span style="color: red">@error('datePicker'){{$message}}@enderror</span><br><br>

    <small>Department:</small><br> 
    <input class="form-check-input" type="radio" name="department" value="Commerce" checked/>
    <label class="" for="commerceDepartment">Commerce</label>
    <input class="form-check-input" type="radio" name="department" value="Science"/>
    <label class="" for="scienceDepartment">Science</label>
    <br><br>
    <small>Address:</small><br> 
    <textarea name="address" id="address" cols="15" rows="5" placeholder="Enter Address"  onchange="enableInput()"></textarea>
    <span style="color: red">@error('address'){{$message}}@enderror</span><br><br>
    
    <small>Upload Image:</small><br>
    <input type="file" name="imageUpload" id="imageUpload"  onchange="enableInput()"><br>
    <small style="color:#7a7a7a;"> Image Format Must Be JPG, JPEG or PNG | Maximum File Size Limit is 2MB.</small>
    <p id="error1" style="display:none; color:#FF0000;">
        Invalid Image Format! Image Format Must Be JPG, JPEG, PNG.
    </p>
    <p id="error2" style="display:none; color:#FF0000;">
        Maximum File Size Limit is 2MB.
    </p>
    
    <span style="color: red">@error('imageUpload'){{$message}}@enderror</span><br><br>
    <small>password:</small><br>
    <input type="password" name="password" id="password" placeholder="Enter password"  onchange="enableInput()"><br>
    <span style="color: red">@error('password'){{$message}}@enderror</span>
    <br><br>

    {{-- <button type="submit" id="addSubmit" name="submit">Add Student</button> --}}
<div>
   
    <input type="submit" id="addSubmit" name="submit" value="Add Student" disabled> 
    <button type="reset">Clear</button>
    {{-- <div class="control-group" style="padding-top: 100px;margin-top: 10px;" onmouseover="enableInput()"> --}}
    {{-- </div><br> --}}
</div>
    
    

</form>

</div>
<script src="{{url('js/jquery-3.6.1.min.js')}}"></script>
<script src="{{url('js/index.js')}}"></script>
@include('footer')