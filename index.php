<html>
<head>
<title>Binary Encoder and Decoder</title>
</head>
<body>
<center>
<h1>Binary Encoder and Decoder</h1>
<p></i>Encode any ascii words into binary, or decode any binary into ascii words.</i></p>


<style>
.container{
    display:inline-block;
}
</style>

<div class="container">
	<h3>Encode :</h3>
	<form action="index.php" method="get">
		<textarea rows="15" cols="50" name="encode"><?php echo (isset($_GET["encode"]) ? $_GET["encode"] : null) ?></textarea><br><br>
		<input type="submit" value="Encode">
	</form>
</div>

<div class="container">
	<h3>Decode : </h3>
	<form action="index.php" method="get">
		<textarea rows="15" cols="50" name="decode"><?php echo (isset($_GET["decode"]) ? $_GET["decode"] : null) ?></textarea><br><br>
		<input type="submit" value="Decode">
	</form>
</div>
<br>

<?php
if(isset($_GET["encode"]))
{
	//encode
	$words = (isset($_GET["encode"]) ? $_GET["encode"] : null) ;
	$encoded = "";

	//find length of words. to use for loop
	$len = strlen($words);

	$i=0;

	for($i=0;$i<$len;$i++)
	{
		$itg = ord($words[$i]);  //convert char to decimal
		$bin = decbin($itg); //convert decimal to binary
		$new = str_pad($bin, 8, "0", STR_PAD_LEFT); //function to determine if binary less than 8bit, add 1bit infront.
		$encoded .= $new; //store the binary in variable.
	}
	
	echo "<center>";
	echo "<h3>Result : </h3>";
	echo "<textarea rows='15' cols='50' name='result'>";
	echo "$encoded";
	echo "</textarea>";
	echo "</center>";
	
}
else if(isset($_GET["decode"]))
{
	
	//decode
	$bin = (isset($_GET["decode"]) ? $_GET["decode"] : null) ;
	$decoded = "";

	$arr = str_split($bin, 8);

	//count size of array. to use for loop
	$size = count($arr);

	$i=0;

	for($i=0;$i<$size;$i++)
	{
		$dec = bindec($arr[$i]); //convert binary to decimal
		$char = chr($dec); //convert decimal to char
		$decoded .= $char; //store the char in variable, to make words
	}

	echo "<center>";
	echo "<h3>Result : </h3>";
	echo "<textarea rows='15' cols='50' name='result'>";
	echo "$decoded";
	echo "</textarea>";
	echo "</center>";
	
}
else if(isset($_GET["decode"]) && isset($_GET["encode"]))
{
	echo "<script>alert('ERROR!')</script>";
}

?>



</center>
</body>
</html>