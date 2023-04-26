<?php

session_start();

if (isset($_SESSION["user1_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user1
            WHERE id = {$_SESSION["user1_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user1 = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    
    <?php if (isset($user1)): ?>
        
        <p>Hello <?= htmlspecialchars($user1["name"]) ?></p>
        
        <p><a href="logout.php">Log out</a></p>
        
    <?php else: ?>
        
        <p><a href="login.php">Log in</a> or <a href="signup.php">sign up</a></p>
        
    <?php endif; ?>
    
</body>
</html>
    