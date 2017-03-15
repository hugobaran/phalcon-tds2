<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Phalcon PHP Framework</title>
        <?= $this->tag->stylesheetLink('https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.css') ?>
    </head>
    <body>
        <div class="container">
            <?= $this->getContent() ?>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <?= $this->tag->javascriptInclude('https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js') ?>
        <!-- Latest compiled and minified JavaScript -->
        <?= $this->tag->javascriptInclude('https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.js') ?>
    </body>
</html>
