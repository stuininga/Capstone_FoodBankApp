<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Reports (Reports Controller)
 * Reports class to control all reports related operations.
 * @author : Greg Bradley
 * @version : 1.0
 * @since : 5 March 2019
 */

class Reports extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('reports_model');
        $this->load->library('pdf');
        $this->isLoggedIn();   
    }

    /**
     * This function is to load the client's database front page
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Leduc Food Bank | Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }

    
    /**
     * This function is used to view a list of reports 
     */  

    function viewReports()
    {
        

        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            
            $data['allreports'] = $this->reports_model->getReports();
            
            $this->global['pageTitle'] = 'Leduc Food Bank | Reports';

            $this->loadViews("viewReports", $this->global, $data, NULL);
        }

    }

    /**
     * This function creates a PDF for printing or saving a digital version

            // $this->pdf->stream($report_id, array("Attachment"=>0)); will take the user to a view page where they can download and print
     */  

    function viewPDF()
    {
        
        // echo "test PDF ";

        // $html_content = '<h3>Convert to PDF</h3>';
            
        //     $this->pdf->loadHtml($html_content);
        //     $this->pdf->render();
        //     $this->pdf->stream();

        if($this->uri->segment(3)) 
        {
            $report_id = $this->uri->segment(3);
            $data['allreports'] = $this->reports_model->getReports();
            // $this->loadViews("viewClients", $data);
            // $html_content = ''.$client_code.'<h3 align="center">Convert to PDF</h3>';
            // $html_content .= $this->client_model->getClientInfoTest($client_code);
            // $html_content = $this->output->get_output();
            // $html = ob_get_clean();
            // $pdf = new DOMPDF();
            $html_content = $this->load->view('viewReports',$data, TRUE);
            $this->pdf->loadHtml($html_content);
            $this->pdf->render();
            // $this->pdf->stream("".$client_code".pdf", array("Attachment"=>0));
            // $this->pdf->stream("test.pdf", array("Attachment"=>1));
            $this->pdf->stream($report_id, array("Attachment"=>0));
            // $this->pdf->stream();
        }


    }





}//End of class
?>