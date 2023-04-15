const container = document.querySelector(".container"),
pwShowHide = document.querySelectorAll(".showHidePw"),
pwFields = document.querySelectorAll(".password"),
signUp = document.querySelector(".signup-link"),
login = document.querySelector(".login-link");

/* show/hide password and change icon */
pwShowHide.forEach(eyeIcon => {
    eyeIcon.addEventListener("click", ()=> {
        pwFields.forEach(pwfield => {
            if(pwfield.type === "password") {
                pwfield.type = "text";

                pwShowHide.forEach(icon => {
                    icon.classList.replace("uil-eye-slash", "uil-eye");
                })
            }else{
                pwfield.type = "password";

                pwShowHide.forEach(icon => {
                    icon.classList.replace("uil-eye", "uil-eye-slash");
                })
            }

        })
    })
}) 

signUp.addEventListener("click", ( ) => {
    container.classList.add("active");
});
login.addEventListener("click", ( ) => {
    container.classList.remove("active");
});

//prevent pasting in phone number input
window.onload = () => {
    const phoneNumber = document.getElementById('phoneNumber');
    phoneNumber.onpaste = e => e.preventDefault();
   }

//prevent pasting in personal code input
window.onload = () => {
    const personalCode = document.getElementById('personalCode');
    personalCode.onpaste = e => e.preventDefault();
   };