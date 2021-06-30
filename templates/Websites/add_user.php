<div id='mainbox'>
    <div id="connect-box">
        <?= $this->Html->link("Retour", ['action' => 'login']) ?>
    </div>

    <div id="inscription-box">
        <h1>Inscription</h1>

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