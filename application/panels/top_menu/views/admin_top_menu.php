<div class="row border-bottom">
	<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<a class="navbar-minimalize minimalize-styl-2 btn btn-success " href="#"><i class="fa fa-bars"></i> </a>
		</div>
		<div style="float:right;margin-right:30px">
			<?php echo $this->session->userdata('username') ?> <b class="caret" ></b></a>
                <li>
                    <a href="<?php echo site_url() ?>admin_content/admin_content/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
			</ul>
</div>
	</nav>
</div>