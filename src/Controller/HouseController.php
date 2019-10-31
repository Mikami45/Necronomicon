<?php


namespace App\Controller;

class HouseController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('House/index.html.twig');
    }
}
