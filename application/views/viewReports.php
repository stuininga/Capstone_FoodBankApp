<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> All Reports
        <small>Reports Testing</small>
      </h1>
    </section>
    <section class="content">
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
