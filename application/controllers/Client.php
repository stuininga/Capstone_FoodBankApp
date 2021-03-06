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
            $data['identificationRecord'] = $this->client_model->getClientIdentification();
            $data['incomeRecord'] = $this->client_model->getClientIncome();
            $data['statusRecord'] = $this->client_model->getClientResStatus();
            $data['fstatusRecord'] = $this->client_model->getClientFamStatus();
            $data['addressRecord'] = $this->client_model->getAddresses();
 
            $this->global['pageTitle'] = 'Leduc Food Bank | Add New User';

            $this->loadViews("addClient", $this->global, $data, $data);
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
            //Declare $formData to be used to collect all data from the form
            $formData = "";

            //First page (Personal Details) validation
             if(isset($_POST['personal-submit'])) {
                 $this->client_form->setValidationRules(1);
                
                //Check if the page has validated...
                 if($this->form_validation->run() == TRUE) {
                     //If the validation passed, get the values 
                     $formData = $this->client_form->getFormValues(1);

                     //Check if the birth date is a legal date (e.g. not Feb 31)
                     if ($formData['client_birthdate'] == "") {
                         $this->session->set_flashdata('error', 'Submitted birth date is invalid.');
                         $this->addNewClientForm();     
                     }
                     else {
                         // if(!empty($formData['famv_date'])) {
                             //Check if the FAMV date is a legal date (e.g. not Feb 31)
                             if ($formData['famv_date'] == "BAD") {
                                 $this->session->set_flashdata('error', 'Submitted famv date is invalid.');
                                 $this->addNewClientForm();
                             }
                             else {
                                 //All good! Next page
                                 $this->addNewClientForm();
                             }
                         //}
                     }
                 }//End of form validation check
             }//End of Personal Details


            //Set the validation rules
            //$this->client_form->setValidationRules();

            //Check if this is the user's first time on the page
             if($this->form_validation->run() == FALSE)
             {
                //If it is the first time, load the form
                $this->addNewClientForm();


             }
             else
             {

                //If the validation has passed, get the values
                //$formData = $this->client_form->getFormValues();

                //Check if the date is blank due to an error
                // if ($formData['client_birthdate'] == "") {
                //     $this->session->set_flashdata('error', 'Submitted birth date is invalid.');
                //     $this->addNewClientForm();     
                // }
                // else {
                //     if ($formData['famv_date'] == "") {
                //         $this->session->set_flashdata('error', 'Submitted famv date is invalid.');
                //         $this->addNewClientForm();
                //     }
                //     else {
                //         //Pass the info from the form to the Client Model
                //         $result = $this->client_model->addNewClient($formData);

                //         //Check if anything was loaded to the database
                //         if($result > 0)
                //         {
                //             //The client was inserted, display success
                //             $this->session->set_flashdata('success', 'New Client was added successfully' );

                //             //Reload the page
                            //  redirect('addNewClient');               
                //         }
                //         else
                //         {
                //             //The client was not inserted, display an error
                //             $this->session->set_flashdata('error', 'Client insert failed');;  
                //             $this->addNewClientForm();
                //         }
                    //}//End of check if famv date is valid
                //}//End of check if birth date is valid
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

            //Determine what to query based on which button was clicked
            if (isset($_POST['search-button-code'])) {
                //Get the value
                $ccode = trim(ucwords(strtolower($this->security->xss_clean($this->input->post('ccode-s')))));
                //Check that the user has ACTUALLY searched something
                if (!empty($ccode)) {
                    //Create the query!
                    $searchQuery = "SELECT Client.first_name, Client.last_name, Client.client_code, Client.client_birthdate, Client.home_phone FROM lfb_clients as Client JOIN lfb_household as Household ON Client.household_id = Household.household_id WHERE Client.client_code = \"$ccode\"";

                    //Pass the query to the client_model
                    $data['clientRecord'] = $this->client_model->searchClients($searchQuery);

                    $this->searchedClients($searchQuery);
                }  
                //If they didn't search anything, continue displaying the "blank" version of the page
                else {
                    $this->loadViews("viewClients", $this->global, $data, NULL);
                }
            }//End of client code


            else if (isset($_POST['search-button-address'])) {
                //Get the value
                $address = trim(ucwords(strtolower($this->security->xss_clean($this->input->post('address')))));
                //Check that the user has ACTUALLY searched something
                if (!empty($address)) {
                    //Create the query!
                    $searchQuery = "SELECT Client.first_name, Client.last_name, Client.client_code, Household.address, Client.client_birthdate, Client.home_phone FROM lfb_clients as Client JOIN lfb_household as Household ON Client.household_id = Household.household_id WHERE Household.address LIKE \"%$address%\"";

                    //Pass the query to the client_model
                    $data['clientRecord'] = $this->client_model->searchClients($searchQuery);

                    $this->searchedClients($searchQuery);
                }  
                //If they didn't search anything, continue displaying the "blank" version of the page
                else {
                    $this->loadViews("viewClients", $this->global, $data, NULL);
                }
            }//End of address


            else if (isset($_POST['search-button-personal'])) {
                //VALIDATE
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

                //echo "Why you no work" . $locationID;

                //Concatenate Phone Number together
                $phone = $phone1 . $phone2 . $phone3;

                //Check that the user has ACTUALLY searched something
                if ((!empty($firstName)) || (!empty($lastName)) || (!empty($locationID)) || (!empty($phone))) {
                    //Create the query!
                    $searchQuery = "SELECT Client.first_name, Client.last_name, Client.client_code, Household.address, Client.client_birthdate, Client.home_phone FROM lfb_clients as Client JOIN lfb_household as Household ON Client.household_id = Household.household_id WHERE Client.first_name LIKE \"%$firstName%\" AND Client.last_name LIKE \"%$lastName%\" AND Household.location_id LIKE \"%$locationID%\" AND Client.home_phone LIKE \"%$phone%\"";

                    //Pass the query to the client_model
                    $data['clientRecord'] = $this->client_model->searchClients($searchQuery);

                    $this->searchedClients($searchQuery);
                }  
                //If they didn't search anything, continue displaying the "blank" version of the page
                else {
                    $this->loadViews("viewClients", $this->global, $data, NULL);
                } 
            }//End of Personal


            else {
                //If no button has been pressed, show the "blank" view
                $this->loadViews("viewClients", $this->global, $data, NULL);
            }//End of else
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

            //Get the birth date from the array
            foreach($data['clientInfo'] as $client){
                $birthDate = $client->client_birthdate;
            }

            //Calculate age
            $data['age'] = $this->client_form->getClientAge($birthDate);
            
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

                //Check if the birth date is blank due to an error
                if ($formData['client_birthdate'] == "") {
                    $this->session->set_flashdata('error', 'Submitted birth date is invalid.');
                    $this->addNewClientForm();     
                }
                else {
                    //Check if the famv date is blank due to an error
                    if ($formData['famv_date'] == "") {
                        $this->session->set_flashdata('error', 'Submitted famv date is invalid.');
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
                    }//End of check if famv date is valid
                }//End of check if birth date is valid
            }//End of check if user's first time on page
        }//End of check if user is logged in
    }//End of editSingleClient




}//End of class
?>