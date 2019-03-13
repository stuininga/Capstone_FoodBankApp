<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> All Reports
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
              <div class="box box-user">
                <div class="box-header">
                    <h3 class="box-title">Reports List</h3>
                    <div class="box-tools">
                        <!-- <form action="<?php echo base_url() ?>userListing" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form> -->
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                        <th>Name</th>
                        <th>Report ID</th>
                        <!-- <th>Role</th>
                        <th>Date Created</th> -->
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
                        <!-- <td><?php echo $record->role ?></td>
                        <td><?php echo date("d-m-Y", strtotime($record->createdDtm)) ?></td> -->
                        <td class="text-center">
                            <a class="btn btn-sm btn-primary" href="<?= base_url().'reports/viewPDF/'.$report->report_id ?>" title="Login history"><i class="fa fa-history"></i> View Report</a> | 
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
                <div class="row">
                    <div class="col-xs-12 text-right">
                        <div class="form-group">
                            <a class="btn btn-primary button" href="<?php echo base_url(); ?>addNew"><i class="fa fa-plus"></i> Add New</a>
                        </div>
                    </div>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
    <!-- <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty($allreports)): ?>
                    <?php foreach($allreports as $report): ?>
                        <div class="client">
                            <div class="client-info">
                                <p class="client-code"><?php echo $report->report_id ?></p>
                                <ul class="client-details">
                                    <li>
                                        <span class="label">Name</span>
                                        <span class="detail">
                                            <?php echo "$report->report_name"; ?>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="client-buttons">
                                <?php echo '<a href=" '.base_url().'reports/viewPDF/' .$report->report_id.' ">View in PDF</a> '; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section> -->
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
