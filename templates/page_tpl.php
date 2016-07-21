<!DOCTYPE html>
<html>
    <head>
        <title>Blog | <?php echo $page_title; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="/images/favicon.ico">
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
                    <div class="white-block">
                        <span class='st_sharethis_large' displayText='ShareThis'></span>
                        <span class='st_facebook_large' displayText='Facebook'></span>
                        <span class='st_twitter_large' displayText='Tweet'></span>
                        <span class='st_linkedin_large' displayText='LinkedIn'></span>
                        <span class='st_pinterest_large' displayText='Pinterest'></span>
                        <span class='st_email_large' displayText='Email'></span>

                    </div>
                    <div class="white-block">
                        <h4>Pagini utile</h4><br/>
                        <?php echo lnk('gustos.ro','http://www.gustos.ro/'); ?><br/>
                        <?php echo lnk('petitchef.ro','http://www.petitchef.ro/'); ?><br/>
                        <?php echo lnk('clickpoftabuna.ro','http://clickpoftabuna.ro/'); ?><br/>
                        <?php echo lnk('retete-gustoase.ro','http://www.retete-gustoase.ro/'); ?><br/>
                        <?php echo lnk('bucataria-romaneasca.ro','http://bucataria-romaneasca.ro/'); ?><br/>
                    </div>
                </div>
            </div>
        </div>

        <?php
        echo template('footer_tpl', array());
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="/js/script.js"></script>
        <script type="text/javascript">var switchTo5x = true;</script>
        <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
        <script type="text/javascript">stLight.options({publisher: "a5055aeb-ea6e-42b2-848c-60145aa0f8c7", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
    </body> 
</html>
