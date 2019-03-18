<!-- Bootstrap CDNm -->
<link href="<?php echo base_url(); ?>assets/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
<!-- Custom CSS File-->
<link href="<?php echo base_url(); ?>assets/dist/css/custom.css" rel="stylesheet" type="text/css" />
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fas fa-file"></i>  Daily Rec Report
        <small>Daily Report Work in Progress</small>
      </h1>
    </section>
    <div class="client-buttons">
                  
        <?php echo '<a href=" '.base_url().'reports/viewDailyReportPDF/' .' ">View in PDF</a> ';?>

    </div> 
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
            </div>
        </div>
    </section>
</div>
