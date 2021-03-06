<?php 
   session_start(); 
   
   if (!isset($_SESSION['username'])) {
   	$_SESSION['msg'] = "You must log in first";
   	header('location: login.php');
   }
   
     // Include the config file 
     require "../config.php";
     require "common.php";
       // Run when submit button is clicked
     if (isset($_POST['submit'])) {
         try {
             $connection = new PDO($dsn, $username, $password, $options);  
             
             // Grab elements from form and set as varaible
             $work =[
               "id"         => $_POST['id'],
               "item" => $_POST['item'],
               "amount"  => $_POST['amount'],
               "purchasedate"   => $_POST['purchasedate'],
               "category"   => $_POST['category'],
               "date"   => $_POST['date'],
             ];
             
             // Create SQL statement
             $sql = "UPDATE `crudtable` 
                     SET id = :id, 
                         item = :item, 
                         amount = :amount, 
                         purchasedate = :purchasedate, 
                         category = :category, 
                         date = :date 
                     WHERE id = :id";
             // Prepare sql statement
             $statement = $connection->prepare($sql);
             
             // Execute sql statement
             $statement->execute($work);
         } catch(PDOException $error) {
             echo $sql . "<br>" . $error->getMessage();
         }
     }
     // GET data from the DB
     // Simple if/else statement to check if the id is available
     if (isset($_GET['id'])) {
         //yes the id exists 
         
         try {
             // Standard db connection
             $connection = new PDO($dsn, $username, $password, $options);
             
             // Set if as variable
             $id = $_GET['id'];
             
             // Select statement to get the right data
             $sql = "SELECT * FROM crudtable WHERE id = :id";
             
             // Prepare the connection
             $statement = $connection->prepare($sql);
             
             // Bind the id to the PDO id
             $statement->bindValue(':id', $id);
             
             // Now execute the statement
             $statement->execute();
             
             // Attach the sql statement to the new work variable so we can access it in the form
             $work = $statement->fetch(PDO::FETCH_ASSOC);
             
         } catch(PDOExcpetion $error) {
             echo $sql . "<br>" . $error->getMessage();
         }
     } else {
         // No id, show an error
         echo "No id - something went wrong";
         // Exit;
     };
     
     $options = array(
       'Appeal and Accessory' => '<option value="Appeal and Accessory">Appeal and Accessory</option>',
       'Travel' => '<option value="Travel">Travel</option>',
       'Entertainment' => '<option value="Entertainment">Entertainment</option>',
       'Computer and Electronics' => '<option value="Computer and Electronics">Computer and Electronics</option>',
       'Mobile' => '<option value="Mobile">Mobile</option>',
       'Food and Beverages' => '<option value="Food and Beverages">Food and Beverages</option>',
       'Car and Accessory' => '<option value="Car and Accessory">Car and Accessory</option>',
       'Cosmetics' => '<option value="Cosmetics">Cosmetics</option>',
       'Games' => '<option value="Games">Games</option>',   
       'Parking' => '<option value="Parking">Parking</option>',
       'Other' => '<option value="Other">Other</option>',
     );
     if (!empty($work['category'])) {
       $category = $work['category'];
       $options[$category] = str_replace('<option ', '<option selected="selected" ', $options[$category]);
     }
   ?>
<?php include "templates/header.php"; ?>
<h2 class="center2">Update an item</h2>
<div class="push">
   <form method="post">
      <input type="hidden" name="id" id="id" value="<?php echo escape($work['id']); ?>" >
      <label for="item">Item Purchased</label>
      <input type="text" name="item" id="item" value="<?php echo escape($work['item']); ?>">
      <label for="amount">Amount Spent</label>
      <input type="number" step="0.01" name="amount" id="amount" value="<?php echo escape($work['amount']); ?>">
      <label for="purchasedate">Purchase Date</label>
      <input type="date" name="purchasedate" id="purchasedate" value="<?php echo escape($work['purchasedate']); ?>">
      <label for="category">Category</label>
      <select id="category" name="category" id="category">
         <optgroup label="Choose a category">
         <?php echo implode(PHP_EOL, $options); ?>
      </select>
      <br>
      <input type="submit" name="submit" value="Save">
   </form>
   <?php if (isset($_POST['submit']) && $statement) : ?>
   <p>Item successfully updated</p>
   <?php endif; ?>
</div>
<?php include "templates/footer.php"; ?>
