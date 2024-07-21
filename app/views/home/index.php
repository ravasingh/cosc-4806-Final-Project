<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>WELCOME</h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>

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
