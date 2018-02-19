<h2><?= $title ?></h2>
<?php if (sizeof($contents) != 0){ ?>
    <?php foreach($contents as $content) : ?>
    <h3><?php echo $content['title']; ?></h3>
     <div class="row">
         <div class="col-md-3">
             <img class="content-thumb thumbnail " src="<?php echo site_url(); ?>assets/images/contents/<?php echo $content['content_image']; ?>">
         </div>
         <div class="col-md-9">
            <small class="content-date">Posted on: <?php echo $content['created_at']; ?> in <strong><?php echo $content['name']; ?></strong></small>
             
            <?php echo word_limiter($content['body'], 60); ?>

            <br>
            <p><a class="btn btn-default" href="<?php echo base_url('/contents/'.$content['slug']); ?>">Read more</a></p>
        </div>
     </div>
<?php endforeach; ?>
<hr>
<div class="pagination-link">
    <?php echo $this->pagination->create_links(); ?>
</div><hr>
<?php } else { echo "No Content Found!";} ?>
