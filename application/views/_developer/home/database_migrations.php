<div class="row">
	<div class="col-lg-12 col-md-12">
		<div class="alert alert-warning">
			<strong>Warning!</strong>
			Create a backup database when rolling back to previous database migrations.
		</div>
	</div>
	<form action="<?php echo site_url('developer/home/database_migrations');?>" class="form-warning" method="POST">
		<div class="col-lg-8">
			<?php if($path):?>
				<table id="db_mig" class="table table-striped">
					<tr>
						<td colspan="3"><h1>All Created Migrations</h1></td>
					</tr>
					<?php $num = 1; foreach ($path as $key => $value): ?>
					<tr>
						<td><?php echo $num?></td>
						<td><?php echo $value?></td>
						<td>
							<?php if($key == $current_migration_version):?>
								<input type="radio" name="versions" value="<?php echo $key;?>" checked>&nbsp;&nbsp;<i class="fa fa-check"></i>
							<?php else:?>
								<input type="radio" name="versions" value="<?php echo $key;?>">
							<?php endif;?>
						</td>
					</tr>
					<?php $num++; endforeach; ?>
				</table>
			<?php endif;?>
		</div>
		<div class="col-lg-4">
				<input type="hidden" name="process_migrations" value="true">
				<input type="submit" class="btn-lg" name="process_migrations_form" value="Set Selected Migration">
				<br>
				<br>
				<input type="submit" class="btn-lg" name="process_migrations_to_latest" value="Set Latest Migrations">
		</div>
	</form>
</div>