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
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname"><span class="need">*</span> First Name</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('fname'); ?>" id="fname" name="fname" maxlength="70">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname"><span class="need">*</span> Last Name</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('lname'); ?>" id="lname" name="lname" maxlength="70">
                                    </div>
                                </div>
                            </div><!--End Row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="location"><span class="need">*</span> Location</label>
                                        <select class="form-control required" id="location" name="location">
                                            <option value="">Select Region</option>
                                            <?php foreach ($locationsRecord as $location): ?>
                                                    <option value="<?php echo $location->location_id ?>" <?php if($location->location_id == set_value('location')) {echo "selected=selected";} ?>><?php echo $location->location_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
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
                                <div class="col-md-4">
                                    <select class="form-control required" id="birth-month" name="birth-month">
                                        <option value="">Month</option>
                                        <?php for($month=1; $month<=12; $month++): ?>
                                            <option value="<?php echo $month; ?>" <?php if($month == set_value('birth-month')) {echo "selected=selected";} ?>><?php echo date('F', mktime(0, 0, 0, $month, 1)); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control required" id="birth-day" name="birth-day">
                                        <option value="">Day</option>
                                        <?php for($date=1; $date<=31; $date++): ?>
                                            <option value="<?php echo $date ?>" <?php if($date == set_value('birth-day')) {echo "selected=selected";} ?>><?php echo $date; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select class="form-control required" id="birth-year" name="birth-year">
                                        <option value="">Year</option>
                                        <?php for($year=date("Y"); $year>=(date("Y")-120); $year--): ?>
                                            <option value="<?php echo $year; ?>" <?php if($year == set_value('birth-year')) {echo "selected=selected";} ?>><?php echo $year; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div><!--End Row-->
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" name="insert" value="Insert" />
                            <input type="reset" class="btn btn-default" value="Reset" />
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