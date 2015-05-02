<!DOCTYPE HTML> 

<html>
<head>
   <!--
    David Hughen
	2/25/15
	CS 368 - Advanced Web Programming
   -->
   <meta name="author" content="Your name here" />
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
   <link href="style03.css" rel="stylesheet" type="text/css" />
   <title>Customer Listing</title>
	
	
   <?php
      //In here create only (do not use) an array of 10 unique customers
      //Each customer will need a first name, last name, amount due this month,
      //and their credit limit.
	  
	  $customerArray = array(array("FirstName" => "David", "LastName" => "Hughen", "Month Amt. Due" => 3, "Credit Limit" => 5000),
							 array("FirstName" => "Jon", "LastName" => "Massie", "Month Amt. Due" => 0, "Credit Limit" => 0),
							 array("FirstName" => "Victor", "LastName" => "Jereza", "Month Amt. Due" => 0, "Credit Limit" => 500),
						     array("FirstName" => "Jake", "LastName" => "Stevens", "Month Amt. Due" => 0, "Credit Limit" => 500),
							 array("FirstName" => "Andrea", "LastName" => "Setiawan", "Month Amt. Due" => 0, "Credit Limit" => 500),
							 array("FirstName" => "Cody", "LastName" => "Carr", "Month Amt. Due" => 0, "Credit Limit" => 566),
							 array("FirstName" => "EnYang", "LastName" => "Pang", "Month Amt. Due" => 0, "Credit Limit" => 200),
							 array("FirstName" => "Ryan", "LastName" => "Carroll", "Month Amt. Due" => 0, "Credit Limit" => 500),
							 array("FirstName" => "Leah", "LastName" => "Latte", "Month Amt. Due" => 0, "Credit Limit" => 500),
							 array("FirstName" => "Joe", "LastName" => "Java", "Month Amt. Due" => 34, "Credit Limit" => 503));
		
		// Sort the customer list by first names
		function sortFirstName($firstArray, $secondArray)
		{
			if($firstArray["FirstName"] == $secondArray["FirstName"])
				return 0;
			else if($firstArray["FirstName"] < $secondArray["FirstName"])
				return -1;
			else
				return 1;
		}

		// Sort the customer list by last name
		function sortLastName($firstArray, $secondArray)
		{
			if($firstArray["LastName"] == $secondArray["LastName"])
				return 0;
			else if($firstArray["LastName"] < $secondArray["LastName"])
				return -1;
			else
				return 1;  
		}

		// Sort the customer list by their month's payment due
		function sortMonthDue($firstArray, $secondArray)
		{
		  if($firstArray["Month Amt. Due"] == $secondArray["Month Amt. Due"])
				return 0;
			else if($firstArray["Month Amt. Due"] < $secondArray["Month Amt. Due"])
				return -1;
			else
				return 1;  
		}

		// Sort the customer list by their credit limit
		function sortCreditLimit($firstArray, $secondArray)
		{
			if($firstArray["Credit Limit"] == $secondArray["Credit Limit"])
				return 0;
			else if($firstArray["Credit Limit"] < $secondArray["Credit Limit"])
				return -1;
			else
				return 1;
		}
   ?>
</head>
<body id="phpBody">

   

   <form name="customer_form" id="customer_form" action="program03.php" method="post">
      <div class="customer_form">
		<h1>Customer List</h1>
   <h2>This is a master list of our current customers.</h2>
         <label>How would you like the sort this list? (ascending with last name as default)<br />
            <select name="cssmenu" id="cssmenu">
               <option value="1">First Name</option>   
               <option value="2">Last Name</option>
               <option value="3">Amount Due</option>
               <option value="4">Credit Limit</option>
            </select>
         </label>
         <input class="myButton" type="submit" value="Sort Data" />
      </div>
   </form>
   
   <?php
	
   // Constants
   define('FIRST_NAME', 1);
   define('LAST_NAME', 2);
   define('AMOUNT_DUE', 3);
   define('CREDIT_LIMIT', 4);
	
	$userChoice = (isset($_POST['cssmenu']) ? $_POST['cssmenu'] : LAST_NAME);
   
	// Determine the user's choice
    switch($userChoice)
    {
		case FIRST_NAME:
			usort($customerArray, 'sortFirstName');
			break;
		case LAST_NAME:
			usort($customerArray, 'sortLastName');
			break;
		case AMOUNT_DUE:
			usort($customerArray, 'sortMonthDue');
			break;
		case CREDIT_LIMIT:
			usort($customerArray, 'sortCreditLimit');
			break;
		default:
			usort($customerArray, 'sortLastName');
			break;	
		
		
    }
   
		displaySortedList($customerArray);
   
	// Display the customers in a formatted table
	function displaySortedList($customerArray)
	{
		echo '<table class="myTable"><tr id="firstRow"><th>First Name</th><th>Last Name</th><th>Due this Month</th><th>Credit Limit</th></tr>';
		
		foreach($customerArray as $customer)
		{
			echo '<tr>';
			foreach($customer as $key => $value)
			{
				
				echo '<td>' . $value . '</td>';
			
			}
			echo '</tr>';
		}
		echo '<tr><th>Amounts are in US dollars.</th></tr>';
		echo '</table>';
	}
   ?>

</body>
</html>