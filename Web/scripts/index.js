document.forms.formReg.addEventListener("submit", async (event) => {
    event.preventDefault();
    if(document.getElementById("login").value !== "" && document.getElementById("password").value !== "" && document.getElementById("name").value !== "" && document.getElementById("email").value !== "") {
        let promis = fetch("myback.php" , {
        method: "POST",
        body: new FormData(document.forms.formReg)
        });        
        let result = await promis.json();
        console.log(result);    
    }else{
        alert("простите");    
    }
});