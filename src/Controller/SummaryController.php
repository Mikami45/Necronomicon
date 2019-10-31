<?php


namespace App\Controller;

class SummaryController extends AbstractController
{

    public function index()
    {
        return $this->twig->render('Summary/index.html.twig');
    }
}
