<?php


namespace App\Model;

use App\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;

class MovieManager extends AbstractManager
{

    public function getApiAllMovies()
    {
        $movies = $this->apiRequest('/movies');
        return $movies;
    }

    public function getApiSearchMovieByTitle(string $title)
    {
        $result = $this->apiRequest('/movies/search/title/' . $title);
        return $result;
    }
}
