<?php 

declare(strict_types=1);

namespace App\Controllers;
use Core\View;
use Core\Session;

final class ContactController 
{

    public function index(): string
    {
        return View::render('contact', [
            "title" => "Contact Page",
            "telNo"=>"0531 835 31 38",
            "userName" => "Bora",
            "lokasyon" => Session::get('lokasyon'),
        ]);
    }
}