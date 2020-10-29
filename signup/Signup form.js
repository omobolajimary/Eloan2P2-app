const form = document.getElementById('form');
const LastName = document.getElementById('LastName ');
const FirstName = document.getElementById('FirstName');
const email = document.getElementById('email');
const Username = document.getElementById('Username');
const Password = document.getElementById('Password');
const Password2 = document.getElementById('Password2'); 

form.addEventListener('submit',(e) => {
    e.preventDefault();

    checkInputs();
});

function checkInputs() {
    //get values for the inputs
    const LastNameValue = LastName.value.trim();
    const FirstNamValue = FirstName.value.trim();
    const emailValue = email.value.trim();
    const UsernameValue = Username.value.trim();
    const PasswordValue = Password.value.trim();
    const Password2Value = Password2.Value.trim();

    if(UsernameValue == ''){
        //show error
        //add error class
        SetErrorFor (Username,'Username cannot be blank');
    }else {
        //add succes class
        setSuccessFor(Username);
    
    }
        
     
    if(emailValue == ''){
        //show error
        //add error class
        SetErrorFor (email,'Email cannot be blank');
    }else if (!isEmail(emailValue)){
        setErrorFor(email,'Email cannot be blank');
    //add succes class
    }else {
        setSuccessFor(email);
    }


   
    if(PasswordValue == ''){
          //show error
          //add error class
           SetErrorFor (Password,'Password cannot be blank');
    }else {
         //add succes class
         setSuccessFor(Password);

    }
     

     if(Password2Value == ''){
        //show error
        //add error class
         SetErrorFor (Password2,'Password cannot be blank');
     }else if(PasswordValue!= Password2Value){
         SetErrorFor (Password2,'Password does not match');
     }else {
         //add succes class
       setSuccessFor(Password2);
     }
}


function setErrorFor(input, message) {
    const formControl = input.parentElement; // .formControl
    const small = formControl.querySelector('small')
    
    //add error message inside small
     small.innerTest = message;

     // add error class
     formControl.className = 'form-control error';
     
} 

function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-control success';
    
}    

function isEmail(email){
    return 
}   