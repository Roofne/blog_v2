<div id='mainbox'>
    <div id="connect-box">
        <?= "Connection" ?>
        <?= $this->Form->create() ?>

        <?= $this->Form->control('email', ['required' => true]) ?>

        <?= $this->Form->control('password', ['required' => true]) ?>

        <?= $this->Form->submit('Login') ?>
        <?= $this->Form->end() ?>

        <?= $this->Html->link("Pas inscrit ?", ['action' => 'addUser']) ?>
    </div>

    <?php
    echo $this->element('/Articles/articles-box');
    ?>
</div>

