<form class="form-horizontal tooltip-validation" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name" class="control-label col-md-offset-1 col-md-2">Nume: </label>
        <div class="col-md-8">
            <input type="text"  class="form-control" name="name" id="name" <?php if($values != NULL) echo 'value="'.$values['name'].'"'?> data-toggle="popover" data-placement="right" data-content="<?php if(isset($error['name'])) echo $error['name']; ?>">
            <span class="text-muted small-font">Numele trebuie să fie între 3 și 80 de caractere</span>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="control-label col-md-offset-1 col-md-2">E-mail: </label>
        <div class="col-md-8">
            <input type="email"  class="form-control" name="email" id="email" <?php if($values != NULL) echo 'value="'.$values['email'].'"'?> data-toggle="popover" data-placement="right" data-content="<?php if(isset($error['email'])) echo $error['email']; ?>">
            <span class="text-muted small-font">Adressa de e-mail trebuie să fie între 6 și 254 de caractere</span>
        </div>
    </div>                            
    <div class="form-group">
        <label for="user" class="control-label col-md-offset-1 col-md-2">Nume user: </label>
        <div class="col-md-8">
            <input type="text"  class="form-control" name="user" id="user" <?php if($values != NULL) echo 'value="'.$values['user'].'"'?> data-toggle="popover" data-placement="right" data-content="<?php if(isset($error['user'])) echo $error['user']; ?>">
            <span class="text-muted small-font">Numele de user trebuie să fie între 3 și 80 de caractere</span>
        </div>
    </div>
    <div class="form-group">
        <label for="pass" class="control-label col-md-offset-1 col-md-2">Parola: </label>
        <div class="col-md-8">
            <input type="password"  class="form-control" name="pass" id="pass" data-toggle="popover" data-placement="right" data-content="<?php if(isset($error['pass'])) echo $error['pass']; ?>">
            <span class="text-muted small-font">Parola trebuie să fie între 4 și 50 de caractere</span>
        </div>
    </div>
    <div class="form-group">
        <label for="userImage" class="control-label col-md-offset-1 col-md-2">Avatar: </label>
        <div class="col-md-8" >
            <input type="file" class="file" name="userImage" style="display:inline" id="userImage" data-toggle="popover" data-placement="right" data-content="<?php if(isset($error['img'])) echo $error['img']; ?>">
            <div class="text-muted small-font padding-top">Mărimea imaginei să nu depășească 2MB.<br/>Extensiile acceptate sunt: jpg/jpeg, png, gif </div>
        </div>
    </div>
    <input type="hidden" name="ref" value="<?php echo $ref ?>">
    <div class="form-group">
        <div class="col-md-offset-5 col-md-7"><button type="submit" class="btn btn-primary"><?php if(isset($_SESSION['user'])): ?>Modificare<?php else: ?>Inregistrare<?php endif;?></button></div>
    </div>
</form>