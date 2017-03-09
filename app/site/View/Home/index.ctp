<section class='col-xs-12 col-sm-12 col-md-12 player'>
	<?php echo $this->Element('player'); ?>
</section>
<?php
echo $this->Html->css(array('flexslider'));
echo $this->Html->script(array('jquery.flexslider', 'js_home'));
?>