<?php

Router::connect('/', array('controller' => 'home', 'action' => 'index'));
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
Router::connect('/paginas/:slug_pagina', array('controller' => 'paginas', 'action' => 'index'), array('pass' => array("slug_pagina")));
Router::connect('/cadastro', array('controller' => 'cadastroImoveis', 'action' => 'index'), array('pass' => array("slug_idioma")));


CakePlugin::routes();

require CAKE . 'Config' . DS . 'routes.php';
