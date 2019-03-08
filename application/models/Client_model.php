<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Client_model (Client Model)
 * Client model class to get to handle client related data 
 * @author : Sarah Tuininga
 * @version : 1.0
 * @since : 6 February 2019
 */
class Client_model extends CI_Model
{

    /**
     * This function is used to get the client's information
     * @return array $result : This is result of the query
     */
    function getClientInfo()
    {
        $this->db->select('first_name, last_name, client_code, location_id, client_birthdate, home_phone, cell_phone');
        $this->db->from('lfb_clients');
        $query = $this->db->get();
        
        return $query->result();
    }

    /**
     * This function is used to add a new client to system
     * @param array $clientInfo : This is the information from the user
     * @return number $insert_id : This is last inserted id
     */
    function addNewClient($clientInfo)
    {
        $this->db->trans_start();
        $this->db->insert('lfb_clients', $clientInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    /**
     * This function is used to get the locations from lfb_clients_locations
     * @return array $result : This is result of the query
     */
    function getLocations()
    {
        $this->db->select('location_id, location_name');
        $this->db->from('lfb_clients_location');
        $query = $this->db->get();
        
        return $query->result();
    }

    /**
     * This function is used to get the location names with all the client info from lfb_clients_locations joined to lfb_clients
     * @return array $result : This is result of the query
     */
    function getClientInfoAndLocations()
    {
        $this->db->select('Client.first_name, Client.last_name, Client.client_code, Client.location_id, Client.client_birthdate, Client.home_phone, Client.cell_phone, Location.location_name');
        $this->db->from('lfb_clients as Client');
        $this->db->join('lfb_clients_location as Location','Client.location_id = Location.location_id');
        $query = $this->db->get();
        
        return $query->result();
    }

    /**
     * This function is used to search all clients based on the user's criteria
     * @param string $searchQuery : This is the query compiled using the user's criteria
     * @return number $result : This is the result of the query
     */
    function searchClients($searchQuery)
    {
        $query = $this->db->query($searchQuery);
        
        // print_r($result->result());
        echo "Accessed Model";
        return $query->result();
    }



    // $query_userdetails = $this->db->query("SELECT * 
    // FROM users WHERE email = '$user_email' ");


}//End of class
?>