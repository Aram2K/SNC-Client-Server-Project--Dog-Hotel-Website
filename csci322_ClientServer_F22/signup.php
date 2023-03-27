<HTML>
<head>
	<title>Signup</title>
	<script type="text/javascript" src="validator.js">
		<!--
			// you can add script here as well
		 -->
	</script>
	<style>
		body{
			background-image: url('img/orange.jpeg');
			background-size: 50%;
		}

        .login {
            border: 5px solid;
            margin: auto;
            width: 50%;
            padding: 10px;
        }
	</style>

</head>
<body>
<div class="login">
	<h3>Customer Info</h3>
	<form onSubmit="return submitMe(this)" action='makeUsers.php'
			name="custInfo"  method="POST">
		    <p>
			<label><input type="text" id = "firstName" name = "firstName" autofocus="autofocus"/>	
			First name
			</label>
			<p>
			<label><input type="text" id = "lastName" name = "lastName" />	
			Last name
			</label>
			<p>
			<label><input type="email" id = "email" name="email" />
			E-mail
			</label>
			<p>
			<label><input type="password" id = "password" name="password" />
			Password (must be at least 6 characters long)
			</label>
			<p>
			<input type="reset" id="reset"/>
			<input type="submit" id="submit"/>
	</form>
 <a href='login.php'>
        Login
 </a>
 <p>
 <a href="intropage.html">
    <button type="button" class="button">Back</button>
</a>
</div>	

</body>
</HTML>
