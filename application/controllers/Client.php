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
            //VALIDATE
            $this->load->library('form_validation');
            
            //Set the rules for Validation
            $this->form_validation->set_rules('fname','First Name','trim|required|max_length[70]');
            $this->form_validation->set_rules('lname','Last Name','trim|required|max_length[70]');
            $this->form_validation->set_rules('location', 'Location', 'required');

            //Phone Validation
            $this->form_validation->set_rules('home-phone1', 'Main Phone Area Code', 'trim|required|numeric|exact_length[3]');
            $this->form_validation->set_rules('home-phone2', 'Main Phone Prefix', 'trim|required|numeric|exact_length[3]');
            $this->form_validation->set_rules('home-phone3', 'Main Phone Suffix', 'trim|required|numeric|exact_length[4]');

            //If the user has typed into the cell phone field, validate it 
            if(($this->input->post('cell-phone1') != "") || ($this->input->post('cell-phone2') != "") || ($this->input->post('cell-phone3') != "")) {

                //Set Cell Phone Rules
                $this->form_validation->set_rules('cell-phone1', 'Cell Phone Area Code', 'trim|numeric|required|exact_length[3]');
                $this->form_validation->set_rules('cell-phone2', 'Cell Phone Prefix', 'trim|numeric|required|exact_length[3]');
                $this->form_validation->set_rules('cell-phone3', 'Cell Phone Suffix', 'trim|numeric|required|exact_length[4]');
            }

            //Birth Date Validation
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
                //If the validation has passed, get the values
                $firstName = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $lastName = ucwords(strtolower($this->security->xss_clean($this->input->post('lname'))));
                $locationID = $this->input->post('location');
                $homePhone1 = ucwords($this->security->xss_clean($this->input->post('home-phone1')));
                $homePhone2 = ucwords($this->security->xss_clean($this->input->post('home-phone2')));
                $homePhone3 = ucwords($this->security->xss_clean($this->input->post('home-phone3')));
                $cellPhone1 = ucwords($this->security->xss_clean($this->input->post('cell-phone1')));
                $cellPhone2 = ucwords($this->security->xss_clean($this->input->post('cell-phone2')));
                $cellPhone3 = ucwords($this->security->xss_clean($this->input->post('cell-phone3')));
                $birthDay = $this->input->post('birth-day');
                $birthMonth = $this->input->post('birth-month');
                $birthYear = $this->input->post('birth-year');

                //Concatenate Phone Number together
                $homePhone = $homePhone1 . $homePhone2 . $homePhone3;

                //Concatenate Cell Phone Number together
                $cellPhone = $cellPhone1 . $cellPhone2 . $cellPhone3;

                //Check that the date the user submitted is valid, if not, don't insert
                if (!(checkdate($birthMonth, $birthDay, $birthYear))) {
                    //Bad Date, do not insert
                    $birthDay = "";
                    $birthMonth = "";
                    $birthYear = "";
                    $birthDate = "";
                }
                else {
                    //Good Date, prepare to insert
                    $birthDate = "$birthDay/$birthMonth/$birthYear";
                    $time = strtotime($birthDate); 
                    $birthDate = date('Y-m-d',$time);
                }
                
                if ($birthDate == "") {
                    $this->session->set_flashdata('error', 'Submitted date is invalid.');
                    //redirect('addNewClient'); 
                    $this->addNewClientForm();     
                }
                else {
                    //Store all the info from the form in an array
                    $clientInfo = array('first_name'=>$firstName, 'last_name'=>$lastName, 'location_id' =>$locationID, 'home_phone'=>$homePhone, 'cell_phone'=>$cellPhone, 'client_birthdate'=>$birthDate);
                
                    //Pass the info from the form to the Client Model
                    $result = $this->client_model->addNewClient($clientInfo);

                    //Check if anything was loaded to the database
                    if($result > 0)
                    {
                        //The client was inserted, display success
                        $this->session->set_flashdata('success', 'New Client was added successfully');

                        //Reload the page
                        redirect('addNewClient', 'refresh');      
                        // header('Location:addNewClient');          
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
            $this->global['pageTitle'] = 'Leduc Food Bank | Search Clients';

            $data['clientRecord'] = $this->client_model->getClientInfoAndLocations();

            //Don't load any clients until the results have been narrowed (for speed reasons)
            $this->loadViews("viewClients", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to search all clients based on the user's criteria
     */
    function searchClients()
    {
        if($this->isAdmin() == TRUE) {
            $this->loadThis();
        }
        else {
            $this->global['pageTitle'] = 'Leduc Food Bank | Hello';
            $this->loadViews("viewClients", $this->global, NULL);
            //VALIDATE
            $this->load->library('form_validation');

            //If the user has typed into the phone field check that they have typed a full phone number
            if(($this->input->post('phone-s1') != "") || ($this->input->post('phone-s2') != "") || ($this->input->post('phone-s3') != "")) {

                //Set Cell Phone Rules
                $this->form_validation->set_rules('phone-s1', 'Phone Area Code', 'trim|numeric|required|exact_length[3]');
                $this->form_validation->set_rules('phone-s2', 'Phone Prefix', 'trim|numeric|required|exact_length[3]');
                $this->form_validation->set_rules('phone-s3', 'Phone Suffix', 'trim|numeric|required|exact_length[4]');
            }

            if( $this->form_validation->run)   {
                echo "THE BUTTON WAS PRESSED GOOD JOB";

                //If the validation has passed, get the values
                $firstName = ucwords(strtolower($this->security->xss_clean($this->input->post('fname-s'))));
                $lastName = ucwords(strtolower($this->security->xss_clean($this->input->post('lname-s'))));
                $locationID = $this->input->post('location-s');
                $phone1 = ucwords($this->security->xss_clean($this->input->post('phone-s1')));
                $phone2 = ucwords($this->security->xss_clean($this->input->post('phone-s2')));
                $phone3 = ucwords($this->security->xss_clean($this->input->post('phone-s3')));

                //Concatenate Phone Number together
                $phone = $phone1 . $phone2 . $phone3;

                // $this->db->select('Client.first_name, Client.last_name, Client.client_code, Client.location_id, Client.client_birthdate, Client.home_phone, Client.cell_phone, Location.location_name');
                // $this->db->from('lfb_clients as Client');
                // $this->db->join('lfb_clients_location as Location','Client.location_id = Location.location_id');


                //Begin assembling the query!
                $searchQuery = "SELECT Client.first_name, Client.last_name, Client.client_code, Client.location_id, Client.client_birthdate, Client.home_phone, Location.location_name FROM lfb_clients as Client JOIN lfb_clients_location as Location ON Client.location_id = Location.location_id WHERE Client.first_name ='Sarah'";

                //Pass the query to the client_model
                $data['clientRecord'] = $this->client_model->searchClients($searchQuery);
                
                $this->loadViews("viewClients", $this->global, $data, NULL);
            }

            
        }//End of check if user is logged in
    }//End of searchClients Function





}//End of class
?>