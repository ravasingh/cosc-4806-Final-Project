<?php require_once 'app/views/templates/header.php' ?>

<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1><?= htmlspecialchars($data['movie']['Title']) ?></h1>
                <p class="lead"><?= htmlspecialchars($data['movie']['Plot']) ?></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <img src="<?= htmlspecialchars($data['movie']['Poster']) ?>" alt="<?= htmlspecialchars($data['movie']['Title']) ?>" class="img-fluid">
        </div>
        <div class="col-lg-6">
            <ul class="list-group">
                <li class="list-group-item"><strong>Year:</strong> <?= htmlspecialchars($data['movie']['Year']) ?></li>
                <li class="list-group-item"><strong>Rated:</strong> <?= htmlspecialchars($data['movie']['Rated']) ?></li>
                <li class="list-group-item"><strong>Released:</strong> <?= htmlspecialchars($data['movie']['Released']) ?></li>
                <li class="list-group-item"><strong>Runtime:</strong> <?= htmlspecialchars($data['movie']['Runtime']) ?></li>
                <li class="list-group-item"><strong>Genre:</strong> <?= htmlspecialchars($data['movie']['Genre']) ?></li>
                <li class="list-group-item"><strong>Director:</strong> <?= htmlspecialchars($data['movie']['Director']) ?></li>
                <li class="list-group-item"><strong>Writer:</strong> <?= htmlspecialchars($data['movie']['Writer']) ?></li>
                <li class="list-group-item"><strong>Actors:</strong> <?= htmlspecialchars($data['movie']['Actors']) ?></li>
                <li class="list-group-item"><strong>Language:</strong> <?= htmlspecialchars($data['movie']['Language']) ?></li>
                <li class="list-group-item"><strong>Country:</strong> <?= htmlspecialchars($data['movie']['Country']) ?></li>
                <li class="list-group-item"><strong>Awards:</strong> <?= htmlspecialchars($data['movie']['Awards']) ?></li>
                <li class="list-group-item"><strong>IMDB Rating:</strong> <?= htmlspecialchars($data['movie']['imdbRating']) ?></li>
                <li class="list-group-item"><strong>IMDB Votes:</strong> <?= htmlspecialchars($data['movie']['imdbVotes']) ?></li>
            </ul>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12">
            <h2>Rate this movie</h2>
            <form action="/movie/rate" method="post">
                <input type="hidden" name="movie_id" value="<?= htmlspecialchars($data['movie']['imdbID']) ?>">
                <input type="hidden" name="movie_title" value="<?= htmlspecialchars($data['movie']['Title']) ?>">

                <fieldset class="form-group">
                    <legend class="col-form-label pt-0">Rating (out of 5)</legend>
                    <div class="form-group">
                        <input type="range" class="form-range" min="1" max="5" step="1" id="rating" name="rating" required>
                        <div class="d-flex justify-content-between">
                            <span>1</span>
                            <span>2</span>
                            <span>3</span>
                            <span>4</span>
                            <span>5</span>
                        </div>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-primary mt-3">Submit Rating</button>
            </form>
        </div>

    </div>
</main>
<?php require_once 'app/views/templates/footer.php' ?>
