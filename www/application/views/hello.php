<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Hello, world!</title>
</head>
<body>

<div id="container">
    <h1>Hello, world!
    RewriteEngine On
#RewriteBase /

RewriteRule ^assets/(.*)$ assets/$1 [QSA,L]

RewriteRule ^login/?$ index.php/acces/login [QSA,L]
RewriteRule ^logout/?$ index.php/acces/logout [QSA,L]
RewriteRule ^a-propos/?$ index.php/page/view/$1 [QSA,L]

RewriteRule ^([a-zA-Z0-9_/-]*)$ index.php/$1 [QSA,L]
</h1>
</div>

</body>
</html>