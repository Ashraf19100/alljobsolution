class Validation {

    // Email Validation
    emailValidation(email) {

        email = email.trim();

        // Empty check
        if (email === '') {
            return {
                result: false,
                message: 'Email is required'
            };
        }

        // Email format validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailRegex.test(email)) {
            return {
                result: false,
                message: 'Invalid email format'
            };
        }

        // Allowed extensions
        const domainExtensions = [
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

        // Get extension
        const domainPart = email.split('@')[1].toLowerCase();

        let extension = domainPart.split('.').slice(1).join('.');

        if (!domainExtensions.includes(extension)) {
            return {
                result: false,
                message: 'Email Extension Not Allowed'
            };
        }

        return {
            result: true
        };
    }

    // Name Validation
    nameValidation(name) {
        const has_number = /[0-9]/.test(name);

        if(has_number){
            return {
                result: false,
                message: 'Name can not contain any number'
            
            };
        }
        return{
           result: true 
        };
        
    }

    // Password Validation
    passwordValidation(password) {

        const length = password.length;

        // Minimum length
        if (length < 8) {
            return {
                result: false,
                message: 'password must contain at least 8 characters'
            };
        }

        // Space check
        if (password.includes(' ')) {
            return {
                result: false,
                message: 'password must not contain any space'
            };
        }

        // Number check
        const has_number = /[0-9]/.test(password);

        // Special character check
        const has_special_character = /[^a-zA-Z0-9\s]/.test(password);

        if (!has_number || !has_special_character) {
            return {
                result: false,
                message: 'password must contain at least one number(0-9) and one special character(@#$)'
            };
        }

        return {
            result: true
        };
    }
    //Birth Date validation
    DOBValidation(dob){
        const Bday = new Date(dob);
        const today = new Date();
        

        let ageYears = today.getFullYear() - Bday.getFullYear();
        
        if(Bday > today){
            console.log(ageYears);
            return {
                result: false,
                message: 'Invalid Birth Date '
            };
        }else if(ageYears < parseInt(14)){
            return {
                result: false,
                message: 'Your age must not be less than 14'
            };
        }else{
            return {
                result: true,
            };
        }
        
    }
}


const validate = new Validation(); 
// Registration Validation
const registerForm = document.getElementById('registerForm');

if(registerForm){
    registerForm.addEventListener('submit', function(e){
        e.preventDefault();
        let hasError = false;
        const nameresult = validate.nameValidation(registerForm.name.value);
        const nameError = document.getElementById('nameError');
        const emailresult = validate.emailValidation(registerForm.email.value);
        const emailError = document.getElementById('emailError');
        const passwordresult = validate.passwordValidation(registerForm.password.value);
        const passError = document.getElementById('passError');
        
        if(!nameresult.result){
            document.getElementById('nameError').innerText = nameresult.message;
            hasError = true;
        }
        if(!emailresult.result){
            document.getElementById('emailError').innerText = emailresult.message;
            hasError = true;
        }if(!passwordresult.result){
            document.getElementById('passError').innerText = passwordresult.message;
            hasError = true;
        }

        if(!hasError){
            registerForm.submit();
        }
    });
}


// PersonalInfo Validation
const personalInfoForm = document.getElementById('personalInfoForm');
if(personalInfoForm){
    personalInfoForm.addEventListener('submit', function(e){
        
        
        e.preventDefault();
        let DOBError = false;
        
        const BirthDateValidate = validate.DOBValidation(personalInfoForm.dob.value);
        if(!BirthDateValidate.result){
            document.getElementById('PersonalinfoError').innerText = BirthDateValidate.message;
            DOBError = true;
        }
        if(!DOBError){
            personalInfoForm.submit();
        }
    });
}

// Education passing year validation
const educationForm = document.getElementById('educationForm');
if(educationForm){
    educationForm.addEventListener('submit', function(e){
        e.preventDefault();
        let eduError = false;
        
    });
}
