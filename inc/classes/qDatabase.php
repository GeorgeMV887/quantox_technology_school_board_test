<?php

class qDatabase
{
    // Store database name
    private $db_name;
    // Store database address
    private $db_address;
    // Store database user
    private $db_user;
    // Store database password
    private $db_password;
    // Store database connection
    protected $db_link;
    
    public function __construct($name, $address, $user, $password) {
        $this->db_name = $name;
        $this->db_address = $address;
        $this->db_user = $user;
        $this->db_password = $password;
    }

    public function connect() {
        // $this->db_link = mysqli_connect($this->db_address, $this->db_user, $this->db_password, $this->db_name);
        $this->db_link = new mysqli($this->db_address, $this->db_user, $this->db_password, $this->db_name);
        // Check connection if good, otherwise return error message
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }       
        return $this->db_link;
    }

    public function close() {
        $this->db_link->close();
    }



}
