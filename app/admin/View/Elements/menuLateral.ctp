<ul class='nav nav-stacked'>
    <li id='Home'>
        <?php
        echo $this->Html->link("<i class='icon-home'></i>Home", array("controller" => "Home",
            "action" => "index"), array("escape" => false));
        ?>

    </li>
    <li class='conteudos' id="conteudos">
        <?php
        echo $this->Html->link("<i class='icon-list'></i>Conteudo", array("controller" => "Conteudos",
            "action" => "index"), array("escape" => false));
        ?>
    </li>
    <li class='destaques' id="destaques">
        <?php
        echo $this->Html->link("<i class='icon-picture'></i>Player", array("controller" => "Destaques",
            "action" => "index"), array("escape" => false));
        ?>
    </li>
    <li class='servicos' id="servicos">
        <?php
        echo $this->Html->link("<i class='icon-cog'></i>Serviços", array("controller" => "Servicos",
            "action" => "index"), array("escape" => false));
        ?>
    </li>
    <li class='parceiros' id="parceiros">
        <?php
        echo $this->Html->link("<i class='icon-group'></i>Parceiros", array("controller" => "Parceiros",
            "action" => "index"), array("escape" => false));
        ?>
    </li>
    <li id="users">
        <?php
        echo $this->Html->link("<i class='icon-user'></i>Usuários", array("controller" => "Users",
            "action" => "index"), array("escape" => false));
        ?>

    </li>
</ul>

