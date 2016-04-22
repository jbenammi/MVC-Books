<?php 
$logged_info = $this->session->userdata('logged_info');
var_dump($authors);
var_dump($logged_info);

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="author" content="Jonathan Ben-Ammi">
 	<title></title>
 	<meta name="description" content="">
 	<link rel="stylesheet" type="text/css" href="/assets/css/style">

 </head>
 <body>
 		<div class="header">
 		 <ul class="header_links inline-block">
 		 	<li class="inline-block"><a href="/home_page">Home</a></li>
 		 	<li class="inline-block"><a href="/logout">Logout</a></li>
 		 </ul>
 	</div>
	<h3>Add a New Book Title and a Review:</h3>
	<div class="body_Left">
		<form action="/new_book" method="post">
			<label for="title">Book Title: <input type="text" placeholder="Where the Red Fern Grows" name="title" /></label>
			<label for="author">Select Author from list</label>
			<select name="author">
				<option value="New Author">New Author</option>
				<?php for ($i = 0; $i < count($authors); $i ++){ ?>
				<option value="<?= $authors[$i]['id']; ?>"><?= $authors[$i]['auth_name']; ?></option>
			<?php	} ?>
			</select>
			<p>OR</p>
			<label for="new_author">New Author:<input type="text" placeholder="Peter Pan" name="new_author" /></label>
			<label for="review">Review: <textarea name="review"></textarea></label>
		<label for="rating">Rating:</label>
		<select name="rating">
 			<option value="1">1</option>
 			<option value="2">2</option>
 			<option value="3">3</option>
 			<option value="4">4</option>
 			<option value="5">5</option>
		</select>
		<input type="hidden" value="<?= $logged_info['id'];?>" name="user_id"/>
		<input type="submit" value="Submit" />
		</form>
	</div>


 </body>
 </html>