<!DOCTYPE html>
<html>
	<head>
		<title>Contact Form</title>
		<style>
			form {margin:20px;background-color:rgb(200,200,200); border:1px solid gray;
			padding:20px; border-radius:10px; float:left;}
			label {display:inline-block; width:100px; text-align:right;vertical-align:top;}
			input, textarea, select {margin-bottom:10px; border:1px solid gray; border-radius:5px;
			padding:4px; width:150px;}
			#submit {width: 100px; background-color: rgb(50,150,50); color: white; border: 1px solid white;
			position: relative;left: 105px;}
			input[type=radio] {width:10px;margin-right:5px;}
			[for$="male"] {width:50px; text-align:left;}
			div {float:left;margin-left:25px;}
		</style>
	</head>
	<body>
		
		<form method="post" action="procForm.php">
			<label>First Name:</label>
			<input type="text" name="fName"/><br/>
			<label>Last Name:</label>
			<input type="text" name="lName"/><br/>
			<label>Email:</label>
			<input type="email" name="email"/><br/>
			<label>Gender:</label>
			<input type="radio" name="gender" value="male" id="male"/><label for="male">Male</label>
			<input type="radio" name="gender" value="female" id="female"/><label for="female">Female</label><br/>
			<label>Major:</label>
			<select name="majors">
				<option value="DMP">Digital Media Production</option>
				<option value="IM">Interactive Media</option>
				<option value="RIS">Recording Industry Studies</option>
				<option value="SM">Sports Media</option>
			</select><br/>
			<label>Comment:</label>
			<textarea name="comment"></textarea><br/>
			<input type="submit" value="Submit Form" id="submit" name="submit"/>
			
			
		</form>
		
	</body>
</html>