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
<script>


$(document).ready(function() {
   $('div2').hide();
   $('div3').hide();
   $('div4').hide();
   $('div10').hide();
})

$(document).ready(function(){
  $("#vartotojai").click(function(){
    $('div2').hide();
    $('div3').hide();
    $('div4').hide();
    $('div6').hide();
    $('div7').hide();
    $('div1').show();
  });
  $("#prekes").click(function(){
    $('div1').hide();
    $('div3').hide();
    $('div4').hide();
    $('div6').hide();
    $('div7').hide();
    $('div2').show();
    
  });
  $("#prekiu_isdavimas").click(function(){
    $("div1").hide();
    $("div2").hide();
    $('div4').hide();
    $('div6').hide();
    $('div7').hide();
    $("div3").show();
  });
  $("#paieska").click(function(){
    $("div1").hide();
    $("div2").hide();
    $('div3').hide();
    $("div4").show();
  });
});
setTimeout(function(){
    $('#error').hide()
}, 3000)
</script>
</head>
<body>

<div class="jumbotron">
  <h1 class="display-4">Euro Meka</h1>
</div>
<div class="container">  
  <div class="jumbotron">  
    <h1>Sveiki atvykę į internetinę parduotuvę Euro Meka!</h1>
  </div>       
</div>

<div5>
<nav class="nav" style="background-color: #e3f2fd;" >
  <a class="nav-link" id="vartotojai" href="#" >Vartotojai</a>
  <a class="nav-link" id="prekes" href="#">Prekės</a>
  <a class="nav-link" id="prekiu_isdavimas"href="#">Prekių išdavimas</a>
  <a class="nav-link" id="paieska"href="#">Paieška</a>
</nav>
</div5>

<!----------------------------------------------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------->




    <?php require_once 'process.php'; ?>


    <?php

    if (isset($_SESSION['message'])): ?>

    <div id="error" class="alert alert-<?=$_SESSION['msg_type']?>">

        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);

        ?>
    </div>
    <?php endif ?>
    <div class="container">
    <?php

        $mysqli = new mysqli('localhost', 'Root', 'mypass123', 'el_parduotuve') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM vartotojai") or die($mysqli->error);
        // pre_r($result);
        // pre_r($result->fetch_assoc());
        ?>

<div1>
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Vardas</th>
                        <th>Pavarde</th>
                        <th>Adresas</th>
                        <th>Gimimo data</th>
                        <th colspan="2">Informacijos tvarkymas</th>
                    </tr>
                </thead>
        <?php
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['vardas']; ?></td>
                    <td><?php echo $row['pavarde']; ?></td>
                    <td><?php echo $row['adresas']; ?></td>
                    <td><?php echo $row['gimimo_data']; ?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id']; ?>"
                        class="btn btn-info" id="new">Taisyti Informaciją</a>
                        <a href="process.php?delete=<?php echo $row['id']; ?>"
                         class="btn btn-danger">Ištrinti</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>

        </div>
        <?php

        function pre_r($array) {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }

    ?>

<div class="row justify-content-center">
<form action="process.php" method="POST">


<a id="new" type="button" class="btn btn-warning" href="http://localhost/El_Parduotuve/information.php" >Sužinoti savo vartotojo ID</a>

<div8>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-group">
    <label>Vardas</label>
    <input type="text" name="vardas" class="form-control" value="<?php echo $vardas; ?>" placeholder="Iveskite savo varda">
    </div>
    <div class="form-group">
    <label>Pavarde</label>
    <input type="text" name="pavarde" class="form-control" value="<?php echo $pavarde; ?>" placeholder="Iveskite savo pavarde">
    </div>
    <div class="form-group">
    <label>Adresas</label>
    <input type="text" name="adresas" class="form-control" value="<?php echo $adresas; ?>" placeholder="Iveskite savo adresa">
    </div>
    <div class="form-group">
    <label>Gimimo_data</label>
    <input type="text" name="gimimo_data" class="form-control" value="<?php echo $gimimo_data; ?>" placeholder="Iveskite savo gimimo data">
    </div>
    <div class="form-group">
    <?php
    
    if ($update == true):
    ?>
         <button type="submit" class="btn btn-info" name="update">Atnaujinti</button>
    <?php else: ?>
          <button type="submit" class="btn btn-primary" name="save">Išsaugoti naują vartotoją</button>
    <?php endif; ?>
    </div>
</form>
</div>
</div8>
  </div1>


<!----------------------------------------------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------->


<?php require_once 'process.php'; 
$str = '';?>


<?php

if (isset($_SESSION['message'])): ?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">

    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);

    ?>
</div>
<?php endif ?>
<div class="container">
<?php

    $mysqli = new mysqli('localhost', 'Root', 'mypass123', 'el_parduotuve') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM prekes WHERE statusas='Yra'") or die($mysqli->error);
    // pre_r($result);
    // pre_r($result->fetch_assoc());
    ?>

<div2>

    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Pavadinimas</th>
                    <th>Kiekis</th>
                    <th>Rūšis</th>
                    <th>Data</th>
                    <th>Statusas</th>
                </tr>
            </thead>
    <?php

        while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['pavadinimas']; ?></td>
                <td><?php echo $row['kiekis']; ?></td>
                <td><?php echo $row['rusis']; ?></td>
                <td><?php echo $row['data']; ?></td>
                <td> <?php echo $row['statusas']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>

    </div>
    </div2>
<!----------------------------------------------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------->


<?php require_once 'process.php'; ?>


<?php

if (isset($_SESSION['message'])): ?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">

    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);

    ?>
</div>
<?php endif ?>
<div class="container">
<?php

    $mysqli = new mysqli('localhost', 'Root', 'mypass123', 'el_parduotuve') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM prekiu_isdavimas") or die($mysqli->error);
    ?>

<div3>
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
        while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['vartotojo_id']; ?></td>
                <td><?php echo $row['prekes_id']; ?></td>
                <td><?php echo $row['pardavimo_data']; ?></td>
                <td><?php echo $row['statusas']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>

    </div>

</div>
</div3>

<!----------------------------------------------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------->

<div4>
<form action="http://localhost/El_Parduotuve/second.php" method="POST">
<!--<form action="http://jkm.elinara.lt/~PG00034TT/El_Parduotuve/El_Parduotuve/second.php" method="POST">-->
<label>Paieška pagal vartotojo ID:</label>
<input type="text" name="search">
<input id="paieska2" type="submit" value ="Ieškoti" name="search2"><br> </form>



<form action="http://localhost/El_Parduotuve/third.php" method="POST">
<label for="start">Paieška pagal datą:</label>
<input type="date" id="start" name="trip-start"
       value="2022-01-18"
       min="2000-01-01" max="2100-12-31">
<input type="date" id="start" name="trip-end"
       value="2022-01-18"
       min="2000-01-01" max="2100-12-31">
<input id="paieska3" type="submit" value="Ieškoti" name="data"><br>

    </div4>


<?php
$mysqli = new mysqli('localhost', 'Root', 'mypass123', 'el_parduotuve') or die(mysqli_error($mysqli));
?>
<div10>
<?php
if (isset($search))
$search = $_POST["search2"];
include 'second.php';?>

<?php
$mysqli = new mysqli('localhost', 'Root', 'mypass123', 'el_parduotuve') or die(mysqli_error($mysqli));

if (isset($data)) 
$data = $_POST["data"];
include 'third.php';?>

</div10>
</body>
</html> 