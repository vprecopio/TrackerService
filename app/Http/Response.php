<?php

namespace App\Http;

class Response
{
    protected $view; //array, json, pdf...

    public function __construct($view)
    {
        $this->view = $view; //home, contact
    }

    public function getView()
    {
        return $this->view;
    }

    public function send()
    {
        $view = $this->getView();

        //esto trae el contenido de una vista
        $content = viewPath($view);

        require viewPath('layout');
    }
}