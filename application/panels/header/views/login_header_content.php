<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo $this->config->base_url();?>r/img/crl-icon.png" rel="icon">
  	<link href="<?php echo $this->config->base_url();?>r/img/crl-icon.png" rel="apple-touch-icon">
    <title>Questionly.net | Dashboard | Questionly.net</title>

    <link href="<?php echo $this->config->base_url();?>r/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->base_url();?>r/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo $this->config->base_url();?>r/css/style.css" rel="stylesheet">
   	<link href="<?php echo $this -> config -> base_url(); ?>r/css/jquery.jgrowl.css" rel="stylesheet" type="text/css"/>
   	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet">

	<script type="text/javascript" src="<?php echo $this->config->base_url();?>r/js/jquery1.11.3.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->base_url();?>r/js/bootstrap3.3.4.min.js"></script>
	<script src="<?php echo $this -> config -> base_url(); ?>r/js/jquery.bootstrap-growl.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo $this -> config -> base_url(); ?>r/js/jquery.validate.js"></script>
	<script type="text/javascript" src="<?php echo $this -> config -> base_url(); ?>r/js/jquery-validate.bootstrap-tooltip.js"></script>

	<!-- Custom and plugin javascript -->
	<script src="<?php echo $this -> config -> base_url(); ?>r/js/inspinia.js"></script>
	<script src="<?php echo $this -> config -> base_url(); ?>r/js/plugins/pace/pace.min.js"></script>
	<script src="<?php echo $this -> config -> base_url(); ?>r/js/plugins/chartJs/Chart.min.js"></script>
	<script src="<?php echo $this -> config -> base_url(); ?>r/js/plugins/datetime/moment.min.js"></script>
	<script src="<?php echo $this -> config -> base_url(); ?>r/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo $this -> config -> base_url(); ?>r/js/plugins/metisMenu/jquery.metisMenu.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
</head>

    <?php
		if (isset($success_message) && $success_message!=""){ ?>
			<script>
			       setTimeout(function() {
			            $.bootstrapGrowl('<?php echo $success_message;?>', {
			                type: 'success',
			                align: 'right',
			                width: 'auto',
			                delay: 2000,
			                allow_dismiss: true
			            });
			        }, 1);
		    </script>
	<?php } ?>
	<?php
		if (isset($error_message) && $error_message!="" ){ 
			if(!isset($user_add_data['error_message'])){
				?>
				<script>
				   setTimeout(function() {
			            $.bootstrapGrowl('<?php echo $error_message;?>', {
			                type: 'danger',
			                align: 'right',
			                width: 'auto',
			                delay: 2000,
			                allow_dismiss: true
			            });
			        }, 1);
			    </script>
	   		<?php
			}
			if(isset($user_add_data['error_message'])){
				$error_message =  strip_tags($user_add_data['error_message']);
			    $error_message = str_replace(array("\r", "\n"), '', $error_message);
				$error_message= explode('.',$error_message);
	 			for($i=0; $i<count($error_message)-1; $i++){
  					$error = $error_message[$i];
        			if (isset($error) && trim($error) != "field is required"){ ?>
	        			<script>
					       setTimeout(function() {
					            $.bootstrapGrowl("<?php echo $error;?>", {
					                type: 'danger',
					                align: 'right',
					                width: 'auto',
					                delay: 2000,
					                allow_dismiss: true
					            });
					        }, 1);
					    </script>
        		<?php }	
				}
		 }
	} 
?>