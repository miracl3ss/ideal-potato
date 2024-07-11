const formElem = document.getElementById("loginForm")

formElem.onsubmit = async (e) => {
        e.preventDefault();
    
        let response = await fetch('../src/adminsLogFunc.php', {
          method: 'POST',
          body: new FormData(formElem)
        });
    
        let result = await response.json();
        // alert(result.message);
        if(result.message == 'Admin Verified') {
            window.location.replace('http://u969711v.beget.tech/src/adminsPage.php');
        } else {
            alert(result.message);
        };
    };
