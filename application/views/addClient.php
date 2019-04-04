<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users green"></i> Add Client
        <small>Add new client record</small>
      </h1>
    </section>
    <section class="content client-form">
        <?php $this->load->helper("form"); ?>
        <form role="form" id="addClient" action="<?php echo base_url() ?>addNewClient" method="post" role="form">
            <div id="wizard">
                <!--Personal Information Tab-->
                <h3>Personal Information</h3>
                <div>
                    <div class="row">
                        <div class="col-md-12 form-heading first">
                            <h4>Personal Details</h4>
                        </div>
                    </div><!--End Outer Row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="fname"><span class="need">*</span> First Name</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('fname'); ?>" id="fname" name="fname" maxlength="70">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="fname"><span class="need">*</span> Last Name</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('lname'); ?>" id="lname" name="lname" maxlength="70">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="gender"><span class="need">*</span> Gender</label>
                                        <select class="form-control required" id="gender" name="gender">
                                            <option value="">Select</option>
                                            <option value="F" <?php if("F" == set_value('gender')) {echo "selected=selected";} ?>>F</option>
                                            <option value="M" <?php if("M" == set_value('gender')) {echo "selected=selected";} ?>>M</option>
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="fam-status"><span class="need">*</span> Family Status</label>
                                        <select class="form-control required" id="fam-status" name="fam-status">
                                            <option value="">Select Family Status</option>
                                            <?php foreach ($fstatusRecord as $fstatus): ?>
                                                    <option value="<?php echo $fstatus->fstatus_id ?>" <?php if($fstatus->fstatus_id == set_value('fam-status')) {echo "selected=selected";} ?>><?php echo $fstatus->fstatus_type ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group checkboxes">
                                        <label for="connected">Connected?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" name="connected" type="checkbox" id="connected" value="1">
                                        </div>
                                    </div>
                                </div>
                            </div><!--End Row-->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="id-type"><span class="need">*</span> Identification Type</label>
                                        <select class="form-control required" id="id-type" name="id-type">
                                            <option value="">Select ID Type</option>
                                            <?php foreach ($identificationRecord as $identification): ?>
                                                    <option value="<?php echo $identification->identification_id ?>" <?php if($identification->identification_id == set_value('id-type')) {echo "selected=selected";} ?>><?php echo $identification->identification_type ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="id-number">ID Number</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('id-number'); ?>" id="id-number" name="id-number" max-length="30">
                                </div>
                                <div class="col-md-2">
                                    <label for="xref-1">Xref 1</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('xref-1'); ?>" id="xref-1" name="xref-1">
                                </div>
                                <div class="col-md-2">
                                    <label for="xref-2">Xref 2</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('xref-2'); ?>" id="xref-2" name="xref-2">
                                </div>
                            </div><!--End Row-->
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="birth-date"><span class="need">*</span> Birth date</label>
                                        <input type="text" class="form-control required" id="birth-date" name="birth-date"/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <input type="text" class="form-control" value="<?php echo set_value('age'); ?>" id="age" name="age" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="home-phone"><span class="need">*</span> Home Phone</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('home-phone'); ?>" id="home-phone" name="home-phone">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="cell-phone">Cell Phone</label>
                                        <input type="text" class="form-control" value="<?php echo set_value('cell-phone'); ?>" id="cell-phone" name="cell-phone">
                                    </div>
                                </div>
                            </div><!--End Row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group checkboxes">
                                        <label for="s-diet" class="main-label">Special Diet</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="s-diet[]" type="checkbox" id="gluten-f" value="gluten-f" <?php echo set_checkbox('s-diet[]', 'gluten-f', false); ?>>
                                            <label class="form-check-label" for="gluten-f">Gluten Free</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="s-diet[]" type="checkbox" id="lactose-i" value="lactose-i" <?php echo set_checkbox('s-diet[]', 'lactose-i', false); ?>>
                                            <label class="form-check-label" for="lactose-i">Lactose Intolerant</label>
                                        </div> 
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="s-diet[]" type="checkbox" id="nut-free" value="nut-free" <?php echo set_checkbox('s-diet[]', 'nut-free', false); ?>>
                                            <label class="form-check-label" for="nut-free">Nut free</label>
                                        </div> 
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="s-diet[]" type="checkbox" id="vegetarian" value="vegetarian" <?php echo set_checkbox('s-diet[]', 'vegetarian', false); ?>>
                                            <label class="form-check-label" for="vegetarian">Vegetarian</label>
                                        </div> 
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="s-diet[]" type="checkbox" id="vegan" value="vegan" <?php echo set_checkbox('s-diet[]', 'vegan', false); ?>>
                                            <label class="form-check-label" for="vegan">Vegan</label>
                                        </div> 
                                    </div>
                                </div>
                            </div><!--End Row-->
                            <div class="row">
                                <div class="col-md-12 form-heading">
                                    <h4>FAMV</h4>
                                </div>
                            </div><!--End Row-->
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="famv">FAMV</label>
                                        <select class="form-control" id="famv" name="famv">
                                            <option value="">Select...</option>
                                            <option value="suspected" <?php if("suspected" == set_value('famv')) {echo "selected=selected";} ?>>Suspected</option>
                                            <option value="confirmed" <?php if("confirmed" == set_value('famv')) {echo "selected=selected";} ?>>Confirmed</option>
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="famv-date">FAMV date</label>
                                        <input type="text" class="form-control" id="famv-date" name="famv-date" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="famv-comments">FAMV Comments</label>
                                        <input type="text" class="form-control" value="<?php echo set_value('famv-comments'); ?>" id="famv-comments" name="famv-comments" max-length="100">
                                    </div> 
                                </div>
                            </div><!--End Row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="public-comments">Public Comments</label>
                                        <input type="text" class="form-control" value="<?php echo set_value('public-comments'); ?>" id="public-comments" name="public-comments">
                                    </div>
                                </div>
                            </div><!--End Row-->
                        </div>
                    </div><!--End Outer Row-->
                </div><!--End Personal Information Tab-->

                <!--Income/Residence Tab-->
                <h3>Income/Residence</h3>
                <div>
                    <div class="row">
                        <div class="col-md-12 form-heading first">
                            <h4>Residence</h4>
                        </div>
                    </div><!--End Outer Row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="address"><span class="need">*</span> Address</label>
                                    <select id="address-select" class="form-control required" name="address">
                                        <?php foreach ($addressRecord as $address): ?>
                                                <?php echo $address->household_id; ?>
                                                <option value="<?php echo $address->household_id ?>"><?php echo $address->address ?></option>
                                        <?php endforeach; ?>
                                    </select>


                                    <!-- <input type="text" class="form-control required" value="<?php echo set_value('address'); ?>" id="address" name="address" class="address" maxlength="150"> -->
                                </div>
                                <div class="col-md-3">
                                    <label for="city"><span class="need">*</span> City</label>
                                    <input type="text" class="form-control required" value="<?php echo set_value('city'); ?>" id="city" name="city" max-length="30">
                                </div>
                                <div class="col-md-2">
                                    <label for="province"><span class="need">*</span> Province</label>
                                    <select class="form-control required" id="province" name="province">
                                        <option value="AB" <?php if("AB" == set_value('province')) {echo "selected=selected";} ?>>AB</option>
                                        <option value="BC" <?php if("BC" == set_value('province')) {echo "selected=selected";} ?>>BC</option>
                                        <option value="SK" <?php if("SK" == set_value('province')) {echo "selected=selected";} ?>>SK</option>
                                        <option value="MB" <?php if("MB" == set_value('province')) {echo "selected=selected";} ?>>MB</option>
                                        <option value="ON" <?php if("ON" == set_value('province')) {echo "selected=selected";} ?>>ON</option>
                                        <option value="QC" <?php if("QC" == set_value('province')) {echo "selected=selected";} ?>>QC</option>
                                        <option value="NL" <?php if("NL" == set_value('province')) {echo "selected=selected";} ?>>NL</option>
                                        <option value="NB" <?php if("NB" == set_value('province')) {echo "selected=selected";} ?>>NB</option>
                                        <option value="NT" <?php if("NT" == set_value('province')) {echo "selected=selected";} ?>>NT</option>
                                        <option value="NS" <?php if("NS" == set_value('province')) {echo "selected=selected";} ?>>NS</option>
                                        <option value="NU" <?php if("NU" == set_value('province')) {echo "selected=selected";} ?>>NU</option>
                                        <option value="PE" <?php if("PE" == set_value('province')) {echo "selected=selected";} ?>>PE</option>
                                        <option value="YT" <?php if("YT" == set_value('province')) {echo "selected=selected";} ?>>YT</option>
                                    </select> 
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="postal-code"><span class="need">*</span> Postal Code</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('postal-code'); ?>" id="postal-code" name="postal-code" max-length="7">
                                    </div>
                                </div>
                            </div><!--End Row--> 
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="location"><span class="need">*</span> Region</label>
                                        <select class="form-control required" id="location" name="location">
                                            <option value="">Select Region</option>
                                            <?php foreach ($locationsRecord as $location): ?>
                                                    <option value="<?php echo $location->location_id ?>" <?php if($location->location_id == set_value('location')) {echo "selected=selected";} ?>><?php echo $location->location_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="ll-desc">Legal Land Desc.</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('ll-desc'); ?>" id="ll-desc" name="ll-desc" max-length="100">
                                </div>
                                <div class="col-md-3">
                                    <label for="l-type"><span class="need">*</span> Location Type</label>
                                    <select class="form-control required" id="l-type" name="l-type">
                                        <option value="">Select...</option>
                                        <option value="urban" <?php if("urban" == set_value('l-type')) {echo "selected=selected";} ?>>Urban</option>
                                        <option value="rural" <?php if("rural" == set_value('l-type')) {echo "selected=selected";} ?>>Rural</option>
                                    </select>  
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="proof-a">Proof of Address</label>
                                        <input type="text" class="form-control" value="<?php echo set_value('proof-a'); ?>" id="proof-a" name="proof-a" max-length="100">
                                    </div>
                                </div>
                            </div><!--End Row-->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="res-status-type"><span class="need">*</span> Residential Status</label>
                                        <select class="form-control required" id="res-status-type" name="res-status-type">
                                            <option value="">Select Type...</option>
                                            <?php foreach ($statusRecord as $status): ?>
                                                    <option value="<?php echo $status->status_id ?>" <?php if($status->status_type == set_value('res-status-type')) {echo "selected=selected";} ?>><?php echo $status->status_type ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="res-other">Other Residential Status</label>
                                            <input type="text" class="form-control" value="<?php echo set_value('res-other'); ?>" id="res-other" name="res-other" max-length="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="landlord">Landlord</label>
                                        <input type="text" class="form-control" value="<?php echo set_value('landlord'); ?>" id="landlord" name="landlord" max-length="70">
                                    </div>
                                </div>
                            </div><!--End Row-->
                            <div class="row">
                                <div class="col-md-12 form-heading">
                                    <h4>Income</h4>
                                </div>
                            </div><!--End Row-->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="primary-income-type"><span class="need">*</span> Primary Income Source</label>
                                        <select class="form-control required" id="primary-income-type" name="primary-income-type">
                                            <option value="">Select Type...</option>
                                            <?php foreach ($incomeRecord as $income): ?>
                                                    <option value="<?php echo $income->income_id ?>" <?php if($income->income_type == set_value('primary-income-type')) {echo "selected=selected";} ?>><?php echo $income->income_type ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="secondary-income-type"> Secondary Income Source</label>
                                        <select class="form-control" id="secondary-income-type" name="secondary-income-type">
                                            <option value="">Select Type...</option>
                                            <?php foreach ($incomeRecord as $income): ?>
                                                    <option value="<?php echo $income->income_id ?>" <?php if($income->income_type == set_value('secondary-income-type')) {echo "selected=selected";} ?>><?php echo $income->income_type ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="monthly-income"><span class="need">*</span> Total Monthly Income</label>
                                        <input type="text" class="form-control" value="<?php echo set_value('monthly-income'); ?>" id="monthly-income" name="monthly-income" max-length="6">
                                    </div>
                                </div>
                            </div><!--End Row-->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="res-amount"> Rent/Mortgage</label>
                                        <input type="text" class="form-control" value="<?php echo set_value('res-amount'); ?>" id="res-amount" name="res-amount" max-length="6">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="utilities">Utilities</label>
                                        <input type="text" class="form-control" value="<?php echo set_value('utilities'); ?>" id="utilities" name="utilities" max-length="6">
                                    </div>
                                </div>
                            </div><!--End Row-->
                        </div>
                    </div><!--End Outer Row-->
                </div><!--End Income/Residence Tab-->

                <!--Extra Details Tab-->
                <h3>Extra Details</h3>
                <div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Placeholder!</p>
                        </div>
                    </div>
                </div>

                <!--Adults/Children Tab-->
                <h3>Adults/Children</h3>
                <div>
                    <p>Placeholder!</p>
                </div><!--End Adults/Children Tab-->

                <!--Pounds Issued Tab-->
                <h3>Pounds Issued</h3>
                <div>
                    <p>Placeholder!</p>
                </div><!--End Pounds Issued Tab-->

                <!--Referrals Tab-->
                <h3>Referrals</h3>
                <div>
                    <p>Placeholder!</p>
                </div><!--End Referrals Tab-->
            </div><!--End Wizard-->
        </form>
    </section>






<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>
