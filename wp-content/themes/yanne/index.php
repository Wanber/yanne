<?php get_header(); ?>

<div class="slider">
    <?php masterslider(1); ?>
</div>

<?php
query_posts('showposts=1&category_name=historia');
while (have_posts()) : the_post();
    echo '
        <section class="historia" id="historia">
            <div class="titulo">
                <span>' . get_the_title() . '</span>
                <div class="sep"></div>
            </div>
        
            <div class="row justify-content-center">
                <div class="col-md-9 conteudo">
                    ' . wp_trim_words(get_the_excerpt(), 150, ' […]') . '
                </div>
            </div>
            <div class="row justify-content-center">
                <button type="button" class="btn btn-outline-warning" onclick="javascript:redirecionar(\'' . get_permalink() . '\');">Saiba Mais</button>
            </div>
        </section>
    ';
endwhile;
?>

<section class="separador">
    <img src="<?php echo get_template_directory_uri() ?>/img/bgsec1.png">
</section>

<?php

$itens = '';

query_posts('showposts=6&category_name=portifolio-item');
while (have_posts()) : the_post();
    has_post_thumbnail($post_id) ? $thumb = get_the_post_thumbnail_url($post_id) : $thumb = get_template_directory_uri() . "/img/portifolio-default.png";
    $itens .= '
        <div class="col-md-4 portfolio-item" onclick="javascript:redirecionar(\'' . get_permalink() . '\')">
            <img src="' . $thumb . '">
            <div class="titulo"><span>' . get_the_title() . '</span></div>
            <div class="descricao">
                <!-- ' . wp_trim_words(get_the_excerpt(), 35, ' [...]') . ' -->
            </div>
        </div>
    ';
endwhile;


query_posts('showposts=1&category_name=portifolio');
while (have_posts()) : the_post();
    echo '
        <section class="portfolio" id="portifolio">
            <div class="titulo">
                <span>' . get_the_title() . '</span>
                <div class="sep"></div>
            </div>
        
            <div class="row justify-content-center">
                <div class="col-md-9 conteudo">
                    ' . get_the_content() . '
                </div>
            </div>
    
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="row justify-content-center">
                        ' . $itens . '
                    </div>
                </div>      
            </div>
            
        </section>
    ';
endwhile;
?>

<section class="separador">
    <img src="<?php echo get_template_directory_uri() ?>/img/bgsec2.png">
</section>

<?php

$itens = '';

query_posts('showposts=6&category_name=cursos-item');
while (have_posts()) : the_post();
    has_post_thumbnail($post_id) ? $thumb = get_the_post_thumbnail_url($post_id) : $thumb = get_template_directory_uri() . "/img/cursos-default.png";
    $itens .= '
        <div class="col-md-4 portfolio-item" onclick="javascript:redirecionar(\'' . get_permalink() . '\')">
            <img src="' . $thumb . '">
            <div class="titulo"><span>' . get_the_title() . '</span></div>
            <div class="descricao">
                <!-- ' . wp_trim_words(get_the_excerpt(), 35, ' [...]') . ' -->
            </div>
        </div>
    ';
endwhile;


query_posts('showposts=1&category_name=cursos');
while (have_posts()) : the_post();
    echo '
        <section class="cursos" id="cursos">
            <div class="titulo">
                <span>' . get_the_title() . '</span>
                <div class="sep"></div>
            </div>
        
            <div class="row justify-content-center">
                <div class="col-md-9 conteudo">
                    ' . get_the_content() . '
                </div>
            </div>
    
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="row justify-content-center">
                        ' . $itens . '
                    </div>
                </div>      
            </div>
            
        </section>
    ';
endwhile;
?>

<?php
query_posts('showposts=1&category_name=orcamento');
while (have_posts()) : the_post();
    echo '
        <section class="orcamento" id="orcamento" style="background-image: url(\'' . get_template_directory_uri() . '/img/bgsec1.png\');">
            <div class="bg">
                <div class="titulo">
                    <span>' . get_the_title() . '</span>
                    <div class="sep"></div>
                </div>
        
                <div class="row justify-content-md-center">
                    <div class="col-md-9 conteudo">
                       ' . get_the_content() . '
                    </div>
                </div>
        
                <div class="row justify-content-md-center">
                    <div class="col-md-9">
                        <form action="" method="post">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="contato-nome"
                                               placeholder="Seu Nome" required>
                                        <input type="tel" class="form-control" name="contato-tel"
                                               placeholder="(31) 9999-9999" required>
                                        <input type="email" class="form-control" name="contato-email"
                                               placeholder="Seu Email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea name="contato-mensagem" class="form-control" rows="4" placeholder="Mensagem" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-content-center">
                                <div class="col-md-12">
                                    <button type="submit" name="submit" value="contato" class="btn btn-outline-warning">ENVIAR</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    ';
endwhile;
?>

<?php get_footer(); ?>
