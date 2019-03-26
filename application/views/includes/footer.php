

    <!-- <footer class="main-footer">
        <strong>Copyright &copy; <?php //echo date("Y"); ?> Leduc Food Bank</strong> 
    </footer> -->
    
    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/custom.js"></script>
    <script type="text/javascript">
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');

<<<<<<< HEAD
    //     $("#wizard").steps({
    //         headerTag: "h3",
    //         bodyTag: "div",
    //         transitionEffect: "slideLeft",
    //         autoFocus: true,
    //         enableFinishButton: false,
    //         enablePagination: false,
    //         enableAllSteps: true,
    //         titleTemplate: "#title#",
    //         cssClass: "tabcontrol"
    //   });
       $("#wizard").steps({
=======
        $("#wizard").steps({
>>>>>>> a699dc03721bdfb9427852eda3160b7d3cd06568
            headerTag: "h3",
            bodyTag: "div",
            transitionEffect: "slideLeft",
            autoFocus: true,
            enableFinishButton: false,
            enablePagination: false,
<<<<<<< HEAD
            enableAllSteps: true
        });

        /** Custom Pagination buttons to allow for validation */
        $(".goto-step0").click(function(e){
            $("#wizard-t-0").click();
        });

        $(".goto-step1").click(function(e){
            $("#wizard-t-1").click();
        });

        $(".goto-step2").click(function(e){
            $("#wizard-t-2").click();
        });

        $(".goto-step3").click(function(e){
            $("#wizard-t-3").click();
        });

        $(".goto-step4").click(function(e){
            $("#wizard-t-4").click();
        });

        $(".goto-step5").click(function(e){
            $("#wizard-t-5").click();
        });
      

=======
            enableAllSteps: true,
            titleTemplate: "#title#",
            cssClass: "tabcontrol"
      });
>>>>>>> a699dc03721bdfb9427852eda3160b7d3cd06568
    </script>
  </body>
</html>