<form class="form-horizontal" method="POST">
    <div class="form-group">
        <label for="user" class="control-label col-md-offset-2 col-md-2">Nume user: </label><div class="col-md-4"><input type="text"  class="form-control" name="user" id="user"></div>
    </div>
    <div class="form-group">
        <label for="pass" class="control-label col-md-offset-2 col-md-2">Parola: </label><div class="col-md-4"><input type="password"  class="form-control" name="pass" id="pass"></div>
    </div>
    <input type="hidden" name="ref" value="<?php echo $ref ?>">
    <div class="form-group">
        <div class="col-md-offset-5 col-md-7"><button type="submit" class="btn btn-primary">Logare</button></div>
    </div>
</form>
