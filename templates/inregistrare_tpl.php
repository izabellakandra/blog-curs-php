<form class="form-horizontal" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name" class="control-label col-md-offset-1 col-md-2">Nume: </label><div class="col-md-8"><input type="text"  class="form-control" name="name" id="name" <?php if($values != NULL) echo 'value="'.$values['name'].'"'?>></div>
    </div>
    <div class="form-group">
        <label for="email" class="control-label col-md-offset-1 col-md-2">E-mail: </label><div class="col-md-8"><input type="email"  class="form-control" name="email" id="email" <?php if($values != NULL) echo 'value="'.$values['email'].'"'?>></div>
    </div>                            
    <div class="form-group">
        <label for="user" class="control-label col-md-offset-1 col-md-2">Nume user: </label><div class="col-md-8"><input type="text"  class="form-control" name="user" id="user" <?php if($values != NULL) echo 'value="'.$values['user'].'"'?>></div>
    </div>
    <div class="form-group">
        <label for="pass" class="control-label col-md-offset-1 col-md-2">Parola: </label><div class="col-md-8"><input type="password"  class="form-control" name="pass" id="pass"></div>
    </div>
    <div class="form-group">
        <label for="userImage" class="control-label col-md-offset-1 col-md-2">Avatar: </label><div class="col-md-8"><input type="file" class="file" name="userImage" style="display:inline" id="userImage"></div>
    </div>
    <?php if($error != NULL) echo '<p>'.$error.'</p>'; ?>
    <input type="hidden" name="ref" value="<?php echo $ref ?>">
    <div class="form-group">
        <div class="col-md-offset-5 col-md-7"><button type="submit" class="btn btn-primary">Inregistrare</button></div>
    </div>
</form>