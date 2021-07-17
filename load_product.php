
  <?php  
 //load_product.php  
 $link = mysqli_connect("localhost", "root", "", "pizza");  
 if(isset($_POST["prices"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM products WHERE price <= ".$_POST['prices']." ORDER BY price desc";  
      $result = mysqli_query($link, $query);  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                   
               <div class="product_wrapper">  
                <div class="card" style="width: 18rem;">
                          
                               <img src="'.$row["image"].'" class="card-img-top" alt="Card image cap" /><br>  
                              
                               <div class="name">'.$row["name"].'</div><br>
                               <div class="description">'.$row["description"].'</div><br>
                               <select class="sel form-control" id="mySelect" onChange="myFunction()">
                               <option value="Add ₹ 400">Medium Pan</option>
                               <option value="Add ₹ 300 ">Small Pan</option>
                               <option value="Add ₹ 500 ">Large Pan</option>
                               </select>
                               <button type="submit" class="buy">Add ₹  '.$row["price"].'</button>  
                             </div>  
                        </div>  
                ';  
           }  
      }  
      else  
      {  
           $output = "No Product Found in this range";  
      } 
      ?> 
      <div class="">
<?php echo $output; ?>
</div>
<?php
 } 
 ?> 
 <script>
      
    function myFunction() {
      var x = document.getElementById("mySelect").value;
      document.getElementById("val").innerHTML = x;
    }
 
      </script>
