<section class="content-header">

    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"> <i class="mdi mdi-home text-muted hover-cursor"></i> </a></li>
        <li><a href=""> <i></i><span class="text-muted mb-0 hover-cursor"><b>/ items</b> </span></a></li>
    </ol>
</section>
</section class="content">
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Data items</p>
                <?= $this->session->flashdata('message'); ?>
                <div class="float-sm-right">
                    <a href="<?= base_url('items/add'); ?>" class="btn btn-primary btn-sm">
                        <i class="mdi mdi-plus "></i> <span class="menu-title">Add Items</span>
                    </a>
                </div>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered" id="datatab">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Barcode</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Unit</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($row->result() as $key => $data) { ?>
                                <tr>
                                    <td width="60px"><?= $i; ?></td>
                                    <td width="100px"><?= $data->barcode ?></td>
                                    <td><?= $data->name ?></td>
                                    <td><?= $data->category_name ?></td>
                                    <td><?= $data->unit_name ?></td>
                                    <td><?= $data->price ?></td>
                                    <td><?= $data->stock ?></td>
                                    <td>
                                        <?php if ($data->image != null) { ?>

                                            <img src="<?= base_url('uploads/product/' . $data->image); ?>">

                                        <?php } ?>
                                    </td>
                                    <td class="text-center" width="160px">
                                        <a href="<?= base_url('items/edit/' . $data->item_id); ?>" class="badge badge-primary">
                                            <i class="mdi mdi-pencil"></i><span class="menu-title">Update</span>
                                        </a>

                                        <a href="<?= base_url('items/del/' . $data->item_id); ?>" onclick="return confirm('apakah anda yakin?')" class="badge badge-danger tombol-hapus">
                                            <i class="mdi mdi-bitbucket"></i> <span class="menu-title">Delete</span>
                                        </a>
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
<section>