<?php

namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ProductModel;

class Home extends BaseController
{
    public function index(){
        
        $model = new ProductModel();
        $model2 = new CategoryModel();
        $data['categories'] = $model2->getAllCategories();
        $data['products'] = $model->read();
        $data['pager'] = $model->pager;
        return view('index',$data);
        
    }
    public function category(){
        $model = new CategoryModel();
        $data['categories'] = $model->getAllCategories();
        return view('category',$data);
    }
}
