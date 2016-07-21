<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#author" aria-controls="author" role="tab" data-toggle="tab">Detalii Autor</a></li>
    <li role="presentation"><a href="#author-articles" aria-controls="author-articles" role="tab" data-toggle="tab">Articole</a></li>
</ul>
<br>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="author">
        <div id="autor-details-container" class="row">
            <div class="col-md-4 col-md-push-8 text-right">
                <a href="<?php echo $caleImgAutor ?>"><img src= "<?php echo $caleImgAutor ?>" class="img-thumbnail"></a>
            </div>
            <div class="col-md-8 col-md-pull-4">
                <h3><?php echo $numeAutor ?></h3>
                <div><label class="column-equal">Username: </label> <?php echo $username ?></div>
                <div><label class="column-equal">Adresa email: </label> <?php echo $email ?></div>              
            </div>
        </div> 
    </div>
    <div role="tabpanel" class="tab-pane fade" id="author-articles">

        <h2>Articolele mele</h2>
        <div id="articole-autor-container">
           <?php echo $articoleAut ?>
        </div>

    </div>
</div>