<div class="ui container">
    {% if contenueMsg is defined %}
    <div class="ui green message">{{contenueMsg}}</div>
    {% endif %}

    <div class="ui icon menu">
        {{link_to("users/", "
        <i class='sign out icon icon'></i> Retour à la liste
        ", 'class': 'item')}}
    </div>

    <table class="ui definition table">
        <tbody>
            <tr>
                <td>Prénom</td>
                <td>{{showUser.getFirstname()}}</td>
            </tr>
            <tr>
                <td>Nom</td>
                <td>{{showUser.getLastname()}}</td>
            </tr>
            <tr>
                <td>Login</td>
                <td>{{showUser.getLogin()}}</td>
            </tr>
            <tr>
                <td>Adresse mail</td>
                <td>
                    <div class="ui label">
                        <i class="sign in icon"></i> {{showUser.getEmail()}}
                    </div>
                </td>
            </tr>
            <tr>
                <td>Rôle</td>
                <td>{{showUser.getRole().getName()}}</td>
            </tr>
        </table>
    </tbody>
</div>