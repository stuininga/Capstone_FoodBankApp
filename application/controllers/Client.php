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
            $this->load->model('client_model');
            $data['clientRecord'] = $this->client_model->getClientInfo();
            
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
            
            $this->form_validation->set_rules('fname','First Name','trim|required|max_length[70]');
            $this->form_validation->set_rules('lname','Last Name','trim|required|max_length[70]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNewClientForm();
            }
            else
            {
                $FirstName = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $LastName = ucwords(strtolower($this->security->xss_clean($this->input->post('lname'))));
                
                $clientInfo = array('first_name'=>$FirstName, 'last_name'=>$LastName);
                
                $this->load->model('client_model');
                $result = $this->client_model->addNewClient($clientInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Client was added successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Client insert failed');
                }
                
                redirect('addNewClient');
            }
        }
    }

    







}//End of class
?>