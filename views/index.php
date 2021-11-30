<?php include('_header.php'); ?>

<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Hello, world!</h1>
        <p>This application aims to get feedback on your thoughts and feelinds about COVID 19 and how it has affected your lives. We will ask you only 5 questions to understand that If you're ready to start click continue as guest below and start.</p>
        <p><a class="btn btn-primary btn-lg" href="<?php echo $helper->url("site", "survey"); ?>" role="button">Continue as guest</a></p>
    </div>
</div>


<?php include('_footer.php'); ?>