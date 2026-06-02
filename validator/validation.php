<?php

class validation{
// Email Validation    
    public function emailValidation($email){
            $email = trim($email);

        // Empty check
        if (empty($email)) {
            return [
                'result' => false,
                'message' => 'Email is required'
            ];
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return [
                'result' => false,
                'message' => 'Invalid email format'
            ]; 
        }

        // Allowed extensions
        $domainExtensions = [
            'com',
            'org',
            'net',
            'info',
            'biz',
            'edu',
            'gov',
            'mil',
            'int',
            'dev',
            'app',
            'tech',
            'io',
            'ai',
            'bd',
            'us',
            'uk',
            'in',
            'ca',
            'au',
            'jp',
            'cn',
            'de',
            'fr',
            'ru',
            'pk',
            'br',
            'com.bd',
            'gov.bd',
            'edu.bd',
            'ac.bd',
            'co.uk',
            'gov.uk',
            'ac.uk',
            'online',
            'store',
            'shop',
            'site',
            'website',
            'xyz',
            'club',
            'live',
            'world',
            'digital'
        ];

        $extension = strtolower(pathinfo($email, PATHINFO_EXTENSION));

        if (!in_array($extension, $domainExtensions)) {
            return [
                'result' => false,
                'message' => 'Email Extension Not Allowed'
            ]; 
        }

        return [
            'result' => true
        ];
    }
    // name validation
    public function nameValidation($name){
        return [
            'has_number' => preg_match('/[0-9]/', $name) ? true : false,
            'has_special_character' => preg_match('/[^a-zA-Z\s]/', $name) ? true : false
        ];
    }
    // password formate validation
    public function passwordValidation($password){
        $lenght = strlen($password);
        if($lenght >= 8){
            $check_space = strpos($password, ' ');
            if($check_space == false ){
                $has_number = preg_match('/[0-9]/', $password);
                $has_spacial_character =   preg_match('/[^a-zA-Z\s]/', $password);
                if($has_number == false || $has_spacial_character == false ){
                     return [
                    'result' => false,   
                    'message' => 'password must contain atleast one number(0-9) one spacial character(@#$)'
                    ];
                }else{
                    return ['result' => true];
                }

            }else{
                return [
            'result' => false,   
            'message' => 'password must not contain any space'
            ];
            }
        }else{
            return [
            'result' => false,   
            'message' => 'password must contain at least 8 character'
            ];
        }
    }
    // Birth Date Validation
    public function DOBValidation($dob){
        $dob = new DateTime($dob);
        $today = new DateTime();
        if($dob > $today){
            return false;
        }else{
            return true;
        }
    }
}




?>