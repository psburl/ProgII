<?php 

    if(file_exists("Address.class.php"))
        include("Address.class.php");

    class User{

        public $completName;
        public $email;
        public $password;
        public $passConf;
        public $Address;
        public $phone;

        function User(
            $completName,$email,  $password,
            $passConf,   $street, $number,
            $complement, $neighborhood, $city,
            $state,$country,$zipCode,$phone
        ){

            $this->completName = $completName;
            $this->email = $email;
            $this->password = $password;
            $this->passConf = $passConf;
            $this->Address = new Address(
                                         $street,$number, $complement,
                                         $neighborhood, $city, $state,
                                         $country, $zipCode
                                        );
            $this->phone = $phone;
        }

        function ContainsEmptyValue(){

            if(empty($this->completName) || empty($this->email) || 
               empty($this->password) || empty($this->passConf) ||
               $this->Address->ContainsEmptyValue()|| empty($this->phone))
                 return true;

            return false;
        }

        function IsAlreadyInDatabase(){
           
            $Query = "select * from users where email = '".$this->email."'";

            $Result = SqlExec($Query);

            $Result = pg_fetch_array($Result);

            return ($Result) ? true : false;
        }

        function DataBaseInsertUser(){


            if($this->Address->IsAlreadyInDatabase()){

                $idAddr = $this->Address->GetIdAddress();
               
                if(!$this->IsAlreadyInDatabase()){
                    $Query =  "insert into users(email, idaddress, phone,name,password) 
                    values('$this->email', $idAddr, '$this->phone', '$this->completName','".md5($this->password)."')";

                    $Result = SqlExec($Query);

                    return $Result;
                }
            }
        }
    }
