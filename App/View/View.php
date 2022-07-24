<?php

namespace App\View;
include 'C:\xampp\htdocs\Soft\exercise\App\vendor\autoload.php';
class View
{
    public function Show($data)
    {
        include_once 'App\View\index.php';
    }

    public function Change($data)
    {
        include_once 'change.php';
    }
    
}
