
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <?php
    #edit
    $id = $_REQUEST["edit"];
      $mysqli = new mysqli('localhost', 'root', '', 'nguoidung');
         $STT = '';
         $Name = '';
         $Phone = '';
         $Email = '';
        
      if(isset($_GET['edit'])) {
        $STT = $_GET['edit'];
        $sql = "SELECT * FROM databasekt WHERE STT = $STT";
         $aa=  $mysqli -> query($sql); 
         $row = $aa -> fetch_array();
         $STT = $row['STT'];
         $Name = $row['Name'];
         $Phone = $row['Phone'];
         $Email = $row['Email'];
       // }      
      }
      #update
      if ($_SERVER['REQUEST_METHOD']=='POST') {
        $STT = $_POST['STT'];
        $Name = $_POST['Name'];
        $Phone = $_POST['Phone'];
        $Email = $_POST['Email'];
        $sql2 = "UPDATE databasekt SET Name='$Name',Phone='$Phone',Email='$Email' WHERE STT =$STT";
        $q = $mysqli -> query($sql2);
      if($q==true){
        echo "<p class='text-success'> Đã chỉnh sửa thành công</p>";
      }else{
        echo "<p class='text-danger'>Chưa chỉnh sửa</p>";
      }
      }
      
    ?>
    <div class="container">
<h1>Chỉnh sửa thông tin sinh viên</h1><hr>
     
     <form  class="form-horizontal" action="Edit.php?edit=<?php echo $id ?>" method="post">
       <div class="form-group">
           <label class="control-label col-sm-3" ></label>
           <div class="col-sm-5">
             <input type="hidden" class="form-control" id="STT" name="STT" value="<?php echo $STT; ?>" placeholder="STT">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-2" >Name</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $Name; ?> " placeholder="Name">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-2" >Phone</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" id="Phone" name="Phone" value="<?php echo $Phone;?>" placeholder="Phone">
           </div>
         </div>
         <div class="form-group">
           <label class="control-label col-sm-2" >Email</label>
           <div class="col-sm-5">
             <input type="text" class="form-control" id="Email" name="Email" value="<?php echo $Email;?>" placeholder="Email">
           </div>
         </div>
         <div class="form-group">
           <div class="col-sm-offset-2 col-sm-10">
             <button type="submit" class="btn btn-success">Edit</button>
             <button  class="btn btn-danger"><a href="kiemtra.php">Cancel</a></button>
           </div>
         </div>
       </form>
    </div>
</body>
</html>