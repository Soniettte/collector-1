<div class="admin-box">
	<h3>Collections</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Collections.Content.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>User</th>
					<th>Coin</th>
					<th>Have</th>
					<th>Wish</th>
					<th>Options</th>
					<th>Deleted</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Collections.Content.Delete')) : ?>
				<tr>
					<td colspan="7">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php echo lang('collections_delete_confirm'); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Collections.Content.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php if ($this->auth->has_permission('Collections.Content.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/content/collections/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $record->collections_user_id) ?></td>
				<?php else: ?>
				<td><?php echo $record->collections_user_id ?></td>
				<?php endif; ?>
			
				<td><?php echo $record->collections_coin_id?></td>
				<td><?php echo $record->collections_have?></td>
				<td><?php echo $record->collections_wish?></td>
				<td><?php echo $record->collections_options?></td>
				<td><?php echo $record->deleted > 0 ? lang('collections_true') : lang('collections_false')?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="7">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>