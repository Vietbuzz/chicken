<?php
$categories = $this->requestAction('/categories/menu');
//pr($categories);
?>
<?php if(!empty($categories)): ?>
    <?php foreach ($categories as $category):?>
        <?php
        echo $this->Html->link($category["Category"]["name"], '/danh-muc/'.$category["Category"]["slug"]) ;
        ?>
        <br>
    <?php endforeach?>
<?php endif?>