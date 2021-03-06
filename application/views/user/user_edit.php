<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">

                <div class="d-flex">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Users&nbsp;/&nbsp;Edit&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6  mx-auto stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit User</h4>
            <?php ?>
            <form class="forms-sample" action="" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="hidden" name="user_id" value="<?= $row->user_id ?>">
                    <input type="text" class="form-control" value="<?= $this->input->post('fullname') ?? $row->name ?>" name="fullname" placeholder="Name">
                    <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" value="<?= $this->input->post('username') ?? $row->username ?>" name="username" placeholder="Username">
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Password</label> <small>(Please empty, if not used)</small>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-6">
                        <label>Confirm Password</label>
                        <input type="password" name="password1" class="form-control" placeholder="Repeat Password"> -->
                <!-- <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?> -->
                <!-- </div>
                </div> -->
                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" class="form-control" placeholder="Your address"><?= $this->input->post('address') ?? $row->address ?> </textarea>
                    <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group ">
                    <label>Level</label>
                    <select name="level" class="form-control">
                        <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                        <option value="1">Admin</option>
                        <option value="2" <?= $level == 2 ? 'selected' : null ?>>Kasir</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mr-2"><i class="mdi mdi-content-save menu-icon"></i> <span class="menu-title">Save</span> </button>
                <a href="<?= base_url('user');  ?>" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
</div>