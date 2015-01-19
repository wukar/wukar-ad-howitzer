<div class="row">
	<div class="col-lg-9">
		<table class="table table-striped table-hover table-bordered">
			<thead>
            <tr>
              <th>#</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Edit</th>
              <th>Action</th>
              <th>Delete</th>
            </tr>
          </thead>

          <tbody>
          	<?php if($users):?>
          		<?php foreach ($users as $key => $user): ?> 		
	          	<tr>
	          		<td></td>
	          		<td><?php echo $user->firstname;?></td>
	          		<td><?php echo $user->lastname;?></td>
	          		<td><?php echo $user->username;?></td>
	          		<td><?php echo $user->email;?></td>
	          		<td></td>
	          		<td></td>
	          		<td></td>
	          	</tr>
	          	<?php endforeach ?>
          	<?php else:?>
          		<tr>
	          		<td colspan="8"></td>
	          	</tr>
          	<?php endif;?>
          </tbody>
		</table>

	</div>
	<div class="col-lg-3">
		<form action="<?php site_url('developer/home/userdatabase');?>" method="POST">
			<div class="form-group">
				<label for="exampleInputEmail1">Firstname <?php echo form_error('profile[fname]', '<span class="form_error">', '</span>');?></label>
				<input value="<?=set_value('profile[fname]', '');?>" name="profile[fname]" type="text" class="form-control" id="exampleInputEmail1" placeholder="firstname">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">lastname <?php echo form_error('profile[lname]', '<span class="form_error">', '</span>');?></label>
				<input value="<?=set_value('profile[lname]', '');?>" name="profile[lname]" type="text" class="form-control" id="exampleInputEmail1" placeholder="lastname">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Username <?php echo form_error('user[uname]', '<span class="form_error">', '</span>');?></label>
				<input value="<?=set_value('user[uname]', 'sdsd');?>" name="user[uname]" type="text" class="form-control" id="exampleInputEmail1" placeholder="username">
				<?php echo form_error('user[uname]', '<span class="form_error">', '</span>');?>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Password <?php echo form_error('user[pass]', '<span class="form_error">', '</span>');?></label>
				<input name="user[pass]" type="password" class="form-control" id="exampleInputEmail1" placeholder="Password">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Confirm Password <?php echo form_error('user[cpass]', '<span class="form_error">', '</span>');?></label>
				<input name="user[cpass]" type="password" class="form-control" id="exampleInputEmail1" placeholder="Confirm Password">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Email <?php echo form_error('user[email]', '<span class="form_error">', '</span>');?></label>
				<input value="<?=set_value('user[email]', '');?>" name="user[email]" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Role <?php echo form_error('user[role]', '<span class="form_error">', '</span>');?></label>
				<?php
				$options = array(
			        'admin'         => 'Administrator',
			        'user'           => 'User',
				);

				echo form_dropdown('user[role]', $options, set_value('user[role]','user') ,'class="form-control"');
				?>
			</div>
			<div class="form-group">
				<!-- <label for="exampleInputEmail1"></label> -->
				<input name="add_new_user" type="submit" class="btn btn-large btn-primary btn-block" value="Add New User">
			</div>
		</form>
	</div>
</div>