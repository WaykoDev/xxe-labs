<?php
libxml_disable_entity_loader(false);
$output = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $xml = file_get_contents('php://input');
    $dom = new DOMDocument();

    libxml_use_internal_errors(true);
    
    $dom->loadXML($xml, LIBXML_NOENT | LIBXML_DTDLOAD);
    
    $errors = libxml_get_errors();
    
    if (!empty($errors)) {
        $output .= "<div class='result error'><h3>Error:</h3><ul>";
        foreach ($errors as $error) {
            $output .= "<li>" . htmlspecialchars($error->message) . "</li>";
        }
        $output .= "</ul></div>";
    } else {
        $output = "<div class='result'>Configuration file validated. No errors.</div>";
    }
    
    libxml_clear_errors();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>XXE - Error Based</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1><a href="index.php">XXE Labs</a></h1>
    <h2>03. Error-Based</h2>
    <p>The server processes the XML, triggers a parsing error, and leaks the sensitive data inside the error message.</p>
    
    <div class="editor">
        <textarea id="xmlInput" rows="10">
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<config>
    <timeout>300</timeout>
    <mode>production</mode>
</config></textarea>
        <button onclick="sendXML()">Send</button>
    </div>
    
    <div id="responseArea">
        <?php echo $output; ?>
    </div>
</div>
<script src="sender.js"></script>
</body>
</html>