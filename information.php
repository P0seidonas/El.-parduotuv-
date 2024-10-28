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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php
function RemoveSpecialChar($vardas) {
  
  // Using str_replace() function 
  // to replace the word 
  $res = str_replace( array( '\'', '"', '/', '*',
  ',' , ';', '<', '>'),'', $vardas);

  // Returning the result 
  return $res;
  }


$mysqli = new mysqli('localhost', 'Root', 'mypass123', 'el_parduotuve') or die(mysqli_error($mysqli));
$id = '';
$vardas = '';
$pavarde= '';
$str= '';
$stp= '';
$search= '';

?>

<div6>
<div class="container">
<form method="POST">
    <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
    <table class="table">
    <div class="form-group">
    <label>Vardas</label>
    <input type="text" name="vardas" class="form-control" placeholder="Iveskite savo varda">
    </div>
    <div class="form-group">
    <label>Pavarde</label>
    <input type="text" name="pavarde" class="form-control" placeholder="Iveskite savo pavarde">
    <button type="submit" class="btn btn-success" name="search">Ieškoti</button></form>

<a type="button" class="btn btn-danger" href="http://localhost/El_Parduotuve/index.php" >Grižti atgal</a>    
    </div>
                    </tr>
                </thead>
            </table>
</form>
</div>
</div6>

    <?php
$search = $_POST["search"];
if(isset ($search)): 

$vardas = $_POST["vardas"];
$pavarde = $_POST["pavarde"];

$str = RemoveSpecialChar($vardas); 
$stp = RemoveSpecialChar($pavarde);

$sth = $mysqli->query("SELECT * FROM vartotojai WHERE vardas = '$str' && pavarde = '$stp'"); ?>

<div class="container">
    <br><br><br>
    <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Vardas</th>
                        <th>Pavarde</th>
                        <th>ID</th>
                    </tr>
                </thead>
    <?php
	    while($row = $sth->fetch_assoc()): ?>
			<tr>
                <td><?php echo $row['vardas']; ?></td>
                <td><?php echo $row['pavarde']; ?></td>
                <td><?php echo $row['id']; ?></td>
			</tr>
        <?php endwhile; ?>
        </table>
    </div>

    <?php endif ?>

</body>
</html>