<div class="admin-box">
	<h3>Coins</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<?php if ($this->auth->has_permission('Coins.Reports.Delete') && isset($records) && is_array($records) && count($records)) : ?>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<?php endif;?>
					
					<th>Value</th>
					<th>Country</th>
					<th>Year</th>
					<th>Title</th>
					<th>Varient</th>
					<th>Picture National Side</th>
					<th>Picture Common Side</th>
					<th>Deleted</th>
				</tr>
			</thead>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<tfoot>
				<?php if ($this->auth->has_permission('Coins.Reports.Delete')) : ?>
				<tr>
					<td colspan="9">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" id="delete-me" class="btn btn-danger" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php echo lang('coins_delete_confirm'); ?>')">
					</td>
				</tr>
				<?php endif;?>
			</tfoot>
			<?php endif; ?>
			<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<tr>
					<?php if ($this->auth->has_permission('Coins.Reports.Delete')) : ?>
					<td><input type="checkbox" name="checked[]" value="<?php echo $record->id ?>" /></td>
					<?php endif;?>
					
				<?php
					switch ($record->coins_value) {
						case '1':
							$value = '0,01 €';
							break;
						
						case '2':
							$value = '0,02 €';
							break;
						
						case '3':
							$value = '0,05 €';
							break;
						
						case '4':
							$value = '0,10 €';
							break;
						
						case '5':
							$value = '0,20 €';
							break;
						
						case '6':
							$value = '0,50 €';
							break;
						
						case '7':
							$value = '1,00 €';
							break;
						
						case '8':
							$value = '2,00 €';
							break;						
						
					}
				?>

				<?php if ($this->auth->has_permission('Coins.Reports.Edit')) : ?>
				<td><?php echo anchor(SITE_AREA .'/reports/coins/edit/'. $record->id, '<i class="icon-pencil">&nbsp;</i>' .  $value) ?></td>
				<?php else: ?>
				<td><?php echo $value ?></td>
				<?php endif; ?>
			
				<td><?php echo $record->coins_country?></td>
				<td><?php echo $record->coins_year?></td>
				<td><?php echo $record->coins_title?></td>
				<td><?php echo $record->coins_varient?></td>
				<td><?php echo $record->coins_national_side?></td>
				<td><?php echo $record->coins_common_side?></td>
				<td><?php echo $record->deleted > 0 ? lang('coins_true') : lang('coins_false')?></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="9">No records found that match your selection.</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	<?php echo form_close(); ?>
</div>