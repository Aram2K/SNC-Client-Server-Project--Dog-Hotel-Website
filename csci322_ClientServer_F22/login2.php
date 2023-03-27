<HTML>
<head>
	<title>Login</title>
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
	<p style="color:#2B3618;"><b> the username or password is incorrect, try again. </p>
	<form onSubmit="return submitMe(this)" action='readUsers.php'
			name="custInfo"  method="POST">
		    <p>
			<label><input type="email" id = "email" name="email" autofocus="autofocus" />
			E-mail
			</label>
			<p>
			<label><input type="password" id = "password" name="password" />
			Password </label>
			<p>
			<input type="reset" id="reset"/>
			<input type="submit" id="submit"/>
	</form>
 <a href='signup.php'>
        Sign up
 </a>
 <p>
 <a href="intropage.html">
    <button type="button" class="button">Back</button>
</a>
</div>


</body>
</HTML>
