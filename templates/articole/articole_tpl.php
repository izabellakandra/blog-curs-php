<div>
    <?php foreach($articole as $articol): ?>
    <div>
        <h4>
            <?php echo html_a($articol['titlu'], '/articol/view.php?id=' . $articol['ID']);  ?>
            <br>
            <?php echo $articol['continut']; ?>
        </h4>
    </div>
    <?php endforeach;?>
</div>
