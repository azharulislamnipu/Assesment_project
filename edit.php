<?php include "inc/header.php";  ?>
       <div class="container-fluid">
           <div class="row">
              <div class="container">
                  <div class="row cus_cogo">
                     <div class="col-xs-12 col-sm-3">
                       <div class="logo">
                           <img src="img/logo.png" alt="logo" class="img-responsive img-circle">
                       </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-sm-offset-6">
                         <li class="list-unstyled text-right"><i class="fa fa-bell-o fa-lg" aria-hidden="true"></i></li>
                    </div>
                  </div>
               </div>
           </div>
        </div>
   
        
      
        
         <div class="container">
             <div class="row">	
                <div class="col-xs-12 col-sm-12 cus_nav ">
                 <!--<ul class="nav nav-tabs nav-tabs-justified">
                      <li class="active"><a href="#rec" data-toggle="tab">Products</a></li>
                     <li><a href="#pop" data-toggle="tab">Order</a></li>
                     <li><a href="#ac" data-toggle="tab">Add Category</a></li>
                     <li><a href="#ca" data-toggle="tab">Create Admin</a></li>
                </ul>-->
                <div class="tab-content">
                     <div class="tab-pane active" id="rec">
                      <ul class="media-list">
                <li class="media ">
                    <div class="media-body">
					
					
                       <div class="col-xs-12 col-sm-12 col-md-12 order_table">
                                <p>ALL POSTS</p>
                                <table class="table table-bordered table-hover table-striped table-condensed cus_table" style="text-align:center;">
                                <tr>
                                         <th>Serial No.</th>
                                         <th>Name</th>
                                         <th>Title</th>
                                         <th >Content</th>
                                         <th>Image</th>
                                         <th>Edit Option</th>
                                         <th>Delete Option</th>
                                         
                                     </tr>



<?php 

$query = "SELECT * FROM user";
$user = $db->select($query);

  if($user){
            while($result = $user-> fetch_assoc()){ ?>

									 
                                     <tr>
                                         <td><?php echo $result ['id']; ?></td>
                                         <td><?php echo $result ['name']; ?></td>
                                         <td><?php echo $result ['title']; ?></td>
                                         <td ><?php echo $result ['content']; ?></td>
                            
                                         <td><img src="uploads/<?php echo $result ['image']; ?>" alt="Image Not Uploaded" style="width:100px;height:100px;"></td>
                                         <td class="text-center">
                                           
                                            <a href=""><button class="btn btn-warning ">Update</button></a> 

                                                                          
                                             
                                         </td>

                                         <td>   

                                         <a href="delete.php?id=<?php echo $result ['id'];?>"><button class="btn btn-danger">Delete</button></a>  


                                         </td>
                                     </tr>
                                 
                                     
									 
          <?php  }?>


   <?php  }else{

          header('location: 404.php');
    }?>

					 
                               </table>
                              
                            </div>
                     </div>
                  </li>
              </ul> 
                
                      <ul class="media-list">
                         <li class="media">
                              <div class="media-body ">
							  
							   <h1>Add New Post</h1>

    <?php 


if(!isset($_GET['ed_id']) || $_GET['ed_id'] == NULL){
  
    exit(header("Location: 404.php"));
 
  }else{
  
  $edit_id = $_GET['ed_id'];
 
  }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       $name = $_POST['name'];
       $name = mysqli_real_escape_string($db->link,$name);
       $title = $_POST['title'];
       $title = mysqli_real_escape_string($db->link,$title);
       $content = $_POST['content'];
       $content = mysqli_real_escape_string($db->link,$content);
      

      if(isset($_FILES['image'])){
          $errors= array();
          $file_name = $_FILES['image']['name'];
          $file_size = $_FILES['image']['size'];
          $file_tmp = $_FILES['image']['tmp_name'];
          $file_type = $_FILES['image']['type'];
          $tmp = explode('.',$_FILES['image']['name']);
          $file_ext = strtolower(end($tmp));
             
          //$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
          
          $expensions= array("jpeg","jpg","png");
          
          if(in_array($file_ext,$expensions)=== false){
             $errors[]="extension not allowed, please choose a JPEG or PNG file.";
          }
             
             
         if(empty($errors)==true) {

            move_uploaded_file($file_tmp,"uploads/".$file_name);
          
             
          }else{
             print_r($errors);
          }
       }


       if(empty($name) && empty($title) && empty($content)){
        echo "<span class='error'>Field must not be Empty</span>";
       }else{
        $updatequery = "UPDATE `user` SET `name`= '$name',`title`='$title',`content`='$content',`image`='$file_name' WHERE id=$edit_id";

        $dataUpdate = $db->update($updatequery);

        if($dataUpdate){
         echo "<span class='success'>Data Updated Successfully</span>";
         header('location: index.php');
        }else{
          echo "<span class='error'>Data Not Updated</span>";
        }

       }

    }


    ?>



<?php


$ed_read_query = "SELECT * FROM user WHERE id =  $edit_id";

$edit = $db->select($ed_read_query);

if($edit ){
       while($ed_result = $edit -> fetch_assoc()){ ?>
    



                                   <form  class="cus_form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                                   <div class="col-xs-12 col-sm-5 col-md-5 ">
                                        
                                         <div class="form-group  row">
                                            <label for="serial" class="col-xs-4 cus_lab">Name</label>
                                                 <div class="col-sm-8">
												 
                                                
                                                   <input type="text" class="form-control cus_input" name="name" value="<?php echo $ed_result['name']; ?>"/>
												   
												   
                                                </div>
                                        </div>
                                     
                                       <div class="form-group  row">
                                            <label for="serial" class="col-xs-4 cus_lab"> post Content</label>
                                                 <div class="col-sm-8">
												 
                                                   <textarea name="content" id="" cols="38" rows="5" class="form-control cus_input">
                                                     <?php echo $ed_result['content']; ?>
                                                   </textarea>
												   
												   
                                                </div>
                                        </div>
                                        <div class="form-group  row">
                                            <label for="serial" class="col-xs-4 cus_lab"></label>
                                                 <div class="col-sm-8">
												 
                                                <button type="submit" class="btn btn-success cut_btn" name="addPost">Update Post</button>
												  
                                                  <button type="reset" class="btn btn-warning cut_btn">Reset</button>
                                                </div>
                                        </div>
                                 </div>
                                 <div class="col-xs-12 col-sm-5 col-md-5">
                                    <div class="form-group  row">
                                        <label for="serial" class="col-xs-4 cus_lab">Title</label>
                                            <div class="col-sm-8">


                                             <input type="text" class="form-control cus_input" name="title" value="<?php echo $ed_result['title']; ?>"/>

                                         </div>
                                    </div>
                                 
                                    <div class="form-group row">
                                        <label for="image" class="col-xs-4">Image</label>
                                        <div class="col-sm-8 cus_input">

                                             <input type="file" name="image"  value="sdfsdf" class=" " />

                                        </div>
                                    </div>
									
                                </div>
                           </form>



<?php } ?>
  <!-- end while -->

<?php } ?>





                     </div>
                </li>
            </ul>
        </div>
									
       
		  <!-- Add Category -->
									
        
		  <!-- Category end -->
		  <!-- Category end -->
       
		  <!-- Category end -->
     </div>
   </div>
 </div>
</div>
 <?php include "inc/footer.php" ?>
 
 
    
