<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">

                <div class="d-flex">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Users&nbsp;&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Data Users</p>
                <?= $this->session->flashdata('message'); ?>
                <div class="float-sm-right">
                    <a href="<?= base_url('user/add'); ?>" class="btn btn-primary btn-sm">
                        <i class="mdi mdi-account-plus "></i> <span class="menu-title">Create</span>
                    </a>
                </div>
                <div class="table-responsive">
                    <table id="recent-purchases-listing" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Level</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($row->result() as $key => $data) { ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $data->username ?></td>
                                    <td><?= $data->name ?></td>
                                    <td><?= $data->address ?></td>
                                    <td><?= $data->level == 1 ? "Admin" : "Kasir" ?></td>
                                    <td class="text-center" width="160px">
                                        <form action="<?= base_url('user/del'); ?>" method="post">
                                            <a href="<?= base_url('user/edit/' . $data->user_id); ?>" class="badge badge-primary">
                                                <i class="mdi mdi-pencil"></i><span class="menu-title">Edit</span>
                                            </a>
                                            <input type="hidden" name="user_id" value="<?= $data->user_id ?>">
                                            <button onclick="return confirm('apakah anda yakin?')" class="badge badge-danger">
                                                <i class="mdi mdi-bitbucket"></i> <span class="menu-title">Delete</span>
                                            </button></form>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>