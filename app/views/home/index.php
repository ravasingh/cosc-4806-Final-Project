<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>WELCOME</h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>
                <p>Your ultimate destination for discovering, rating, and reviewing movies. Whether you're looking for the latest blockbusters or hidden gems, We got you covered.</p>
                <p>Search for your favorite movies, read reviews from other movie enthusiasts, and share your own ratings and reviews to help others find their next great watch.</p>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <p><a href="/logout">Click here to logout</a></p>
            <p><a href="/movie" class="btn btn-primary">Go to Movie Search</a></p>
        </div>
    </div>
</div>
<?php require_once 'app/views/templates/footer.php' ?>
