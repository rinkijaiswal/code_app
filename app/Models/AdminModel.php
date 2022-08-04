<?php
namespace App\Models;

class AdminModel extends \CodeIgniter\Model{
    protected $table = 'admin_login';
    protected $allowedFields = ['email','password'];
    
    public function login($email,$password){
        $array= array('email'=>$email,'password'=>$password);
        return $this->where($array)->first();
        
    }
}
