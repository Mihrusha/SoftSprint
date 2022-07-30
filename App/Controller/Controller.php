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

        $view->Show($data);
    }

    public function Insert()
    {
        // var_dump('test');
        // die;

        $user = new User;

        $data = $user->GetAll();

        if (isset($_POST['name'])) {

            $name = $_POST['name'];

            $name = $user->check_input($name);

            $surname = $_POST['surname'];
            $surname = $user->check_input($surname);

            $role = $_POST['role'];
            $role = $user->check_input($role);

            $status = $_POST['status'];
            $status = $user->check_input($status);

            if (empty($name)) {
                echo json_encode(array('status' => false, 'error' => array('code' => '1', 'message' => 'no name')));
                die;
            }

            if (empty($surname)) {
                echo json_encode(array('status' => false, 'error' => array('code' => '2', 'message' => 'no surname')));
                die;
            }

            if ($role == 'no') {
                echo json_encode(array('status' => false, 'error' => array('code' => '3', 'message' => 'no users role')));
                die;
            }

            if ($user->UserCheck($name, $surname) > 0) {
                echo json_encode(array('status' => false, 'error' => array('code' => '4', 'message' => 'user already exist')));
                die;
            } else

                $user->Insert($name, $surname, $status, $role);
            echo json_encode(array('status' => true, 'error' => null, 'user' => array("name" => $name, "surname" => $surname)));

            die;
        }
    }

    public function Edit()
    {
        // var_dump('test');
        // die;

        $user = new User;

        $data = $user->GetAll();


        if (isset($_POST['name'])) {

            $name = $_POST['name'];

            $name = $user->check_input($name);

            $surname = $_POST['surname'];
            $surname = $user->check_input($surname);

            $role = $_POST['role'];
            $role = $user->check_input($role);

            $status = $_POST['status'];
            $status = $user->check_input($status);

            $id = $_POST['id'];
            $id = $user->check_input($id);

            if (empty($name)) {
                echo json_encode(array('status' => false, 'error' => array('code' => '1', 'message' => 'no name')));
                die;
            }

            if (empty($surname)) {
                echo json_encode(array('status' => false, 'error' => array('code' => '2', 'message' => 'no surname')));
                die;
            }

            if ($role == 'no') {
                echo json_encode(array('status' => false, 'error' => array('code' => '3', 'message' => 'no users role')));
                die;
            }

            if ($id == '') {
                echo json_encode(array('status' => false, 'error' => array('code' => '4', 'message' => 'no id-new user')));
                die;
            } else

                $user->Edit($name, $surname, $role, $id, $status);
            echo json_encode(array('status' => true, 'error' => null, 'user' => array("id" => $id, "name" => $name, "surname" => $surname)));
            die;
        }
    }

    public function editStatus()
    {

        $user = new User;

        $data = $user->GetAll();
        if (isset($_POST['id'])) {

            $deleteId[] = $_POST['id'];
            //$deleteId = implode(',', $id);
            $status = $_POST['status'];
           
            //$user->Delete($deleteId);
            if ($status != '' || !empty($status)) {
                $user->EditStatus($deleteId, $status);
            }
        }
    }

    public function Delete()
    {
        $user = new User;
        $view = new View;
        $data = $user->GetAll();

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
