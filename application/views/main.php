<?php 
$errors = $this->session->flashdata('errors');
$login_error = $this->session->flashdata('login_error');
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="author" content="Jonathan Ben-Ammi">
 	<title></title>
 	<meta name="description" content="">
 	<link rel="stylesheet" type="text/css" href="">

 </head>
 <body>
 	<div class="container">
 		<h3>Welcome!</h3>
 		<form id="Register" action="/register" method="post">
 			<fieldset>
				<legend>Register</legend> 
	                 <?php if(isset($login_error)){ ?>
                        <p class="warning"><?= $login_error; ?></p>
                    <?php  } ?>   
                    <?php if(isset($errors['user_name'])){ ?>
                        <p class="warning"><?= $errors['user_name']; ?></p>
                    <?php  } ?>			
				<label for="user_name">Name: <input type="text" placeholder="John Smith" name="user_name" /></label>
	                <?php if(isset($errors['alias'])){ ?>
	                    <p class="warning"><?= $errors['alias']; ?></p>
	                <?php  } ?>						
                <label for="alias">Alias: <input type="text" placeholder="Johnny" name="alias" /></label>
	                <?php if(isset($errors['email'])){ ?>
	                    <p class="warning"><?= $errors['email']; ?></p>
	                <?php  } ?>						
                <label for="email">E-Mail: <input type="text" placeholder="JohnnyS@something.com" name="email" /></label>
                    <?php if(isset($errors['password'])){ ?>
                        <p class="warning"><?= $errors['password']; ?></p>
                    <?php  } ?>						
				<label for="password">Password: <input type="password" placeholder="********" name="password" /></label>
				<p>*Password should be at least 8 characters</p>
                    <?php if(isset($errors['confirmpass'])){ ?>
                        <p class="warning"><?= $errors['confirmpass']; ?></p>
                    <?php  } ?>						
				<label for="confirmpass">Confirm PW: <input type="password" placeholder="********" name="confirmpass" /></label>
				<input type="submit" value="Register" />
 			</fieldset>
 		</form>
 		
 	</div>
 </body>
 </html>