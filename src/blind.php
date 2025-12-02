<?php
libxml_disable_entity_loader(false);
$output = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $xml = file_get_contents('php://input');
    $dom = new DOMDocument();

    $dom->loadXML($xml, LIBXML_NOENT | LIBXML_DTDLOAD);
    
 $output = "<div class='result'>Analytics data successfully saved.</div>";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>XXE - Blind</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1><a href="index.php">XXE Labs</a></h1>
    <h2>02. Blind</h2>
    <p>The server processes the XML and sends the response to an external server controlled by the attacker.</p>
    
    <div class="editor">
        <textarea id="xmlInput" rows="10">
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<analytics>
    <metric>CPU_LOAD</metric>
    <value>45%</value>
    <timestamp>2023-11-24</timestamp>
</analytics></textarea>
        <button onclick="sendXML()">Send</button>
    </div>
    
    <div id="responseArea">
        <?php echo $output; ?>
    </div>
</div>
<script src="sender.js"></script>
</body>
</html>