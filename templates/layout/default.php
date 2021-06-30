<?= $this->element('page_start') ?>
<?= $this->element('header') ?>

<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>

<?= $this->element('footer') ?>
<?= $this->element('page_end') ?>
