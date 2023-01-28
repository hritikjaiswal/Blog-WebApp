
<form  method="POST">

<small>Confirm current password:</small><br> 
  <input type="password" name="confpassword" placeholder="Enter confirm password" />
  <span style="color: red">@error('password'){{$message}}@enderror</span>
  <br><br>
  <small style="color: red">{{ Session::get('fail')}}</small>
  <small>Reset password:</small><br> 
  <input type="password" name="password" placeholder="Enter reset password"  />
  <span style="color: red">@error('password'){{$message}}@enderror</span>
  <br><br>
  <input type="submit" value="submit">

</form>
