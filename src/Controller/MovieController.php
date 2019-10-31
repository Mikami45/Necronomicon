<?php


namespace App\Controller;

use App\Model\MovieManager;
use App\Model\MoviePdoManager;
use Symfony\Component\HttpClient\HttpClient;

class MovieController extends AbstractController
{
    public function showAll()
    {
        $movieManager = new MovieManager();
        $movies = $movieManager->getApiAllMovies();
        return $this->twig->render('Home/index.html.twig', ['movies' => $movies]);
    }

    public function searchInApi(string $title)
    {
        $movieManager = new MovieManager();
        $result = $movieManager->getApiSearchMovieByTitle($title);
        return $this->twig->render('Home/index.html.twig', [
            'content'=> $result,
        ]);
    }
    public function search(string $title, int $id)
    {
        $movieManager = new MovieManager('monster');
        $films = $movieManager->selectOneById($id);
        $result = $movieManager->getApiSearchMovieByTitle($title);
        return $this->twig->render('Home/index.html.twig', [
            'content'=> $result,
            'films' => $films
        ]);
    }
}
