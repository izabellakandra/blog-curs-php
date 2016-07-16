<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#author" aria-controls="author" role="tab" data-toggle="tab">Detalii Autor</a></li>
    <li role="presentation"><a href="#author-articles" aria-controls="author-articles" role="tab" data-toggle="tab">Profile</a></li>
</ul>
<br>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="author">
        <div id="autor-details-container">
            <a href="<?php echo $caleImgAutor ?>"><img src= "<?php echo $caleImgAutor ?>" class="img-thumbnail"></a>
            <h3><?php echo $numeAutor ?></h3>
            <h5>Username: <?php echo $username ?></h5>
            <h5>Adresa email: <?php echo $email ?></h5>
        </div> 
    </div>
    <div role="tabpanel" class="tab-pane fade" id="author-articles">

        <h1>Articolele mele</h1>
        <div id="articole-autor-container">
            <h3><?php detaliiArticol($detaliiArticol) ?></h3>
        </div>

    </div>
</div>