<?php 
   session_start(); 
   
   if (!isset($_SESSION['username'])) {
   	$_SESSION['msg'] = "You must log in first";
   	header('location: login.php');
   }
   
   
   // This code will only execute after the submit button is clicked
   if (isset($_POST['submit'])) {
   
     // Include the config file that we created before
     require "../config.php"; 
     
     // This is called a try/catch statement 
   try {
         // FIRST: Connect to the database
         $connection = new PDO($dsn, $username, $password, $options);
   
         // SECOND: Get the contents of the form and store it in an array
         $new_work = array( 
             "item" => $_POST['item'], 
             "amount" => $_POST['amount'],
             "purchasedate" => $_POST['purchasedate'],
             "category" => $_POST['category'], 
         );
         
         // THIRD: Turn the array into a SQL statement
         $sql = "INSERT INTO crudtable (item, amount, purchasedate, category) VALUES (:item, :amount, :purchasedate, :category)";        
         
         // FOURTH: Now write the SQL to the database
         $statement = $connection->prepare($sql);
         $statement->execute($new_work);
   
   } catch(PDOException $error) {
         // If there is an error, tell us what it is
   echo $sql . "<br>" . $error->getMessage();
   }	
   }
   ?>
<?php include "templates/header.php"; ?>
<h2 class="center">Add an expense to your list</h2>
<div class="push">
   <form method="post">
      <fieldset>
         <label for="item"> Item </label>
         <input type="text" placeholder="Description" name="item" id="item">
         <label for="amount"> Amount paid</label>
         <input type="number" step="0.01" min="0" step="any" placeholder="$" name="amount" id="amount">
         <label for="purchasedate">Date</label>
         <input type="date" placeholder="DD/MM/YY" name="purchasedate" id="purchasedate">
         <label for="category">Category</label>
         <select id="category" name="category">
            <optgroup label="Choose a category">
            <option value="Appeal and Accessory">Appeal and Accessory</option>
            <option value="Travel">Travel</option>
            <option value="Entertainment">Entertainment</option>
            <option value="Computer and Electronics">Computer and Electronics</option>
            <option value="Mobile">Mobile</option>
            <option value="Food and Beverages">Food and Beverages</option>
            <option value="Car and Accessory">Car and Accessory</option>
            <option value="Car and Accessory">Cosmetics</option>
            <option value="Games">Games</option>
            <option value="Games">Parking</option>
            <option value="Other">Other</option>
         </select>
         <br>
         <input class="green" type="submit" name="submit" value="Create">
         <!-- Submit message -->
         <?php if (isset($_POST['submit']) && $statement) { ?>
         <p>Entry has been added to your expense list</p>
         <?php } ?>
      </fieldset>
   </form>
</div>
</body>
