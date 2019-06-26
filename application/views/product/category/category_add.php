<section class="content-header">

    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"> <i class="mdi mdi-home text-muted hover-cursor"></i> </a></li>
        <li><a href="<?= base_url('categorys'); ?>"> <i></i><span class="text-muted mb-0 hover-cursor"><b>/ categories</b> </span></a></li>
        <li><a href=""> <i></i><span class="text-muted mb-0 hover-cursor"><b>/ add</b> </span></a></li>
    </ol>
</section>
<div class="col-lg-6  mx-auto stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?= ucfirst($page) ?> category</h4>
            <?php ?>
            <form class="forms-sample" action="<?= base_url('categorys/process'); ?>" method="post">
                <div class="form-group">
                    <label>Categories Name</label>
                    <input type="hidden" name="id" value="<?= $row->category_id ?>">
                    <input type="text" class="form-control" value="<?= $row->name ?>" name="category_name" placeholder="category name" required>
                    <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <button type="submit" name="<?= $page ?>" class="btn btn-primary mr-2"><i class="mdi mdi-content-save menu-icon"></i> <span class="menu-title">Save</span> </button>
                <a href="<?= base_url('categorys');  ?>" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
</div>