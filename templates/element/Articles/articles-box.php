<div id='articles-box'>
    <?php
    foreach ($articles as $article)
    {
        echo "<div class='small-box'>";

            echo "<div class='title'>";
                echo $this->Html->link($article->title, ['action' => 'viewArticle', $article->slug]);
            echo '</div>';

            echo "<div>";
                echo "<p>"."Créé le ".$article->created->day."/".$article->created->month."/".$article->created->year;
                echo " à ".$article->created->hour."h".$article->created->minute;
                echo "</p>";
                echo "<p>"."Créé par User ".$article->id."</p>";
            echo "</div>";

            echo "<div class='action'>";
                echo $this->Html->link('Edit', ['action' => 'editArticle', $article->slug]);
                echo " | ";
                echo $this->form->postlink('Delete', ['action' => 'delete', $article->slug], ['confirm' => 'Are you sure ?']);
            echo "</div>";

        echo "</div>";       
    }
    ?>
</div> 