<!DOCTYPE html>
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>><!--<![endif]-->
<head>
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="<?php bloginfo('description'); ?>"/>
    <meta name="keywords"
          content="<?php echo do_shortcode('[shortcode-variables slug="keywords"]'); ?>"/>
    <meta name="author" content="<?php echo wp_get_theme()->get('Author') ?>">
    <meta name="robots" content="all">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"/>

    <?php bootstrap('bootstrap-theme.min'); ?>

    <?php
    //fonte_google('Open+Sans', '400,300,700');
    add_sweetalert();
    //fonte('lato');
    //add_wow();
    //add_flexslider();
    ?>

    <link rel='stylesheet' href='<?php echo get_template_directory_uri() ?>/plugins/jquery-confirm/css/jquery-confirm.min.css' type='text/css' />
    <script src="<?php echo get_template_directory_uri() ?>/plugins/jquery-confirm/js/jquery-confirm.js"></script>

    <title><?php bloginfo('name'); ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>

    <?php wp_head(); ?>

</head>

<body id="body">

<header>
    <div class="social">
        <?php echo do_shortcode('[shortcode-variables slug="frase-cabecalho"]'); ?>
    </div>
    <div class="logo">
        <img src="<?php echo get_template_directory_uri() ?>/img/logo2.png">
    </div>

    <!--
    <nav>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link ativo" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">História</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Portifólio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Cursos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Orçamento</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contato</a>
            </li>
        </ul>
    </nav>
    -->

    <?php
    $menu_opts = array('menu' => 'Menu cursos/portifolio', 'container' => 'nav', 'container_class' => ' ', 'container_id' => 'menu', 'menu_class' => 'nav justify-content-center', 'menu_id' => '',
        'echo' => true, 'fallback_cb' => 'wp_page_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'item_spacing' => 'preserve',
        'depth' => 0, 'walker' => '', 'theme_location' => '');

    wp_nav_menu($menu_opts);
    ?>
</header>