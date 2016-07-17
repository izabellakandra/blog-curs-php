<div>
    <?php foreach($articole as $articol): ?>
    <div>
        
            <?php echo html_a($articol['titlu'], '/articol/view.php?id=' . $articol['ID']);  ?>
            <br><br>
            <?php echo $articol['continut']; ?>
			<br><br><p align="right">
			<?php echo $articol['data']; ?> 
			</p>
    </div>
    <?php endforeach;?>
</div>
