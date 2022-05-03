<?php include 'dbconnect.php';

	include 'viewfile.php'; //FILE ALMOST PREVIEWED, SOME CODE STILL MISSING 
	
	error_reporting();
?>

<!--============================================================================-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Web Archive | Archive Files</title>
	<link rel="icon" href="icon1.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </head>
    <body>
 <style>
 
 #header
{
 background:#00a2d1;
 width:100%;
 height:50px;
 color:#fff;
 font-size:36px;
 font-family:Verdana, Geneva, sans-serif;
 }

 table{
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 80%;
}

 td,  th {
  border: 2px solid #ddd;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2;}
tr:hover {background-color: #ddd;}
th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 20px;
}
.btn:hover {
  background-color: RoyalBlue;
}
  
</style>

<!-- ============================= BUAT TEST DEIT - TITULO================================-->
<div id="header" align="center">
<label align = "center">Sistema Online de Arquivos e Documentações(SOAD)<img src="icon1.png" width="30" height="35"/></label>
</div>

<!--==================LOGIN==================================LOGIN AND LOG OUT===========================-->
<?php
include('functions.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: index.php');
}
?>
<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info" align="right">
			<?php  echo 'Welcome!';?>
			<img src="usericon.png" width="35" height="40"/>
			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['fullname']; ?></strong>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['usertype']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: red;"><button type="button" 
						class="btn btn-labeled btn-info disabled" class="btn-label"><i>Log out</i></button></a></p>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>

<!--=====================LOGIN=====================TOO IHA NEE BA LOGIN NIAN=============================-->
<br>


<!--==============================UPLOADED FILES===================================-->
	<div align ="center">              
	   <class type="text"  align="left"><a class="btn btn-light" href="uploads.php">
	   <i class="fa fa-cloud-upload"><b>GO TO UPLOAD FILE</b></i></a></class>
	</div> 	
<!--================================UPLOADED FILES=========================================-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<h2 color="light-blue" align="center"><b><u>My Archive Files</u></b></h2>
<br>

<!--==============================ATU HILI NIA CATEGORIA=============================-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
<div class="container mt-3" align="center" name="category">
	<select class="custom-select mb-3" method="POST" action="tbl_category">
				<option value="category">Select Category</option>
				<option value="category1"><b>Karta Tama</b></option>
				<option value="category2"><b>Karta Sai</b></option>
	</select>
</div>

<!--==============================ATU SEARCH FILES ===================================-->

<table id="example" class="table table-striped table-bordered" class="table table-hover" style="width:99,5%" align="center">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src= "https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<thead>
   <tr>
    <th>ID</th>
    <th>File Name</th>
	<th>Reference Nº</th>
    <th>Autor Documento</th>
	<th>View File</th>
    <th>Download</th>
	<!--th>CATEGORIA</th-->
	<th>Action</th> <!----COLSPAN => 2---->
   </tr>
</thead>
        
	<tbody>
			<script> 
				function mOver(obj) { obj.innerHTML = <?php echo $file['descript']; ?> }
				function mOver(obj) { obj.innerHTML = <button type="button"><i class="fa fa-bookmark">VIEW FILE</i></button></a> }
			</script>
    <?php
	//$result = mysqli_query($conn, "SELECT * from tbl_uploads order by id desc");
	foreach ($tbl_uploads as $file): ?>
	  <tr>
      <td><?php echo $file['id']; ?></td>
      <td><?php echo $file['name']; ?></td>
      <td><?php echo $file['ref_no']; ?></td>
	  <td><?php echo $file['author']; ?></td>
      <td>
	  	<!----VIEW FILE BUTTON---->
			<a href="uploads/<?php echo $file['name']; ?>" target="_blank" type="application/pdf">
			<button type="button" name="file" class="btn btn-labeled btn-warning" onmouseover="mOver(this)" onmouseout="mOut(this)">
			<i class="fa fa-bookmark">VIEW FILE</i></button></a>
	  </td>
	  
      <td>
		<!----DOWNLOAD FILE BUTTON---->
			<a href="archivefiles.php?file_id=<?php echo $file['id']; ?>"><button type="button" 
			class="btn btn-labeled btn-primary" class="btn-label"><i class="fa fa-download"> DOWNLOAD</i></button></a>
	  </td>
	  <!--td><!--?php echo $tbl_uploads['CatName']; ?></td-->
	  <td>
	    <!----DELETE FILE BUTTON---->
			<a href="dbconnect.php?delete=<?php echo $file['id'];?>"><button class="btn btn-danger">
			<i class="fa fa-trash"> DELETE</i></button></a>
		 
	  <!----EDIT FILE BUTTON---->
			<a href="uploads.php?edit=<?php echo $file['id'];?>" button type="button" 
			class="btn btn-labeled btn-info" class="btn-label" name="edit"><i class="fa fa-edit"> EDIT/UPDATE</i></button></a>
	  </td>
    </tr>
	<?php endforeach;?>


	</tbody>
        
    </table>
	
	<script>
	$(document).ready(function() {
    $('#example').DataTable({
		responsive:true
	});
});
	</script>
<?php

function pre_r($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

?>
	 

<div align="center">
<?php
	include 'includes/footer.php';
?>
</div>
</div>
  </body>
</html>
