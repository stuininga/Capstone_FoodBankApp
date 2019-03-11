CODEBYTES DEVELOPMENT
=====================
> Mauris a nisi nec eros blandit cursus. Donec porttitor fringilla dui, at tincidunt turpis commodo ac. Suspendisse sit amet mi et purus consectetur tempor.



Leduc Food Bank Web App
-----------------------


>
> Etiam pulvinar sed libero id imperdiet. Nulla luctus ipsum sed pharetra consectetur. Vivamus suscipit risus at dolor pretium elementum. Donec mi tortor, rutrum sit amet suscipit id, egestas fringilla ligula. Nulla facilisi. Suspendisse sed sollicitudin ex. Etiam eget lacinia nunc, id sagittis tortor.
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
