<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
	
    // include the config file that we created before
    require "../config.php"; 
    
    // this is called a try/catch statement 
	try {
        // FIRST: Connect to the database
        $connection = new PDO($dsn, $username, $password, $options);
		
        // SECOND: Create the SQL 
        $sql = "SELECT * FROM crudtable order by purchasedate desc;";
        
        // THIRD: Prepare the SQL
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        // FOURTH: Put it into a $result object that we can access in the page
        $result = $statement->fetchAll();
	}
	catch(PDOException $error) {
        // if there is an error, tell us what it is
		echo $sql . "<br>" . $error->getMessage();
	}

  include "../public/templates/header.php";
?>

<h2 class="center3">Expense List</h2>

<table class="u-full-width">
  <tbody>
    <tr>
      <th> Item purchased </th>
      <th> Amount paid </th>
      <th> Purchase date </th>
      <th> Category </th>
      <th> Actions </th>
    </tr>
    <?php //echo '<pre>' . print_r($result, TRUE) . '</pre>'; ?>
    <!-- This is a loop, which will loop through each result in the array -->
    <?php foreach($result as $row) { ?>
    <tr> 
      <td> <?php echo $row['item']; ?> </td>
      <td>$<?php echo $row['amount']; ?> </td>
      <td> <?php echo $row['purchasedate']; ?> </td>
      <td> <?php echo $row['category']; ?> </td>
      <td><a class="update" href='update-work.php?id=<?php echo $row['id']; ?>'>Update</a></td>
    </tr>
    <?php }; //close the foreach ?>
  </tbody>
</table>

<?php include "../public/templates/footer.php"; ?>

