<?php 

    class Address{

        public $street;
        public $number;
        public $complement;
        public $neighborhood;
        public $city;
        public $state;
        public $country;
        public $zipCode;

        public function Address(
            $street, $number,
            $complement, $neighborhood, $city,
            $state, $country, $zipCode
        ){

            $this->street = $street;
            $this->number = $number;
            $this->complement = $complement;
            $this->neighborhood = $neighborhood;
            $this->city = $city;
            $this->state = $state;
            $this->country = $country;
            $this->zipCode = $zipCode;
        }

        function ContainsEmptyValue(){

            if(empty($this->street)  ||  empty($this->number)  || empty($this->city)  ||
               empty($this->neighborhood)  ||empty($this->state)  || 
               empty($this->country) || empty($this->zipCode))
                return true;
            
            return false;
        }

        function IsAlreadyInDatabase(){
            
            $Query = "select idAddress from addresses where zipCode = '".$this->zipCode.
                "' and number = '".$this->number. "' and country = '".$this->country."'";

            $Result = SqlExec($Query);
          
            $Result = pg_fetch_array($Result);

            return ($Result) ? true : false;
        }

        function GetIdAddress(){

             $Query = "select idAddress from addresses where zipCode = '".$this->zipCode.
                "' and number = '".$this->number. "' and country = '".$this->country."'";

                $Result = SqlExec($Query);
                $Result = pg_fetch_array($Result);

                return $Result[0];
        }

        function DataBaseInsertAddress(){


            if(!$this->IsAlreadyInDatabase()){
            

                $Query =  "insert into addresses(street, number, neighborhood, 
                            city, state, complement, zipCode, country)".
                            "values('$this->street','$this->number','$this->neighborhood',
                            '$this->city','$this->state','$this->complement','$this->zipCode',
                            '$this->country')";

                $Result = SqlExec($Query);

                return $Result;
            }
        }
    }
