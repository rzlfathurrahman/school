<!-- partial -->
<div class="content-wrapper">
  <h3 class="page-heading mb-4"><?= lang('edit_user_heading');?></h3>
  <div class="row">
    <div class="col-12">
      <p><?= lang('edit_user_subheading');?></p>

      <?= form_open(uri_string());?>

            <p>
                  <?= lang('edit_user_fname_label', 'first_name');?> <br />
                  <?= form_input($first_name);?>
                  <?= form_error('first_name','<span class="font-weight-bold text-danger">','</span>')  ?>
            </p>

            <p>
                  <?= lang('edit_user_lname_label', 'last_name');?> <br />
                  <?= form_input($last_name);?>
                  <?= form_error('last_name','<span class="font-weight-bold text-danger">','</span>')  ?>
            </p>

            <p>
                  <?= lang('edit_user_password_label', 'password');?> <br />
                  <?= form_input($password);?>
                  <?= form_error('password','<span class="font-weight-bold text-danger">','</span>')  ?>
            </p>

            <p>
                  <?= lang('edit_user_password_confirm_label', 'password_confirm');?><br />
                  <?= form_input($password_confirm);?>
            </p>

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

            <p><?= form_submit('submit', lang('edit_user_submit_btn'),['class' => 'btn btn-primary']);?></p>

      <?= form_close();?>
    </div>
  </div>
</div>

