<?php
// Define database connection constants
define("HOST", "127.0.0.1");
define("DB_NAME", "chatbot");
define("DB_USER", "root");
define("DB_PASS", "");  // Password is empty in your case

try {
    // Establish a database connection
    $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Continue with your delete operation
    $id = $_GET['rn'];
    $sql = "DELETE FROM CHATBOT_HINTS WHERE ID = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<script>alert('Record Deleted from database')</script>";
    } else {
        echo "<font color='red'>Failed to delete from db!!";
    }
} catch (PDOException $e) {
    throw new PDOException($e->getMessage());
} finally {
    // Close the database connection
    $db = null;
}

?>

<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost:7882/qna.php">
