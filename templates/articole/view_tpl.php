<div>
    <?php foreach ($articole as $articol): ?>
        <?php if (isset($articol['caleImg']) && !empty($articol['caleImg'])): ?>
            <img src="<?php echo $articol['caleImg']; ?>">
        <?php endif; ?>
        <br><br>
        <?php echo $articol['continut']; ?>
        <br><br>
        <div class="row"> 
            <em> 
                <div class="col-md-offset-1 col-md-4">
                    Autor: <?php
                    if (isset($_SESSION['user']))
                        if ($articol['autID'] == $_SESSION['userID']) {
                            echo html_a($articol['nume'], 'autor.php');
                        } else {
                            echo html_a($articol['nume'], 'viewaut.php?autID=' . $articol['autID']);
                        } else
                        echo html_a($articol['nume'], 'viewaut.php?autID=' . $articol['autID']);
                    ?>
                </div>
                <div class="col-md-offset-3 col-md-4">
                    Data: <?php echo $articol['data']; ?> 
                </div>
            </em>
        </div>
        <br><br>
    <?php if (isset($_SESSION['user'])): ?>
            <?php if ($_SESSION['userID'] == $articol['autID']): ?>
                <div class="row">
                    <div class="col-md-offset-1 col-md-4">
                        <a href="modificare_art.php?ID=<?php echo $_GET['ID']; ?>" class="btn"> Modifica reteta </a>
                    </div>
                    <div class="col-md-offset-1 col-md-4">
                        <a href="stergere_art.php?ID=<?php echo $_GET['ID']; ?>" class="btn"> Sterge reteta </a>
                    </div>
                </div>
        <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
