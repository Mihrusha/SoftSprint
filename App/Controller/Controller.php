<?php

namespace App\Controller;

use App\Model\User;
use App\View\View;



class Controller
{

    public function GetAll()
    {

        $view = new View;
        $user = new User;

        $data = $user->GetAll();

        //  $view->Show($data);
        $view->newIndex($data);
    }

    public function Insert()
    {
        // var_dump('test');
        // die;

        $user = new User;

        if (isset($_POST['insert'])) {
            $name = $_POST['name'];
             $surname = $_POST['surname'];
                $role = $_POST['role'];
                $status = $_POST['status'];
                if($name == ''){
                    echo json_encode(array('status' => false, 'error' => array("code" => '1', "massage" => 'Must write a name')));
                 die;  
                }
                if($surname == ''){
                    echo json_encode(array('status' => false, 'error' => array("code" => 2, "massage" => 'Must write a surname')));
                  die;
                }
                 if( $role == 'no'){
                    echo json_encode(array('status' => false, 'error' => array("code" => 3, "massage" => 'Must choose a role')));
                  die;
                }
                  if( $user->UserCheck($name,$surname) >0){
                    echo json_encode(array('status' => false, 'error' => array("code" => 4, "massage" => 'User already exist')));
                  die;
                }
                else
                   $user->Insert($name, $surname, $status, $role);
            echo json_encode(array('status' => true, 'error' => null, 'user' => array("name" => $name, "surname" => $surname, 'role'=>$role, 'status'=>$status)));
        
          die;
        }
    }

    public function Edit()
    {
        // var_dump('test');
        // die;

        $user = new User;

        if (isset($_POST['name'])) {

            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $role = $_POST['role'];
            $status = $_POST['status'];
            $id = $_POST['id'];
            
            
            if($name == ''){
                echo json_encode(array('status' => false, 'error' => array("code" => '1', "massage" => 'Must write a name')));
             die;  
            }
            else if($surname == ''){
                echo json_encode(array('status' => false, 'error' => array("code" => 2, "massage" => 'Must write a surname')));
              die;
            }
           else  if( $role == 'no'){
                echo json_encode(array('status' => false, 'error' => array("code" => 3, "massage" => 'Must choose a role')));
              die;
            }
            
            else
            $user->Edit($name, $surname, $role, $id, $status);
            echo json_encode(array('status' => true, 'error' => null, 'user' => array("id" => $id, "name" => $name, "surname" => $surname, 'role' => $role, 'status' => $status)));
            
        }
    }

    public function editStatus()
    {

        $user = new User;

        
        if (isset($_POST['edit_status'])) {

   
            $status = $_POST['status'];
            $id = $_POST['id'];
         
           $user->EditStatus( $id, $status);
          
             echo json_encode(array('status' => true, 'error' => null, 'user' => array("status" => $status)));
            
        }
    }

    public function Delete()
    {
        $user = new User;
       

        if (isset($_POST['deleteId'])) {
            $deleteId = $_POST['deleteId'];
        
            $deleteId = implode(',', $deleteId);
            $user->Delete($deleteId);
        }
    }

    public function massDelete()
    {

        $user = new User;
        if (isset($_POST['mass_id'])) {

            $id = $_POST['mass_id'];
        
            $user->Delete($id);
        }
    }

    public function Change()
    {

        $user = new User;
        $data = $user->GetAll();
        $view = new View;

        $view->Change($data);
    }
}
