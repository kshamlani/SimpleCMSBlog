<h2><?= $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('contents/update'); ?>
 
 <input type="hidden" name="id" value="<?php echo $content['id']; ?>">
 
  <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control" placeholder="Add Title" value="<?php echo $content['title']; ?>">
  </div>
  
  <div class="form-group">
    <label>Body</label>
    <textarea id="editor1" class="form-control" placeholder="Add Body" name="body">
        <?php echo $content['body']; ?>
    </textarea>
  </div>
  
  <div class="form-group">
      <label>Category</label>
      <select name="category_id" class="form-control">
        <?php foreach($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
        <?php endforeach; ?>
      </select>
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
  
</form>