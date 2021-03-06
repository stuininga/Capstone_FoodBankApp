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
      * @param int $id : The specific id of the client to get. If blank, return all
      * @return array $result : This is result of the query
     */
    function getClientInfo()
    {
        if(empty($id)) {
            $this->db->select('Client.client_code, Client.household_id, Client.first_name, Client.last_name, Client.client_birthdate, Client.home_phone, Client.cell_phone, Client.gender, Client.special_diet, Client.famv, Client.famv_date, Client.famv_comments, Client.family_status, Client.cid_type, Client.cid_number, Client.active, Client.residential_status, Client.primary_income, Client.secondary_income, Client.other_income, Client.total_monthly_income, Client.rent_mortgage, Client.utilities, Client.public_comments, Client.special_fields, Household.location_id, Household.address, Household.city, Household.province, Household.postal_code, Household.legal_land_desc, Household.location_type, Household.address_proof, Household.landlord');
            $this->db->from('lfb_clients as Client');
            $this->db->join('lfb_household as Household','Client.household_id = Household.household_id');
            $query = $this->db->get();
        }
        else {
            $this->db->select('Client.client_code, Client.household_id, Client.first_name, Client.last_name, Client.client_birthdate, Client.home_phone, Client.cell_phone, Client.gender, Client.special_diet, Client.famv, Client.famv_date, Client.famv_comments, Client.family_status, Client.cid_type, Client.cid_number, Client.active, Client.residential_status, Client.primary_income, Client.secondary_income, Client.other_income, Client.total_monthly_income, Client.rent_mortgage, Client.utilities, Client.public_comments, Client.special_fields, Household.location_id, Household.address, Household.city, Household.province, Household.postal_code, Household.legal_land_desc, Household.location_type, Household.address_proof, Household.landlord');
            $this->db->from('lfb_clients as Client');
            $this->db->join('lfb_household as Household','Client.household_id = Household.household_id');
            $this->db->where('Client.client_code', $id);
            $query = $this->db->get();
        }

    
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
     * @param int $id : The id to query by, if blank return all
     * @return array $result : This is result of the query
     */
    function getLocations($id = '')
    {
        if(empty($id)) {
            $this->db->select('location_id, location_name');
            $this->db->from('lfb_clients_location');
            $query = $this->db->get();
        }
        else {
            $this->db->select('location_id, location_name');
            $this->db->from('lfb_clients_location');
            $this->db->where('location_id', $id);
            $query = $this->db->get();
        }

        
        return $query->result();
    }

    /**
     * This function is used to get the location names with the display client info from lfb_clients_locations joined to lfb_clients
     * @return array $result : This is result of the query
     */
    function getClientInfoAndLocations()
    {
        $this->db->select('Client.first_name, Client.last_name, Client.client_code, Client.location_id, Client.client_birthdate, Client.home_phone, Client.cell_phone, Client.gender, Location.location_name');
        $this->db->from('lfb_clients as Client');
        $this->db->join('lfb_clients_location as Location','Client.location_id = Location.location_id');
        $query = $this->db->get();
        
        return $query->result();
    }

    /**
     * This function is used to get the identification names from lfb_clients_identification
     * @return array $result : This is result of the query
     */
    function getClientIdentification()
    {
        $this->db->select('identification_id, identification_type');
        $this->db->from('lfb_clients_identification');
        $query = $this->db->get();
        
        return $query->result();
    }

    /**
     * This function is used to get the income names from lfb_clients_income
     * @return array $result : This is result of the query
     */
    function getClientIncome()
    {
        $this->db->select('income_id, income_type');
        $this->db->from('lfb_clients_income');
        $query = $this->db->get();
        
        return $query->result();
    }

    /**
     * This function is used to get the residential types from lfb_clients_res_status
     * @return array $result : This is result of the query
     */
    function getClientResStatus()
    {
        $this->db->select('status_id, status_type');
        $this->db->from('lfb_clients_res_status');
        $query = $this->db->get();
        
        return $query->result();
    }

    /**
     * This function is used to get the family status types from lfb_clients_fam_status
     * @return array $result : This is result of the query
     */
    function getClientFamStatus()
    {
        $this->db->select('fstatus_id, fstatus_type');
        $this->db->from('lfb_clients_fam_status');
        $query = $this->db->get();
        
        return $query->result();
    }

    /**
     * This function is used to search all clients based on the user's criteria and return select info
     * @param string $searchQuery : This is the query compiled using the user's criteria
     * @return number $result : This is the result of the query
     */
    function searchClients($searchQuery)
    {
        $query = $this->db->query($searchQuery);
        return $query->result();
    }

    /**
     * This function is used to select all info for a single client
     * @param int $clientID : This is id of the client to pull the information for
     * @return number $result : This is the result of the query
     */
    function getClient($clientID)
    {
        $searchQuery = "SELECT Client.first_name, Client.last_name, Client.client_code, Client.address, Client.city, Client.postal_code, Client.province, Client.location_id, Client.legal_land_desc, Client.location_type, Client.address_proof, Client.landlord, Client.client_birthdate, Client.home_phone, Client.gender, Client.special_diet, Client.famv, Client.famv_date, Location.location_name FROM lfb_clients as Client JOIN lfb_clients_location as Location ON Client.location_id = Location.location_id WHERE Client.client_code = $clientID";
        $query = $this->db->query($searchQuery);
        return $query->result();
    }

    /**
     * This function is used to get all the addresses from the database for the editable select
     * @return number $result : This is the result of the query
     */
    function getAddresses()
    {
        $this->db->select('household_id, location_id, address, city, province, postal_code, legal_land_desc, location_type, address_proof, landlord');
        $this->db->from('lfb_household');
        $query = $this->db->get();
        
        return $query->result();
    }

    /**
     * This function is used to update the user information
     * @param array $clientInfo : This is the client's updated information
     * @param number $clientID : This is the client's ID
     */
    function editClient($clientInfo, $clientID)
    {
        $this->db->where('client_code', $clientID);
        $this->db->update('lfb_clients', $clientInfo);
        
        return TRUE;
    }

}//End of class
?>