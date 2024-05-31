document.forms.formReg.onsubmit = async (e) => {
    e.preventDefault();

    let response = await fetch('regFunction.php', {
      method: 'POST',
      body: new FormData(document.forms.formReg)
    });

    let result = await response.json();

    alert(result.message);
};
