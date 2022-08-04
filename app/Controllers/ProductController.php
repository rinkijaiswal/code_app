<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class ProductController extends \CodeIgniter\Controller {

    public $model;
    public $session;

    public function __construct() {
        helper('form');
        $this->model = new ProductModel();
        $this->session = \Config\Services::session();
    }

    public function product() {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $file = $this->request->getFile('image');
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                if ($file->move(FCPATH . '/uploads/products', $newName)) {
                    $data = ([
                        'name' => $this->request->getPost('name'),
                        'category' => $this->request->getPost('category'),
                        'label' => $this->request->getPost('label'),
                        'price' => $this->request->getPost('price'),
                        'image' => $newName,
                        'description' => $this->request->getPost('description'),
                    ]);
                    $this->model->createproduct($data);
                    $this->session->setTempdata('success', " created succesfully", 2);
                    return redirect()->to('/product/read');
                } else {
                    echo $file->getErrorString() . "" . $file->getError();
                }
            }
        }
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->getAllCategories();
        return view('product/createproduct', $data);
    }

    public function read() {
        $data = [
            'products' => $this->model->read(),
            'pager' => $this->model->pager,
        ];
        return view('product/read', $data);
    }

    public function update($id) {
        $data = [];
        $data['product'] = $this->model->getDataById($id);
        if ($this->request->getMethod() == 'post') {
            $file = $this->request->getFile('image');
            if ($file == '') {
                $newName = $data['product']['image'];
            } else {
                $newName = $file->getRandomName();
                $file->move(FCPATH . '/uploads/products', $newName);
            }
            $data = ([
                'name' => $this->request->getPost('name'),
                'category' => $this->request->getPost('category'),
                'label' => $this->request->getPost('label'),
                'price' => $this->request->getPost('price'),
                'image' => $newName,
                'description' => $this->request->getPost('description'),
            ]);
            $this->model->updateData($id, $data);
            $this->session->setTempdata('success', " updated succesfully", 2);
            return redirect()->to('/product/read');
        }

        $data['id'] = $id;
        return view('product/update', $data);
    }

    public function delete($id) {
        $this->model->deleteData($id);
        return redirect()->to('/product/read');
    }

}
