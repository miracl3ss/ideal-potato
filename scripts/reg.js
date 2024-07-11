const formElem = document.getElementById("register")

formElem.onsubmit = async (e) => {
        e.preventDefault();
    
        let response = await fetch('../src/regFunction.php', {
          method: 'POST',
          body: new FormData(formElem)
        });
    
        let result = await response.json();
        if(result.message == 'User successfully created.') {
            window.location.replace('http://u969711v.beget.tech/src/login.php');
        } else {
            alert(result.message);
        };
    };
