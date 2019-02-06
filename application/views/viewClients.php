<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> All Clients
        <small>Client Testing 123</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                    <?php
                    if(!empty($clientRecord))
                    {
                        foreach($clientRecord as $client)
                        {
                    ?>
                        <p>First Name: <?php echo $client->first_name ?></p>
                        <p>Last Name: <?php echo $client->last_name ?></p>
                        <p>Client Code: <?php echo $client->client_code ?></p>
                    <?php
                        }
                    }
                    ?>
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
