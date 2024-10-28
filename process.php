<?php

session_start();

$mysqli = new mysqli('localhost', 'Root', 'mypass123', 'el_parduotuve') or die(mysqli_error($mysqli));


function RemoveSpecialChar($vardas) {
  
  // Using str_replace() function 
  // to replace the word 
  $res = str_replace( array( '\'', '"', '/', '*',
  ',' , ';', '<', '>'),'', $vardas);

  // Returning the result 
  return $res;
  }


$id = 0;
$update = false;
$vardas = '';
$vardas1 = '';
$pavarde = '';
$adresas = '';
$gimimo_data = '';
$vartotojo_id = '';



if (isset($_POST['save'])){
    $vardas = $_POST['vardas'];
    $pavarde = $_POST['pavarde'];
    $adresas = $_POST['adresas'];
    $gimimo_data = $_POST['gimimo_data'];
    

    $vardas1 = RemoveSpecialChar($vardas); 
    $pavarde1 = RemoveSpecialChar($pavarde); 
    $adresas1 = RemoveSpecialChar($adresas); 
    $gimimo_data1 = RemoveSpecialChar($gimimo_data); 

    $mysqli->query("INSERT INTO vartotojai (vardas, pavarde, adresas, gimimo_data) VALUES('$vardas1', '$pavarde1', '$adresas1', '$gimimo_data1')") or
            die($mysqli->error);

    $_SESSION['message'] = "Jūsų įrašas buvo išsaugotas!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM vartotojai WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Jūsų įrašas buvo ištrintas!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM Vartotojai WHERE id=$id") or die($mysqli->error());
    if ($result->num_rows){
        $row = $result->fetch_array();
        $vardas = $row['vardas'];
        $pavarde = $row['pavarde'];
        $adresas = $row['adresas'];
        $gimimo_data = $row['gimimo_data'];
    }
}

if (isset($_POST['update'])){

    $id = $_POST['id'];
    $vardas = $_POST['vardas'];
    $pavarde = $_POST['pavarde'];
    $adresas = $_POST['adresas'];
    $gimimo_data = $_POST['gimimo_data'];

    $vardas1 = RemoveSpecialChar($vardas); 
    $pavarde1 = RemoveSpecialChar($pavarde); 
    $adresas1 = RemoveSpecialChar($adresas); 
    $gimimo_data1 = RemoveSpecialChar($gimimo_data); 

    $mysqli->query("UPDATE vartotojai SET vardas='$vardas1', pavarde='$pavarde1', adresas='$adresas1', gimimo_data='$gimimo_data1' WHERE id=$id") or
        die($mysqli->error);

    $_SESSION['message'] = "Jūsų įrašas buvo pataisytas!";
    $_SESSION['msg_type'] = "warning";

    header('location: index.php');
}
