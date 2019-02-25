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
            <div class="col-md-12">
                <?php if(!empty($clientRecord)): ?>
                    <?php foreach($clientRecord as $client): ?>
                        <div class="client">
                            <div class="client-info">
                                <p class="client-code"><?php echo $client->client_code ?></p>
                                <ul class="client-details">
                                    <li>
                                        <span class="label">Name</span>
                                        <span class="detail">
                                            <?php echo "$client->last_name, $client->first_name"; ?>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="label">Phone</span>
                                        <span class="detail">
                                            <?php echo $client->home_phone; ?>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="label">Region</span>
                                        <span class="detail">
                                            <?php echo $client->location_name; ?>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="label">Birth Date</span>
                                        <span class="detail">
                                            <?php echo $client->client_birthdate; ?>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="client-buttons">
                                <a href="#">Add Food</a>
                                <a href="#">View Info</a>
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
