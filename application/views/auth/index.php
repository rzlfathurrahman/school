<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= lang('index_heading');?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <?php foreach ($url as $u): ?>
              <?php if (count($url) == 1): ?>
                <li class="breadcrumb-item text-capitalize <?= ($u == $halaman) ? "" : ""  ?>"><a href="#"><?= $u  ?></a></li>
              <?php else: ?>
                <li class="breadcrumb-item text-capitalize <?= ($u == $halaman) ? "active" : ""  ?>"><a href="#"><?= $u  ?></a></li>
              <?php endif; ?>
            <?php endforeach ?>
          </ol>
        </div>
      </div>
      <?= $this->session->flashdata('message');  ?>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Daftar Pengguna</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        <table id="example2" class="table table-bordered table-striped">
          <thead class="bg-success text-light">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th><?= lang('index_email_th');?></th>
                <th><?= lang('index_groups_th');?></th>
                <th><?= lang('index_status_th');?></th>
                <th><?= lang('index_action_th');?></th>
            </tr>
          </thead>
          <tbody>
          <?php $no = 1; foreach ($users as $user):?>
            <tr>
               <td><?= $no++  ?></td>    
               <td><?= htmlspecialchars($user->first_name." ".$user->last_name,ENT_QUOTES,'UTF-8');?></td>
               <td><?= htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
              <td>
                <?php foreach ($user->groups as $group):?>
                  <?= anchor("auth/edit_group/".$group->id, '<span class="badge badge-pill badge-secondary">'.htmlspecialchars($group->name,ENT_QUOTES,'UTF-8').'</span>') ;?>
                  <?php endforeach?>
              </td>
              <td><?= ($user->active) ? anchor("auth/deactivate/".$user->id,'<span class="badge badge-pill badge-success">'.lang('index_active_link').'</span>') : anchor("auth/activate/". $user->id,'<span class="badge badge-pill badge-danger">'.lang('index_inactive_link').'</span>');?></td>
              <td><?= anchor("auth/edit_user/".$user->id, '<span class="badge badge-pill badge-info">Edit</span>') ;?></td>
            </tr>
          <?php endforeach;?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <!-- card-footer -->
      <div class="card-footer">
        <p><?= anchor('auth/create_user', lang('index_create_user_link'))?> | <?= anchor('auth/create_group', lang('index_create_group_link'))?></p>
      </div>
      <!-- /card-footer -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
   	