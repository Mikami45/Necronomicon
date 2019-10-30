<?php


namespace App\Controller;

use App\Model\MovieManager;
use Symfony\Component\HttpClient\HttpClient;

class MovieController extends AbstractController
{
    public function showAll()
    {
        $movieManager = new MovieManager();
        $movies = $movieManager->getApiAllMovies();
        return $this->twig->render('Home/index.html.twig', ['movies' => $movies]);
    }

    public function search(string $title)
    {
        $movieManager = new MovieManager();
        $result = $movieManager->getApiSearchMovieByTitle($title);
        return $this->twig->render('Home/index.html.twig', [
            'content'=> $result,
            'title' => 'okokoko'
        ]);
    }
}
