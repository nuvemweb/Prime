<div class='col-xs-12'>
    <div class='page-header page-header-with-buttons'>
        <h1 class='pull-left'>
            <i class='icon-picture'></i>
            <span><?php echo __('Destaques'); ?></span>
        </h1>
    </div>
</div>

<div class='row'>
    <div class='col-sm-12'>
        <div class='box'>
            <div class='box-content'>
                <div class="destaques form">
                    <?php echo $this->Form->create('Destaque', $this->FormAdmin->formConfigs); ?>
                    	<?php
                        echo $this->Form->input('nome');
                        echo $this->Form->input('link');
                        echo $this->Form->input('externo', array('options' => array(1 => "Sim", 0 => "Não"), 'label' => array("class" => 'col-md-2 control-label', "text" => "Abrir em outra aba?")));
                        echo $this->Form->input('ativo', array('options' => array(1 => "Sim", 0 => "Não")));
                        echo $this->Form->input("imagem", array('type' => 'file', "accept" => "image/gif, image/png, image/jpeg"));
                        ?>
                    <div class='form-actions form-actions-padding-sm'>
                        <div class='row'>
                            <div class='col-md-10 col-md-offset-2'>
                                <button class='btn btn-primary BtnSubmit' type='submit'>
                                    <i class='icon-save'></i>
                                    Salvar
                                </button>
                                <?php echo $this->Html->link('Cancelar', array('action' => 'index'), array('class' => 'btn'));?>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>