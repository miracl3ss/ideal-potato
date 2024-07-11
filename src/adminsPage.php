<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <link rel="stylesheet" href="../styles/adminsPage.css">
    <script>
        function fetchOptions(table, elementId) {
            fetch(`get_data.php?table=${table}`)
                .then(response => response.json())
                .then(data => {
                    const select = document.getElementById(elementId);
                    select.innerHTML = '';
                    data.forEach(item => {
                        let prefix = 'ID_' + table;
                        console.log(item, table, item.prefix, prefix);
                        const option = document.createElement('option');
                        option.value = item[prefix];
                        option.textContent = item[table];
                        select.appendChild(option);
                    });
                });
        }

        document.addEventListener('DOMContentLoaded', () => {
            fetchOptions('typeOfObject', 'typeOfObject');
            fetchOptions('city', 'city');
            fetchOptions('street', 'street');
        });
    </script>
</head>
<body>
    <h1>Admins Page</h1>
    <form method='post' id="deleteBuilds">
        <h2>Remove buildings from DB</h2>
        <label><input type="text" name="idRemove">Enter ID</label>
        <button>Remove</button>
    </form>
    <form method='post' id="addingBuilds">
        <h2>Adding buildings into DB</h2>
            <input type='text' id='ID_object' name='ID_object'>
            <label for='ID_object'>special ID</label>
            <select name="typeOfObject" id="typeOfObject">
                <option value="-" class="loading"></option>
            </select>
            <label for='typeOfObject'>Type Of Object</label>
            
            <select name="city" id="city">
                <option value="-" class="loading"></option>
            </select>
            <label for='city'>City</label>
            
            <select name="street" id="street">
                <option value="-" class="loading"></option>
            </select>
            <label for='street'>Street</label>
            
            <input type='text' id='buildingNum' name='buildingNum'>
            <label for='buildingNum'>number of building</label>
            
            <input type='text' id='apartmentNum' name='apartmentNum'>
            <label for='apartmentNum'>number of apartment</label>
        
            <input type='text' id='space' name='space'>
            <label for='space'>space</label>

            <input type='text' id='descriptions' name='descriptions'>
            <label for='descriptions'>descriptions</label>
            
            <input type="text" name="rent"><label for='rent'>rent</label>
            <input type="text" name="buildingImg"><label for='buildingImg'>name of IMG</label>
            <input type="file" name="image"><label for='image'>img</label>
        <button>Add</button>
    </form>
    <script src='../scripts/removeFunc.js'></script>
    <script src='../scripts/addFunc.js'></script>
</body>
</html>