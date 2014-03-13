<div id="header">
	<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
	<?php bloginfo('description'); ?>
	<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('head_wgt') ) : ?>
		<h3>head_wgt - Delete this in header.php if not needed</h3>
	<?php endif; ?>
</div>
