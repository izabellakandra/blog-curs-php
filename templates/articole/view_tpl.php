<div>
          <?php foreach($articole as $articol): ?>
            <a name=n></a> 
            <?php echo $articol['continut']; ?>
            <br><br>
		<div class="row"> 
                       <em> 
                       <div class="col-md-offset-1 col-md-4">
                                      AutID:   <?php   echo html_a($articol['autID'], 'viewaut.php?autID=' . $articol['autID']);  ?>
                       </div>
                       <div class="col-md-offset-3 col-md-4">
                                       Data: <?php echo $articol['data']; ?> 
     		       </div>
                       </em>
                </div>
                <br><br>
    <?php endforeach;?>
</div>
