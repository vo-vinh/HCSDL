<?php

class Database
{
    public mysqli|false $con;
    public string $servername = "localhost";
    public string $username = "root";
    public string $password = "";
    public string $dbname = "as232";

    function __construct()
    {
        $this->con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        $this->con->set_charset("utf8");
    }
}
