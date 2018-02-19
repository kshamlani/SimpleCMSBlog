<?php echo validation_errors(); ?>

<?php echo form_open('admins/register'); ?>

    <div class="row">
       <div class="col-md-4 col-md-offset-4">
          <h1 class="text-center"><?= $title; ?></h1>
            <div class="form_group">
                <label></label>
                <input type="text" class="form-control" name="username" placeholder="Username"> 
            </div>
            <div class="form_group">
                <label></label>
                <input type="password" class="form-control" name="password" placeholder="Password"> 
            </div>
            <div class="form_group">
                <label></label>
                <input type="password" class="form-control" name="password2" placeholder="Confirm Password"> 
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
       
       </div>        
    </div>

<?php echo form_close(); ?>


