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
        $this->db->select('first_name, last_name, client_code');
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




}//End of class
?>