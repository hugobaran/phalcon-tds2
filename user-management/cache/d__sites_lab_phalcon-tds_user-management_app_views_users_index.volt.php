<div class="ui container">


    <div class="ui icon menu">
        <?= $this->tag->linkTo(['users/add', '
        <i class=\'user add icon icon\'></i>&nbsp;Nouvel utilisateur
        ', 'class' => 'item']) ?>

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

                <?php foreach ($tabColonnes as $colonne) { ?>
                    <?php if ($curTab == $colonne) { ?>
                        <?php if ($curSens == 'asc') { ?>
                        <th class="sorted ascending" onclick="window.location.href='<?= $href ?>/<?= $colonne ?>/desc'"/>
                        <?php } else { ?>
                        <th class="sorted descending" onclick="window.location.href='<?= $href ?>'"/>
                        <?php } ?>
                    <?php } else { ?>
                    <th onclick="window.location.href='<?= $href ?>/<?= $colonne ?>/asc'"/>
                    <?php } ?>
                    <?= $colonne ?></th>
                <?php } ?>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
            <tr>
                <td>
                    <div class="ui checkbox">
                        <input type="checkbox" name="example"><label></label>
                    </div>
                </td>
                <td><?= $user->getFirstname() ?></td>
                <td><?= $user->getLastname() ?></td>
                <td><?= $user->getLogin() ?></td>
                <td><?= $user->getEmail() ?></td>
                <td><?= $user->getRole()->getName() ?></td>
                <td>
                    <?= $this->tag->linkto('users/update/' . $user->getId(), '<i class=\'bordered grey edit icon\'></i>') ?>
                    <?= $this->tag->linkto('users/delete/' . $user->getId(), '<i class=\'bordered red remove icon\'></i>') ?>
                </td>
            </tr>
            <?php } ?>

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
                        <?php foreach (range(1, $nbPages) as $i) { ?>
                            <?php if ($i == $curPage) { ?>
                                <a class="item active" onclick="window.location.href='http://localhost/phalcon-tds/user-management/users/index/<?= $i ?>'"><?= $i ?></a>
                            <?php } else { ?>
                                <a class="item" onclick="window.location.href='http://localhost/phalcon-tds/user-management/users/index/<?= $i ?>'"><?= $i ?></a>
                        <?php } ?>
                        <?php } ?>
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
