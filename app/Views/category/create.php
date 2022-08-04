
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
            <h3 align="center"> Add Category </h3>
            <form enctype="multipart/form-data" method="POST"action="<?= base_url("/category/create") ?>">
                <div class="form-group mb-2">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name"/>
                </div>
                <din class="form-group">
                    <button type="submit" class="btn btn-primary">Submit </button>
                </din>
            </form>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>

