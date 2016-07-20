<div>
          <?php foreach($articole as $articol): ?>
            <?php if (isset($articol['caleImg']) && !empty($articol['caleImg'])): ?>
              <img src="<?php echo $articol['caleImg'];?>">
            <?php endif;?>
            <br><br>
            <?php echo $articol['continut']; ?>
            <br><br>
		<div class="row"> 
                       <em> 
                       <div class="col-md-offset-1 col-md-4">
                                      Autor:   <?php   echo html_a($articol['nume'], 'viewaut.php?autID=' . $articol['autID']);  ?>
                       </div>
                       <div class="col-md-offset-3 col-md-4">
                                       Data: <?php echo $articol['data']; ?> 
     		       </div>
                       </em>
                </div>
                <br><br>
    <?php endforeach;?>
</div>
