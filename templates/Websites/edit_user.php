<div id='mainbox'>
    <div id="connect-box">
        <?= "Connecté en tant que\n" ?>
       
        <?= $user->pseudo ?>

        <?= $this->Html->link('Logout', ['action' => 'logout']) ?>
        <?= $this->Html->link('Retour', ['action' => 'index']) ?>
    </div>

    <div id="edit-box">
        <h1>Modification</h1>

        <?php
            echo $this->form->create($user);
            echo $this->form->control('nom');
            echo $this->form->control('prenom');
            echo $this->form->control('pseudo');
            echo $this->form->control('email');
            echo $this->form->control('password');
            echo $this->form->button('valider');    
            echo $this->form->end();
        ?>    
    </div>
</div>
