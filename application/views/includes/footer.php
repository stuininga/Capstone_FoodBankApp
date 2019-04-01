

    <!-- <footer class="main-footer">
        <strong>Copyright &copy; <?php //echo date("Y"); ?> Leduc Food Bank</strong> 
    </footer> -->
    
    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>
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
<?php foreach($addressRecord as $address): ?>
    <script>
        //Store access to address-select
        var select = $('#address-select');

        // Editable Select
        select.editableSelect();

        //Begin collecting values for submission
        var clientValues = [];
        var householdValues = [];
         
        select.change(function(e) {
            householdValues['city'] = $('#city').val();

            console.log(clientValues);
            console.log(householdValues);
        });

        select.on('select.editable-select', function(e) {
            //Get the values from the select
            var household_id = $('.es-list li.selected').val();
            var location_id = "<?php echo $address->location_id; ?>"
            var address = $('.es-list li.selected').text();

            clientValues['household_id'] = household_id;

            // console.log("ID: " + household_id);
            // console.log("Address: " + address);
            console.log("YUP");

            console.log(clientValues);
            console.log(householdValues);

        });

        $( function() {
          $( "#birth-date" ).datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: '1920:c'
          });
        } );
      
    </script>
<?php endforeach; ?>
  </body>
</html>