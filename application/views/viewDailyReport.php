<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Daily Rec Report
        <small>Daily Report Work in Progress</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                
                <table class="table table-striped">
                  <tr>
                    <th>Client ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                  </tr>
                  <?php if(!empty($dailyReport)): ?>
                  <?php foreach($dailyReport as $report): ?>
                  <tr>
                    <td><?php echo $report->client_code ?></td>
                    <td><?php echo $report->first_name ?></td>
                    <td><?php echo $report->last_name ?></td>
                  </tr>       
                  <?php endforeach; ?>
                  <?php endif; ?>
                </table>
                <div class="client-buttons">
                  
                    <?php echo '<a href=" '.base_url().'reports/viewDailyReportPDF/' .' ">View in PDF</a> ';?>

                </div> 
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
