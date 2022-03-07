<?php 
require('top.php');
$department = '';
$id ='';
//Edit the department
if(isset($_GET['id'])){
   $id = mysqli_real_escape_string($db, $_GET['id']);
   $res = mysqli_query($db, "SELECT * FROM department WHERE id = '$id'");
   $row = mysqli_fetch_assoc($res);

   $department = $row['department'];
}
if(isset($_POST['department'])){
   $department = mysqli_real_escape_string($db, $_POST['department']);

   //update department data
   if($id>0){
      $sql = "UPDATE department SET department='$department' WHERE id='$id'";
   } else{
      $sql = "INSERT INTO department (department) VALUES('$department')";
   }
   mysqli_query($db,$sql);
   header('Location:index.php');
   die();
}

?>

<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Department</strong><small> Form</small></div>
                        <div class="card-body card-block">
                     <form method="post">
							   <div class="form-group">
								<label for="department" class=" form-control-label">Department Name</label>
								<input type="text" value="<?php echo $department; ?>" name="department" placeholder="Enter your department name" class="form-control" required></div>
							   
							   <button  type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							  </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
                  
<?php
// require('footer.php');
?>