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
        $this->load->library('client_form');
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
            //Set the validation rules
            $this->client_form->setValidationRules();

            //Check if this is the user's first time on the page
            if($this->form_validation->run() == FALSE)
            {
                //If it is the first time, load the form
                $this->addNewClientForm();
            }
            else
            {
                //If the validation has passed, get the values
                $formData = $this->client_form->getFormValues();

                //Check if the date is blank due to an error
                if ($formData['client_birthdate'] == "") {
                    $this->session->set_flashdata('error', 'Submitted date is invalid.');
                    $this->addNewClientForm();     
                }
                else {
                    //Pass the info from the form to the Client Model
                    $result = $this->client_model->addNewClient($formData);

                    //Check if anything was loaded to the database
                    if($result > 0)
                    {
                        //The client was inserted, display success
                        $this->session->set_flashdata('success', 'New Client was added successfully' );

                        //Reload the page
                        redirect('addNewClient');               
                    }
                    else
                    {
                        //The client was not inserted, display an error
                        $this->session->set_flashdata('error', 'Client insert failed');;  
                        $this->addNewClientForm();
                    }
                }//End of check if date is valid
            }//End of check if user's first time on page
        }//End of check if user is logged in
    }//End of addNewClient Function

    /**
     * This function is used to search all clients based on the user's criteria
     */
    function searchClients()
    {
        if($this->isAdmin() == TRUE) {
            $this->loadThis();
        }
        else {
            //Set pageTitle
            $this->global['pageTitle'] = 'Leduc Food Bank | Search Clients';
            $data['locationsRecord'] = $this->client_model->getLocations();
            
            //VALIDATE
            $this->load->library('form_validation');

            //If the user has typed into the phone field check that they have typed a full phone number
            if(($this->input->post('phone-s1') != "") || ($this->input->post('phone-s2') != "") || ($this->input->post('phone-s3') != "")) {
                //Set Phone Rules
                $this->form_validation->set_rules('phone-s1', 'Phone Area Code', 'trim|numeric|required|exact_length[3]');
                $this->form_validation->set_rules('phone-s2', 'Phone Prefix', 'trim|numeric|required|exact_length[3]');
                $this->form_validation->set_rules('phone-s3', 'Phone Suffix', 'trim|numeric|required|exact_length[4]');
            }

            //If the validation has passed, get the values
            $firstName = trim(ucwords(strtolower($this->security->xss_clean($this->input->post('fname-s')))));
            $lastName = trim(ucwords(strtolower($this->security->xss_clean($this->input->post('lname-s')))));
            $locationID = $this->input->post('location-s');
            $phone1 = trim(ucwords($this->security->xss_clean($this->input->post('phone-s1'))));
            $phone2 = trim(ucwords($this->security->xss_clean($this->input->post('phone-s2'))));
            $phone3 = trim(ucwords($this->security->xss_clean($this->input->post('phone-s3'))));

            //Concatenate Phone Number together
            $phone = $phone1 . $phone2 . $phone3;

            // Load the page based on whether the button was pressed
            if(isset($_POST['search-button']))   {
                //Check that the user has ACTUALLY searched something
                if ((!empty($firstName)) || (!empty($lastName)) || (!empty($locationID)) || (!empty($phone))) {
                    //Begin assembling the query!
                    $searchQuery = "SELECT Client.first_name, Client.last_name, Client.client_code, Client.location_id, Client.client_birthdate, Client.home_phone, Location.location_name FROM lfb_clients as Client JOIN lfb_clients_location as Location ON Client.location_id = Location.location_id WHERE Client.first_name LIKE \"%$firstName%\" AND Client.last_name LIKE \"%$lastName%\" AND Client.location_id LIKE \"%$locationID%\" AND Client.home_phone LIKE \"%$phone%\"";

                    //Pass the query to the client_model
                    $data['clientRecord'] = $this->client_model->searchClients($searchQuery);

                    $this->searchedClients($searchQuery);
                }  
                //If they didn't search anything, continue displaying the "blank" version of the page
                else {
                    $this->loadViews("viewClients", $this->global, $data, NULL);
                }   
            }
            //If they didn't press the button display the "blank" version of the page
            else {
                $this->loadViews("viewClients", $this->global, $data, NULL);
            }
        }//End of check if user is logged in
    }//End of searchClients Function


    /**
     * This function is used to load searched clients from the database
     * @param string $searchQuery : This is the query compiled using the user's criteria
     */
    function searchedClients($searchQuery)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->global['pageTitle'] = 'Leduc Food Bank | Search Clients';
            $data['locationsRecord'] = $this->client_model->getLocations();

            //Get the info from the database
            $result = $this->client_model->searchClients($searchQuery);
            
            //If records are found, pass them to the view
            //If no records are found, pass a message to the view
            if(!empty($result)) {
                $data['clientRecord'] = $result;
            }
            else {
                $data['noRecords'] = "No clients found matching that criteria.";
            }
            $this->loadViews("viewClients", $this->global, $data, NULL);
        }//End of check if user is logged in
    }//End of searchedClients


    /**
     * This function is used to load one client for viewing
     */
    function editSingleClientForm() 
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            //GET the ClientID from the URL
            $clientID = $_GET['id'];

            //If there's no user ID to display, redirect
            if($clientID == "")
            {
                redirect('searchClients');
            }
            
            //Display the edit form and client info!
            $data['locationsRecord'] = $this->client_model->getLocations();
            $data['clientInfo'] = $this->client_model->getClient($clientID);
            $data['locationsRecord'] = $this->client_model->getLocations();
            
            
            $this->global['pageTitle'] = 'Leduc Food Bank | View Client: ' . $clientID;
            
            $this->loadViews("editClient", $this->global, $data, NULL);
        }
    }//End of editSingleClientForm

    /**
     * This function is used to load one client for viewing
     */
    function editSingleClient() 
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else 
        {
            //GET the ClientID from the URL
            $clientID = $_GET['id'];
        
            //Set the rules for Validation
            $this->client_form->setValidationRules();

            
            //Check if this is the user's first time on the page
            if($this->form_validation->run() == FALSE)
            {
                //If it is the first time, load the form
                $this->editSingleClientForm();
            }
            else {
                //If the validation has passed, get the values
                $formData = $this->client_form->getFormValues();

                //Check if the date is blank due to an error
                if ($formData['client_birthdate'] == "") {
                    $this->session->set_flashdata('error', 'Submitted date is invalid.');
                    $this->addNewClientForm();     
                }
                else {
                    //Pass the info from the form to the Client Model
                    $result = $this->client_model->editClient($formData, $clientID);

                    //Check if anything was loaded to the database
                    if($result > 0)
                    {
                        //The client was inserted, display success
                        $this->session->set_flashdata('success', 'Client was edited successfully' );

                        //Reload, but keep the form populated
                        $this->editSingleClientForm();               
                    }
                    else
                    {
                        //The client was not inserted, display an error
                        $this->session->set_flashdata('error', 'Client insert failed');;  
                        $this->addNewClientForm();
                    }
                }//End of check if date is valid
            }//End of check if user's first time on page
        }//End of check if user is logged in
    }//End of editSingleClient




}//End of class
?>