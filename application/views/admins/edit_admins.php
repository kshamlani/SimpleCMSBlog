<h2><?= $title ?></h2>
<ul list-group>
	<?php foreach($admins as $admin): ?>
		<li class="list-group-item">
			<a href="<?php echo site_url('/admins/edit_admin/'.$admin['id']); ?>"><?php echo ucfirst($admin['username']); ?></a>
			<input type="button" class="btn-link text-danger" data-toggle="modal" data-target="#myModal<?php echo $admin['id']; ?>" value="&cross;">

			
			<!-- Modal -->
			<div class="modal fade" id="myModal<?php echo $admin['id']; ?>" role="dialog">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Confirmation</h4>
						</div>
						<div class="modal-body">
							<p> Do you want to delete the admin: <?php echo ucfirst($admin['username']); ?></p>
						</div>
						<div class="modal-footer">
							<a href="<?php echo base_url(); ?>/admins/delete_admin/<?php echo $admin['id']; ?>" class="btn btn-danger">Delete</a>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</li>
	<?php endforeach; ?>
</ul>