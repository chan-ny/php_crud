<?php 
  include 'server.php';

  if(isset($_GET['edit'])){

  	$id =$_GET['edit'];
  	$status=true;
    $sql="select * from tb_crud where id='$id'";
    $results=mysqli_query($db,$sql);
    while($rows = mysqli_fetch_array($results)){
         
         $name=$rows['name'];
         $tell=$rows['tell'];
       
    }
  }

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>create to crud</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<?php 
      
      if(isset($_SESSION['img'])){
        
        echo "<div class='msg'>", $_SESSION['img'],"</div>";
      }
	 ?>

	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Tell</th>
				<th colspan="2">Active</th>
			</tr>
		</thead>
		<tbody>

			<?php 
             while ($row= mysqli_fetch_array($result)) {
			 ?>
			<tr>
				<td><?php echo  $row["name"]; ?></td>
				<td><?php echo $row["tell"]; ?></td>
				<td><a href="index.php?edit=<?php echo $row['id']; ?>">Edit</a></td>
				<td><a href="server.php?del=<?php echo $row['id']; ?>">Delete</a></td>
			</tr>

		<?php } ?>
		</tbody>
	</table>

	<br>

	<form method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-grup">
			<label>Name:</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-grup">
			<label>Tell:</label>
			<input type="text" name="tell" value="<?php echo $tell; ?>">
		</div>
		<?php if ($status==false): ?>
		<div class="input-grup">
           <button type="submit" class="btn" name="save">Save</button>
		</div>
		<?php else: ?>
		<div class="input-grup">
           <button type="submit" class="btn" name="update">Update</button>
		</div>
		<?php endif ?>

	</form>

</body>
</html>
