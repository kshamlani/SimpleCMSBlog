<h2><?php echo $content['title']; ?></h2>
<img class="thumbnail thumb-set" src="<?php echo site_url(); ?>assets/images/contents/<?php echo $content['content_image']; ?>"><hr>
<br>
<div class="content-body">
    <?php echo $content['body']; ?>
</div>
<small class="content-date">Posted on: <?php echo $content['created_at']; ?></small>
<br>

<?php if($this->session->userdata('admin_id')) : ?>

    <a class="btn btn-default pull-left" href="<?php echo base_url(); ?>contents/edit/<?php echo $content['slug']; ?>">Edit</a>
    <?php echo form_open('/contents/delete/'.$content['id']); ?>
    <input type="submit" value="Delete" class="btn btn-danger">
    </form>
<?php endif; ?>
<hr>
<h3>Comments</h3>
<?php if($comments) : ?>
    
    <?php foreach($comments as $comment) : ?>
        <div class="well">
            <h5><?php echo $comment['body']; ?> <br> [by  <strong><?php echo $comment['name']; ?></strong> ] </h5>
        </div>
        
    <?php endforeach; ?>

<?php else : ?>
    
        <p>No Comments..</p>

<?php endif; ?>
<hr>
<h3>Add comment</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$content['id']); ?>

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
    </div>

    <div class="form-group">
        <label>Body</label>
        <textarea id="editor1" name="body" class="form-control"></textarea>
    </div>

    <input type="hidden" name="slug" value="<?php echo $content['slug']; ?>">
    <button class="btn btn-primary" type="submit">Submit</button>
    
</form>
