<?php
	Assets::add_js( array( 'bootstrap.min.js', 'jwerty.js'), 'external', true);
	Assets::add_module_css('coins','style.css');
?>
<?php echo theme_view('partials/_header'); ?>

<div class="container-fluid body">
        <?php echo Template::message(); ?>

        <?php echo Template::yield(); ?>
</div>

<?php echo theme_view('partials/_footer'); ?>
