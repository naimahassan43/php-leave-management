<?php 
require('top.php');
$leave_type = '';
$id ='';
//Edit the department
if(isset($_GET['id'])){
   $id = mysqli_real_escape_string($db, $_GET['id']);
   $res = mysqli_query($db, "SELECT * FROM leave_type WHERE id = '$id'");
   $row = mysqli_fetch_assoc($res);

   $leave_type = $row['leave_type'];
}
if(isset($_POST['leave_type'])){
   $leave_type = mysqli_real_escape_string($db, $_POST['leave_type']);

   //update department data
   if($id>0){
      $sql = "UPDATE leave_type SET leave_type='$leave_type' WHERE id='$id'";
   } else{
      $sql = "INSERT INTO leave_type (leave_type) VALUES('$leave_type')";
   }
   mysqli_query($db,$sql);
   header('Location:leave_type.php');
   die();
}

?>

<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Leave Type</strong><small> Form</small></div>
                        <div class="card-body card-block">
                     <form method="post">
							   <div class="form-group">
								<label for="leave_type" class=" form-control-label">Leave Type</label>
								<input type="text" value="<?php echo $leave_type; ?>" name="leave_type" placeholder="Enter your leave type" class="form-control" required></div>
							   
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
require('footer.php');
?>