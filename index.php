<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
 <title>IT 207 Project hluu and jbae </title>
   <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<table id="main">
<tr>
<th id="top" colspan="5">IT 207 Project! possibly banner?</th>
</tr>
<tr>
<th id="links" colspan="5"> <a href="index.php?links=home">Home</a> | <a href="index.php?links=allheroes">Super Heroes</a> | <a href="index.php?links=about">About</a> | <a href="index.php?links=registration">Customer Registration</a> | <a href="index.php?links=clogin">Customer Login</a> | <a href="index.php?links=alogin">Admin Login</a></th>
</tr>
<tr>
<td id="body" colspan="3"> 
<?php
if(isset($_GET["links"])&&$_GET["links"]=="home")
{
echo 'sample text: <br/>';
echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ante odio, suscipit eget urna sed, aliquam dapibus diam. Cras a massa ut leo fringilla aliquam vitae at risus. Donec id eros consequat, porttitor sapien sit amet, lacinia ligula. Donec egestas vestibulum quam ut posuere. Nulla facilisi. Sed laoreet massa id arcu lobortis lobortis. Nulla et est non sapien porttitor malesuada. Phasellus vestibulum nec purus et pretium. Duis molestie nisi eu purus fermentum, id tempor orci malesuada. Pellentesque ornare, felis a vulputate elementum, massa elit vulputate mi, finibus mollis urna mauris id metus.";
echo "Vivamus mauris tellus, viverra eu sapien vitae, consectetur auctor sapien. Nulla pharetra egestas justo, eget lobortis mauris faucibus ac. Curabitur imperdiet egestas augue non viverra. Duis vel nisl purus. Vestibulum velit nisi, efficitur nec lectus a, consequat mollis purus. Duis sem nisl, auctor at turpis sed, tempus consectetur diam. Integer quis molestie urna. Aliquam tempus, mi in pulvinar pellentesque, massa sem mollis ante, ac posuere lacus neque non massa. Cras eu ligula ultricies, hendrerit augue a, iaculis dolor. Aliquam sapien nulla, vehicula a viverra ac, egestas sed neque. Morbi pellentesque tincidunt ex, ac molestie quam. In laoreet facilisis turpis, sit amet vestibulum neque vestibulum non. Aliquam elementum mi.";
}
else if(isset($_GET["links"])&&$_GET["links"]=="about") //about page
{
      echo "<h2>About:</h2>";
      echo "<p>Welcome to Hire a Super Hero. While all is good in the world, super heroes are looking for temporary employment. Here you can find and hire super heroes according to your needs. </p>";
}
else if(isset($_GET["links"])&&$_GET["links"]=="registration")
{
echo "here you can register! but i havn't added this yet...";
}
else if(isset($_GET["links"])&&$_GET["links"]=="clogin")
{
echo "here you can customer login! but i havn't added this yet...";
}
else if(isset($_GET["links"])&&$_GET["links"]=="alogin")
{
echo "here you can admin login! but i havn't added this yet...";
}
else if(isset($_GET["links"])&&$_GET["links"]=="allheroes") //print list of all super heroes
{
	echo '<h2>Here\'s a list of all heroes! </h2><br/>';
	//connect to mysql database
	$con = mysql_connect('helios.ite.gmu.edu', 'jbae5', 'IT207', 'jbae5'); //change to reflect your database
		if ($con ==FALSE){
			echo "Error Connection: " . mysql_error();
		}
		else{
			echo "connected";
		}
}
else if(isset($_GET["links"])&&$_GET["links"]=="dcheroes")//filter and print list of DC Comic Super Heroes
{
echo 'Here\'s a list of DC heroes! <br/>';
echo '<img src="wip.jpg" height="50%" width="50%">';
}
else if(isset($_GET["links"])&&$_GET["links"]=="marvelheroes") //filter and print list of Marvel Super Heroes
{
echo 'Here\'s a list of Marvel heroes! <br/>';
echo '<img src="wip.jpg" height="50%" width="50%">';
}
else
{
echo 'sample text: <br/>';
echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ante odio, suscipit eget urna sed, aliquam dapibus diam. Cras a massa ut leo fringilla aliquam vitae at risus. Donec id eros consequat, porttitor sapien sit amet, lacinia ligula. Donec egestas vestibulum quam ut posuere. Nulla facilisi. Sed laoreet massa id arcu lobortis lobortis. Nulla et est non sapien porttitor malesuada. Phasellus vestibulum nec purus et pretium. Duis molestie nisi eu purus fermentum, id tempor orci malesuada. Pellentesque ornare, felis a vulputate elementum, massa elit vulputate mi, finibus mollis urna mauris id metus.";
echo "Vivamus mauris tellus, viverra eu sapien vitae, consectetur auctor sapien. Nulla pharetra egestas justo, eget lobortis mauris faucibus ac. Curabitur imperdiet egestas augue non viverra. Duis vel nisl purus. Vestibulum velit nisi, efficitur nec lectus a, consequat mollis purus. Duis sem nisl, auctor at turpis sed, tempus consectetur diam. Integer quis molestie urna. Aliquam tempus, mi in pulvinar pellentesque, massa sem mollis ante, ac posuere lacus neque non massa. Cras eu ligula ultricies, hendrerit augue a, iaculis dolor. Aliquam sapien nulla, vehicula a viverra ac, egestas sed neque. Morbi pellentesque tincidunt ex, ac molestie quam. In laoreet facilisis turpis, sit amet vestibulum neque vestibulum non. Aliquam elementum mi.";
}
?>
 </td>
<td id="search" colspan="2">
 Search Engine here! <br/>
 View Heroes:
 <ul>
 <li> <a href="index.php?links=allheroes">All Heroes</a> </li>
 <li> <a href="index.php?links=dcheroes">DC Heroes</a> </li>
 <li> <a href="index.php?links=marvelheroes">Marvel Heroes</a> </li>
 </ul>
 </td>
</tr>
</table>
</body>
</html>
