<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fas fa-file"></i>  All Reports
        <small>List view of all reports available</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
              <div class="box box-user">
                <div class="box-header">
                    <h3 class="box-title">Reports List</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                        <th>Name</th>
                        <th>Report ID</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($allreports))
                    {
                        foreach($allreports as $report)
                        {
                    ?>
                    <tr>
                        <td><?php echo $report->report_name ?></td>
                        <td><?php echo $report->report_id ?></td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-primary" href="<?= base_url().'reports/dailyRecReport/'.$report->report_id ?>" title="Login history"><i class="fa fa-history"></i> View Report</a> | 
                            <a class="btn btn-sm btn-info" href="#" title="Edit"><i class="fas fa-edit"></i>  Edit</a>
                            <!-- <a class="btn btn-sm btn-info" href="<?php echo base_url().'editOld/'.$record->userId; ?>" title="Edit"><i class="fas fa-edit"></i>  Edit</a> -->
                            <a class="btn btn-sm btn-danger deleteUser" href="#" data-userid="<?php echo $report->report_id; ?>" title="Delete"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
        </div>
    </section>
    
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "userListing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
