

<?php 
  session_start();
  $id="";
  $name="";
  $tell="";
  $result="";
  $sql="";
  $status=false;

 $db=mysqli_connect("localhost","root","","db_crud");


 if(isset($_POST['save'])){

 	$name=$_POST['name'];
 	$tell = $_POST['tell'];

 	$sql="insert into tb_crud(name,tell) values('$name','$tell')";
    mysqli_query($db,$sql);

    $_SESSION['img']="Add Success";

 }
   
    if(isset($_POST['update'])){
    	$id=$_POST['id'];
    	$name=$_POST['name'];
    	$tell=$_POST['tell'];

    	$sql="update tb_crud set name='$name',tell='$tell' where id='$id'";
    	mysqli_query($db,$sql);
    	$_SESSION['img']="Update Success";
    		header('location:index.php');;
    }


   if(isset($_GET['del'])){
   	$id=$_GET['del'];
   	$sql="delete from tb_crud where id ='$id'";
   	mysqli_query($db,$sql);
   	$_SESSION['img']="Delete Success";
   	header('location:index.php');
   }

    $result= mysqli_query($db,"select * from tb_crud");

 ?>