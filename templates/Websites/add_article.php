<div id='mainbox'>
    <div id="connect-box">
        <?= "Connecté en tant que\n" ?>
       
        <?= $user->pseudo ?>
        
        <?= $this->Html->link('Retour', ['action' => 'index']) ?>
        <?= $this->Html->link('Modifier Infos', ['action' => 'edit', $user->slug]) ?>
        <?= $this->Html->link('Logout', ['action' => 'logout']) ?>
    </div>

    <div id="form-box">
        <h1>Add Article</h1>

        <?php
            echo $this->form->create($article);
            echo $this->form->control('user id', ['type' => 'hidden', 'value' => $user->id]);
            echo $this->form->control('title');
            echo $this->form->control('body');
            echo $this->form->button('Save Article');
            echo $this->form->end();
        ?>
    </div>
</div>