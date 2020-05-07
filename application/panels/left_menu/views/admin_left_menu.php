<nav class="navbar-default navbar-static-side side-bg" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav metismenu" id="side-menu">
			<li class="nav-header">
				<div class="dropdown profile-element">
					<div class="form-logo">
						<h1 class="logo-name">
							
						<img src="<?php echo $this->config->base_url() ?>r/img/logo.png" style="width:180px;" alt="">
						
						</h1>
					</div>
				</div>
				<div class="logo-element">
					PC
				</div>
			</li>
			<li class="<?php if($page_name=='admin') {echo "active"; }?>">
				<a href="<?php echo $this->config->base_url() ?>admin/index"><i class="fa fa-unlock-alt" aria-hidden="true"></i><span class="nav-label">User Crud</span></a>
			</li>
		</ul>
	</div>
</nav>
