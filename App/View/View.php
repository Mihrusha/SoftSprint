<?php

namespace App\View;
include 'C:\xampp\htdocs\Soft\exercise\App\vendor\autoload.php';
class View
{
    public function Show($data=null)
    {
        include_once 'App\View\index.php';
    }

    public function Change($data=null)
    {
        include_once 'change.php';
    }
    
}
