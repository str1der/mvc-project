<?php 

declare(strict_types=1);

namespace App\Controllers;
use Core\View;

final class ContactController 
{

    public function index(): string
    {
        return View::render('contact');
    }
}