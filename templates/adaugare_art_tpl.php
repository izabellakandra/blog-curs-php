<form class="form-horizontal tooltip-validation" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titlul" class="control-label col-md-offset-1 col-md-2">Titlul retetei: </label>
        <div class="col-md-8">
            <input type="text"  class="form-control" name="titlu" id="titlul" <?php if($values != NULL) echo 'value="'.$values['titlu'].'"'?> data-toggle="popover" data-placement="right" data-content="<?php if(isset($error['titlul'])) echo $error['titlul']; ?>">
        </div>
    </div>                              
    <div class="form-group">
        <label for="descrierea" class="control-label col-md-offset-1 col-md-2">Descrierea retetei: </label>
        <div class="col-md-8">
            <textarea rows="4" cols="50" class="form-control" style="resize:vertical;" name="continut" id="descrierea"  data-toggle="popover" data-placement="right" data-content="<?php if(isset($error['descrierea'])) echo $error['descrierea']; ?>"> <?php if($values != NULL) echo $values['continut']; ?></textarea>
        </div>
    </div>    
    <div class="form-group">
        <label for="userImage" class="control-label col-md-offset-1 col-md-2">Imagini: </label><div class="col-md-8" ><input type="file" class="file" name="caleImg" style="display:inline" id="img_art" data-toggle="popover" data-placement="right" data-content="<?php if(isset($error['img_art'])) echo $error['img_art']; ?>"></div>
    </div>    
    <div class="form-group">
        <div class="col-md-offset-5 col-md-7"><button type="submit" class="btn btn-primary">Publica reteta culinara</button></div>
    </div>
</form>
	
