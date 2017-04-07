<?php foreach($books as $book): ?>
    <?php echo $this->Html->link($book['Book']['title'], '/'.$book['Book']['slug']); ?> <br>
    <?php echo $this->Html->image($book['Book']['image'], array(
        'width'=>'90px', 'height'=>'120px'
    )); ?> <br>
    Giá bán: <?php echo $this->Number->currency($book['Book']['sale_price'],' VND',
        array(
            'places'=>0, 'wholePosition'=>'after'
        )); ?> <br>
    <?php foreach($book['Writer'] as $writer)
    {
        echo $writer['name'].' ';
    } ?>
    <br>
    <br>
    <hr>

<?php endforeach ?>