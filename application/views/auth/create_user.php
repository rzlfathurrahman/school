<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= lang('create_user_heading');?></h1>
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

    <?= form_open("auth/create_user");?>

          <div class="form-group"> 
                <?= lang('create_user_fname_label', 'first_name');?> <br />
                <?= form_input($first_name);?>
                <?= form_error('first_name','<span class="font-weight-bold text-danger small ml-2 mt-2">','</span>')  ?>
          </div>

          <div class="form-group"> 
                <?= lang('create_user_lname_label', 'last_name');?> <br />
                <?= form_input($last_name);?>
                <?= form_error('last_name','<span class="font-weight-bold text-danger small ml-2 mt-2">','</span>')  ?>
          </div>
          
          <?php
          if($identity_column!=='email') {
              echo '<p>';
              echo lang('create_user_identity_label', 'identity');
              echo '<br />';
              echo form_error('identity','<span class="font-weight-bold text-danger small ml-2 mt-2">','</span>');
              echo form_input($identity); 
              '</p>';
          }
          ?>

          <div class="form-group"> 
                <?= lang('create_user_email_label', 'email');?> <br />
                <?= form_input($email);?>
                <?= form_error('email','<span class="font-weight-bold text-danger danger small ml-2 mt-2">','</span>')  ?>
          </div>

          <div class="form-group"> 
                <?= lang('create_user_password_label', 'password');?> <br />
                <?= form_input($password);?>
                <?= form_error('password','<span class="font-weight-bold text-danger danger small ml-2 mt-2">','</span>')  ?>
          </div>

          <div class="form-group"> 
                <?= lang('create_user_password_confirm_label', 'password_confirm');?> <br />
                <?= form_input($password_confirm);?>
          </div>


          <p><?= form_submit('submit', lang('create_user_submit_btn'),['class' => 'btn btn-primary']);?></p>

    <?= form_close();?>

  </section>
  <!-- /.content -->
  