<div class="admin-box">
	
	<div id="tabContainer">
		<div id="tabs">
		  <ul>
			<li id="tabHeader_de"><?php echo lang('de'); ?></li>
			<li id="tabHeader_at"><?php echo lang('at'); ?></li>
			<li id="tabHeader_be"><?php echo lang('be'); ?></li>
			<li id="tabHeader_cy"><?php echo lang('cy'); ?></li>
			<li id="tabHeader_sk"><?php echo lang('sk'); ?></li>
			<li id="tabHeader_si"><?php echo lang('si'); ?></li>
			<li id="tabHeader_es"><?php echo lang('es'); ?></li>
			<li id="tabHeader_ee"><?php echo lang('ee'); ?></li>
			<li id="tabHeader_fi"><?php echo lang('fi'); ?></li>
			<li id="tabHeader_fr"><?php echo lang('fr'); ?></li>
			<li id="tabHeader_gr"><?php echo lang('gr'); ?></li>
			<li id="tabHeader_ie"><?php echo lang('ie'); ?></li>
			<li id="tabHeader_it"><?php echo lang('it'); ?></li>
			<li id="tabHeader_lu"><?php echo lang('lu'); ?></li>
			<li id="tabHeader_mt"><?php echo lang('mt'); ?></li>
			<li id="tabHeader_nl"><?php echo lang('nl'); ?></li>
			<li id="tabHeader_pt"><?php echo lang('pt'); ?></li>
			<li id="tabHeader_mc"><?php echo lang('mc'); ?></li>
			<li id="tabHeader_sm"><?php echo lang('sm'); ?></li>
			<li id="tabHeader_va"><?php echo lang('va'); ?></li>
			
			
		  </ul>
		</div>
		
		
        <div id="tabscontent">
			<div class="tabpage" id="tabpage_de">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Value</th>
							<th>Year</th>
							<th>Title</th>
							<th>Varient</th>
							<th>Picture National Side</th>
							<th>Picture Common Side</th>
							<th>Have</th>
							<th>Wish</th>
						</tr>
					</thead>
			
					<tbody>
			<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<?php if ($record->coins_country == 'de') : ?>
						<tr>
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
			
							<td><?php echo $value ?></td>
							<td><?php echo $record->coins_year?></td>
							<td><?php echo $record->coins_title?></td>
							<td><?php echo $record->coins_varient?></td>
							<?php $atr["height"] = 50; ?>                          
							<td><?php echo Assets::image(base_url(str_replace(FCPATH, '' , module_file_path('coins', 'assets/images', $record->coins_national_side))), $atr); ?></td>
							<td><?php echo Assets::image(base_url(str_replace(FCPATH, '' , module_file_path('coins', 'assets/images', $record->coins_common_side))), $atr); ?></td>
							<td><?php echo $record->collections_have ?></td>
							<td><?php echo $record->collections_wish ?></td>
						</tr>
						<?php endif;?>
					<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="9">No records found that match your selection.</td>
						</tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
			<div class="tabpage" id="tabpage_at">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Value</th>
							<th>Year</th>
							<th>Title</th>
							<th>Varient</th>
							<th>Picture National Side</th>
							<th>Picture Common Side</th>
							<th>Have</th>
							<th>Wish</th>
						</tr>
					</thead>
					
					<tbody>
					<?php if (isset($records) && is_array($records) && count($records)) : ?>
					<?php foreach ($records as $record) : ?>
						<?php if ($record->coins_country == 'at') : ?>
						<tr>
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
			
							<td><?php echo $value ?></td>
							<td><?php echo $record->coins_year?></td>
							<td><?php echo $record->coins_title?></td>
							<td><?php echo $record->coins_varient?></td>
							<?php $atr["height"] = 50; ?>                          
							<td><?php echo Assets::image(base_url(str_replace(FCPATH, '' , module_file_path('coins', 'assets/images', $record->coins_national_side))), $atr); ?></td>
							<td><?php echo Assets::image(base_url(str_replace(FCPATH, '' , module_file_path('coins', 'assets/images', $record->coins_common_side))), $atr); ?></td>
							<td><?php echo $record->collections_have ?></td>
							<td><?php echo $record->collections_wish ?></td>
						</tr>
						<?php endif;?>
					<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="9">No records found that match your selection.</td>
						</tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
			<div class="tabpage" id="tabpage_be">
				<table class="table table-striped"></table>
			</div>
			<div class="tabpage" id="tabpage_cy">
				<table class="table table-striped"></table>
			</div>
			<div class="tabpage" id="tabpage_sk">
				<table class="table table-striped"></table>
			</div>
			<div class="tabpage" id="tabpage_si">
				<table class="table table-striped"></table>
			</div>
			<div class="tabpage" id="tabpage_es">
				<table class="table table-striped"></table>
			</div>
			<div class="tabpage" id="tabpage_ee">
				<table class="table table-striped"></table>
			</div>
			<div class="tabpage" id="tabpage_fi">
				<table class="table table-striped"></table>
			</div>
			<div class="tabpage" id="tabpage_fr">
				<table class="table table-striped"></table>
			</div>
			<div class="tabpage" id="tabpage_gr">
				<table class="table table-striped"></table>
			</div>
			<div class="tabpage" id="tabpage_ie">
				<table class="table table-striped"></table>
			</div>
			<div class="tabpage" id="tabpage_it">
				<table class="table table-striped"></table>
			</div>
			<div class="tabpage" id="tabpage_lu">
				<table class="table table-striped"></table>
			</div>
			<div class="tabpage" id="tabpage_mt">
				<table class="table table-striped"></table>
			</div>
			<div class="tabpage" id="tabpage_nl">
				<table class="table table-striped"></table>
			</div>
			<div class="tabpage" id="tabpage_pt">
				<table class="table table-striped"></table>
			</div>
			<div class="tabpage" id="tabpage_mc">
				<table class="table table-striped"></table>
			</div>
			<div class="tabpage" id="tabpage_sm">
				<table class="table table-striped"></table>
			</div>
			<div class="tabpage" id="tabpage_va">
				<table class="table table-striped"></table>
			</div>
		</div>
	

</div>