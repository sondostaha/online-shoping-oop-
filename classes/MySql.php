<?php

class MySql{
    private $servername;
    private $db_username;
    private $password;
    private $db_name;

    protected function connect(){
        $this->servername='localhost';
        $this->db_username='root';
        $this->password='';
        $this->db_name='online_shop';

        return new mysqli($this->servername, $this->db_username, $this->password, $this->db_name);
        
    }

}
