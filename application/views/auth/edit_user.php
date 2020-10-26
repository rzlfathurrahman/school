<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= lang('edit_user_heading');?></h1>
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

  <?= form_open(uri_string());?>

    <div class="form-group">
          <?= lang('edit_user_fname_label', 'first_name');?> <br />
          <?= form_input($first_name);?>
          <?= form_error('first_name','<span class="font-weight-bold text-danger">','</span>')  ?>
    </div>

    <div class="form-group">
          <?= lang('edit_user_lname_label', 'last_name');?> <br />
          <?= form_input($last_name);?>
          <?= form_error('last_name','<span class="font-weight-bold text-danger">','</span>')  ?>
    </div>

    <div class="form-group">
          <?= lang('edit_user_password_label', 'password');?> <br />
          <?= form_input($password);?>
          <?= form_error('password','<span class="font-weight-bold text-danger">','</span>')  ?>
    </div>

    <div class="form-group">
          <?= lang('edit_user_password_confirm_label', 'password_confirm');?><br />
          <?= form_input($password_confirm);?>
    </div>

    <?php if ($this->ion_auth->is_admin()): ?>

        <h3><?= lang('edit_user_groups_heading');?></h3>
        <?php foreach ($groups as $group):?>
          <div class="form-check">
            <label class="checkbox">
            <input type="checkbox" name="groups[]" class="form-check-input" value="<?= $group['id'];?>" <?= (in_array($group, $currentGroups)) ? 'checked="checked"' : null; ?>>
            <?= htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
            </label>
          </div>
        <?php endforeach?>

    <?php endif ?>

    <?= form_hidden('id', $user->id);?>
    <?= form_hidden($csrf); ?>

    <div class="form-group"><?= form_submit('submit', lang('edit_user_submit_btn'),['class' => 'btn btn-primary']);?></div>

  <?= form_close();?>

  </section>
  <!-- /.content -->
