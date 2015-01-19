<div class="wukar-signin-form-title">
    <h1 style="text-align:center">DEVELOPER LOGIN</h1>             
</div>
<form class="form-horizontal wukar-signin-form" role="form" action="<?php echo site_url('developer/home/login');?>" method="POST">
  <div class="form-group">
    <div class="col-md-12">
      <label for="username" class="col-sm-2 control-label">Username</label>
      <div class="col-sm-10">
        <input name="username" type="text" class="form-control" id="username" placeholder="Username">
      </div>
    </div>              
  </div>
  <div class="form-group">
    <div class="col-md-12">
      <label for="password" class="col-sm-2 control-label">Password</label>
      <div class="col-sm-10">
        <input name="password" type="password" class="form-control" id="password" placeholder="Password">
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-12">
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label>
            <input name="rememberme" type="checkbox" value="true"> Remember me
          </label>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-12">
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" value="Sign in" class="btn btn-default">
      </div>
    </div>
  </div>
</form>