<?php

namespace App\Models;

class CategoryModel extends \CodeIgniter\Model {
    protected $table = 'category';
    protected $allowedFields = ['name'];
    
    public function create($data){
        return $this->save($data);
    }
    public function read(){
        return$this->paginate(4);
        
    }
    public function getAllCategories(){
        return $this->findAll();
    }

        public function deleteData($id){
        return $this->delete($id);
    }
    
}
