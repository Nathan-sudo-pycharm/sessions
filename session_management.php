<?php
// Start or resume session
session_start();

// Function to create a session
function createSession($username) {
    // Set session variable 'username' with the provided username
    $_SESSION['username'] = $username;
    // Print a message indicating successful session creation
    echo "Session created successfully.\n";
}

// Function to display session data
function displaySession() {
    // Check if 'username' session variable is set
    if(isset($_SESSION['username'])) {
        // If set, display the username stored in the session
        echo "Username: ".$_SESSION['username']."\n";
    } else {
        // If not set, indicate that no session data is available
        echo "No session data available.\n";
    }
}

// Function to delete session
function deleteSession() {
    // Unset all session variables
    session_unset();
    // Destroy the session
    session_destroy();
    // Print a message indicating successful session deletion
    echo "Session deleted successfully.\n";
}

// Check if form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and action from the submitted form
    $username = $_POST["username"];
    $action = $_POST["action"];

    // Switch statement to determine the action based on the selected option
    switch($action) {
        // If 'create' option is selected, call createSession() function
        case 'create':
            createSession($username);
            break;
        // If 'display' option is selected, call displaySession() function
        case 'display':
            displaySession();
            break;
        // If 'delete' option is selected, call deleteSession() function
        case 'delete':
            deleteSession();
            break;
        // If an invalid option is selected, print an error message
        default:
            echo "Invalid action selected.\n";
            break;
    }
}
?>
