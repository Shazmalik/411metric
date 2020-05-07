<html>
	<?php echo Modules::run('header/header/admin_header'); ?>
	<body>
		<div id="wrapper">
		<?php echo Modules::run('left_menu/Left_menu/admin'); ?>
	        <div id="page-wrapper" class="gray-bg">
	        	<?php echo Modules::run('top_menu/top_menu/admin'); ?>
	            <?php echo Modules::run('admin_content/admin_content/admin_user_add'); ?> 
	        </div>
		</div>
	</body>
</html>
