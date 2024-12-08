<?php

    class Customers
    {
        private $servername = "localhost";
        private $username   = "root";
        private $password   = "";
        private $con;


        //Membangun koneksi database
        public function __construct()
        {
            $this->con = new mysqli($this->servername,
            $this->username,$this->password,$this->database);
            if(mysqli_connect_error())  {
                trigger_error("Failed to connect to MySQL: " .
                mysqli_connect_eeror());
            }else{
                return $this->con;
            }
        }

    //Fungsi insert data
    public function insertData($post)
    {
        $name = $this->con->real_escape_string
                ($_POST['name']);
        $email = $this->con->real_escape_string
                ($_POST['email']);
        $username = $this->con->real_escape_string
                    ($_POST['username']);
        $password = $this->con->real_escape_string
                    //penerapan enkripsi dengan md5
                    (md5($_POST['password']));
        $query = "INSERT INTO customers(name, email, username, password)
                  VALUES('$name','$email','$username''$password')";
        $sql = $this->con->query($query);
        if ($sql==true) {
            header("Location:index.php?msgl=insert");
        }else{
            echo "Registration failed, please try again.";
        }
    }

        //Fungsi menampilkan list data 
        public function displayData()
        {
            $query = "SELECT * FROM customers";
            $result = $this->con->query($query);
            if ($result->num_rows > 0)  {
                $data = array();
                while ($row = $result->fetch_assoc())   {
                    $data[] = $row;
                }
                return $data;
            }esle{
                echo "No found records";
            }
        }
    }