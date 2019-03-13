<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Reports_model (Reports Model)
 * Reports model class to get to handle reports related data 
 * @author : Greg Bradley
 * @version : 1.0
 * @since : 4 March 2019
 */
class Reports_model extends CI_Model
{

    

    /**
     * This function is used to add a new report to the system
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
     * This function is used to get the report name from lfb_reports
     * @return array $result : This is result of the query
     */
    function getReports()
    {
        $this->db->select('report_id, report_name');
        $this->db->from('lfb_reports');
        $query = $this->db->get();
        
        return $query->result();
    }

    




}//End of class
?>