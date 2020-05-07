<?php $this->load->view('common/css_link')?>
<br/>
   <div class="row">
                    <div class="col-lg-12"><div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-success">
                    <div class="panel-heading">
                        <h2 class="panel-title text-center">Please Sign In</h2>
                    </div>
                    <div class="panel-body log_in_panel">

					<form  method="post" action="<?php echo $this->config->base_url();?>admin_content/user_login" class="form-horizontal" id="log_in_panel" name="log_in_panel" 
				enctype="multipart/form-data">
				<fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="User Name" name="username" type="text" autofocus >

                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>

                                <!-- Change this to a button or input when using this as a form -->

                                <input type="submit" value="Login" class="btn btn-lg btn-danger btn-block" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<script type="text/javascript">
$("#log_in_panel").validate({
        rules: {
        	username: {required:true
		  	},
		  	password: {required:true,
		  	}
	  	},
	  	messages: {
			username:{required:"User Name is Required"}, 
	        password:{required:"Password is Required"}
	    },
        tooltip_options: {
        	username: {placement:'top',html:true},
            password: {placement:'top',html:true},            
        }
	});	
</script>
