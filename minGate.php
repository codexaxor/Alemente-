<?php 
include 'connection.php';
session_start();
	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>


<body>

$command= mysqli_query($connection,$query);
  $row_number=mysqli_num_rows($command);
  ?>
  <div class="row">
    <?php  
    if ($row_number>0) {
      while ($item =mysqli_fetch_array($command)) {
        
        
        ?>

        <div class="col-lg-3 box">
          <form method="post" >
            <h6 class="card-title"><?php echo $item['Name'] ?></h6>
            <div class="card-body">
              <img src="images/<?php echo $item['Image']  ?>" class="img-thumbnail" alt="Cinque Terre">
              <h2 class="item-price">Price: <?php echo $item['Price'] ?></h2>
              
              <input type="hidden" name="hidden_Id" value="<?php echo $item["Id"]; ?>"/>
              <input type="hidden" name="hidden_name" value="<?php echo $item["Name"]; ?>"/>
              <input type="hidden" name="hidden_price" value="<?php echo $item["Price"]; ?>"/>
              
              <input type="text" class="form-control" name="ammount" value="1" />
              <input type="submit" name="add_to_cart" class="btn btn-success" value="Add to Cart"/>
              
            </div>
            
          </form>
          
          
        </div>

        <?php
      }
      ?>
    </div>
    <?php  

  }

  ?>
  <!--Adding in Cart-->
  <?php 
      
      if (isset($_POST["add_to_cart"])) {
        
            
        if (isset($_SESSION["cart"])) {
          $item_array_id = array_column($_SESSION["cart"], 0);
          
          

          if (!in_array($_POST["hidden_Id"], $item_array_id)) {
            
            $count= count($_SESSION["cart"]);
            
            $item_array=array(

            $id= $_POST["hidden_Id"],
            $name=$_POST["hidden_name"],
                $price=$_POST["hidden_price"],
                $ammount=$_POST["ammount"]

          );
            $_SESSION["cart"][$count]=$item_array;
            

          } else {
            echo '<script language="javascript">';
        echo 'alert("Already Added")';
        echo '</script>';
            
          }
  
        } else {
          $item_array=array(

            $id= $_POST["hidden_Id"],
            $name=$_POST["hidden_name"],
                $price=$_POST["hidden_price"],
                $ammount=$_POST["ammount"]

          );
          $_SESSION["cart"][0]=$item_array;
        }

      }
   ?>


</body>
</html>