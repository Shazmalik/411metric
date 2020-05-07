<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Add User</h5>
			</div>
			<div class="ibox-content">
			<form  method="post" action="<?php echo $this->config->base_url();?>admin_content/admin_create_user_submit" class="form-horizontal" id="add_admin_form" name="add_admin_form" 
				enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-sm-2 control-label">First Name*</label>
						<div class="col-sm-4">
						    <input type="text" name="first_name" id="first_name" placeholder="First Name" class="form-control" value="<?php if(isset($user_add_data['first_name'])){ echo $user_add_data['first_name'];}?>">
						</div>
						<label class="col-sm-2 control-label">Last Name*</label>
						<div class="col-sm-4">
						    <input type="text" name="last_name" id="last_name" placeholder="Last Name" class="form-control" value="<?php if(isset($user_add_data['last_name'])){ echo 
						    	$user_add_data['last_name'];}?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Email*</label>
						<div class="col-sm-4">
						    <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="<?php if(isset($user_add_data['email'])){ echo $user_add_data['email'];}?>">
						</div>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<div class="col-sm-7 col-sm-offset-2 pull-right">
							<a href="<?php echo $this->config->base_url(); ?>admin/index" class="btn btn-white">Cancel</a>
							<button class="btn btn-success" title="Add Admin" type="submit">Create</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$("#add_admin_form").validate({
        rules: {
        	first_name: {required:true
		  	},
		  	last_name: {required:true,
		  	},
        	user_type: {required:true,
		  	},
		  	email: {required:true,
		  	},
	  	},
	  	messages: {
	  		first_name:{required:"First Name is Required"}, 
	        last_name:{required:"Last Name is Required"},   
	  		user_type: {required: "User Type is Required"},
	  		email: {required: "Email is Required"},   	
	    },
        tooltip_options: {
        	first_name: {placement:'top',html:true},
            last_name: {placement:'top',html:true},
        	email: {placement:'top',html:true}
            
        }
	});	
</script>