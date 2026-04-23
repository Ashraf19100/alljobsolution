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
   

    class datamodel extends database{
        public function getData($table, $field=' * ', $condition=''){
            $sql = "SELECT $field FROM $table";
            
            if($condition != '' ){
                $sql .= $condition;
            }
            $result = $this->connect()->query($sql);
            
            if($result->num_rows > 0){
                $infodata = array();
                while($row = $result->fetch_assoc()){
                    $infodata[] = $row;
                }
                
                return $infodata;
            }    

            return null;
        }

        public function getSingleData($table, $field=' * ', $condition=''){
            $sql = "SELECT $field FROM $table";
            
            if($condition != '' ){
                $sql .= $condition;
            }
            $result = $this->connect()->query($sql);
            
            if($result){
               return $result -> fetch_object();
            } 

            return null;
 
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
        public function updateData($table , $column, $condition){
            if($column != ''){
                $sql = "UPDATE $table SET ";
                $count = count($column);
                $i=1;
            
                foreach($column as $key => $val){
                    if($i<$count){
                    $sql .= " $key = '".$val."', ";

                    }else{
                    $sql .= " $key = '".$val."' ";

                    }
                    $i++;
                }
                $sql .= $condition;
                
                $result = $this->connect()->query($sql);


                
                return $result;
                

            }
        }
        
        public function fileupload($file, $folder){
            
            $allowed =[ 'jpg', 'jpeg', 'png', 'pdf'];
            $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            if(!in_array($fileExt, $allowed)){
                $message ="Invalid File Extention";
                $result = false;
            }else{
                $result = true;
                $fileName = $_SESSION['email']."-". uniqid("file_", true). ".".$fileExt;
                $destination = "uploads/".$folder."/". $fileName ;
                $checkUpload = move_uploaded_file($file['tmp_name'], $destination);
            }
            
            
          
            if(isset($checkUpload)){
                return [$result, $fileName];
            }else{
                return [$result ,$message];
            }
        }

    }

?>