<?php require_once 'app/views/templates/headerAll.php' ?> <!-- CHANGE HEADER -->
<style>
    .container {
        padding: 0px;
    }
    
    .container-main {
        margin-top: 30px;
    }

    .movie-year {
        font-size: 20px;
    }

    .movie-plot {
        font-size: 18px;
    }

    .movie-small {
        font-size: 12px;
    }

    .stars {
        margin-bottom: 30px;
    }

    .card {
        margin-bottom: 5px;
    }
</style>


<div class="container container-main d-flex flex-column justify-content-center gap-5">
    <div class="movie-info d-flex justify-content-center gap-3">
        <?php 
        $movie = $data['movie']; 
        // No movie was found
        if ($movie['Response'] == "False") {
            echo "Movie not found!";
        } 
            
        // Movie was found
        else { ?>
        <div class="movie-image">
            <img src="<?php echo $movie['Poster']?>">
        </div>
        <div class="movie-info">
            <h2><?php echo $movie['Title']?></h2>
            <div class="movie-year"><?php echo $movie['Year']?></div>
            <div><?php echo "Directed by " . $movie['Director']?></div>
            <div><?php echo "Starring " . $movie['Actors']?></div>
            <div class="movie-plot"><?php echo $movie['Plot']?></div>
            <br>
            <div class="movie-small">
                <?php echo $movie['Genre'] . "<br>" . $movie['Runtime'] ?>
            </div>
        </div>

        <div class="movie-rating d-flex flex-column justify-content-center align-items-center" style="width:500px">
            <h5>Rate this movie</h5>
            <div class="stars">
                <a href="/movie/rating/<?php echo $movie['Title']?>/1">
                    <i class="fa-regular fa-star fa-2xl"></i></a>
                <a href="/movie/rating/<?php echo $movie['Title']?>/2">
                    <i class="fa-regular fa-star fa-2xl"></i></a>
                <a href="/movie/rating/<?php echo $movie['Title']?>/3">
                    <i class="fa-regular fa-star fa-2xl"></i></a>
                <a href="/movie/rating/<?php echo $movie['Title']?>/4">
                    <i class="fa-regular fa-star fa-2xl"></i></a>
                <a href="/movie/rating/<?php echo $movie['Title']?>/5">
                    <i class="fa-regular fa-star fa-2xl"></i></a>
            </div>
            <div class="scores d-flex gap-4">
                <div class="score d-flex flex-column align-items-center">
                    <div><?php 
                        echo $movie['imdbRating'] . "/10";
                     ?></div>
                    <div>IMDb</div>
    
                </div>
                <div class="score d-flex flex-column align-items-center">
                    <div><?php 
                        echo $movie['Metascore'] . "/100";
                     ?></div>
                    <div>Metascore</div>
                </div>
            </div>
        </div>
    </div>
<div class="row"
    <div class="container ratings-reviews d-flex">
        <div class="col-4 user-ratings d-flex flex-column">
            <h5>User Ratings</h5>
            <?php 
                // No user ratings for this movie
                if (empty($data['ratings'])) {
                    echo "There are no ratings for this movie.";
                }
                else {
                    foreach ($data['ratings'] as $rating) { 
                        // Change display from number to showing stars
                        echo $rating['username'] . " - " . $rating['date_added'] . 
                            "<br>" . $rating['rating'] . "<br><br>";
                    }
                }
            ?>
        </div>

        <div class="col-8 user-ratings d-flex flex-column">
            <h5>What critics have said about this movie</h5>
            <?php
                foreach ($data['reviews'] as $review) { ?>
                   <div class="card">
                     <div class="card-body">
                       <? echo "<p>$review</p>"; ?>
                     </div>
                   </div>
                    <?
                    
                }
            ?> 
        </div>
    </div>
</div>
              
    <?php } // Closure of else statement for condition where movie is found ?> 
    
</div>
</div>

<?php require_once 'app/views/templates/footer.php' ?>