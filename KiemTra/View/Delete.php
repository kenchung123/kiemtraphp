
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
     $id = $_REQUEST["delete"];
    $mysqli = new mysqli('localhost', 'root', '', 'nguoidung');
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $STT = $_GET['delete'];
       $q=$mysqli -> query("DELETE FROM databasekt WHERE STT = $STT");
        if($q==true){
          echo "<p class='text-success'> Đã xóa thành công</p>";
        }else{
          echo "<p class='text-danger'> Xóa thất bại</p>";
        }
    }
   
    ?>
 <div class ="container mt-3">
<h3> Bạn có muốn xóa hay không</h3><hr>
              <form  class="form-horizontal" action="Delete.php?delete=<?php echo $id?>" method="post">
               
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Delete</button>
                      <button  class="btn btn-danger"><a href=" kiemtra.php">Cancel</a></button>
                    </div>
                  </div>
              </form>
 </div>
</body>            
</html>