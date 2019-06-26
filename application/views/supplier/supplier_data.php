<section class="content-header">

    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"> <i class="mdi mdi-home text-muted hover-cursor"></i> </a></li>
        <li><a href="<?= base_url('suppliers'); ?>"> <i></i><span class="text-muted mb-0 hover-cursor"><b>/ suppliers</b> </span></a></li>
    </ol>
</section>
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Data Suppliers</p>
                <?= $this->session->flashdata('message'); ?>
                <div class="float-sm-right">
                    <a href="<?= base_url('suppliers/add'); ?>" class="btn btn-primary btn-sm">
                        <i class="mdi mdi mdi-cart-plus"></i> <span class="menu-title">Create</span>
                    </a>
                </div>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered" id="datatab">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($row->result() as $key => $data) { ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $data->name ?></td>
                                    <td><?= $data->phone ?></td>
                                    <td><?= $data->address ?></td>
                                    <td><?= $data->description ?></td>
                                    <td class="text-center" width="260px">
                                        <a href="<?= base_url('suppliers/edit/' . $data->supplier_id); ?>" class="badge badge-primary">
                                            <i class="mdi mdi-pencil"></i><span class="menu-title">Update</span>
                                        </a>

                                        <a href="<?= base_url('suppliers/del/' . $data->supplier_id); ?>" onclick="return confirm('apakah anda yakin?')" class="badge badge-danger tombol-hapus">
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