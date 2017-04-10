<?php echo $this->Form->create('Book'); ?>

<?php echo $this->Form->input('keyword', array('lable'=>'', 'placeholder'=>'Tim kiem...')); ?>
<?php echo $this->Form->end('Search'); ?>

<?php if(isset($results)): ?>
    <?php echo $this->element('books', array('books'=>$results));?>
<?php elseif($notFound): ?>
    Không tìm thấy
<?php endif?>
