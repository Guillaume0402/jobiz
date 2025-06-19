<?php

namespace App\Controller;

class PageController extends Controller
{
    public function home(): void
    {
        $greeting = "Hello";
        $name = "Yom";
        $this->render("page/home", [
            'greeting' => $greeting,
            'name' => $name
        ]);
    }


    public function about(): void
    {
        $this->render("page/about");
    }


    
}
