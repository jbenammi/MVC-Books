<?php 
$logged_info = $this->session->userdata('logged_info');
// var_dump($book_info);
// var_dump($logged_info);

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
 		 	<li class="inline-block"><a href="/logout">Logout</a></li>
 		 </ul>
 	</div>
 	<div class="user_info">
 		<h3><?= $book_info[0]['title']; ?></h3>
 		<p>Author: <?= $book_info[0]['auth_name']; ?></p>
 	</div>

 	<div class="body_Left inline-block">
 		<h4>Book Reviews:</h4>
 		<?php 
 			for ($i = 0; $i < count($book_info); $i ++){ ?>
 				<div class="review">
	 				<p class="inline-block">Rating: </p><?php 
	 				for($j = 0; $j < $book_info[$i]['rating']; $j++){ ?>
	 					<div class="star"></div>
	 				<?php	}  ?>
	 				<p><a href="/view_user/<?= $book_info[$i]['users_id']; ?>"> <?= $book_info[$i]['alias']; ?> :</a> <?= $book_info[$i]['review']; ?></p>
	 				<p><?= date("l F jS, Y", strtotime($book_info[$i]['created_on'])); ?></p>	
 				</div>
 		<?php	}	?>
 	</div>
 	 	<div class="body_Right inline-block">
 		<h4>Add a review:</h4>
 		<form action="/post_review/<?= $book_info[0]['book_id']; ?>" method="post">
 		<textarea name="review"></textarea>
 		<label for="rating">Rating:</label>
 		<select name="rating">
 			<option value="1">1</option>
 			<option value="2">2</option>
 			<option value="3">3</option>
 			<option value="4">4</option>
 			<option value="5">5</option>
		</select>
		<input type="hidden" value="<?= $logged_info['id']; ?>" name="user_id" />
 		<input class="block" type="submit" value="Submit Review" />	
 		</form>
 	</div>

 </body>
 </html>