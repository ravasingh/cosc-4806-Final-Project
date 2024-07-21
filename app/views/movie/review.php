<?php require_once 'app/views/templates/header.php' ?>
<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Review</h1>
                <p class="lead">
                   <?php $text = $data['review']['candidates'][0]['content']['parts'][0]['text'];

                    echo $text;?>

            </div>
        </div>
    </div>
</main>
<?php require_once 'app/views/templates/footer.php' ?>
