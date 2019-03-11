<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users green"></i> Search Clients
        <small>View Clients</small>
      </h1>
    </section>
    <section class="content">
        <div class="row search-fields">
            <div class="col-md-12">
                <div class="box box-green">
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="searchClients" action="<?php echo base_url() ?>searchClients" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-2">                                
                                    <div class="form-group">
                                        <label for="fname-s">First Name</label>
                                        <input type="text" class="form-control" value="<?php echo set_value('fname-s'); ?>" id="fname-s" name="fname-s" maxlength="70">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="lname-s">Last Name</label>
                                        <input type="text" class="form-control" value="<?php echo set_value('lname-s'); ?>" id="lname-s" name="lname-s" maxlength="70">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fname-s">Home Phone Number</label>
                                        <div class="phone-search">
                                            <div>
                                                <input type="text" class="form-control" value="<?php echo set_value('phone-s1'); ?>" id="phone-s1" name="phone-s1" placeholder="###">
                                                <span>-</span>
                                            </div>
                                            <div>
                                                <input type="text" class="form-control" value="<?php echo set_value('phone-s2'); ?>" id="phone-s2" name="phone-s2" placeholder="###">
                                                <span>-</span>
                                            </div>
                                            <div>
                                                <input type="text" class="form-control" value="<?php echo set_value('phone-s3'); ?>" id="phone-s3" name="phone-s3" placeholder="####">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="location-s">Location</label>
                                        <select class="form-control" id="location-s" name="location-s">
                                            <option value="">Select Region</option>
                                            <?php foreach ($locationsRecord as $location): ?>
                                                    <option value="<?php echo $location->location_id ?>" <?php if($location->location_id == set_value('location')) {echo "selected=selected";} ?>><?php echo $location->location_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group row-buttons">
                                        <input type="submit" name="search-button" class="btn btn-primary btn-block btn-flat" value="Search" />
                                    </div>
                                </div>
                            </div><!--End row-->
                        </div><!--End box-body-->
                    </div><!--End of box-->
                </form>
            </div>
        </div><!--End of search-fields-->
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty($noRecords)) {
                    echo "<p>$noRecords</p>";
                } ?>
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
                                            <?php 
                                                $phoneNumber = $client->home_phone;
                                                $formatted = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $phoneNumber);
                                                echo $formatted; 
                                            ?>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="label">Region</span>
                                        <span class="detail">
                                            <?php echo $client->location_name; ?>
                                        </span>
                                    </li>
                                    <li>                                        
                                        <?php 
                                            //Split birthdate to format prettily
                                            $birthDate = explode('-', $client->client_birthdate);

                                            //Get the name of the month for display instead of the number
                                            $dateObj = DateTime::createFromFormat('!m', $birthDate[1]);
                                            $monthName = $dateObj->format('F');

                                            //Only display the first 3 characters
                                            $monthName = substr($monthName, 0, 3);

                                            //Put the date back together
                                            $formattedDate = $monthName . " " . $birthDate[2] . ", " . $birthDate[0];
                                        ?>
                                        <span class="label">Birth Date</span>
                                        <span class="detail">
                                            <?php echo $formattedDate; ?>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="client-buttons">
                                <a href="#">Add Food</a>
                                <a href="<?php echo base_url()?>editClient?id=<?php echo $client->client_code; ?>">View/Edit Info</a>
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
