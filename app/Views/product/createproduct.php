<?php $session = \Config\Services::session(); ?>

<?= $this->extend('admin/dashboard') ?>
<?= $this->section('right'); ?>
<div class="container-fluid">  

    <?php if ($session->getTempdata('success')): ?>
        <div class="container px-5">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $session->getTempdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($session->getTempdata('error')): ?>
        <div class="container px-5">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $session->getTempdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>


    <div class="container">
        <div class="row">
            <h3> Add Products</h3>
            <form enctype="multipart/form-data" method="POST" action="<?= base_url("/product/create") ?>">
                <div class="form-group mb-2">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name"/>
                </div>
                <div class="form-group mb-2">
                    <label>Label</label>
                    <select name="label" class="form-control">
                        <option>Veg</option>
                        <option>Non-Veg</option>
                       
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label>Price</label>
                    <input class="form-control" type="text" name="price"/>
                </div>
                <div class="form-group mb-2">
                    <label>Profile </label>
                    <input class="form-control" type="file" name="image"/>
                </div>
                <div class="form-group mb-2">
                    <label>Description</label>
                    <textarea rows="3" class="form-control" name="description"></textarea>
                </div>
                <div class="form-group mb-2">
                    <label>Category</label>
                    <select name="category" class="form-control">
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['name'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit </button>
                </div>

            </form>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>
