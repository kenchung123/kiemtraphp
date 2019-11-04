
<?php
session_start(); 
if($_SESSION['login']==null)
{
  header("location: Login.php");
  exit();
}
?>
<?php
    $mysqli = new mysqli('localhost', 'root', '', 'nguoidung') or die(mysqli_error($mysqli));
    $sodong1trang=5;
    if(isset($_GET['trang']))
    {
    $trang = $_GET['trang'];
    } else{
      $trang =1;
    }
    $from = ($trang -1)* $sodong1trang;
    $result = $mysqli -> query("SELECT * FROM databasekt LIMIT $from , $sodong1trang") or die($mysqli->error);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bài kiểm tra</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2 style="text-align: center;color :brown">Contacts</h2>
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <div style="margin-bottom: 5px;">
    <a href="Add.php" class="btn btn-success" >Add</a>
  </div>
  <table class="table table-bordered">
    <thead >
      <tr class="table-secondary">
        <th></th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Thao tác</th>
      </tr>
    </thead>  
    <tbody id="myTable">
    <?php while($row = $result -> fetch_array()) : ?>
        <tr>
               <td><?php echo $row['Name'][0]; ?></td>
               <td><?php echo $row['Name']; ?></td>
               <td><?php echo $row['Phone']; ?></td>
               <td><?php echo $row['Email']; ?></td>
               <td>
                <a href="Edit.php?edit=<?php echo $row['STT']; ?>" class="btn btn-danger" >Edit</a>
                <a href="Delete.php?delete=<?php echo $row['STT'];?>" class="btn btn-primary">Delete</a>
              </td>
        </tr>
        
      <?php endwhile; ?>
    </tbody>
  </table> 
  <a class="btn btn-success" href="Logout.php">Close</a>
</div>
<div style="margin-left: 60%;">
            <ul class="pagination">    
                <?php    
                      $x =  $mysqli -> query("SELECT STT FROM databasekt");
                        $tongsodong = mysqli_num_rows($x);
                        $tongsotrang = ceil($tongsodong/$sodong1trang);
                      echo "<li class='page-item disabled'><a class='page-link '> << </a></li>";
                      for($i=1; $i<= $tongsotrang;$i++){
                          echo "<li class='page-item'>";
                          echo "<a class='page-link bg-primary text-white' href='kiemtra.php?trang=$i'>Trang $i </a>";
                          echo "</li>";
                        }
                      echo "<li class='page-item'><a class='page-link'> >> </a></li>";
                ?>
            </ul>
        </div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</body>
</html>
