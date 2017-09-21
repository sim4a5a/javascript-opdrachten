<!DOCTYPE html>
<html>
<?php

if(isset($_FILES['image'])){
  $errors= array();
  $file_name = $_FILES['image']['name'];
  $file_size =$_FILES['image']['size'];
  $file_tmp =$_FILES['image']['tmp_name'];
  $file_type=$_FILES['image']['type'];
  $extension = explode('.',$_FILES['image']['name']);
  $file_ext=strtolower(end($extension));

  $expensions= array("jpeg","jpg","png");
  if(in_array($file_ext,$expensions)=== false){
    $errors="extension not allowed, please choose a JPEG or PNG file.";
  }
  if(empty($errors)===true){
    move_uploaded_file($file_tmp,"images/".$file_name);
    echo "Success";
  } else{
    print_r($errors);
  }
}

?>

<form action="" method="POST" enctype="multipart/form-data">
<input type="file" name="image" />
<input type="submit" name="image"/>
</form>

      <ul>
          <li>File name:<?php echo $_FILES["image"]["name"] ?></li>
          <li>File size:<?php echo $_FILES["image"]["size"] ?></li>
      </ul>
<?php
echo '<img src="images/' .$_FILES["image"]["name"]  .'" width = "150" height=150>';
?>

</html>
