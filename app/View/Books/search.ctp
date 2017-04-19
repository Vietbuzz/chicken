<?php echo $this->Form->create('Book', array('novalidate'=>true)); ?>

<?php echo $this->Form->input('keyword', array('label'=>'','error'=>false, 'placeholder'=>'Tim kiem...')); ?>
<?php echo $this->Form->end('Search'); ?>

<?php
if(isset($errors)){
    foreach($errors as $error){
        echo $error[0];
    }
}
?>

<?php if(isset($results)): ?>
    <?php echo $this->element('books', array('books'=>$results));?>
    <?php echo $this->element('pagination', array('object'=>'quyển'))?>
<?php elseif($notFound): ?>
    Không tìm thấy
<?php endif?>
