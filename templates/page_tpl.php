<!DOCTYPE html>
<html>
    <head>
        <title>Blog | <?php echo $page_title; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <?php
        echo template('header_tpl', array());
        ?>
        <?php if (isset($banner_tpl)): ?>
            <?php echo $banner_tpl; ?>
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="main-container white-block">
                        <?php if (isset($page_title) && !isset($banner_tpl)): ?>
                            <h1><?php echo $page_title; ?></h1>
                        <?php endif; ?>
                        <?php if (isset($content)): ?>
                            <?php echo $content; ?>
                        <?php endif; ?>
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
        <script src="/js/script.js"></script>
    </body> 
</html>
