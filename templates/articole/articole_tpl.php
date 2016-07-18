<div>
          <?php foreach($articole as $articol): ?>
            <h4> 
                  <?php   echo html_a($articol['titlu'], '/articol/view.php?id=' . $articol['ID']);  ?>
            </h4>
            <br>
            <?php echo $articol['continut']; ?>
            <br><br>
		<div class="row"> 
                       <em> 
                       <div class="col-md-offset-1 col-md-4">
                                      Autor:  <?php echo $articol['autID']; ?> 
                       </div>
                       <div class="col-md-offset-3 col-md-4">
                                       Data: <?php echo $articol['data']; ?> 
     		       </div>
                       </em>
                </div>
                <br><br>
    <?php endforeach;?>
</div>
