<?php

    class database{

        private $host;
        private $dbusername;
        private $dbpassword;
        private $dbname;

        protected function connect(){
            $this->host = "localhost";
            $this->dbusername= 'root';
            $this->dbpassword = '';
            $this->dbname = 'job_portal_db';

            $con = new mysqli($this->host,$this->dbusername,$this->dbpassword,$this->dbname);
            return $con; 

        }


    }
    class session{

        
    }

    class datamodel extends database{
        public function getData($table, $field=' * ', $condition=''){
            $sql = "SELECT $field FROM $table";
            
            if($condition != '' ){
                $sql .= $condition;
            }
            $result = $this->connect()->query($sql);
            print_r($result);
            if($result->num_rows > 0){
                $infodata = array();
                while($row = $result->fetch_assoc()){
                    $infodata[] = $row;
                }
                
                return $infodata;
            }    
 
        }

        public function insertData($table , $column){
            if($column != ''){
                foreach($column as $key => $val){
                    $fieldarr[] = $key;
                    if($key == 'password'){
                        $val = md5($val);
                        
                    }
                    $valuearr[] = $val;
                }
                $fields = implode(',', $fieldarr);
                $value = implode("','", $valuearr);
                $value = "'". $value . "'";

                $sql = "INSERT INTO $table($fields) VALUES( $value) ";
                $result = $this->connect()->query($sql);


                
                return $result;
                

            }
        }

    }

?>