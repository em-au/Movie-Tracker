<?php

class Movie extends Controller {
  
  public function index() {
    $this->view('movie/index');
  }

  public function search() {
    if (!isset($_REQUEST['movie'])) {
      header('location: /movie');
      die;
    }
    
    $api = $this->model('Api');
    $title = $_REQUEST['movie'];
    $movie = $api->search_movie($title);
    
    echo "<pre>";
    print_r($movie);
    die;

    $this->view('movie/results', ['movie' => $movie]);
  }
    /*
    View example
    under search bar:
    search button
    Movie Details
    Rating - leave one --> a href="/movie/review/barbie/4"
      link not a form - when user goes here, grab the movie title and rating number
      and add to db (ensure that number value is correct)
        save userid, movie name, rating
    */

    public function rating($movie = '', $rating = '') {
      
    }
  
}
