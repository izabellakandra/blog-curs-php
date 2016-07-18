<div>
          <?php foreach($articole as $articol): ?>
            <a name=n></a> 
               <div class="row"> 
                       <div class="col-md-6">
                           <i>Nr. ID:  <?php echo $articol['ID']; ?> </i> | &nbsp;
                           <font size="4">
                             <?php   echo html_a($articol['titlu'], '/view.php?ID=' . $articol['ID'] . '#n');  ?>
                         </font>
                       </div>
                       <div class="col-md-4">
                                     <em>  Data: <?php echo $articol['data']; ?>  </em>
     		       </div>
                
                </div>
                <hr>
    <?php endforeach;?>
</div>
