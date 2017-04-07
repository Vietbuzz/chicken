<div class="books index">
    <h2><?php echo __('Sách mới'); ?></h2>
    <p>
        <?php echo $this->Paginator->sort('title','Sắp xếp theo tên sách') ?>
        <br>
        <br>
        <?php echo $this->Paginator->sort('created','Mới nhất/Cũ nhất') ?>

    </p>


    <?php //pr($books); ?>
    <?php echo $this->element('books')?>
    <?php echo $this->element('pagination', array('object'=>'quyển')); ?>
</div>

