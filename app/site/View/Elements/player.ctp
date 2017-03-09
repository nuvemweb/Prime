<div class="flexslider">
	<ul class="slides">
        <?php foreach ($destaques as $destaque) { ?>
            <li>
                <?php
                if (!empty($destaque["Destaque"]["link"])) {
                    echo ('<a href="' . $destaque["Destaque"]["link"] . '" ' . ($destaque["Destaque"]["externo"] == 1 ? ' target="_blank"' : "") . ' >');
                }
                ?>
                <img src="<?php echo( $this->request->base) ?>/upload/destaques/<?php echo $destaque["Destaque"]["id"]; ?>/1600x450-<?php echo($destaque["Destaque"]["imagem"]); ?>" alt="<?php echo $destaque['Destaque']['nome'] ?>" title="" />
                <?php
                if (!empty($destaque["Destaque"]["link"])) {
                    echo ('</a>');
                }
                ?>
            </li>
        <?php } ?>
    </ul>
</div>