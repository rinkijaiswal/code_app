<?php $session = \Config\Services::session(); ?>
<?= $this->extend('layout/admin') ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="container d-flex justify-content-center mt-5">
        <div class="row">
            <h3> Product Update</h3>
            <form enctype="multipart/form-data" method="POST" action="<?= base_url("/product/update/" . $id) ?>">
                <div class="form-group mb-2">
                    <label>Name</label>
                    <input value="<?= set_value('name', $product['name']) ?>" class="form-control" type="text" name="name"/>
                </div>
                <div class="form-group mb-2">
                    <label>Category</label>
                    <input value="<?= set_value('category', $product['category']) ?>" class="form-control" type="text" name="category"/>
                </div>
                <div class="form-group mb-2">
                    <label>Label</label>
                    <input value="<?= set_value('label', $product['label']) ?>" class="form-control" type="text" name="label"/>
                </div>
                <div class="form-group mb-2">
                    <label>Price</label>
                    <input value="<?= set_value('price', $product['price']) ?>" class="form-control" type="text" name="price"/>
                </div>
                <div class="form-group mb-2 d-flex justify-content-around align-items-center">
                    <image src="<?= base_url('/uploads/products/' . $product['image']) ?>" height="100px" width="100px" />
                    <div>
                        <label>Image</label>
                        <input class="form-control" type="file" name="image"/>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label>Description</label>
                    <input value="<?= set_value('description', $product['description']) ?>" class="form-control" type="text" name="description"/>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
