const formElem = document.getElementById("loginForm")

formElem.onsubmit = async (e) => {
        e.preventDefault();
    
        let response = await fetch('../src/regFunction.php', {
          method: 'POST',
          body: new FormData(formElem)
        });
    
        let result = await response.json();
    
        alert(result.message);
    };
