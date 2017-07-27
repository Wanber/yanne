<?php get_header('single') ?>

<?php
$post_id = $post->ID;
$categoria = get_the_category();

$tags = '';
//foreach ((get_the_tags()) as $tag)
//$tags .= $tag->name;

if (empty($tags)) $tags = "sem tags";

$cats = '';
foreach ((get_the_category()) as $category)
    if ($category->cat_name != 'BLOG')
        $cats .= ', ' . $category->cat_name;

if (empty($cats)) $cats = "sem categoria"; else $cats = substr($cats, 1);
has_post_thumbnail($post_id) ? $thumb = get_the_post_thumbnail_url($post_id) : $thumb = get_template_directory_uri() . "/img/post-default.png";

//date_i18n('l, j F, Y', strtotime($post->post_date))
//$post->post_title;
//$post->post_content;
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <article <?php post_class('article hentry'); ?> id="post-<?php the_ID(); ?>" itemscope
                                                    itemtype="http://schema.org/Article">
        <div class="container-fluid single-container">
            <div class="row justify-content-center">

                <div class="col-md-8" style="text-align: left; padding-right: 40px">
                    <br/>
                    <div style="text-align: center"><h1><?php the_title() ?></h1></div>
                    <br/>
                    <?php the_content() ?>


                    <?php
                    //$imgs = obter_imagens_slider(do_shortcode('[shortcode-variables slug="slider-certificados"]'), true, 0);
                    ?>

                    <!--
                    <div id="slider" class="flexslider" style="margin-top: 30px">

                        <ul class="slides">

                            <?php //foreach ($imgs as $img) : ?>

                                <li>
                                    <img src="<?php //echo $img->image_url ?>"
                                         style="height: 390px"/>
                                </li>

                            <?php //endforeach; ?>

                        </ul>
                    </div>
                    <div id="carousel" class="flexslider">
                        <ul class="slides">

                            <?php //foreach ($imgs as $img) : ?>

                                <li>
                                    <img src="<?php //echo $img->image_url ?>"
                                         style="height: 100px"/>
                                </li>

                            <?php //endforeach; ?>

                        </ul>
                    </div>

                    <link rel="stylesheet" href="<?php //echo get_template_directory_uri() . '/css/flexslider.css' ?>"
                          type="text/css"
                          media="screen"/>
                    <script src="<?php //echo get_template_directory_uri() . '/js/flexslider.js' ?>"></script>
                    <script>
                        jQuery(function ($) {
                            $('#carousel').flexslider({
                                animation: "slide",
                                controlNav: false,
                                animationLoop: false,
                                slideshow: false,
                                itemWidth: 210,
                                itemMargin: 5,
                                asNavFor: '#slider'
                            });

                            $('#slider').flexslider({
                                animation: "slide",
                                controlNav: false,
                                animationLoop: false,
                                slideshow: false,
                                sync: "#carousel"
                            });
                        });
                    </script>
                    -->
                </div>

                <div class="col-md-2">
                    <br/><br/><br/><br/>
                    <img src="<?php the_field('foto') ?>?w=400&h=400" style="border-radius: 50%">
                    <div style="text-align: center; margin-top: 15px"><h4>Yanne Cristina</h4></div>
                </div>
            </div>
        </div>
    </article>

<?php endwhile; endif; ?>


<?php get_footer(); ?>