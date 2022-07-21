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
}
