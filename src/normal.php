<?php
$output = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $xml = file_get_contents('php://input');
    $dom = new DOMDocument();
    
    $dom->loadXML($xml, LIBXML_NOENT | LIBXML_DTDLOAD);
    
    $contacts = $dom->getElementsByTagName('contact');
    if ($contacts->length > 0) {
        $name = $contacts->item(0)->getElementsByTagName('name')->item(0)->nodeValue;
        $output = "<div class='result'>Thank you <strong>$name</strong>, we have successfully received your message.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>XXE - Normal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1><a href="index.php">XXE Labs</a></h1>
    <h2>01. Reflected</h2>
    <p>The server processes the XML and displays the contents in the response.</p>
    
    <div class="editor">
        <textarea id="xmlInput" rows="10">
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<contact>
    <name>wayko</name>
    <email>contact@wayko.re</email>
    <message>Hello world!</message>
</contact></textarea>
        <button onclick="sendXML()">Send</button>
    </div>
    
    <div id="responseArea">
        <?php echo $output; ?>
    </div>
</div>
<script src="sender.js"></script>
</body>
</html>