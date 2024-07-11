const formEl = document.getElementById("addingBuilds")

formEl.onsubmit = async (e) => {
        e.preventDefault();
        console.log();
        let response = await fetch('../src/addingBuilds.php', {
          method: 'POST',
          body: new FormData(formEl)
        });
    
        let result = await response.json();
        alert(result.message);
    };