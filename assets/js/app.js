const pw1 = document.getElementById("password1");  
const pw2 = document.getElementById("password2"); 
const info = document.querySelector(".info")
const eye1 = document.getElementById("iconeye1")
const eye2 = document.getElementById("iconeye2")
const signup_btn = document.getElementById("signup")

    pw2.addEventListener("keyup", ()=>{
        if (pw2.value==pw1.value) {
            info.classList.remove("text-danger")
            info.classList.add("text-success")
            info.classList.add("fw-bold")
            info.textContent = "Passwords Match"
            signup_btn.removeAttribute("disabled");
        } else {
            info.classList.remove("text-success")
            info.classList.add("text-danger")
            info.classList.add("fw-bold")
            info.textContent = "Passwords do not Match"
            signup_btn.setAttribute("disabled", "true");
        }
    })

    eye1.addEventListener("click", ()=>{
         if(eye1.childNodes[0].classList.contains("fa-eye-slash")){
             pw1.setAttribute("type", "text");
             eye1.innerHTML = '<i class="fa fa-eye"></i>';
         }else{
            pw1.setAttribute("type", "password");
            eye1.innerHTML = '<i class="fa fa-eye-slash"></i>';
         }
   })

     eye2.addEventListener("click", ()=>{
         if(eye2.childNodes[0].classList.contains("fa-eye-slash")){
             pw2.setAttribute("type", "text");
             eye2.innerHTML = '<i class="fa fa-eye"></i>';
         }else{
            pw2.setAttribute("type", "password");
            eye2.innerHTML = '<i class="fa fa-eye-slash"></i>';
         }
   })


