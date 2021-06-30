<div id="connect-box">
    <?= "Connecté en tant que\n" ?>

    <?= $user->pseudo ?>

    <?= $this->Html->link("Ajout Article", ['action' => 'addUser']) ?>
    <?= $this->Html->link('Modifier Infos', ['action' => 'editUser', $user->slug]) ?>
    <?= $this->Html->link('Logout', ['action' => 'logout']) ?>
</div>