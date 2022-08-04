<?php

namespace App\Models;

class ProductModel extends \CodeIgniter\Model {
    protected $table = 'products';
    protected $allowedFields = ['name','category','label','price','image','description'];
    
    public function createproduct($data){
        return $this->save($data);
    }
    public function read(){
        return$this->paginate(4);
    }
    public function getDataById($id){
        return $this->where('id',$id)->first();
    }
    
    public function updateData($id,$data){
        return $this->update($id, $data);  
    }
    
    public function getproductByCategory($category){
        return $this->where('category',$category)->findAll();
    }
    
    public function deleteData($id){
        return $this->delete($id);
    }
    
    
    
}
