<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5> All Users</h5>
                <div class="pull-right">
                    <a href="<?php echo $this->config->base_url() ?>admin/add"><button class="btn btn-success add-button-organizations" title="Add User">Add User</button>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="8">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th data-hide="all">First Name</th>
                                    <th data_hide="all">Last Time</th>
                                    <th data-hide="all">Email</th>
                                    <th data-hide="all">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($all_user) && (!empty($all_user))) {foreach ($all_user as $key => $value) {?>
                                <tr>
                                     <td><?php echo $value->id; ?></td>
                                    <td><?php echo $value->first_name; ?></td>
                                    <td><?php echo $value->last_name; ?></td>
                                    <td><?php echo $value->email; ?></td>
                                    <td>
                                        <a href="<?php echo $this->config->base_url(); ?>admin/edit?id=<?php echo $value->id; ?>" class="btn btn-success" data-toggle="tooltip" title="Edit Entry User"><span class="glyphicon glyphicon-pencil"></span></a>
                                    </td>
                                    <td>
                                        <a class="open-AddBookDialog-assign btn btn-danger btn-xs" data-id="<?php echo $value->id; ?>" data-title="Delete" data-toggle="modal" data-target="#assingModal" data-toggle="tooltip" title="Delete Entry User">
                                            <span class="glyphicon glyphicon-trash"></span>
                                         </a>
                                    </td>

                                </tr>
                                <?php
}
} else {
    ?>
                                <tr>
                                    <td colspan="14" style="text-align: center">
                                        No Record
                                    </td>
                                </tr>
                                <?php
$total = 0;
}
?>
                            </tbody>
                            <tr>
                                <td class="total" colspan="7">Total Records<b> <?php echo $total; ?></b></td>
                            </tr>
                            <tfoot>
                                <?php if (!empty($paginglinks)) {?>
                                <tr>
                                    <td colspan="12">
                                        <div class="pagination_ci" style="float:right;"> <?php echo $paginglinks; ?></div>
                                        <div class="pagination_ci" style="float:left;"> <?php echo (!empty($pagermessage) ? $pagermessage : ''); ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php }?>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="assingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p style="text-align: center;"><strong>Are you sure you want to Delete this?
       </strong></p>
        <div class="col-md-6 ">
            <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">NO</button>
        </div>
         <div class="col-md-6 ">
            <a href="" id="cancel" class="btn btn-danger pull-left">YES</a>
        </div>
        <div class="col-md-12">&nbsp;</div>
            <div style="clear:both"></div>
      </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div  class="col-sm-6 text-center">
            <label class="label label-success">User Graph</label>
            <div id="bar-chart" ></div>
        </div>
    </div>
</div>

<script>
  var serries = JSON.parse(`<?php echo $day_wise; ?>`);
  var data = serries,
    config = {
      data: data,
      xkey: 'y',
      ykeys: ['a'],
      labels: ['This Week Total Registered Users'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['gray','red']
  };

  //for mories bar chart
  config.element = 'bar-chart';
  Morris.Bar(config);


$(document).on("click", ".open-AddBookDialog-assign", function (){
    var orgid = $(this).data('id');
    old_href='<?php echo $this->config->base_url() . "admin_content/user_delete"; ?>';
    new_href= old_href+"?id="+orgid;
    $("#cancel").prop("href", new_href)
    return false;
});
</script>