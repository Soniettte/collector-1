<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/reports/collections') ?>" id="list"><?php echo lang('collections_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Collections.Reports.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/reports/collections/create') ?>" id="create_new"><?php echo lang('collections_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>