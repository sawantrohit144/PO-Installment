<?php include ('header.php')?>

<?php
include ('que/db.php');
        if(ISSET($_GET['id'])){
          
          $id = $_GET['id'];
          $sql = $conn->prepare("SELECT * FROM `product` WHERE `p_id`='$id'");
          $sql->execute();
          $row = $sql->fetch();
        }
      ?>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<div class="card">
 <div class="card-header card-header-primary">
      <h4 class="card-title ">Stock Out</h4>
   <hr>
  <div class="card-body">
  <form action="que/product_que.php" method="POST">
      <div class="form-group" >
  
    <input name="id" type="hidden" value="<?php echo $row['p_id']?>">

   <div class="row">
    <div class="col">
      <label>Code:</label>
      <input type="text" class="form-control" name="code" required value="<?php echo $row['p_code']?>" readonly>
    </div>
    <div class="col">
       <label>Product:</label>
      <input type="text" class="form-control" name="name" required value="<?php echo $row['p_name']?>" readonly>
    </div>
  </div>
  </div>
 <div class="form-group " hidden="hidden">
   <div class="row">
    <div class="col">
      <label>Description:</label>
      <input type="hidden" class="form-control" name="description" required value="<?php echo $row['p_description']?>">
    </div>
    <div class="col">
       <label>Category:</label>
      <input type="hidden" class="form-control" name="category" required value="<?php echo $row['p_category']?>">
    </div>
     
  </div>
  </div>

 <div class="form-group " >
   <div class="row">
    <div class="col">
      <label>Quantity:</label>
      <input type="number" class="form-control" name="quantity" id="quantity" required value="<?php echo $row['p_quantity']?>" readonly>
    </div>
    <div class="col">
       <label>Supplier Price:</label>
      <input type="number" class="form-control" name="value" id="value" required value="<?php echo $row['p_mprice']?>" readonly>
    </div>
    <div class="col">
       <label>Stock-Out:</label>
      <input type="number" class="form-control" name="stockout" id="stockout" required >
    </div>
     
  </div>
  </div>

  <div class="form-group " >
   <div class="row">     
<script>

    $('#stockout').keyup(function(){
    var order;
    var value;
    order = parseFloat($('#stockout').val());
    value = parseFloat($('#value').val());
    var c1 = order * value;
    
    
    var newvalue = c1;
    
     $('#newvalue').val(newvalue.toFixed(2));
    });


</script>
     

    <div class="col">
       <label>Totol Price:</label>
      <input type="number" class="form-control" name="newvalue" id="newvalue" required readonly>
    </div>
     
  </div>
  </div>


      <label>User ID:</label>
            <input type="text" class="form-control" name="supname" value="<?php echo $username; ?>" required readonly>
          </div>
        

      <div class="modal-footer">
       <a href="stock_manage.php"> <button type="button" class="btn btn-secondary" style="font-size: 12px;">Close</button></a>
        <button type="submit" class="btn btn-primary" name="outproduct" style="font-size: 12px;">Stock-Out</button>
      </div>
</form>