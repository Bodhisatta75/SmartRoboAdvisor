<?php
    $host = "localhost/127.0.0.1";
	$user = "root@localhost";
	$password = "";
	$db = "sba_database";

	mysql_connect(§host,$user,$password);
	$mysql_select_db($db);

	if(isset($_POST['username'])){
		$uname = $_POST['username'];
		$password = $_POST['password'];

		$sql="select * from loginform where user='".$uname."'AND Pass='".$password."'
		limit 1";

		$result=mysql_query($sql);

		if(mysql_num_rows($result)== 1){
			echo "You have succefully logged in";
			exit();
		}
		else{
			echo "You have entered incorrect function";
			exit();
		}
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   <style>
        {
	   padding: 5;
	   margin: 0;
	   box-sizing: border-box;
	}
	body{
	 background: Black;
	}
	.row{
	    background: white;
	    border-radius: 50px;
	}
	img{
	    border-top-left-radius: 30px;
	    border-bottom-left-radius: 30px;
	}
	.btn1{
	    border: none;
	    outline: none;
	    height: 50px;
	    width: 100%;
	    background-color: black;
	    color: white;
	    border-radius: 3px;
	    font-weight: bold;
	}
	.btn1:hover{
	     background: white;
	     border: 1px solid;
	     color: black;
	}
   </style>
	
</head>
  <body>
    <section class="Form my-4 mx-5">
	<div class="container">
            <div class="row no-gutters">
		<div class="col-lg-5">
		    <img src="C:\Users\bodhisattaghosh\Documents\one.jpg" class="img-fluid" alt="">
		</div>
		<div class="col-lg-7 px-5 pt-5">
		<h1>Sign In</h1>
		    <form>
		    	<div class="form-rom">
			    <div class="col-lg-7">
				<input type="email" name = "username" placeholder="Email-Address" class="form-control my-3 p-3">
			    </div>
    			</div>
			<div class="form-rom">
			    <div class="col-lg-7">
				<input type="password" name = "password" placeholder="******" class="form-control my-3 p-3">
			    </div>
			</div>
			<div class="form-rom">
			    <div class="col-lg-7">
				<button type="button" class="btn1">Login</button>
			    </div>
			</div>
			<a href="#">Forgot Password?</a>
			<p>Don't have a Account?<a href="#">Register Here</a></p>
		    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>
