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

        return {
            has_number: /[0-9]/.test(name),
            has_special_character: /[^a-zA-Z\s]/.test(name)
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
}
// console.log();
// const registerForm = document.getElementById('registerForm');
// const validate = new Validation(); 

// console.log(validate.emailValidation(registerForm.email.value));
// coosssle.log();