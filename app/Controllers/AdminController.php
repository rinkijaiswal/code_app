<?php

namespace App\Controllers;
use App\Models\AdminModel;


class AdminController extends \CodeIgniter\Controller {
    public $model ;
    public $session;
    public function __construct() {
        helper('form');
        $this->model = new AdminModel();
        $this->session = \Config\Services::session();
    }
    public function login() {
        if($this->request->getMethod() == 'post'){
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $result = $this->model->login($email, $password);
            if($result){
                $this->session->set('isAdminLoggedIn','true');
                return redirect()->to('/admin/dashboard');
            }else{
                $this->session->setFlashdata('error',"Invalid Login Credentials");
                return redirect()->to('/admin/login');
            }
        }
        if($this->session->get('isAdminLoggedIn') == 'true'){
            return redirect()->to(base_url('/admin/dashboard'));
        }
       return view('admin/login');
    }
    public function dashboard(){
        return view('admin/dashboard');
    }
    
    
}
