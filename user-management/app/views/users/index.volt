<div class="ui container">


    <div class="ui icon menu">
        {{link_to("users/add", "
        <i class='user add icon icon'></i>&nbsp;Nouvel utilisateur
        ", 'class': 'item')}}

        <div class="ui category search item">
            <div class="ui transparent icon input">
                <form method="get">
                    <input name="filtre" class="prompt" type="text" placeholder="Rechercher...">
                    <i class="search link icon"></i>
                </form>
            </div>
            <div class="results"></div>
        </div>
    </div>

    <table class="ui selectable blue sortable celled table">
        <thead>
            <tr>
                <th>
                    <div class="ui checkbox">
                        <input type="checkbox" name="example"><label></label>
                    </div>
                </th>

                {% for colonne in tabColonnes %}
                    {% if curTab == colonne %}
                        {% if curSens == "asc" %}
                            <th class="sorted ascending" onclick="window.location.href='{{ href }}/{{colonne}}/desc'"/>
                        {% else %}
                            <th class="sorted descending" onclick="window.location.href='{{ href }}'"/>
                        {% endif %}
                    {% else %}
                        <th onclick="window.location.href='{{ href }}/{{colonne}}/asc'"/>
                    {% endif %}
                    {{colonne}}</th>
                {% endfor %}

                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {% for user in users %}
            <tr>
                <td>
                    <div class="ui checkbox">
                        <input type="checkbox" name="example"><label></label>
                    </div>
                </td>
                <td>{{user.getFirstname()}}</td>
                <td>{{user.getLastname()}}</td>
                <td>{{user.getLogin()}}</td>
                <td>{{user.getEmail()}}</td>
                <td>{{user.getRole().getName()}}</td>
                <td>
                    {{linkTo("users/update/"~user.getId(), "<i class='bordered grey edit icon'></i>")}}
                    {{linkTo("users/delete/"~user.getId(), "<i class='bordered red remove icon'></i>")}}
                    {{linkTo("users/show/"~user.getId(), "<i class='bordered arrow circle right icon'></i>")}}
                </td>
            </tr>
            {% endfor %}

        </tbody>
        <tfoot>
            <tr>
                <th colspan="7">
                    <div class="ui red small button">
                        Supprimer sélectionnés(X)
                    </div>
                    <div class="ui small  disabled button">
                        Tout selectionner
                    </div>
                    <div class="ui right floated pagination menu">
                        <a class="icon item">
                            <i class="left chevron icon"></i>
                        </a>
                        {% for i in 1..nbPages %}
                            {% if i == curPage %}
                                <a class="item active" onclick="window.location.href='http://localhost/phalcon-tds/user-management/users/index/{{i}}'">{{i}}</a>
                            {% else %}
                                <a class="item" onclick="window.location.href='http://localhost/phalcon-tds/user-management/users/index/{{i}}'">{{i}}</a>
                            {% endif %}
                        {% endfor %}
                        <a class="icon item">
                            <i class="right chevron icon"></i>
                        </a>
                    </div>
                </th>
            </tr>
        </tfoot>
    </table>
</div>
e
