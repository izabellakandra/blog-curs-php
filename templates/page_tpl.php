<!DOCTYPE html>
<html>
    <head>
        <title>Blog | <?php echo $page_title; ?></title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/style.css">

    </head>
    <body>
        <?php
        echo template('header_tpl', array());
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="main-container white-block">
                         <h1><?php echo $page_title; ?></h1>
                         <?php echo $content; ?>
                     </div>                
                </div>
                <div class="col-md-4">
                    <div class="white-block">O prostie</div>
                    <div class="white-block">Alta prostie</div>
                </div>
            </div>
        </div>
       
        <?php
        echo template('footer_tpl', array());
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body> 
</html>
