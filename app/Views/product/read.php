<?php $session = \Config\Services::session(); ?>
<?= $this->extend('admin/dashboard') ?>
<?= $this->section('right'); ?>
<div class="container-fluid">
    <?php if($session->getTempdata('success')): ?>
        <div class="container px-5 mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $session->getTempdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
        </div>
    <?php endif; ?>
    <div class="container">
        <div class="row">
                <h3>All Products</h3>
            
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Label</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $product): ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td>
                            <img src="<?= base_url('/uploads/products/'.$product['image']) ?>" height="150" width="150" />
                        </td>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['category'] ?></td>
                        <td><?= $product['label'] ?></td>
                        <td><?= $product['price'] ?></td>
                        <td><?= $product['description'] ?></td>
                        <td><a class=btn-primary" href="<?= '/product/update/'.$product['id'] ?>">Update</a></td>
                        <td><a class="btn btn-danger" href="<?= '/product/delete/'.$product['id'] ?>">Delete</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class='row' align="center">
                <?php
                    $pager->setPath('/product/read/');
                    echo $pager->links();
                ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
