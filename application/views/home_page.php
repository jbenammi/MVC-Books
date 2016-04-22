<?php 
$logged_info = $this->session->userdata('logged_info');
// var_dump($logged_info);
// var_dump($book_list);
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
 		 <h3 class="inline-block">Welcome <?= $logged_info['alias']; ?>!</h3>
 		 <ul class="header_links inline-block">
 		 	<li class="inline-block"><a href="/newbook">Add Book and Review</a></li>
 		 	<li class="inline-block"><a href="/logout">Logout</a></li>
 		 </ul>
 	</div>
 	<div class="body_Left inline-block">
 		<h4>Recent Book Reviews:</h4>
 		<?php 
 			for ($i = 0; $i < 3; $i ++){ ?>
			<div class="review">
 				<h4><a href="/book/<?= $review_info[$i]['book_id'];?>"><?= $review_info[$i]['title'];?></a></h4>
 				<div class="review_info">
	 				<p class="inline-block">Rating: </p><?php 
	 				for($j = 0; $j < $review_info[$i]['rating']; $j++){ ?>
	 					<div class="star"></div>
	 				<?php	}  ?>
	 				<p><a href="/view_user/<?= $review_info[$i]['user_id']; ?>"><?= $review_info[$i]['alias']; ?>:</a> <?= $review_info[$i]['review']; ?></p>
	 				<p><?= date("l F jS, Y", strtotime($review_info[$i]['created_on'])); ?></p>
 				</div>
			</div>
 		<?php	}	?>
 		
 	</div>
 	<div class="body_Right inline-block">
 	 		<h4>Other Books with Reviews:</h4>
 	 		<div class="book_list">
 	 		<?php 
 	 		for ($k = 0; $k < count($book_list); $k++) { ?>
 	 		<p><a href="/book/<?= $book_list[$k]['id']; ?>"><?= $book_list[$k]['title']; ?></a></p>
 	 		<?php } ?>
 	 		</div>
 	</div>
 </body>
 </html>