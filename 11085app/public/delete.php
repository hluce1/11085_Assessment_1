<?php 
 session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }

    // include the config file 
    require "../config.php";
    require "common.php";

    // This code will only run if the delete button is clicked
    if (isset($_GET["id"])) {
	    // this is called a try/catch statement 
        try {
            // define database connection
            $connection = new PDO($dsn, $username, $password, $options);
            
            // set id variable
            $id = $_GET["id"];
            
            // Create the SQL 
            $sql = "DELETE FROM crudtable WHERE id = :id";

            // Prepare the SQL
            $statement = $connection->prepare($sql);
            
            // bind the id to the PDO
            $statement->bindValue(':id', $id);
            
            // execute the statement
            $statement->execute();


        } catch(PDOException $error) {
            // if there is an error, tell us what it is
            echo $sql . "<br>" . $error->getMessage();
        }
    };

    // This code runs on page load
    try {
        $connection = new PDO($dsn, $username, $password, $options);
		
        // SECOND: Create the SQL 
        $sql = "SELECT * FROM crudtable";
        
        // THIRD: Prepare the SQL
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        // FOURTH: Put it into a $result object that we can access in the page
        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

?>

<?php include "templates/header.php"; ?>


<h2 class="center4">Delete an item</h2>

<?php if ($success) echo $success; ?>

<table class="u-full-width">
  <tbody>
    <tr>
      <th> Item purchased </th>
      <th> Amount paid </th>
      <th> Purchase date </th>
      <th> Category </th>
      <th> Actions </th>
    </tr>
    <!-- This is a loop, which will loop through each result in the array -->
    <?php foreach($result as $row) { ?>
    <tr>
      <td> <?php echo $row['item']; ?> </td>
      <td>$<?php echo $row['amount']; ?> </td>
      <td> <?php echo $row['purchasedate']; ?> </td>
      <td> <?php echo $row['category']; ?> </td>
      <td><a class="delete" href='delete.php?id=<?php echo $row['id']; ?>'>Delete</a></td>
    </tr>
    <?php }; //close the foreach ?>
  </tbody>
</table>

<?php include "templates/footer.php"; ?>
