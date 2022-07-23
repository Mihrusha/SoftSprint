<?php

namespace App\View;

class View
{
    public function Show($data)
    {
        include_once 'App\View\index.php';
    }

    public function Change($data)
    {
        include_once 'App\View\change.php';
    }
    
}
