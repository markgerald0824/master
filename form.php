<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_POST['submit'])) {
            echo "SUBMITTED";
        }
    ?>
    <form action="form.php" method="POST" id="form">
        <input type="submit" name="submit" value="SUBMIT">
    </form>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        var pass = true
        var count = 0
        
        var source = $('#form:first')
        var cloned = source.clone()
        cloned[0].id = 'form2'
        cloned[0].style.display = 'none'
        
        document.body.append(cloned[0])
    })
</script>