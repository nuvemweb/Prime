<?php echo $this->Form->create("Contato", array('url' => array('controller' => 'contato', 'action' => 'index'), "class" => "form")); ?>
    <div class='col-xs-12 col-sm-6 col-md-6'>
        <label>Nome</label>
        <input type='text' name='data[Contato][nome]' id='ContatoNome' required='required' />

        <div class='clearfix'></div>

        <label>Email</label>
        <input type='text' name='data[Contato][email]' id='ContatoEmail' required='required' />

        <div class='clearfix'></div>

        <label>Telefone</label>
        <input type='text' name='data[Contato][telefone]' id='ContatoTelefone' required='required' />

    </div>
    <div class='col-xs-12 col-sm-6 col-md-6'>
        <label>Mensagem</label>
        <textarea name='data[Contato][mensagem]' required='required'></textarea>
    </div>

    <button type='submit'>Enviar contato</button>
    <div class='clearfix'></div>
    <div id="validacao">
        <div id="load">
            <img src="<?php echo $this->request->base ?>/img/icons/loader.gif" alt="" />
        </div>
    </div>
<?php echo $this->Form->end(); ?>
<?php echo $this->Html->script(array("jquery.maskedinput.min.js", "js_contato.js")); ?>