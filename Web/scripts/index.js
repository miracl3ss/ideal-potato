const formElem = document.getElementById("register")

formElem.onsubmit = async (e) => {
        e.preventDefault();
    
        let response = await fetch('regFunction.php', {
          method: 'POST',
          body: new FormData(formElem)
        });
    
        let result = await response.json();
    
        alert(result.message);
    };
