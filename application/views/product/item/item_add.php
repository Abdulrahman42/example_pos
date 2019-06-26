<!-- <div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">

                <div class="d-flex">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Items&nbsp;/&nbsp;Add&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
</div> -->
<section class="content-header">

    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"> <i class="mdi mdi-home text-muted hover-cursor"></i> </a></li>
        <li><a href="<?= base_url('items'); ?>"> <i></i><span class="text-muted mb-0 hover-cursor"><b>/ items</b> </span></a></li>
        <li><a href=""> <i></i><span class="text-muted mb-0 hover-cursor"><b>/ add</b> </span></a></li>
    </ol>
</section>
<div class="col-lg-6  mx-auto stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?= ucfirst($page) ?> Items</h4>
            <?php echo form_open_multipart('items/process'); ?>
            <?= $this->session->flashdata('message'); ?>
            <div class="form-group">
                <label>Barcode</label>
                <input type="hidden" name="id" value="<?= $row->item_id ?>">
                <input type="text" class="form-control" value="<?= $row->barcode ?>" name="barcode" placeholder="barcode" required>

            </div>
            <div class="form-group">
                <label for="name">Item Name</label>
                <input type="text" class="form-control" id="name" value="<?= $row->name ?>" name="name" placeholder="name" required>

            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category" class="form-control" required>
                    <option value="">- Pilih -</option>
                    <?php foreach ($category->result() as $key => $data) { ?>
                        <option value="<?= $data->category_id ?>" <?= $data->category_id == $row->category_id ? "selected" : null ?>><?= $data->name ?></option>
                    <?php } ?>
                </select>

            </div>
            <div class="form-group">
                <label>Unit</label>
                <?php echo form_dropdown('unit', $unit, $selectedunit, ['class' => 'form-control', 'require' => 'require']); ?>

            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control" value="<?= $row->price ?>" name="price" placeholder="price" required>
            </div>
            <div class="form-group">
                <label>Image</label>
                <?php if ($page == 'edit') {
                    if ($row->image != null) { ?>
                        <div style="margin-bottom:5px">
                            <img style="width:80%" src="<?= base_url('uploads/product/' . $row->image); ?>">
                        </div>
                    <?php
                }
            } ?>
                <input type="file" class="form-control" name="image">
            </div>
            <button type="submit" name="<?= $page ?>" class="btn btn-primary mr-2"><i class="mdi mdi-content-save menu-icon"></i> <span class="menu-title">Save</span> </button>
            <a href="<?= base_url('items');  ?>" class="btn btn-light">Cancel</a>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>