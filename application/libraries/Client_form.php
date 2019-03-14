<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class : Client_form
 * Class to control all form functions used for the Client
 * @author : Sarah Tuininga
 * @version : 1.0
 * @since : 13 March 2019
 */
class Client_form {
    public function __construct()
    {
        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();
        $this->CI->load->library('form_validation');

    }//End of __construct


    /**
     * This function is used to set the validation rules for the form
     */
    public function setValidationRules() 
    {
        $this->CI->form_validation->set_rules('fname','First Name','trim|required|max_length[70]');
        $this->CI->form_validation->set_rules('lname','Last Name','trim|required|max_length[70]');
        $this->CI->form_validation->set_rules('gender', 'Gender', 'required');
        $this->CI->form_validation->set_rules('location', 'Location', 'required');

        //Phone Validation
        $this->CI->form_validation->set_rules('home-phone1', 'Main Phone Area Code', 'trim|required|numeric|exact_length[3]');
        $this->CI->form_validation->set_rules('home-phone2', 'Main Phone Prefix', 'trim|required|numeric|exact_length[3]');
        $this->CI->form_validation->set_rules('home-phone3', 'Main Phone Suffix', 'trim|required|numeric|exact_length[4]');

        //If the user has typed into the cell phone field, validate it 
        if(($this->CI->input->post('cell-phone1') != "") || ($this->CI->input->post('cell-phone2') != "") || ($this->CI->input->post('cell-phone3') != "")) {
            //Set Cell Phone Rules
            $this->CI->form_validation->set_rules('cell-phone1', 'Cell Phone Area Code', 'trim|numeric|required|exact_length[3]');
            $this->CI->form_validation->set_rules('cell-phone2', 'Cell Phone Prefix', 'trim|numeric|required|exact_length[3]');
            $this->CI->form_validation->set_rules('cell-phone3', 'Cell Phone Suffix', 'trim|numeric|required|exact_length[4]');
        }

        //Birth Date Validation
        $this->CI->form_validation->set_rules('birth-day', 'Birth Day', 'required');
        $this->CI->form_validation->set_rules('birth-month', 'Birth Month', 'required');
        $this->CI->form_validation->set_rules('birth-year', 'Birth Year', 'required');

    }//End of setValidationRules


    /**
     * This function is used to get all values from the form and return them as an array
     * @return array $formData : The info from the form as an array
     */
    public function getFormValues()
    {
        $formData['first_name'] = ucwords(strtolower($this->CI->security->xss_clean($this->CI->input->post('fname'))));
        $formData['last_name'] = ucwords(strtolower($this->CI->security->xss_clean($this->CI->input->post('lname'))));
        $formData['location_id'] = $this->CI->input->post('location');
        $homePhone1 = ucwords($this->CI->security->xss_clean($this->CI->input->post('home-phone1')));
        $homePhone2 = ucwords($this->CI->security->xss_clean($this->CI->input->post('home-phone2')));
        $homePhone3 = ucwords($this->CI->security->xss_clean($this->CI->input->post('home-phone3')));
        $cellPhone1 = ucwords($this->CI->security->xss_clean($this->CI->input->post('cell-phone1')));
        $cellPhone2 = ucwords($this->CI->security->xss_clean($this->CI->input->post('cell-phone2')));
        $cellPhone3 = ucwords($this->CI->security->xss_clean($this->CI->input->post('cell-phone3')));
        $birthDay = $this->CI->input->post('birth-day');
        $birthMonth = $this->CI->input->post('birth-month');
        $birthYear = $this->CI->input->post('birth-year');
        $formData['gender'] = $this->CI->input->post('gender');

        //Concatenate Phone Number together
        $formData['home_phone'] = $homePhone1 . $homePhone2 . $homePhone3;

        //Concatenate Cell Phone Number together
        $formData['cell_phone'] = $cellPhone1 . $cellPhone2 . $cellPhone3;

        //Check that the date the user submitted is valid, if not, don't insert
        if (!(checkdate($birthMonth, $birthDay, $birthYear))) {
            //Bad Date, send empty string
            $birthDate = "";
        }
        else {
            //Good Date, send formatted date to use
            $formData['client_birthdate'] = "$birthYear-$birthMonth-$birthDay";
            $formData['client_birthdate'] = date("Y-m-d", strtotime($formData['client_birthdate']));
        }

        return $formData;
    }//End of getFormValues

    /**
     * This function is used to calculate the age of a client based on their birthdate
     * @return number $age : The age of the client calculated based on today's date
     */
    public function getClientAge($birthDate)
    {
        $age = date_diff(date_create($birthDate), date_create('now'))->y;
        return $age;
    }//End of getClientAge


}//End of class