<?php 
   require('top.php');
   //delete leave_type
   if(isset($_GET['type']) && $_GET['type'] == 'delete' && isset($_GET['id'])){
      $id = mysqli_real_escape_string($db, $_GET['id']);
      mysqli_query($db, "DELETE FROM leave_type WHERE id = '$id' ");
   }

   $res = mysqli_query($db, 'SELECT * FROM leave_type order by id desc')
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Leave Type Master </h4>
						   <h4 class="box_title_link"><a href="add_leave_type.php">Add Leave Type</a> </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th width="8%">Sl.</th>
                                       <th width="8%">ID</th>
                                       <th width="67%">Leave Type</th>
                                       <th width="17%"></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php 
                                 $i = 1;
                                 while ($row = mysqli_fetch_assoc($res)){?>
                                    <tr>
                                       <td><?php echo $i ?></td>
                                       <td><?php echo $row['id'] ?></td>
                                       <td><?php echo $row['leave_type'] ?></td>
                                       <td>
                                          <a class="btn btn-primary" href="add_leave_type.php?id=<?php echo $row['id']?>">Edit</a>
                                          <a class="btn btn-danger" href="leave_type.php?id=<?php echo $row['id']?>&type=delete">Delete</a>
                                       </td>
                                    </tr>
                                 <?php 
                                    $i++;
                                 } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
 <?php
require('footer.php');
?> 