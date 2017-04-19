<div class="panel panel-info">
    <h4 class="panel-heading"></h4>

    <?php echo $this->Session->flash('auth'); ?>

    <?php echo $this->Form->create('User', array(
        'class'=>'form-horizontal', 'inputDefaults'=> array(
            'label'=>false
        )
    ));
    ?>

    <div class="control-group">
        <label class="control-label" for="inputUsername">Username</label>
        <div class="controls">
            <?php echo $this->Form->input('username', array('placeholder'=>"Ten dang nhap")) ?>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputPassword">Password</label>
        <div class="controls">
            <?php echo $this->Form->input('password', array('placeholder'=>"mat khau"))?>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <?php echo $this->Form->button('Dang nhap', array('type'=>"submit", 'class'=> 'col-lg-2 btn btn-primary'))?>
        </div>
    </div>
    <?php $this->Form->end();?>
</div>