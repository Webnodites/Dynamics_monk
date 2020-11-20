 <?php 
 require_once 'connect.php';

  

if(isset($_POST['addfinish']))
{

$fname= $_POST["fname"];
$pid= $_POST["pid"];
$file= $_FILES["fimg"]["name"];
$date = date('d-m-Y h:i:sa');

$z= "INSERT INTO `productfinishes`(`pid`, `fname`, `fimg`) VALUES('$pid','$fname','$file')";


$res = mysqli_query($con,$z);
if($res)
{
$a5=move_uploaded_file($_FILES["fimg"]["tmp_name"],"../images/product/".$_FILES["fimg"]["name"]);

echo "<script>
      alert('Finish added Successfully')
      </script>";
      header("location:managefinishes.php?pid=$pid");
}
else{
    echo "<script>
      alert('error')
      </script>";
    header("location:managefinishes.php?pid=$pid");
}

}
?>
   