const formElem = document.getElementById("deleteBuilds")

formElem.onsubmit = async (e) => {
        e.preventDefault();
        if(window.confirm('All contracts with this building will be also deleted')) {
        let response = await fetch('../src/removeBuilds.php', {
          method: 'POST',
          body: new FormData(formElem)
        });
    
        let result = await response.json();
        alert(result.message);
    } else {
        alert('Nothing deleted')
    }
};