<?php
$insert = false;
$update = false;
$delete = false;
$servername="localhost";
$username = "root";
$password = "";
$database = "notes";

$conn= mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("sorry wo failed to connect". mysqli_connect_error());
}
if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `nte` WHERE `pid` = $sno";
  $result = mysqli_query($conn, $sql);
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['snoEdit'])){
    $sno = $_POST['snoEdit'];
    $title = $_POST['titleEdit'];
    $description = $_POST['descriptionEdit'];
    $sql = "UPDATE `nte` SET `Title` = '$title' , `description` = '$description' WHERE `nte`.`pid` = '$sno'";
    $result = mysqli_query($conn,$sql);
    if($result){
      $update = true;
    }
    else{
      echo "we could not update successfully";
    }
  }
  else{
    $title = $_POST['title'];
    $description = $_POST['description'];
    $sql = "INSERT INTO `nte` (`Title`, `description`) VALUES ('$title','$description')";
    $result = mysqli_query($conn,$sql);
    if($result){
      $insert = true;
    }
    else{
      echo "The record was not inserted in database". mysqli_error($conn);
    }
  }
}


 

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>crud</title>
  </head>
  <body>
  <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form method="post" action="/php-tutorial/crud/index.php">
          <div class="modal-body">
          <input type="hidden" name="snoEdit" id="snoEdit">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Note Title</label>
    <input type="text" name="titleEdit" class="form-control" id="titleEdit" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Note Description</label>
    <input type="textarea" name="descriptionEdit" class="form-control" id="descriptionEdit">
  </div>
          </div>
        
  
  
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Crud-PHP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">abouts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item dropdown">
         
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<?php

if($insert){
  echo "<div class='alert alert-success' role='alert'>
  This is a success alert—check it out!
</div>";
}
?>
 <?php
  if($delete){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
   <?php
  if($update){
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been update successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
    <div class="container mt-3">
        <h2>Add a Note</h2>
    <form method="post" action="/php-tutorial/crud/index.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Note Title</label>
    <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Note Description</label>
    <input type="textarea" name="description" class="form-control" id="description">
  </div>
  
  <button type="submit" class="btn btn-primary">Add Note</button>
</form>
    </div>

    <div class="container my-4">
<table class="table" id="myTable">

  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
    <?php 
       $sql = "SELECT * FROM `nte`";
       $result = mysqli_query($conn , $sql);
       $sno = 0;
       while($row = mysqli_fetch_assoc($result)){
         $sno=$sno + 1;
         echo "<tr>
         <th scope='row'>". $sno ."</th>
         <td>". $row['Title'] ."</td>
         <td>". $row['description'] ."</td>
         <td><button class='edit btn btn-primary' id=". $row['pid'] .">EDIT</button> <button class='delete btn btn-danger' id=d". $row['pid'] ."> DELETE</button> </td>
       </tr>";
         echo "<br>";
       }
       
       
       ?> 
  </tbody>
</table>
    </div>
    <hr>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    
  <script>$(document).ready( function () {
    $('#myTable').DataTable();
} );</script>

<script>
 edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;
        console.log(title, description);
        titleEdit.value = title;
        descriptionEdit.value = description;
        snoEdit.value = e.target.id;
        console.log(e.target.id);
        $('#editModal').modal('toggle');
        
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("delete", );
        sno =e.target.id.substr(1);
        if(confirm("Are you want to delete the data!")){
            window.location = `/php-tutorial/crud/index.php?delete=${sno}`;
        }
      })
    })
</script>
 
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
