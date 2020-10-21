<!-- partial -->
<div class="content-wrapper">
  <h3 class="page-heading mb-4"><?= lang('create_user_heading');?></h3>
  <div class="row">
    <div class="col-12">
    <p><?= lang('create_user_subheading');?></p>

    <?= form_open("auth/create_user");?>

          <p>
                <?= lang('create_user_fname_label', 'first_name');?> <br />
                <?= form_input($first_name);?>
                <?= form_error('first_name','<span class="font-weight-bold text-danger">','</span>')  ?>
          </p>

          <p>
                <?= lang('create_user_lname_label', 'last_name');?> <br />
                <?= form_input($last_name);?>
                <?= form_error('last_name','<span class="font-weight-bold text-danger">','</span>')  ?>
          </p>
          
          <?php
          if($identity_column!=='email') {
              echo '<p>';
              echo lang('create_user_identity_label', 'identity');
              echo '<br />';
              echo form_error('identity','<span class="font-weight-bold text-danger">','</span>');
              echo form_input($identity); 
              '</p>';
          }
          ?>

          <p>
                <?= lang('create_user_email_label', 'email');?> <br />
                <?= form_input($email);?>
                <?= form_error('email','<span class="font-weight-bold text-danger">','</span>')  ?>
          </p>

          <p>
                <?= lang('create_user_password_label', 'password');?> <br />
                <?= form_input($password);?>
                <?= form_error('password','<span class="font-weight-bold text-danger">','</span>')  ?>
          </p>

          <p>
                <?= lang('create_user_password_confirm_label', 'password_confirm');?> <br />
                <?= form_input($password_confirm);?>
          </p>


          <p><?= form_submit('submit', lang('create_user_submit_btn'),['class' => 'btn btn-primary']);?></p>

    <?= form_close();?>
    </div>
  </div>
</div>        



