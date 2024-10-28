<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">

$("#paieska2").click(function(){
    $('div6').hide();
    $('div7').hide();
  });
  </script>
  

</head>
<body>
<?php
$mysqli = new mysqli('localhost', 'Root', 'mypass123', 'el_parduotuve') or die(mysqli_error($mysqli));

$str = '';

$str = $_POST["search"];
$sth = $mysqli->query("SELECT * FROM prekiu_isdavimas WHERE vartotojo_id = '$str'"); ?>

<div class="container">
    <br><br><br>
    <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Vartotojo ID</th>
                        <th>Prekes ID</th>
                        <th>Pardavimo data</th>
                        <th>Statusas</th>
                    </tr>
                </thead>
    <?php
	while($row = $sth->fetch_assoc()): ?>
			<tr>
                <td><?php echo $row['vartotojo_id']; ?></td>
                <td><?php echo $row['prekes_id']; ?></td>
                <td><?php echo $row['pardavimo_data']; ?></td>
                <td> <?php echo $row['statusas']; ?></td>
			</tr>
        <?php endwhile; ?>
        </table>
        <a type="button" class="btn btn-danger" href="http://localhost/El_Parduotuve/index.php" >Grižti atgal</a>
    </div> 
</body>
</html>