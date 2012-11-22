<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/settings/collections') ?>" id="list"><?php echo lang('collections_list'); ?></a>
	</li>
	<?php if ($this->auth->has_permission('Collections.Settings.Create')) : ?>
	<li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?> >
		<a href="<?php echo site_url(SITE_AREA .'/settings/collections/create') ?>" id="create_new"><?php echo lang('collections_new'); ?></a>
	</li>
	<?php endif; ?>
</ul>