<?php 

declare(strict_types=1);

namespace App\Controllers;
use Core\View;
use Core\Session;

final class AboutController 
{

    public function index(): string
    {
        return View::render('about', [
            "title" => "About Page",
            "description" => "I am a software developer.",
            "userName" => "Bora",
            "lokasyon" => Session::get('lokasyon'),
        ]);
    }
}