CODEBYTES DEVELOPMENT
=====================
> Web Dev group from Northern Alberta Institute of Technology.



Leduc Food Bank Web App
-----------------------


>
> This is a Web application that will allow three different user levels (Admin, Manager, and Employee). It will allow the users to add new clients into their databse, edit client information, and search through existing clients. They will also have the ability to print reports with information pulled from the database.
>
>

BUILT WITH
----------
* codeigniter
* PHP
* Javascript 


FEATURES
--------
* Manage users
* Add new users
* Add new clients
* Edit client data
* View & print reports


SCREENSHOTS
------------
![picture alt](http://www.brightlightpictures.com/assets/images/portfolio/thethaw_header.jpg "Title is optional")

CODE EXAMPLE
------------
```PHP
    function getClientInfo()
    {
        $this->db->select('first_name, last_name, client_code, location_id, client_birthdate, home_phone, cell_phone');
        $this->db->from('lfb_clients');
        $query = $this->db->get();
        
        return $query->result();
    }
```

CREDITS
-------
1. [Sarah Tuininga](https://github.com/stuininga)
2. [Gregory Bradley](https://github.com/gregorybradley)
3. [Ryan Berntsen](https://github.com/rberntsen21)
4. [Pengwei Zhou](https://github.com/PengweiZhou)
