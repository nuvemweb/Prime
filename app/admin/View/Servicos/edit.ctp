<div class='col-xs-12'>
    <div class='page-header page-header-with-buttons'>
        <h1 class='pull-left'>
            <i class='icon-cog'></i>
            <span><?php echo __('Servicos'); ?></span>
        </h1>
    </div>
</div>

<div class='row'>
    <div class='col-sm-12'>
        <div class='box'>
            <div class='box-content'>
                <div class="servicos form">
                    <?php echo $this->Form->create('Servico', $this->FormAdmin->formConfigs); ?>
                    <?php
                    echo $this->Form->input('id');
                    echo $this->Form->input('nome');
                    echo $this->Form->input('sintese');
                    echo $this->Form->input('texto', array('class' => 'ckeditor'));
                    echo $this->Form->input("imagem", array('class' => '','type' => 'file','accept' => 'image/gif, image/png, image/jpeg','label' => array('text' => 'Imagem','class' => 'col-md-2 control-label')));
                    ?>
                    <?php if ($this->request->data["Servico"]["imagem"] != "") { ?>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="arquivo">Imagem atual</label>
                        <div class="col-md-5 controls">
                            <?php echo $this->Html->image('../../site/upload/servicos/' . $this->request->data["Servico"]["id"] . '/s_' . $this->request->data["Servico"]["imagem"]); ?>
                        </div>
                    </div>
                    <?php } ?>
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