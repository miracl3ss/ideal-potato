<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <link rel="stylesheet" href="../styles/adminsPage.css">
</head>
<body>
    <h1>Admins Page</h1>
    <section id="deleteBuilds">
        <h2>Remove buildings from DB</h2>
        <input type="text" name="idRemove" placeholder="Enter ID">
        <button>Remove</button>
    </section>
    <section id="addingBuilds">
        <h2>Adding buildings into DB</h2>
        <input type="text" name="Object" placeholder="Type Of Object">
        <input type="text" name="City" placeholder="City">
        <input type="text" name="Street" placeholder="Street">
        <input type="text" name="buildingNum" placeholder="number of building">
        <input type="text" name="apartmentNum" placeholder="number of apartment">
        <input type="text" name="space" placeholder="space">
        <input type="text" name="description" placeholder="description">
        <input type="checkbox" name="rent" placeholder="rent">
        <input type="text" name="buildingImg" placeholder="name of IMG">
        <input type="file" name="image" placeholder="img">
        <button>Add</button>
    </section>
</body>
</html>