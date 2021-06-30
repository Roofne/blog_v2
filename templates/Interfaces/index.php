<?= $this->element('header') ?> 
<?= $this->element('nav') ?> 

<?php
echo "<div id='mainbox'>";
//echo "<div class='small-box'>test_text</div>";
for($i = 0; $i < 10; $i++)
{
    echo "<div class='small-box'>test_text</div>";
}
echo "</div>";
?>    

<?= $this->element('footer') ?>

