<!-- partial -->
<div class="content-wrapper">
  <h3 class="page-heading mb-4"><?= lang('create_group_heading');?></h3>
  <div class="row">
  	<div class="col-12">
		<p><?= lang('create_group_subheading');?></p>

		<div id="infoMessage"><?= $message;?></div>

		<?= form_open("auth/create_group");?>

		      <p>
		            <?= lang('create_group_name_label', 'group_name');?> <br />
		            <?= form_input($group_name);?>
		      </p>

		      <p>
		            <?= lang('create_group_desc_label', 'description');?> <br />
		            <?= form_input($description);?>
		      </p>

		      <p><?= form_submit('submit', lang('create_group_submit_btn'), ['class' => 'btn btn-primary'] );?></p>

		<?= form_close();?>
  	</div>
  </div>
</div>      	
