<?php
namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController  extends \CodeIgniter\Controller{
    public $model;
    public $session;
    
    public function __construct() {
        helper('form');
        
        $this->model= new CategoryModel;
        $this->session = \Config\Services::session();
    }
    
    public function create(){
        $data = [];
        if($this->request->getMethod() == 'post'){
            $data = [
                'name' => $this->request->getVar('name')
            ];
            $result = $this->model->create($data);
            if($result){
                return redirect()->to('/category/create')->with('message','Category created successfully');
            }else{
                return redirect()->to('/category/create')->with('message','error occurred');
            }
        }
        return view('category/create',$data);
        
    }
    public function read(){
     
        $data = [
                'categories' => $this->model->read(),
                'pager' => $this->model->pager,
            ];
        return view('category/read',$data);
    }
    
    public function delete($id){
        $this->model->deleteData($id);
        return redirect()->to('/category/read');
    }
    
   
    
}
