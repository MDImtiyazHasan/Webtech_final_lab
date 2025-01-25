
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Get the form data
    $stdName = trim($_POST['student']);
    $stdID = trim($_POST['studentid']);
    $books = $_POST['books'];
    $borrowDate = $_POST['borrowdate'];
    #$token = $_POST['tokenid'];
    $returnDate = $_POST['returndate'];
    #$fees = trim($_POST['fees']);

    // Validate that no field is empty
    if (empty($stdName) || empty($stdID) || empty($books) || empty($borrowDate) || empty($returnDate))
    {
        echo "<p style='color: red;'>Please fill in all required fields.</p>";
    }
    // Validate the format of the student ID (xx-xxxxx-x, where x is a digit)
    elseif (!preg_match("/^\d{2}-\d{5}-\d{1}$/", $stdID)) {
        echo "<p style='color: red;'>Invalid Student ID format. The correct format is xx-xxxxx-x (e.g., 12-34567-8).</p>";
    }
    else {


        echo "<h3>Form Submitted Successfully!</h3>";
        echo "<p><i>Student Name: $stdName</p>";
        echo "<p>Student ID: $stdID</p>";
        echo "<p>Book Selected: $books</p>";
        echo "<p>Borrow Date: $borrowDate</p>";
        echo "<p>Return Date: $returnDate</i></p>";
       #echo "<p><strong>Fees:</strong> $fees</p>";
        #echo "<p><strong>Token:</strong> $token</p>";


        $cookie_name = preg_replace('/[^a-zA-Z0-9_]/', '_', $_POST['books']); 
        $cookie_value = $_POST['student']; 
        // Check if the cookie is already set 
        if (isset($_COOKIE[$cookie_name])) 
        { 
         echo "<p style='color: red;'>The book '$books' is already borrowed </p>"; 
        } 
        
        else 
        {
             setcookie($cookie_name, $cookie_value, time()+15);
            
        
              if (!isset($_COOKIE[$cookie_name]))             
              {echo "<p>No cookie available.</p>";} 
            }














    }



}

else 
{
    // Redirect back to the form if the page is accessed without submitting the form
    header('Location: index.php');
    exit();
}









?>