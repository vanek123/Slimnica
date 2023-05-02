const container = document.querySelector(".container"),
pwShowHide = document.querySelectorAll(".showHidePw"),
pwFields = document.querySelectorAll(".password");

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

function closeAlert() {
    document.getElementById("alert").style.display = "none";
  }