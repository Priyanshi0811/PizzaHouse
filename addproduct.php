
	<?php include 'connection.php'; ?>

<!doctype html>
<html lang="en">
 <head>
  <title>Insert Product</title>
  </head>
 <body>
<form method="POST" action="upload.php" enctype="multipart/form-data">
			<h1>Insert New Product</h1>
		
		
		
		<b>Product Title:-</b>
			<input type="text" name="name" />

			<b>Product Code</b>
			<input type="text" name="code" />
		
		
             
		
		
		<b>Product Image:-</b>
			<input type="file" name="image"/>
		

		

		
		<b>Product Price:-</b>
			<input type="text" name="price"/>
		

		
		<b>Product Description:-</b>
			<textarea name="description" cols="35" ></textarea>
		

               <b>status:-</b>
			<input type="text" name="status" />
		
		
		
			<input type="submit" name="submit" value="Insert Product"/>
		<a href="display.php">display</a>
		</form>
 </body>
 </html>
 