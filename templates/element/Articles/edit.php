<h1>Edit Article</h1>

<?php
    echo $this->form->create($article);
    echo $this->form->control('user id', ['type' => 'hidden', 'value' => 1]);
    echo $this->form->control('title');
    echo $this->form->control('body', ['rows' => '3']);
    echo $this->form->button('Save Article');
    echo $this->form->end();
?>