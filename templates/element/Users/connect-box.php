<div id="connect-box">
    <?= "Connecté en tant que" ?>
    <?= $user->pseudo ?>

    
    <?= $this->Html->link("Ajout Article", ['action' => 'addArticle']) ?>
    <?= $this->Html->link('Modifier Infos', ['action' => 'editUser', $user->slug]) ?>
    <?= $this->Html->link('Logout', ['action' => 'logout']) ?>
</div>