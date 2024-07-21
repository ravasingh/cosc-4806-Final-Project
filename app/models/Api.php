<?php
class Api {

    private $db;

    public function __construct() {
        $this->db = db_connect();
    }


    public function search_movie($title) {

        $query_url = "http://www.omdbapi.com/?apikey=" . $_ENV['omdb_key'] . "&t=" . urlencode($title);


        $json = file_get_contents($query_url);



        if ($json === false) {
            error_log("Failed to fetch data from OMDB API.");
            return false;
        }


        $movie = json_decode($json, true);


        if ($movie === null || $movie['Response'] === 'False') {
            error_log("No movie found or error in API response: " . $movie['Error']);
            return false;
        }


        $stmt = $this->db->prepare("SELECT id FROM movies WHERE imdb_id = :imdb_id");
        $stmt->bindValue(':imdb_id', $movie['imdbID']);
        $stmt->execute();
        $existing_movie = $stmt->fetch(PDO::FETCH_ASSOC);


        if (!$existing_movie) {
            $stmt = $this->db->prepare("
                INSERT INTO movies 
                (imdb_id, title, year, rated, released, runtime, genre, director, writer, actors, plot, language, country, awards, poster, imdb_rating, imdb_votes)
                VALUES 
                (:imdb_id, :title, :year, :rated, :released, :runtime, :genre, :director, :writer, :actors, :plot, :language, :country, :awards, :poster, :imdb_rating, :imdb_votes)
            ");

            $stmt->bindValue(':imdb_id', $movie['imdbID']);
            $stmt->bindValue(':title', $movie['Title']);
            $stmt->bindValue(':year', $movie['Year']);
            $stmt->bindValue(':rated', $movie['Rated']);
            $stmt->bindValue(':released', date('Y-m-d', strtotime($movie['Released'])));
            $stmt->bindValue(':runtime', $movie['Runtime']);
            $stmt->bindValue(':genre', $movie['Genre']);
            $stmt->bindValue(':director', $movie['Director']);
            $stmt->bindValue(':writer', $movie['Writer']);
            $stmt->bindValue(':actors', $movie['Actors']);
            $stmt->bindValue(':plot', $movie['Plot']);
            $stmt->bindValue(':language', $movie['Language']);
            $stmt->bindValue(':country', $movie['Country']);
            $stmt->bindValue(':awards', $movie['Awards']);
            $stmt->bindValue(':poster', $movie['Poster']);
            $stmt->bindValue(':imdb_rating', $movie['imdbRating']);
            $stmt->bindValue(':imdb_votes', $movie['imdbVotes']);
            $stmt->execute();
        }
         return  $movie;

    }

