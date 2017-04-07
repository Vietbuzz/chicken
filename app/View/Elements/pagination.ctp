<p>
    <?php echo $this->Paginator->counter("Trang {:page}/{:pages}, {:current}
         ".$object." trong số {:count} ".$object);?>
    <br>
    <?php echo $this->Paginator->prev('Quay lại ')?>
    <?php echo $this->Paginator->numbers(array(
        'separator'=>'-'
    )); ?>
    <?php echo $this->Paginator->next(' Tiếp theo')?>
</p>