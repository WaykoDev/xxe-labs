function sendXML() {
    var xml = document.getElementById('xmlInput').value;
    
    fetch('', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/xml'
        },
        body: xml
    })
    .then(response => response.text())
    .then(html => {
        document.open();
        document.write(html);
        document.close();
    })
    .catch(error => console.error('Error:', error));
}