<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
 <title>IT 207 | Hire a Super Hero </title>
   <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<table id="main">
<tr>
<th id="top" colspan="5"><img src="super.jpg" style="width:100%;height:150px;"/> </th>
</tr>
<tr>
<th id="links" colspan="5"> <a href="index.php">Home</a> | <a href="index.php?links=allheroes">Super Heroes</a> | <a href="index.php?links=about">About</a> | <a href="index.php?links=registration">Customer Registration</a> | <a href="index.php?links=clogin">Customer Login</a> | <a href="index.php?links=alogin">Admin Login</a></th>
</tr>
<tr>
<td id="body" colspan="3"> 
<?php
 if(isset($_GET["links"])&&$_GET["links"]=="about") //about page
{
      echo "<h2>About:</h2>";
      echo "<p>Welcome to Hire a Super Hero. While all is good in the world, super heroes are looking for temporary employment. Here you can find and hire super heroes according to your needs. </p><p>This website was created for educational purposes. You cannot actually hire super heroes using this website.</p>";
}
//registration forms for customers
else if(isset($_GET["links"])&&$_GET["links"]=="registration")
{
if(isset($_GET["completion"])=="yes")
{
$goodToGo=true;
$errorList='';
//makes sure no duplicate names are made
if(isset($_POST['uName']))
{
	$db = mysqli_connect('helios.ite.gmu.edu', 'jbae5', 'IT207', 'jbae5');
		if ($db ==FALSE){
			echo "Error Connection: " . mysql_error();
		}
		$query="SELECT * FROM user WHERE uName='".$_POST['uName']."'";
		//if user name pops up then show error
		$result = mysqli_query($db, $query);
		if(mysqli_num_rows($result) > 0)
		{
		
		$goodToGo=false;
		$errorList = 'User name is already taken, choose another one!<br/>';
		}
		
		
		
		mysqli_close($db);
		
}
if(!isset($_POST['uName'])||trim($_POST['uName'])=='')
{
$errorList.='No user name set<br/>';
$goodToGo=false;
}
if(!isset($_POST['pWord'])||trim($_POST['pWord'])=='')
{
$errorList.='No password set<br/>';
$goodToGo=false;
}
if(!isset($_POST['fName'])||trim($_POST['fName'])=='')
{
$errorList.='Name not set<br/>';
$goodToGo=false;
}
if(!isset($_POST['address'])||trim($_POST['address'])=='')
{
$errorList.='Address not set<br/>';
$goodToGo=false;
}
if(!isset($_POST['city'])||trim($_POST['city'])=='')
{
$errorList.='City not set<br/>';
$goodToGo=false;
}
if(!isset($_POST['state'])||trim($_POST['state'])=='')
{
$errorList.='State not set<br/>';
$goodToGo=false;
}
if(!isset($_POST['zip'])||trim($_POST['zip'])=='')
{
$errorList.='Zip not set<br/>';
$goodToGo=false;
}
if(!isset($_POST['email'])||trim($_POST['email'])=='')
{
$errorList.='Email not set<br/>';
$goodToGo=false;
}
if(!isset($_POST['pNum'])||trim($_POST['pNum'])=='')
{
$errorList.='Phone number not set<br/>';
$goodToGo=false;
}
//actually adds the forms into the database
if($goodToGo==true)
{
	//connect to mysql database
	$db = mysqli_connect('helios.ite.gmu.edu', 'jbae5', 'IT207', 'jbae5'); //change this to reflect database
		if ($db ==FALSE){
			echo "Error Connection: " . mysql_error();
		}
		$query="INSERT INTO user VALUES (DEFAULT, '".$_POST['uName']."','".$_POST['pWord']."','".$_POST['fName']."','".$_POST['address']."','".$_POST['city']."','".$_POST['state']."',{$_POST['zip']},'".$_POST['email']."',{$_POST['pNum']})";
		$result=mysqli_query($db, $query);
		//echo $result;
		//echo "SQL error: ". mysqli_error($db);
		//echo $query;
		//check if entry was successful or not
		if($result == true)
		{
		echo 'Entry was a great success, very nice!';
		}
		else
		{
		echo "SQL error: ". mysqli_error($db);
		echo 'Entry not soo good, needs work';
		}
		
		mysqli_close($db);
}
else
echo $errorList;
}
else
{
?> 
				<form action="index.php?links=registration&&completion=yes" method="post">
				<h3> Registration </h3>
				User Name:<input type="text" name="uName"> <br/>
				Password:<input type="password" name="pWord" maxlength="5"><br/>
				Name:<input type="text" name="fName"><br/>
				Address:<input type="text" name="address"><br/>
				City:<input type="text" name="city"><br/>
				State:<input type="text" name="state" maxlength="2"><br/>
				Zip:<input type="text" name="zip" maxlength="5"><br/>
				Email:<input type="text" name="email"><br/>
				Phone:<input type="text" name="pNum" maxlength="10"><br/>
				<input type="submit" value="Add In">
				</form>
<?php
}
}
else if(isset($_GET["links"])&&$_GET["links"]=="clogin")
{
/*code plays backwards
1.User info is updated and user gets to see their newly updated info
2.User edits account info
3.User is greeted and given options on what to do
4.User enters information
*/
//1. user info is updated and user gets to see their new info
if((isset($_GET['completion'])&&$_GET['completion']=='step2')&&(isset($_GET['do'])&&$_GET['do']=='manage'))
{
$errorList='';
$goodToGo=true;
if(!isset($_POST['fName'])||trim($_POST['fName'])=='')
{
$errorList.='Name not set<br/>';
$goodToGo=false;
}
if(!isset($_POST['address'])||trim($_POST['address'])=='')
{
$errorList.='address not set<br/>';
$goodToGo=false;
}
if(!isset($_POST['city'])||trim($_POST['city'])=='')
{
$errorList.='City not set<br/>';
$goodToGo=false;
}
if(!isset($_POST['state'])||trim($_POST['state'])=='')
{
$errorList.='State not set<br/>';
$goodToGo=false;
}
if(!isset($_POST['zip'])||trim($_POST['zip'])=='')
{
$errorList.='Zip not set<br/>';
$goodToGo=false;
}
if(!isset($_POST['email'])||trim($_POST['email'])=='')
{
$errorList.='Email not set<br/>';
$goodToGo=false;
}
if(!isset($_POST['pNum'])||trim($_POST['pNum'])=='')
{
$errorList.='Phone number not set<br/>';
$goodToGo=false;
}
if($goodToGo==true)
{
		$db = mysqli_connect('helios.ite.gmu.edu', 'jbae5', 'IT207', 'jbae5');
		if ($db ==FALSE){
			echo "Error Connection: " . mysql_error();
		}
					$query = "UPDATE user SET name='".$_POST['fName']."', address='".$_POST['address']."', city='".$_POST['city']."', state='".$_POST['state']."', zip='".$_POST['zip']."', email='".$_POST['email']."' ,  pNum='".$_POST['pNum']."'  WHERE uName ='" . $_POST['uName'] . "' AND pWord ='" . $_POST['pWord'] . "' ";
					if(!mysqli_query($db, $query))
					{
					echo "Error updating record: " . mysqli_error($db);
					}
					else
					{
					echo "Update successful!<br/> Here's what we have on you:<br/>";
					}
				$query = "SELECT * FROM user WHERE uName ='" . $_POST['uName'] . "' AND pWord ='" . $_POST['pWord'] . "' ";
				$result = mysqli_query($db, $query);
				if(mysqli_num_rows($result) > 0)
				{
			while ($row = mysqli_fetch_assoc($result)){
				echo '<table border="1">';
				echo '<tr>';
					echo '<td>Name</td>';
					echo '<td>Address</td>';
					echo '<td>City</td>';
					echo '<td>State</td>';
					echo '<td>Zip</td>';
					echo '<td>Email</td>';
					echo '<td>Phone Number</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>' . $row['name'] . '</td>';
					echo '<td>' . $row['address'] . '</td>';
					echo '<td>' . $row['city'] . '</td>';
					echo '<td>' . $row['state'] . '</td>';
					echo '<td>' . $row['zip'] . '</td>';
					echo '<td>' . $row['email'] . '</td>';
					echo '<td>' . $row['pNum'] . '</td>';
				echo '</tr>';
				echo '</table>';
			}
			
		?>
				<form action="index.php?links=clogin&&completion=step1" method="post">
				
				<input type="hidden" name="uName" value="<?php echo $_POST['uName']?>">
				<input type="hidden" name="pWord" value="<?php echo $_POST['pWord']?>">
				<input type="submit" value="Return to menu">
				</form>
		<?php
					}
					
					
				
				
		mysqli_close($db);
}
		else
		{
		echo $errorList;
		?>
				<form action="index.php?links=clogin&&completion=step1links=clogin&&completion=step1&&do=manage" method="post">
				<h3> Input Invalid </h3>
				<input type="submit" value="Try Again?">
				<input type="hidden" name="uName" value="<?php echo $_POST['uName']?>">
				<input type="hidden" name="pWord" value="<?php echo $_POST['pWord']?>">
				</form>
		<?php
		}
}
//2. user edits their account info
		else if((isset($_GET['completion'])&&$_GET['completion']=='step1')&&(isset($_GET['do'])&&$_GET['do']=='manage'))
		{
		$db = mysqli_connect('helios.ite.gmu.edu', 'jbae5', 'IT207', 'jbae5');
		if ($db ==FALSE){
			echo "Error Connection: " . mysql_error();
		}
				$query = "SELECT * FROM user WHERE uName ='" . $_POST['uName'] . "' AND pWord ='" . $_POST['pWord'] . "' ";
				$result = mysqli_query($db, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_assoc($result)){
					?>
				<form action="index.php?links=clogin&&completion=step2&&do=manage" method="post">
				<h3> Update/Edit Customer Info </h3>
				Name:<input type="text" name="fName" value="<?php echo $row['name'] ?>"> <br/>
				Address:<input type="text" name="address" value="<?php echo $row['address'] ?>"> <br/>
				City:<input type="text" name="city" value="<?php echo $row['city'] ?>"> <br/>
				State:<input type="text" name="state" value="<?php echo $row['state'] ?>"> <br/>
				Zip:<input type="text" name="zip" value="<?php echo $row['zip'] ?>"> <br/>
				Email:<input type="text" name="email" value="<?php echo $row['email'] ?>"> <br/>
				Phone:<input type="text" name="pNum" value="<?php echo $row['pNum'] ?>"> <br/>
				
				<input type="hidden" name="uName" value="<?php echo $_POST['uName']?>">
				<input type="hidden" name="pWord" value="<?php echo $_POST['pWord']?>">
				
				<input type="submit" value="Update">
				</form>
					<?php
				}
				}
				
				
		mysqli_close($db);
		}
		//giving options
		else if(isset($_GET['completion'])&&$_GET['completion']=='step1')
		{
		$db = mysqli_connect('helios.ite.gmu.edu', 'jbae5', 'IT207', 'jbae5');
		if ($db ==FALSE){
			echo "Error Connection: " . mysql_error();
		}
		$query = "SELECT * FROM user WHERE uName ='" . $_POST['uName'] . "' AND pWord ='" . $_POST['pWord'] . "' ";
		$result = mysqli_query($db, $query);
		//password entry is show successful below
		//3. user is greeted on what to do
		if(mysqli_num_rows($result) > 0)
		{
		
			while ($row = mysqli_fetch_assoc($result)){
		echo 'Hello, '.$row['name'].'<br/> What would you like to do today?';
		}
			?>
				<form action="index.php?links=clogin&&completion=step1&&do=manage" method="post">
				
				<input type="hidden" name="uName" value="<?php echo $_POST['uName']?>">
				<input type="hidden" name="pWord" value="<?php echo $_POST['pWord']?>">
				
				<input type="submit" value="Manage Accounts">
				</form>
			<?php
		}
		else
		{
		echo 'No such user name and password combination exist';
		}
		mysqli_close($db);
		}
		//4. User inputs login informatio
else
{
?>
				<form action="index.php?links=clogin&&completion=step1" method="post">
				<h3> Customer Login </h3>
				User Name:<input type="text" name="uName"> <br/>
				Password:<input type="password" name="pWord" maxlength="5"><br/>
				<input type="submit" value="Login">
				</form>
<?php
}
		
}
else if(isset($_GET["links"])&&$_GET["links"]=="alogin")
{
if((isset($_GET['completion'])&&$_GET['completion']=='step2')&&(isset($_GET['do'])&&$_GET['do']=='manage'))
{

$errorList='';
$goodToGo=true;
if(!isset($_POST['superName'])||trim($_POST['superName'])=='')
{
$errorList.='Name not set<br/>';
$goodToGo=false;
}
if(!isset($_POST['gender'])||trim($_POST['gender'])=='')
{
$errorList.='gender not set<br/>';
$goodToGo=false;
}
if(!isset($_POST['comName'])||trim($_POST['comName'])=='')
{
$errorList.='Comic Name not set<br/>';
$goodToGo=false;
}
if(!isset($_POST['serName'])||trim($_POST['serName'])=='')
{
$errorList.='Series not set<br/>';
$goodToGo=false;
}
if(!isset($_POST['supDesc'])||trim($_POST['supDesc'])=='')
{
$errorList.='Description not set<br/>';
$goodToGo=false;
}
if(!isset($_POST['power'])||trim($_POST['power'])=='')
{
$errorList.='Super power not set<br/>';
$goodToGo=false;
}
if($goodToGo==true)
{
echo "Success!";

		$db = mysqli_connect('helios.ite.gmu.edu', 'jbae5', 'IT207', 'jbae5');
		if ($db ==FALSE){
			echo "Error Connection: " . mysql_error();
		}
		$query = "INSERT INTO super VALUES(DEFAULT,'" . $_POST['superName'] . "','" . $_POST['gender'] . "','" . $_POST['comName'] . "','" . $_POST['serName'] . "','" . $_POST['supDesc'] . "','" . $_POST['power'] . "')";
		mysqli_query($db, $query);
		?>
				<form action="index.php?links=alogin&&completion=step1" method="post">
				<input type="hidden" name="uName" value="<?php echo $_POST['uName']?>">
				<input type="hidden" name="pWord" value="<?php echo $_POST['pWord']?>">
				<input type="submit" value="Return to menu">
				</form>
				
				<form action="index.php?links=allheroes&&name=<?php echo $_POST['superName']; ?>" method="post">
				<input type="hidden" name="uName" value="<?php echo $_POST['uName']?>">
				<input type="hidden" name="pWord" value="<?php echo $_POST['pWord']?>">
				<input type="submit" value="View entry added">
				</form>
		<?php
}
		else
		{
		echo $errorList;
		?>
				<form action="index.php?links=alogin&&completion=step1&&do=manage" method="post">
				<h3> Input Invalid </h3>
				<input type="submit" value="Try Again?">
				<input type="hidden" name="uName" value="<?php echo $_POST['uName']?>">
				<input type="hidden" name="pWord" value="<?php echo $_POST['pWord']?>">
				</form>
		<?php
		}

}
	else if((isset($_GET['completion'])&&$_GET['completion']=='step1')&&(isset($_GET['do'])&&$_GET['do']=='manage'))
		{
					?>
				<form action="index.php?links=alogin&&completion=step2&&do=manage" method="post">
				<h3> Enter Hero Info </h3>
				All fields need to be filled <br/>
				Name:<input type="text" name="superName"> <br/>
				Gender:<select  name="gender" > <option value="Male"> Male</option> <option value="Female"> Female</option> <option value="Undefined"> Undefined</option> </select><br/>
				Comic Name:<select  name="comName" > <option value="DC Comics"> DC Comics</option> <option value="Marvel"> Marvel</option></select> <br/>
				Series:<input type="text" name="serName"> <br/>
				Description:<br/><textarea name="supDesc"></textarea> <br/>
				Power:<br/><textarea name="power"></textarea> <br/><br/>
				
				<input type="hidden" name="uName" value="<?php echo $_POST['aName']?>">
				<input type="hidden" name="pWord" value="<?php echo $_POST['apWord']?>">
				
				<input type="submit" value="Add">
				</form>
					<?php
		}
		//giving options
		else if(isset($_GET['completion'])&&$_GET['completion']=='step1')
		{
		$db = mysqli_connect('helios.ite.gmu.edu', 'jbae5', 'IT207', 'jbae5');
		if ($db ==FALSE){
			echo "Error Connection: " . mysql_error();
		}
		$query = "SELECT * FROM admin WHERE aName ='" . $_POST['aName'] . "' AND apWord ='" . $_POST['apWord'] . "' ";
		$result = mysqli_query($db, $query);
		//password entry is show successful below
		//3. user is greeted on what to do
		if(mysqli_num_rows($result) > 0)
		{
		
			while ($row = mysqli_fetch_assoc($result)){
		echo 'Hello, '.$row['aName'].'<br/> What would you like to do today?';
		}
			?>
				<form action="index.php?links=alogin&&completion=step1&&do=manage" method="post">
				
				<input type="hidden" name="aName" value="<?php echo $_POST['aName']?>">
				<input type="hidden" name="apWord" value="<?php echo $_POST['apWord']?>">
				
				<input type="submit" value="Enter a hero into the database">
				</form>
			<?php
		}
		else
		{
		echo 'No such admin name and password combination exist';
		}
		mysqli_close($db);
		}
		//4. Admin inputs login information, there is also a auto fill button for grader to access admin section
		else if(isset($_GET['auto'])&&$_GET['auto']=='yes')
		{
?>
				<form action="index.php?links=alogin&&completion=step1" method="post">
				<h3> Admin Login </h3>
				
				User Name:<input type="text"name="aName"  value="admin" > <br/>
				Password:<input type="password" name="apWord" value="admin" maxlength="5"><br/>
				<input type="submit" value="Login">
				</form>
				<form action="index.php?links=alogin&&auto=yes" method="GET">
				<input type="submit" value="Auto Fill">
				</form>
<?php
}
else
{// the auto fill is acting weird so i had to do a work around and put links and auto in the hidden field otherwise it would just display the home page
?>
				<form action="index.php?links=alogin&&completion=step1" method="post">
				<h3> Admin Login </h3>
				
				User Name:<input type="text" name="aName"> <br/>
				Password:<input type="password" name="apWord" maxlength="5"><br/>
				<input type="submit" value="Login">
				</form>
				
				<form action="index.php?links=alogin&&auto=yes" method="GET">
				<input type="hidden" name="links" value="alogin">
				<input type="hidden" name="auto" value="yes">
				<input type="submit" value="Auto Fill">
				</form>
<?php
}



}
else if(isset($_GET["links"])&&$_GET["links"]=="allheroes") //print list of all super heroes
{
	$string = '<h2>Here\'s a list of all heroes! </h2><br/>';
				
	//connect to mysql database
	$con = mysqli_connect('helios.ite.gmu.edu', 'jbae5', 'IT207', 'jbae5'); //change this to reflect your database
		if ($con ==FALSE){
			echo "Error Connection: " . mysql_error();
		}
	//print super heroes name, company name, and series name
	$i = 1;
	if(isset($_GET['name'])){ //view specifics of a single super hero
		$string = '<br />';
		echo $string;
		$com = "SELECT * FROM super WHERE superName ='" . $_GET['name'] . "'";
		$result = mysqli_query($con, $com);
		if(mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_assoc($result)){
				echo '<table border="1">';
				echo '<tr>';
					echo '<td><b id="name">' . $row['superName'] . '</b></td>';
					echo '<td>Gender: ' . $row['gender'] . '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>Company: ' . $row['comName'] .'</td>';
					echo '<td>Series: ' . $row['serName']  .'</td>';
				echo '</tr>';
				echo '<tr><td colspan="2">'. $row['supDesc'] .'</td></tr>';
				echo '<tr><td colspan="2">Powers: '. $row['power'] .'</td></tr>';
				echo '</table>';
			}
		}
	}
	else{
		echo $string;
		$com = "SELECT superName, comName, serName FROM super";
		$result = mysqli_query($con, $com);
		if (mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_assoc($result)){
				echo '<table>';
				echo '<tr>';
				echo '<td id="count">' . $i . '</td>';
				echo '<td>';
				echo '<b id="name"><a href="index.php?links=allheroes' . '&&name=' . $row['superName'] . '">'; 
				echo $row['superName'] . '</a></b><br />';
				echo '<b>Company: </b>' . $row['comName'] . '<br />';
				echo '<b>Series: </b>' . $row['serName'] . '<br />';
				echo '</td></tr></table>';
				$i++;
				echo '<hr /><br />';
			}
		}
		else { echo "0 results";}
	}
	mysqli_close($con);
}
else if(isset($_GET["links"])&&$_GET["links"]=="dcheroes") //print all DC Comic heroes
{
	echo '<h2>Here\'s a list of DC Comic heroes! </h2><br/>';
	
	//connect to mysql database
	$con = mysqli_connect('helios.ite.gmu.edu', 'jbae5', 'IT207', 'jbae5'); //change this to reflect database
		if ($con ==FALSE){
			echo "Error Connection: " . mysql_error();
		}
	//print super heroes name, company name, and series name that belong to company DC Comics
	$i = 1;
	if(isset($_GET['name'])){
		$com = "SELECT * FROM super WHERE superName ='" . $_GET['name'] . "'";
		$result = mysqli_query($con, $com);
		if(mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_assoc($result)){
				echo '<table border="1">';
				echo '<tr>';
					echo '<td><b id="name">' . $row['superName'] . '</b></td>';
					echo '<td>Gender: ' . $row['gender'] . '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>Company: ' . $row['comName'] .'</td>';
					echo '<td>Series: ' . $row['serName']  .'</td>';
				echo '</tr>';
				echo '<tr><td colspan="2">'. $row['supDesc'] .'</td></tr>';
				echo '<tr><td colspan="2">Powers: '. $row['power'] .'</td></tr>';
				echo '</table>';
			}
		}
	}
	else{
		$com = "SELECT superName, comName, serName FROM super WHERE comName = 'DC Comics'"; //sql command
		$result = mysqli_query($con, $com);
		if (mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_assoc($result)){
				echo '<table>';
				echo '<tr>';
				echo '<td id="count">' . $i . '</td>';
				echo '<td>';
				echo '<b id="name"><a href="index.php?links=allheroes' . '&&name=' . $row['superName'] . '">'; 
				echo $row['superName'] . '</a></b><br />';
				echo '<b>Company: </b>' . $row['comName'] . '<br />';
				echo '<b>Series: </b>' . $row['serName'] . '<br />';
				echo '</td></tr></table>';
				$i++;
				echo '<hr /><br />';
			}
		}
		else { echo "0 results";}
		mysqli_close($con);
	}
}
else if(isset($_GET["links"])&&$_GET["links"]=="marvelheroes") //print all Marvel heroes
{
	echo '<h2>Here\'s a list of Marvel heroes! </h2><br/>';
	
	$con = mysqli_connect('helios.ite.gmu.edu', 'jbae5', 'IT207', 'jbae5'); //change this to reflect database
		if ($con ==FALSE){
			echo "Error Connection: " . mysql_error();
		}
	//print super heroes name, company name, and series name that belong to company Marvel
	$i = 1;
	if(isset($_GET['name'])){
		$com = "SELECT * FROM super WHERE superName ='" . $_GET['name'] . "'";
		$result = mysqli_query($con, $com);
		if(mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_assoc($result)){
				echo '<table border="1">';
				echo '<tr>';
					echo '<td><b id="name">' . $row['superName'] . '</b></td>';
					echo '<td>Gender: ' . $row['gender'] . '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>Company: ' . $row['comName'] .'</td>';
					echo '<td>Series: ' . $row['serName']  .'</td>';
				echo '</tr>';
				echo '<tr><td colspan="2">'. $row['supDesc'] .'</td></tr>';
				echo '<tr><td colspan="2">Powers: '. $row['power'] .'</td></tr>';
				echo '</table>';
			}
		}
	}
	else{
		$com = "SELECT superName, comName, serName FROM super WHERE comName = 'Marvel'"; //sql command
		$result = mysqli_query($con, $com);
		if (mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_assoc($result)){
				echo '<table>';
				echo '<tr>';
				echo '<td id="count">' . $i . '</td>';
				echo '<td>';
				echo '<b id="name"><a href="index.php?links=allheroes' . '&&name=' . $row['superName'] . '">'; 
				echo $row['superName'] . '</a></b><br />';
				echo '<b>Company: </b>' . $row['comName'] . '<br />';
				echo '<b>Series: </b>' . $row['serName'] . '<br />';
				echo '</td></tr></table>';
				$i++;
				echo '<hr /><br />';
			}
		}
		else { echo "0 results";}
		mysqli_close($con);
	}
}
elseif(isset($_GET['search'])){
	echo "<b>Results for Search Term: </b>" . $_GET['search'];

	$con = mysqli_connect('helios.ite.gmu.edu', 'jbae5', 'IT207', 'jbae5'); //change this to reflect database
		if ($con ==FALSE){
			echo "Error Connection: " . mysql_error();
		}
		$i=1;
		if(!empty($_GET['search'])){
			$com = 'SELECT * FROM super WHERE superName = "' . $_GET['search'] . '" OR comName ="' . $_GET['search'] . '" OR serName="' . $_GET['search'] . '"';
			$result = mysqli_query($con, $com);
				
			if (mysqli_num_rows($result) > 0){
				while ($row = mysqli_fetch_assoc($result)){
					echo '<table>';
					echo '<tr>';
					echo '<td id="count">' . $i . '</td>';
					echo '<td>';
					echo '<b id="name"><a href="index.php?links=allheroes' . '&&name=' . $row['superName'] . '">'; 
					echo $row['superName'] . '</a></b><br />';
					echo '<b>Company: </b>' . $row['comName'] . '<br />';
					echo '<b>Series: </b>' . $row['serName'] . '<br />';
					echo '</td></tr></table>';
					$i++;
					echo '<hr /><br />';
				}
			}
			else { echo "<br/>0 results found.";}
		}else{
			echo "<br/>Please enter a value in the search engine.";
		}
		mysqli_close($con);		
}
else
{
echo '<h1>Welcome to Hire a Super Hero</h1><br/>';}
?>
 </td>
<td id="search" colspan="2">
Search Engine here! <br/><br />
	 <form action="index.php" method="GET">
		 Search Term: <input type="text" name="search"><br/>
		 <input type="submit" value="Search">
	 </form>
	 <br/>
View Heroes by Company:	 
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
