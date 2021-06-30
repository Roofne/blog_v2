<div id='mainbox'>
    <div id="connect-box">
        <?= "Connecté en tant que\n" ?>
       
        <?= $user->pseudo ?>
        
        <?= $this->Html->link('Retour', ['action' => 'index']) ?>
        <?= $this->Html->link('Modifier Infos', ['action' => 'edit', $user->slug]) ?>
        <?= $this->Html->link('Logout', ['action' => 'logout']) ?>
    </div>

    <div id="form-box">
        <h1><?= h($article->title) ?></h1>
        <p><?= h($article->body) ?></p>
        <p><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></p>
        <p><?= $this->Html->link('Edit', ['action' => 'editArticle', $article->slug]) ?></p>
    </div>
</div>