<?php
class Movie extends Controller {

    public function index(): void {
                        $this->view('movie/index');
                    }
//search function
    public function search(): void {

                        if (isset($_REQUEST['movie'])) {
                            $api = $this->model('Api');
                            $movie = $api->search_movie( ucfirst(strtolower($_REQUEST['movie'])));


                            $this->view('movie/results', ['movie' => $movie]);
                        } else {
                            header('Location: /movie');
                        }
                    }
//rating function
    public function rate(): void {
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $movie_id = $_POST['movie_id'];
                            $rating = $_POST['rating'];
                            $movie_title = $_POST['movie_title'];
                            $api = $this->model('Api');
                            $api->save_rating($movie_id, $rating);
                            $_SESSION['rating'] = $rating;
                            $_SESSION['movie_title'] = $movie_title;


                            header('Location: /movie/review');
                            exit();
                        }
                    }
//reviewing function
    public function review(): void {

          if (isset($_SESSION['rating']) && isset($_SESSION['movie_title'])) {
                  $rating = $_SESSION['movie_id'];
              $movie_title = $_SESSION['movie_title'];



        $api_key = $_ENV['GEMINI'];
        $url = "https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent?key=" . $api_key;

        $data = array(
            "contents" => array(
                array(
                    "role" => "user",
                    "parts" => array(
                        array(
                            "text" => "Generate a review for the movie titled '" . $movie_title . "' with their rating " . $rating
                        )
                    )
                )
            )
        );

        $json_data = json_encode($data);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
            die;
        }

        curl_close($ch);

        $review = json_decode($response, true);

        $this->view('movie/review', ['review' => $review]);
    } else {
        echo 'Movie ID and Title are required';
        die;
    }
                }
}