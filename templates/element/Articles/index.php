<?php $this->Html->css('index'); ?>
<h1>Article</h1>
<?= $this->Html->link('Add Article', ['action' => 'add']) ?>

<?= $this->element('/Articles/articles-box') ?>

<table>
    <tr>
        <th>Title</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

        <?php foreach ($articles as $article):?>
            <tr>
                <td>
                    <?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?>
                </td>
                <td>
                    <?= $article->created->format(DATE_RFC850) ?>
                </td>
                <td>
                    <?= $this->Html->link('Edit', ['action' => 'edit', $article->slug]) ?>
                    <?= $this->form->postlink('Delete', ['action' => 'delete', $article->slug], ['confirm' => 'Are you sure ?']) ?>
                </td>
            </tr>
        <?php endforeach?>        
</table>