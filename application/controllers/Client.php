<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Client (ClientController)
 * Client class to control all client related operations.
 * @author : Sarah Tuininga
 * @version : 1.0
 * @since : 6 February 2019
 */

class Client extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('client_model');
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
     * This function is used to load all clients in the database
     */
    function viewClients()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data['clientRecord'] = $this->client_model->getClientInfoAndLocations();

            

            $data['formatted'] = "Hello, this is a test.";
            
            $this->global['pageTitle'] = 'Leduc Food Bank | Client Info';

            $this->loadViews("viewClients", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new client form
     */
    function addNewClientForm()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('client_model');
            $data['clientRecord'] = $this->client_model->getClientInfo();
            $data['locationsRecord'] = $this->client_model->getLocations();

            
            $this->global['pageTitle'] = 'Leduc Food Bank | Add New User';

            $this->loadViews("addClient", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to add a new client to the system
     */
    function addNewClient()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            //Set the rules for Validation
            $this->form_validation->set_rules('fname','First Name','trim|required|max_length[70]');
            $this->form_validation->set_rules('lname','Last Name','trim|required|max_length[70]');
            $this->form_validation->set_rules('location', 'Location', 'required');
            $this->form_validation->set_rules('home-phone', 'Main Phone', 'trim|required|numeric|max_length[11]|min_length[10]');
            $this->form_validation->set_rules('cell-phone', 'Cell Phone', 'trim|numeric|max_length[11]|min_length[10]');
            $this->form_validation->set_rules('birth-day', 'Birth Day', 'required');
            $this->form_validation->set_rules('birth-month', 'Birth Month', 'required');
            $this->form_validation->set_rules('birth-year', 'Birth Year', 'required');
            
            //Check if this is the user's first time on the page
            if($this->form_validation->run() == FALSE)
            {
                //If it is the first time, load the form
                $this->addNewClientForm();
            }
            else
            {
                //If the user has submitted the form, get the values
                $firstName = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $lastName = ucwords(strtolower($this->security->xss_clean($this->input->post('lname'))));
                $locationID = $this->input->post('location');
                $homePhone = ucwords($this->security->xss_clean($this->input->post('home-phone')));
                $cellPhone = ucwords(strtolower($this->security->xss_clean($this->input->post('cell-phone'))));
                $birthDay = $this->input->post('birth-day');
                $birthMonth = $this->input->post('birth-month');
                $birthYear = $this->input->post('birth-year');

                //REMEMBER: Javascript to check if month/number of days in month match up. (February < 29, etc.)

                $birthDate = "$birthDay/$birthMonth/$birthYear";

                $time = strtotime($birthDate);
                
                $birthDate = date('Y-m-d',$time);

                //$birthDate = date("d-m-Y", strtotime($birthDate));
                
                
                //Store all the info from the form in an array
                $clientInfo = array('first_name'=>$firstName, 'last_name'=>$lastName, 'location_id' =>$locationID, 'home_phone'=>$homePhone, 'cell_phone'=>$cellPhone, 'client_birthdate'=>$birthDate);
                
                //Pass the info from the form to the Client Model
                $result = $this->client_model->addNewClient($clientInfo);
                
                //Check if anything was loaded to the database
                if($result > 0)
                {
                    //The client was inserted, display success
                    $this->session->set_flashdata('success', 'New Client was added successfully');
                }
                else
                {
                    //The client was not inserted, display an error
                    $this->session->set_flashdata('error', 'Client insert failed');
                }
                
                //Reload the page
                redirect('addNewClient');
            }
        }
    }

    /**
     * This function is used to format phone numbers for display
     * @param string $dataToFormat : This is the data to be formatted for display.
     * @param string $dataType : This is what format to use on the data
     * @return string $formatted : This is the final formatted data
     */  
    function formatForDisplay ($dataToFormat, $dataType){
        switch ($dataType) {
            case 'phone' :
                $formatted = "(".substr($dataToFormat, 0, 3).") ".substr($dataToFormat, 3, 3)."-".substr($dataToFormat,6)
                return $formatted;
            break;//End of phone # formatting
            case 'date' :

            break;//End of date formatting


        }//End of Switch
    }







}//End of class
?>