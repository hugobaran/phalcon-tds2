<div class="ui container">
    <div class="ui message">Bienvenue sur mon site de BG ! Tu es actuellement connecté en tant que : {{status}}</div>

    <div class="ui icon menu">
        <!--{{link_to("users/", "-->
        <a href='#' class='item' id='listeUtilisateurs'><i class='user add icon icon'></i>&nbsp;Liste des utilisateurs</a>
        <!--", 'class': 'item')}}-->

        {{link_to("app/library/Auth.php", "isAuth", 'class': 'item')}}
        {{link_to("app/library/Auth.php", "hasRole", 'class': 'item')}}
        {{link_to("app/library/Auth.php", "infoUser", 'class': 'item')}}
    </div>
</div>
