<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/content/coins') ?>" id="list"><?php echo lang('coins_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Coins.Content.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/content/coins/create') ?>" id="create_new"><?php echo lang('coins_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>