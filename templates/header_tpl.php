<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 logo-region">
                <?php echo lnk(img('/images/logo.png', 'Blog', 200), '/index.php'); ?>

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <div class="col-sm-8">
                <nav class="navbar">
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Home</a></li>
                            <?php if(!isset($_SESSION['user'])):?>
                            <li><a href="logare.php">Logare</a></li>
                            <li><a href="inregistrare.php">Inregistrare</a></li>
                            <?php else:?>
                            <li><a href="autor.php">Loggat ca: <?php echo $_SESSION['user']; ?></a></li>
                            <li><a href="logout.php">Logout</a></li>
                            <?php endif;?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>