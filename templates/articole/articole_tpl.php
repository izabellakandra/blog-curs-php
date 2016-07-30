<div>
    <a href="adaugare_art.php" class="btn"> Creare articol </a>
</div>
<br><br>
<div>
    <?php foreach ($articole as $articol): ?>
        <h3>
            <?php echo html_a($articol['titlu'], 'view.php?ID=' . $articol['ID'] . '#n'); ?>
        </h3>
        Autor: <em><?php
            if (isset($_SESSION['user']))
                if($articol['autID'] == $_SESSION['userID']) {echo 'test';
                    echo html_a($articol['nume'], 'autor.php');
                }
                else {echo 'test1';
                    echo html_a($articol['nume'], 'viewaut.php?autID=' . $articol['autID']);
                }
            else
                echo html_a($articol['nume'], 'viewaut.php?autID=' . $articol['autID']);
            ?></em> <span class="text-muted">|</span> Data: <em><?php echo $articol['data']; ?> </em>
        <br>
        <br>
        <?php echo ellipsis($articol['continut'], 300); ?>
        <br><br>
    <?php endforeach; ?>
</div>
