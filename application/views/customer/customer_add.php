<section class="content-header">

    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"> <i class="mdi mdi-home text-muted hover-cursor"></i> </a></li>
        <li><a href="<?= base_url('customers'); ?>"> <i></i><span class="text-muted mb-0 hover-cursor"><b>/ customers</b> </span></a></li>
        <li><a href=""> <i></i><span class="text-muted mb-0 hover-cursor"><b>/ add</b> </span></a></li>
    </ol>
</section>
<div class="col-lg-6  mx-auto stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?= ucfirst($page) ?> Customer</h4>
            <?php ?>
            <form class="forms-sample" action="<?= base_url('customers/process'); ?>" method="post">
                <div class="form-group">
                    <label>Customer Name</label>
                    <input type="hidden" name="id" value="<?= $row->customer_id ?>">
                    <input type="text" class="form-control" value="<?= $row->name ?>" name="customer_name" placeholder="customer name" required>
                    <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="L" <?= $row->gender == 'L' ? 'selected' : "" ?>>Laki-laki</option>
                        <option value="P" <?= $row->gender == 'P' ? 'selected' : "" ?>>Perempuan</option>
                    </select>
                    <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="number" class="form-control" value="<?= $row->phone ?>" name="phone" placeholder="Phone" required>
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" class="form-control" placeholder="Your address" required><?= $row->address ?> </textarea>
                    <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <button type="submit" name="<?= $page ?>" class="btn btn-primary mr-2"><i class="mdi mdi-content-save menu-icon"></i> <span class="menu-title">Save</span> </button>
                <a href="<?= base_url('customers');  ?>" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
</div>