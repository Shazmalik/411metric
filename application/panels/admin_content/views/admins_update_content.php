<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Update User</h5>
			</div>
			<div class="ibox-content">
				<form  method="post" autocomplete="off" action="<?php echo $this->config->base_url();?>admin_content/admin_entry_update" class="form-horizontal" id="update_admin_form" name="update_admin_form"  enctype="multipart/form-data">
					<div class="form-group issue_system">
						<label class="col-sm-2 control-label">First Name*</label>
						<div class="col-sm-4">
						    <input type="text" name="first_name" id="first_name" placeholder="First Name" class="form-control" value="<?php echo $result->first_name;?>">
						</div>
						<label class="col-sm-2 control-label">Last Name*</label>
						<div class="col-sm-4">
						    <input type="text" name="last_name" id="last_name" placeholder="Last Name" class="form-control" value="<?php echo $result->last_name;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Email*</label>
						<div class="col-sm-4">
							<input type="text" name="email" id="email" placeholder="Email" class="form-control" value="<?php echo $result->email;?>">
						</div>
						
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<div class="col-sm-7 col-sm-offset-2 pull-right">
							<a href="<?php echo $this->config->base_url(); ?>admin/index" class="btn btn-white" >Cancel
							</a>
							<input type="hidden" name="user_id" id="user_id" value="<?php echo $result->id;?>">  
							<button class="btn btn-success" title="Update User" type="submit">Update
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
// $( document ).ready(function() {
//     $('#user_type').prop('disabled',true);
// });
	
$("#update_admin_form").validate({
    rules: {
    	first_name: {required:true
	  	},
	  	last_name: {required:true,
	  	},
	  	email: {required:true,
	  	},
  	},
  	messages: {
  		first_name:{required:"First Name is Required"}, 
        last_name:{required:"Last Name is Required"},   
  		email: {required: "Email is Required"},   	
    },
    tooltip_options: {
    	first_name: {placement:'top',html:true},
        last_name: {placement:'top',html:true},
    	email: {placement:'top',html:true}
    }
});	
</script>