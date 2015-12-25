<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset ="UTF-8">
        <title>Logi sisse</title>
        <link rel="stylesheet" href="digi_login.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	</head>
    <body>
		<div id="form">
    	<form method="post" action="" name="login">
    		<div id="userdiv"><i id="usersign" class="fa fa-user"></i></div>
    		<input type="text" id="user" name="user" required="true" placeholder="Kasutaja"><br/>
    		<div id="pwddiv"><i id="pwdsign"class="fa fa-key"></i></div>
    		<input type="password" id="password" name="password" required="true" placeholder="Parool"><br/>
    		<input type="submit" id="enter"  value="Sisene >>"><br/><br/>
    		<p>Digitaalne tööleht 2014</p>
    	
    	<?php 
    		$loginuser = $_POST["user"];
			$loginpwd = $_POST["password"];
			$con = mysqli_connect("localhost", "tarmo", "sipelkas8", "workers");
        	if (mysqli_connect_errno()) {
            	echo "Failed to connect to MySQL: " . mysqli_connect_error(); }   
			if ($loginuser && $loginpwd){
        		$query = mysqli_query($con, "Select * from logindata where Kasutaja = '$loginuser'");
        		$numrow = mysqli_num_rows($query);
       				if ($numrow >0){
            			while($row = mysqli_fetch_array($query)){
                			$dbuser = $row['Kasutaja'];
                			$dbpwd = $row['Parool'];}
        				if ($dbuser === $loginuser && $dbpwd === $loginpwd){
            				header("Location: http://localhost/worksheet/main.php");;}
						else 
							echo "<p id='message'>Vale kasutaja või parool!</p>";	
					}} 	
    	?>
    	</form>
    	</div>
    	
 
   </body>	       	
</html>    	
    	

    			
    	
    	
    	
    	
    	
    	
    	
   
