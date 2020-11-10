<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= lang('deactivate_heading');?></h1>
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
	<p><?= sprintf(lang('deactivate_subheading'), $user->{$identity}); ?></p>

	<?= form_open("auth/deactivate/".$user->id);?>

	  <div class="form-group">  	
	  	<?= lang('deactivate_confirm_y_label', 'confirm');?>
	    <input type="radio" name="confirm" value="yes" checked="checked" />
	    <?= lang('deactivate_confirm_n_label', 'confirm');?>
	    <input type="radio" name="confirm" value="no" />
	  </div>

	  <?= form_hidden($csrf); ?>
	  <?= form_hidden(['id' => $user->id]); ?>

	  <p><?= form_submit('submit', lang('deactivate_submit_btn'),['class' => 'btn btn-primary']);?></p>

	<?= form_close();?>
  </section>
  <!-- /Main COntent -->