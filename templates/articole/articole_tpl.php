<div>
         <a href="" class="btn"> Creare articol </a>
</div>
<br><br>
<div>
          <?php foreach($articole as $articol): ?>
                  <h3>
                  <?php   echo html_a($articol['titlu'], 'view.php?ID=' . $articol['ID'] . '#n');  ?>
                  </h3>
                  Autor:   <em><?php   echo html_a($articol['nume'], 'viewaut.php?autID=' . $articol['autID']);  ?></em> <span class="text-muted">|</span> Data: <em><?php echo $articol['data']; ?> </em>
            <br>
            <br>
            <?php echo ellipsis($articol['continut'], 300); ?>
            <br><br>
    <?php endforeach;?>
</div>
