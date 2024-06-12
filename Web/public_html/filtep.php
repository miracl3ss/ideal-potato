<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <link rel="stylesheet" href="../styles/filter.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h1>Search</h1>
    <form id="filterForm" method='POST'>
        <label><input type="checkbox" name="category[]" value="1">Apartment</label>
        <label><input type="checkbox" name="category[]" value="2">Cottage</label>
        <label><input type="checkbox" name="category[]" value="3">House</label>
        <button type="submit">Применить фильтр</button>
    </form>
    <div id="results"></div>

    <script>
        $(document).ready(function() {
            $('#filterForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'filterFunction.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#results').html(response);
                    }
                });
            });
        });
    </script>
</body>
</html>
