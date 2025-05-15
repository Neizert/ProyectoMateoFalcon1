<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
    return view('plantillas/header').
    view('Views/principal').
     view('plantillas/footer');
    }

    public function nosotros(){
        return view('plantillas/header').
        view('Views/nosotros').
        view('plantillas/footer');
    }

    public function contacto(){
        return view('plantillas/header').
        view('Views/contacto').
        view('plantillas/footer');
    }

    public function principal(){
        return view('plantillas/header').
        view('Views/principal').
        view('plantillas/footer');
    }

    public function terminosdeuso(){
        return view('plantillas/header').
        view('Views/terminosdeuso').
        view('plantillas/footer');
    }

    public function comercio(){
        return view('plantillas/header').
        view('Views/comercio').
        view('plantillas/footer');
    }

     public function sabores(){
        return view('plantillas/header').
        view('Views/sabores').
        view('plantillas/footer');
    }

     public function bombones(){
        return view('plantillas/header').
        view('Views/bombones').
        view('plantillas/footer');
    }


     public function paletas(){
        return view('plantillas/header').
        view('Views/paletas').
        view('plantillas/footer');
    }



}
