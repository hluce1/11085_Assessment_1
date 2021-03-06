<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
	
    // Include the config file that we created before
    require "../config.php"; 
    
    // This is called a try/catch statement 
	try {
        // FIRST: Connect to the database
        $connection = new PDO($dsn, $username, $password, $options);
		
        // SECOND: Create the SQL 
        $sql = "SELECT * FROM crudtable";
        
        // THIRD: Prepare the SQL
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        // FOURTH: Put it into a $result object that we can access in the page
        $result = $statement->fetchAll();
	} catch(PDOException $error) {
        // If there is an error, tell us what it is
		echo $sql . "<br>" . $error->getMessage();
	}	
?>

<?php include "templates/header.php"; ?>


<h2 class="center3">Results</h2>

<table class="u-full-width"> 
  <tbody>
    <tr>
      <th> Item number</th>    
      <th> Item purchased </th>
      <th> Amount paid </th>
      <th> Purchase date </th>
      <th> Category </th>
      <th> Actions </th>
    </tr>
    <!-- This is a loop, which will loop through each result in the array -->
    <?php foreach($result as $row) { ?>
    <tr> 
      <td> <?php echo $row['id']; ?> </td>
      <td> <?php echo $row['item']; ?> </td>
      <td> <?php echo $row['amount']; ?> </td>
      <td> <?php echo $row['purchasedate']; ?> </td>
      <td> <?php echo $row['category']; ?> </td>
      <td><a class="update" href='update-work.php?id=<?php echo $row['id']; ?>'>Update</a></td>
    </tr>
    <?php }; // Close the foreach ?>
  </tbody>
</table>

<?php include "templates/footer.php"; ?>
