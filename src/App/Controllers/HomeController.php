<?php 

declare(strict_types=1);

namespace App\Controllers;
use Core\View;
use Core\Session;

final class HomeController 
{

    public function index(): string
    {
        Session::destroy(); 
       return View::render('home', [
            'title' => 'MVC Projects',
            'isAdmin' => false,
            'userName' => 'Bora',
            'lokasyon' => Session::get('lokasyon'),
        ]);
    }
}
