

    <!-- <footer class="main-footer">
        <strong>Copyright &copy; <?php //echo date("Y"); ?> Leduc Food Bank</strong> 
    </footer> -->
    
    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/jquery.maskedinput.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/custom.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/typeahead.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/jquery-editable-select.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');

        

        //Typeahead
        $(document).ready(function () {
            $('.address').typeahead({
                source: function (query, result) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>application/views/includes/server.php",
                        data: 'query=' + query,            
                        dataType: "json",
                        type: "POST",
                        success: function (data) {
                            result($.map(data, function (item) {
                                return item;
                            }));
                        }
                    });
                }
            });
        });
</script>

    <script>
        //Store access to address-select
        var select = $('#address-select');

        // Editable Select
        select.editableSelect();

        //Begin collecting values for submission
        var clientValues = [];
        var householdValues = [];
         
        //If the user types into the address select, collect values for a new household 
        select.change(function(e) {
            householdValues['city'] = $('#city').val();

            console.log(clientValues);
            console.log(householdValues);
        });

        //If the user selects from the address select, populate the form
        select.on('select.editable-select', function(e) {
            //Get the values from the select
            var household_id = $('.es-list li.selected').val();
            var location_id = "";
            var address = $('.es-list li.selected').text();

            clientValues['household_id'] = household_id;

            // console.log("ID: " + household_id);
            // console.log("Address: " + address);

            console.log(clientValues);
            console.log(householdValues);

        });


        // Date picker to get client's birth date and age
        $("#birth-date").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: 'c-120:c',
            onSelect: function(e) {
                //Get the date from the datepicker
                var date = $("#birth-date").val();

                //Add the birthdate to the client array
                clientValues['client_birthdate'] = date;
                
                //Update the age field
                var age = calculateAge(date);
                $('#age').val(age);
            }
        });

        // Date picker to get famv date
        $("#famv-date").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: 'c-120:c',
            onSelect: function(e) {
                //Get the date from the datepicker
                var date = $("#famv-date").val();

                //Add the birthdate to the client array
                clientValues['famv_date'] = date;
            }
        });


        /**
        * This function is used to calculate a client's age
        * @param string birthDate : The client's birthdate
        * @return number : The client's age
        */
        function calculateAge(birthDate) {
            var today = new Date();
            birthDate = new Date(birthDate);
            var diff =(today.getTime() - birthDate.getTime()) / 1000;
            diff /= (60 * 60 * 24);
            return Math.abs(Math.round(diff/365.25));
        }

      
    </script>
  </body>
</html>