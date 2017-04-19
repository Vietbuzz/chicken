<?php
echo $this->Form->create('Book', array('type'=>'file'));
echo $this->Form->file('image');
echo $this->Form->end("Submit");

pr ($this->request->data)
?>

<?php echo $this->Html->media(
    array(
        'part1.mp3',
        array(
            'src' => 'part1.mp3',
            'type' => "video/mp4; codecs='theora, vorbis'",
        )
    ),
    array('autoplay', 'controls', 'style'=>array('width'=>'800px'))
); ?>
