
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <?php
      $mysqli = new mysqli('localhost', 'root', '', 'nguoidung');
    
      if($_SERVER["REQUEST_METHOD"] == "POST") {
             $STT = $_POST['STT'];
            $Name = $_POST['Name'];
            $Phone = $_POST['Phone'];
            $Email = $_POST['Email'];
            $sql = "INSERT INTO databasekt (Name,Phone,Email) VALUES ('$Name','$Phone','$Email')";
        $mysqli -> query($sql); 
        echo "<p class='text-success'>Thêm thành công</p>";
        $_SESSION['message'] = "Address saved"; 
      }
    ?>
    <div class="container">
     <h1>Thêm sinh viên</h1><hr>
     
     <form  class="form-horizontal" action="Add.php" method="post">
       <div class="form-group">    
           <div class="col-sm-5">
             <input type="hidden" class="form-control" id="STT" name="STT" placeholder="STT">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-2" >Name</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" id="Name" name="Name" placeholder="Name">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-2" >Phone</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" id="Phone" name="Phone" placeholder="Phone">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-2" >Email</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" id="Email" name="Email" placeholder="Email">
           </div>
         </div>      
         <div class="form-group">
           <div class="col-sm-offset-2 col-sm-10">
             <button type="submit" class="btn btn-success">Add</button>
             <button  class="btn btn-danger"><a href="kiemtra.php">Cancel</a></button>
           </div>
         </div>
       </form>
    </div>
</body>
</html>