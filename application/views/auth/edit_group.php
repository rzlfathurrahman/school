<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= lang('edit_group_heading');?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <?php foreach ($url as $u): ?>
              <?php if (count($url) == 1): ?>
                <li class="breadcrumb-item text-capitalize <?= ($u == $halaman) ? "" : ""  ?>"><a href="#" style="cursor: not-allowed;"><?= $u  ?></a></li>
              <?php else: ?>
                <li class="breadcrumb-item text-capitalize <?= ($u == $halaman) ? "active" : ""  ?>"><a href="#" style="cursor: not-allowed;"><?= $u  ?></a></li>
              <?php endif; ?>
            <?php endforeach ?>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
	<div id="infoMessage"><?= $message;?></div>
  	<?= form_open(current_url());?>

  	      <div class="form-group">
  	      	
  	            <?= lang('edit_group_name_label', 'group_name');?> <br />
  	            <?= form_input($group_name);?>
  	      </div>

  	      <div class="form-group">
  	      	
  	            <?= lang('edit_group_desc_label', 'description');?> <br />
  	            <?= form_input($group_description);?>
  	      </div>

  	      <p><?= form_submit('submit', lang('edit_group_submit_btn'),['class' => 'btn btn-primary']);?></p>

  	<?= form_close();?>
  </section>
  <!-- /Main COntent -->