<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>XXE Labs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>XXE Labs</h1>
    
    <div style="text-align: center; margin: 30px 0;">
        <iframe src="hacker.gif" width="480" height="452" scrolling="no" style="border: none; overflow: hidden;"></iframe>
    </div>

    <div class="menu-grid">
        <div class="card">
            <a href="normal.php">01. Reflected</a>
            <p>The server processes the XML and displays the contents in the response.</p>
        </div>
        
        <div class="card">
            <a href="blind.php">02. Blind</a>
            <p>The server processes the XML and sends the response to an external server controlled by the attacker.</p>
        </div>
        
        <div class="card">
            <a href="error.php">03. Error-Based</a>
            <p>The server processes the XML, triggers a parsing error, and leaks the sensitive data inside the error message.</p>
        </div>
    </div>
</div>
</body>
</html>