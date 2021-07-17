<?php   
 $link = mysqli_connect("localhost", "root", "", "pizza");  
 $query = "SELECT * FROM products ORDER BY price desc";  
 $result = mysqli_query($link, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>product list using range</title>  
           <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/product.css">
  <link rel="stylesheet" href="css/cart.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:100rem;">  
                <br />  
                <h3 align="center">Load Product on price change </h3>  
                <br />  
                <div align="center">  
                     <input type="range" min="100" max="600" step="100" value="50000" id="min_price" name="min_price" />  
                     <span id="price_range"></span>  
                </div>  
                <br /><br /><br />  
                <div id="product_loading">  
                <?php  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                
                          <div class="product_wrapper">
	    <div class="card" style="width: 18rem;">
      
	
         <img src="<?php echo $row["image"];?>" class="card-img-top" alt="Card image cap" />  
                              
                              <div class="name"> <?php echo $row["name"];?></div>  
                              <button type="submit" class="buy">Add ₹ <?php echo $row["price"];?></button>  
                     </div>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#min_price').change(function(){  
           var price = $(this).val();  
           $("#price_range").text("Product under Price Rs." + price);  
           $.ajax({  
                url:"load_product.php",  
                method:"POST",  
                data:{prices:price},  
                success:function(data){  
                     $("#product_loading").fadeIn(500).html(data);  
                }  
           });  
      });  
 });  
 </script>  

