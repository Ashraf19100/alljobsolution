

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
            result: true,
            message:''
        };
    }
    // passworrd match
    passwordmatchValidation(password, retypepass){
        if (password != retypepass) {
            return {
                result: false,
                message: 'password Dose not match'
            };
        }else{
           return {
                result: true,
                
            };  
        }
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
    // Exam Year Validation

    ExmYrValidate(exam_level, previousExam, passing_year){
        const yearDiff = parseInt(passing_year) - parseInt(previousExam.passing_year);
        if(yearDiff < 2 && exam_level == 2){
            return {
                result: false,
                message: 'The HSC passing year must be at least 2 years after the SSC passing year.'
            };    
        }else if(yearDiff < 3 && exam_level == 3){
            return {
                result: false,
                message: 'The Bachelor passing year must be at least 3 years after the HSC passing year.'
            };
        }else if(yearDiff < 1 && exam_level == 4){
            return {
                result: false,
                message: 'The Masters passing year must be at least 1 years after the Bachelor passing year.'
            };
        }else{
            return {
                result: true,
            };
        }
    }
}


async function emailduplicatecheck(emailid) {

    const response = await fetch(
        `validator/emailcheck.php?email=${emailid}`
    );
    const data = await response.json();
    if(data != null){
        return {
                result: false,
                message: 'this email has already been registered'
            };
    }else{
        return { 
                result: true,
                message: 'this email is not Registered'   
            };
    }
}

const validate = new Validation(); 
// Registration Validation
const registerForm = document.getElementById('registerForm');


if(registerForm){
    registerForm.addEventListener('submit', async function(e){
        e.preventDefault();
        let hasError = false;
        const nameresult = validate.nameValidation(registerForm.name.value);
        const nameError = document.getElementById('nameError');
        const emailresult = validate.emailValidation(registerForm.email.value);
        const emailError = document.getElementById('emailError');
        const passwordresult = validate.passwordValidation(registerForm.password.value);
        const passError = document.getElementById('passError');

        const emailduplicate = await emailduplicatecheck(registerForm.email.value);
        
        if(!emailduplicate.result){
            document.getElementById('emailError').innerText = emailduplicate.message;
            $(registerForm).find('.' + 'emailid').focus();
            hasError = true;
        }
        if(!nameresult.result){
            document.getElementById('nameError').innerText = nameresult.message;
            $(registerForm).find('.' + 'name').focus();
            hasError = true;
        }
        if(!emailresult.result){
            document.getElementById('emailError').innerText = emailresult.message;
            $(registerForm).find('.' + 'emailid').focus();
            hasError = true;
        }if(!passwordresult.result){
            document.getElementById('passError').innerText = passwordresult.message;
            $(registerForm).find('.' + 'password').focus();
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
            $(personalInfoForm).find('.' + 'dob').focus();
            DOBError = true;
        }
        if(!DOBError){
            personalInfoForm.submit();
        }
    });
}

// Education passing year validation
async function getPreviousExam(examLevel) {

    const response = await fetch(
        `validator/getExmData.php?exam_level=${examLevel}`
    );
    const data = await response.json();

    return data;
}

const educationForm = document.getElementById('educationForm');
if(educationForm){
    educationForm.addEventListener('submit', async  function(e){
        e.preventDefault();
        let eduError = false;
        if(parseInt(educationForm.exam_level.value) > 1){
            const previousexmlvl = parseInt(educationForm.exam_level.value) - 1;
            const previousExam = await getPreviousExam(previousexmlvl);
            const examyearvalidate = validate.ExmYrValidate(educationForm.exam_level.value , previousExam, educationForm.passing_year.value);
            if(!examyearvalidate.result){
                document.getElementById('examYearError').innerText = examyearvalidate.message;
                $(educationForm).find('.' + 'passing_year').focus();
                eduError = true;
            }else{
                eduError = false;
            }

            if(!eduError){
                const checkupdate = await getPreviousExam(educationForm.exam_level.value);
                if(checkupdate != null){
                const updateConfirmation = confirm('Do you want to update your exam information');
                if(updateConfirmation === true ){
                    educationForm.submit();  
                }
                }else{
                    educationForm.submit();
                }
                
            }
        }else{
            if(!eduError){
                const checkupdate = await getPreviousExam(educationForm.exam_level.value);
                if(checkupdate != null){
                const updateConfirmation = confirm('Do you want to update your exam information');
                if(updateConfirmation === true ){
                    educationForm.submit();  
                }
                }else{
                    educationForm.submit();
                }
                
            }
        }
        
    });
}
//reset password validation
const resetPassForm = document.getElementById('resetPassForm');

if(resetPassForm){
   resetPassForm.addEventListener('submit', async function(e){
    
    e.preventDefault();
    let resetError = false;
    const emailvarification = await emailduplicatecheck(resetPassForm.email.value);
        
        if(!emailvarification.result){
            resetError = false;
        }else{
            document.getElementById('resetemailerror').innerText = emailvarification.message;
            $(resetPassForm).find('.' + 'resetemailerror').focus();
            resetError = true;
        }

        if(!resetError){
            resetPassForm.submit();
        }
   }); 
}

const updatePassForm = document.getElementById('updatePassForm');
if(updatePassForm){
    console.log('hi');
    updatePassForm.addEventListener('submit', function(e){
        e.preventDefault();
        let passError = false;

        const passretype = validate.passwordValidation(updatePassForm.password.value);
        const matchpassword = validate.passwordmatchValidation(updatePassForm.password.value, updatePassForm.confirm_password.value);

        if(!passretype.result){
            document.getElementById('passErr').innerText = passretype.message;
            $(updatePassForm).find('.' + 'passErr').focus();
            passError = true;
        }
        if(!matchpassword.result){
            document.getElementById('passmatchErr').innerText = matchpassword.message;
            $(updatePassForm).find('.' + 'passmatchErr').focus();
            passError = true;
        }
        if(!passError){
            updatePassForm.submit();
        }

    });
}

// //Action Permission Validation
// async function actionValidation(id) {
//     const response = await fetch(
//         `validator/actionPermitCheck.php?id=${id}`
//     );
//     const data = await response.json();
//     if(data != null){
//         let permit = [];
//         permit['delete'] = data.delete_data;
//         permit['add'] = data.add_data;
//         permit['edit'] = data.edit_data;
//         permit['activate_deactivate'] = data.activate_deactivate_data;
//         permit['assigned_role'] = data.assigned_role;
        
//         return permit;
//     }else{
//        return null; 
//     }
// }

// const addPermit = document.getElementById("addPermit");
// const deletePermit = document.getElementById("deletePermit");
// const editPermit = document.getElementById("editPermit");
// const AssignedPermit = document.getElementById("AssignedPermit");
// const actv_dactvPermit = document.getElementById("actv_dactvPermit");

// if(addPermit){
//     console.log(0);
//     addPermit.addEventListener('click', async function(e) {
//         e.preventDefault();
//         const permit = await actionValidation(sessionUserId);
//         if(permit != null){
//             if(permit.add == 0){
//             alert('you are not permitted to ADD data');
                
//             }else{
//                 window.location.href = this.href;
//             }
//         }else{
//             alert('you are not permitted to ADD data');
//         }
        
//     })
// }
// if(AssignedPermit){
//     console.log(0);
//     document.querySelectorAll(".AssignedPermit").forEach(link => {
//         AssignedPermit.addEventListener('click', async function(e) {
//             e.preventDefault();
//             const permit = await actionValidation(sessionUserId);
//             if(permit != null){
//                 if(permit.assigned_role == 0){
//                 alert('you are not permitted to Manage Users data');
                    
//                 }else{
//                     window.location.href = this.href;
//                 }
//             }else{
//                 alert('you are not permitted to Manage Users data');
                
//             }
            
//         });
//     });
// }
// if(actv_dactvPermit){
//     console.log(0);
//     actv_dactvPermit.addEventListener('click', async function(e) {
//         e.preventDefault();
//         const permit = await actionValidation(sessionUserId);
//         if(permit != null){
//             if(permit.activate_deactivate == 0){
//             alert('you are not permitted to Active or Deactivate data');
                
//             }else{
//                 window.location.href = this.href;
//             }
//         }else{
//             alert('you are not permitted to Active or Deactivate data');
//         }
        
//     })
// }
// if(editPermit){
//     console.log(0);
//     editPermit.addEventListener('click', async function(e) {
//         e.preventDefault();
//         const permit = await actionValidation(sessionUserId);
//         if(permit != null){
//             if(permit.edit == 0){
//             alert('you are not permitted to edit data');
                
//             }else{
//                 window.location.href = this.href;
//             }
//         }else{
//             alert('you are not permitted to edit data');
//         }
        
//     })
// }
// if(deletePermit){
//     console.log(0);
//     deletePermit.addEventListener('click', async function(e) {
//         e.preventDefault();
//         const permit = await actionValidation(sessionUserId);
//         if(permit != null){
//             if(permit.delete == 0){
//             alert('you are not permitted to Delete data');
                
//             }else{
//                 window.location.href = this.href;
//             }
//         }else{
//             alert('you are not permitted to delete data');
//         }
        
//     })
// }
// function showMessageExp(msg, focusId, theForm) {
//     alert(msg);
//     if (focusId && $(theForm).find('.' + focusId).length && $(theForm).find('.' + focusId).is(':visible')) {
//         $(theForm).find('.' + focusId).focus();
//     }
//     return false;
// }