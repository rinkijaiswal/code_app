
<?php $session = \Config\Services::session(); ?>
<?= $this->extend('admin/dashboard') ?>
<?= $this->section('right'); ?>
<div class="container-fluid">
   <?php if($session->has('message')): ?>
        <div class="container px-5">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $session->get('message') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
        </div>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <h3 align="center">View Category</h3>
            
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $category): ?>
                    <tr>
                        <td><?= $category['id'] ?></td>
                        <td><?= $category['name'] ?></td>
                        <td><a class="btn btn-danger" href="<?= '/category/delete/'.$category['id'] ?>">Delete</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class='row'>
                <?php
                    $pager->setPath('/category/read/');
                    echo $pager->links();
                ?>
            </div>
    </div>
</div>
<?= $this->endSection(); ?>