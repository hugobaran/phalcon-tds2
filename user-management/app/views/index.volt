<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Phalcon PHP Framework</title>
        {{stylesheet_link("https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.css")}}
    </head>
    <body>
        <div class="container" id="container">
            {{ content() }}
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        {{javascript_include("https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js")}}
        <!-- Latest compiled and minified JavaScript -->
        {{javascript_include("https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.js")}}

        <script>
            $("#listeUtilisateurs").click(function(){
                $.ajax({
                    url : '{{url("users/")}}',
                    dataType : 'html',
                    success : function(code_html, statut){
                        $(code_html).appendTo("#container");
                    },
                    error : function(resultat, statut, erreur){

                    },
                    complete : function(resultat, statut){

                    }
                });
            });
    </script>
    </body>
</html>
