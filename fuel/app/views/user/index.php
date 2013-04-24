<h2>Listing Users</h2>
<br>
<?php if ($users): ?>
	<?php echo Pagination::create_links();?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Age</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $user): ?>		<tr>

			<td><?php echo $user->name; ?></td>
			<td><?php echo $user->age; ?></td>
			<td>
				<?php echo Html::anchor('user/view/'.$user->id, 'View'); ?> |
				<?php echo Html::anchor('user/edit/'.$user->id, 'Edit'); ?> |
				<?php echo Html::anchor('user/delete/'.$user->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Users.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('user/create', 'Add new User', array('class' => 'btn btn-success')); ?>
</p>
