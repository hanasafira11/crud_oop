<?php

    // Include database file
    include 'customers.php';

    $customerObj = new Customers();

    // Edit customer record
    if(isset($_GET['editId']) && !empty($_GET['editId']))   {
        $editId = $_GET['editId];
        $customers = $customerObj->displayRecordById($editId);
    }

    // Update Record in customer table
    if(isset($_POST['update'])) {
        $customerObj->updateRecord($_POST);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>CRUD Data dengan PHP OOP dan MySQL</title>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/4.5.2/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>CRUD Data dengan PHP OOP dan MySQL</h4>
</div><br/>

<div class="container">
  <form action="edit.php" method="POST">
   <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="uname"
    value="<?php echo $customer['name']; ?>" required=""/>
    </div>
    <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="uemail"
    value="<?php echo $customer['email']; ?>" required=""/>
    </div>