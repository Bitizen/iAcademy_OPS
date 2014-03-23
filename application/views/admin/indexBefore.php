
<h1><?php echo lang('index_heading');?></h1>

<div id="infoMessage"><?php echo $message;?></div>

<table class="table" cellpadding=0 cellspacing=10 border="1">
	<tr>
		<th class="table-bordered th"><?php echo 'Username';?></th>
		<th><?php echo lang('index_fname_th');?></th>
		<th><?php echo lang('index_lname_th');?></th>
		<th><?php echo lang('index_email_th');?></th>
		<th><?php echo lang('index_groups_th');?></th>
		<th><?php echo lang('index_status_th');?></th>
		<th><?php echo lang('index_action_th');?></th>

		<th><?php echo lang('index_reset_pw_link');?><th>
	</tr>
	<?php foreach ($users as $user):?>
		<tr>
			<td><?php echo anchor("admincontroller/view_user/".$user->id, $user->username) ;?></td>			
			<td><?php echo $user->first_name;?></td>
			<td><?php echo $user->last_name;?></td>
			<td><?php echo $user->email;?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("auth/edit_group/".$group->id, $group->name) ;?><br />
                <?php endforeach?>
			</td>
			<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
			<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
			<td>

	<!--- Reset --->

      <?php if ($this->ion_auth->in_group('admin')): ?>
		  <?php echo anchor("auth/reset_password/".$user->forgotten_password_code, lang('index_reset_pw_link')) ;?><br />


      <?php endif ?>

	<!--- Reset --->

			</td>
		</tr>
	<?php endforeach;?>
</table>

<p><?php echo anchor('auth/create_user', lang('index_create_user_link'))?> | <?php echo anchor('auth/create_group', lang('index_create_group_link'))?></p>