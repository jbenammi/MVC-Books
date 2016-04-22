<?php 

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="author" content="Jonathan Ben-Ammi">
 	<title></title>
 	<meta name="description" content="">
 	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">

 </head>
 <body>
	<div class="header">
 		 <ul class="header_links inline-block">
 		 	<li class="inline-block"><a href="/home_page">Home</a></li>
 		 	<li class="inline-block"><a href="/newbook">Add Book and Review</a></li>
 		 	<li class="inline-block"><a href="/logout">Logout</a></li>
 		 </ul>
 	</div>
 	<div class="user_info">
 		<h3>User Alias: <?= $user_info['alias']; ?></h3>
 		<p>Name: <?= $user_info['user_name']; ?></p>
 		<p>Email: <?= $user_info['email']; ?></p>
 		<p>Total Reviews: <?= $user_info['total_reviews']; ?></p>
 	</div>
 	<div class="body_Left ">
 		<h3>Posted reviews on the following books:</h3>
 		<?php 
 		for ($i = 0; $i < count($book_list); $i ++){ ?>
 			<p><a href="/book/<?= $book_list[$i]['book_id']; ?>"><?= $book_list[$i]['title']; ?></a></p>
 		<?php } ?>
 	</div>
 </body>
 </html>