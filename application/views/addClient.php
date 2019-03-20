<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users green"></i> Add Client
        <small>Add New Client</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                <div class="box box-green">
                    <div class="box-header">
                        <h3 class="box-title">Enter Client Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addClient" action="<?php echo base_url() ?>addNewClient" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname"><span class="need">*</span> First Name</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('fname'); ?>" id="fname" name="fname" maxlength="70">
                                    </div>
                                </div>
                                <div class="col-md-4">
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
                            </div><!--End Row-->
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="address"><span class="need">*</span> Address</label>
                                    <input type="text" class="form-control required" value="<?php echo set_value('address'); ?>" id="address" name="address" maxlength="150">
                                </div>
                                <div class="col-md-3">
                                    <label for="city"><span class="need">*</span> City</label>
                                    <input type="text" class="form-control required" value="<?php echo set_value('city'); ?>" id="city" name="city" max-length="70">
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
                                <div class="col-md-4">
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
                            </div><!--End Row-->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="proof-a">Proof of Address</label>
                                        <input type="text" class="form-control" value="<?php echo set_value('proof-a'); ?>" id="proof-a" name="proof-a" max-length="100">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="landlord">Landlord</label>
                                        <input type="text" class="form-control" value="<?php echo set_value('landlord'); ?>" id="landlord" name="landlord" max-length="70">
                                    </div>
                                </div>
                            </div><!--End Row-->
                            <!--Phone Numbers-->
                            <div class="row">
                                <div class="col-md-6 box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="home-phone"><span class="need">*</span> Home Phone</label>
                                        </div>
                                    </div><!--End Row-->
                                    <div class="row">
                                        <div class="col-md-4 phone">
                                            <input type="text" class="form-control required" value="<?php echo set_value('home-phone1'); ?>" id="home-phone1" name="home-phone1" placeholder="###">
                                            <span>-</span>
                                        </div>
                                        <div class="col-md-4 phone">
                                            <input type="text" class="form-control required" value="<?php echo set_value('home-phone2'); ?>" id="home-phone2" name="home-phone2" placeholder="###">
                                            <span>-</span>
                                        </div>
                                        <div class="col-md-4 phone">
                                            <input type="text" class="form-control required" value="<?php echo set_value('home-phone3'); ?>" id="home-phone3" name="home-phone3" placeholder="####">
                                        </div>
                                    </div><!--End Row-->
                                </div><!--End of inner box-body-->
                                <div class="col-md-6 box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <label for="cell-phone">Cell Phone</label>
                                        </div>
                                    </div><!--End Row-->
                                    <div class="row">
                                        <div class="col-md-4 phone">
                                            <input type="text" class="form-control required" value="<?php echo set_value('cell-phone1'); ?>" id="cell-phone1" name="cell-phone1" placeholder="###">
                                            <span>-</span>
                                        </div>
                                        <div class="col-md-4 phone">
                                            <input type="text" class="form-control required" value="<?php echo set_value('cell-phone2'); ?>" id="cell-phone2" name="cell-phone2" placeholder="###">
                                            <span>-</span>
                                        </div>
                                        <div class="col-md-4 phone">
                                            <input type="text" class="form-control required" value="<?php echo set_value('cell-phone3'); ?>" id="cell-phone3" name="cell-phone3" placeholder="####">
                                        </div>
                                    </div><!--End Row-->
                                </div><!--End of inner box-body-->
                            </div><!--End Row-->   
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="birthdate"><span class="need">*</span> Birth Date</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control required" id="birth-month" name="birth-month">
                                            <option value="">Month</option>
                                            <?php for($month=1; $month<=12; $month++): ?>
                                                <option value="<?php echo $month; ?>" <?php if($month == set_value('birth-month')) {echo "selected=selected";} ?>><?php echo date('F', mktime(0, 0, 0, $month, 1)); ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control required" id="birth-day" name="birth-day">
                                        <option value="">Day</option>
                                        <?php for($date=1; $date<=31; $date++): ?>
                                            <option value="<?php echo $date ?>" <?php if($date == set_value('birth-day')) {echo "selected=selected";} ?>><?php echo $date; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control required" id="birth-year" name="birth-year">
                                        <option value="">Year</option>
                                        <?php for($year=date("Y"); $year>=(date("Y")-120); $year--): ?>
                                            <option value="<?php echo $year; ?>" <?php if($year == set_value('birth-year')) {echo "selected=selected";} ?>><?php echo $year; ?></option>
                                        <?php endfor; ?>
                                    </select>
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
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="famv">FAMV</label>
                                        <select class="form-control" id="famv" name="famv">
                                            <option value="">Select...</option>
                                            <option value="suspected" <?php if("suspected" == set_value('famv')) {echo "selected=selected";} ?>>Suspected</option>
                                            <option value="2" <?php if("2" == set_value('famv')) {echo "selected=selected";} ?>>2</option>
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label for="famv-month">FAMV Date</label>
                                    <select class="form-control" id="famv-month" name="famv-month">
                                        <option value="">Month</option>
                                        <?php for($month=1; $month<=12; $month++): ?>
                                            <option value="<?php echo $month; ?>" <?php if($month == set_value('famv-month')) {echo "selected=selected";} ?>><?php echo date('F', mktime(0, 0, 0, $month, 1)); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="famv-day" class="no-label"></label>
                                    <select class="form-control" id="famv-day" name="famv-day">
                                        <option value="">Day</option>
                                        <?php for($date=1; $date<=31; $date++): ?>
                                            <option value="<?php echo $date ?>" <?php if($date == set_value('famv-day')) {echo "selected=selected";} ?>><?php echo $date; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="famv-year" class="no-label"></label>
                                    <select class="form-control" id="famv-year" name="famv-year">
                                        <option value="">Year</option>
                                        <?php for($year=date("Y"); $year>=(date("Y")-120); $year--): ?>
                                            <option value="<?php echo $year; ?>" <?php if($year == set_value('famv-year')) {echo "selected=selected";} ?>><?php echo $year; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="famv-comments">FAMV Comments</label>
                                        <input type="text" class="form-control" value="<?php echo set_value('famv-comments'); ?>" id="famv-comments" name="famv-comments" max-length="100">
                                    </div> 
                                </div>
                            </div><!--End Row-->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="id-type"><span class="need">*</span> Identification Type</label>
                                        <select class="form-control required" id="id-type" name="id-type">
                                            <option value="">Select ID Type</option>
                                            <?php foreach ($identificationRecord as $identification): ?>
                                                    <option value="<?php echo $identification->identification_id ?>" <?php if($identification->identification_type == set_value('identification')) {echo "selected=selected";} ?>><?php echo $identification->identification_type ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="id-number">ID Number</label>
                                    <input type="text" class="form-control" value="<?php echo set_value('id-number'); ?>" id="id-number" name="id-number" max-length="30">
                                </div>
                            </div><!--End Row-->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="primary-income-type"><span class="need">*</span> Primary Income Source</label>
                                        <select class="form-control required" id="primary-income-type" name="primary-income-type">
                                            <option value="">Select Income Type</option>
                                            <?php foreach ($incomeRecord as $income): ?>
                                                    <option value="<?php echo $income->income_id ?>" <?php if($income->income_type == set_value('primary-income-type')) {echo "selected=selected";} ?>><?php echo $income->income_type ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="secondary-income-type"><span class="need">*</span> Secondary Income Source</label>
                                        <select class="form-control required" id="secondary-income-type" name="secondary-income-type">
                                            <option value="">Select Income Type</option>
                                            <?php foreach ($incomeRecord as $income): ?>
                                                    <option value="<?php echo $income->income_id ?>" <?php if($income->income_type == set_value('secondary-income-type')) {echo "selected=selected";} ?>><?php echo $income->income_type ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div><!--End Row-->
                        </div><!-- /.box-body -->
    
                        <div class="box-footer form-buttons">
                            <input type="submit" class="btn btn-primary client-primary" name="insert" value="Insert" />
                            <input type="reset" class="btn btn-default secondary" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    
</div>
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>
