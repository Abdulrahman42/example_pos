<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">

                <div class="d-flex">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Suppliers&nbsp;/&nbsp;Add&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6  mx-auto stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?= ucfirst($page) ?> Supplier</h4>
            <?php ?>
            <form class="forms-sample" action="<?= base_url('suppliers/process'); ?>" method="post">
                <div class="form-group">
                    <label>Supplier Name</label>
                    <input type="hidden" name="id" value="<?= $row->supplier_id ?>">
                    <input type="text" class="form-control" value="<?= $row->name ?>" name="supplier_name" placeholder="Supplier name" required>
                    <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>'); ?>
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
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" placeholder="Your address" required><?= $row->description ?> </textarea>
                    <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <button type="submit" name="<?= $page ?>" class="btn btn-primary mr-2"><i class="mdi mdi-content-save menu-icon"></i> <span class="menu-title">Save</span> </button>
                <a href="<?= base_url('suppliers');  ?>" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
</div>