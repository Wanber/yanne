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

                <div class="col-md-9" style="text-align: left">
                    <br />
                    <div style="text-align: center"><h1><?php the_title() ?></h1></div>
                    <br />
                    <?php the_content() ?>
                </div>
            </div>
        </div>
    </article>

<?php endwhile; endif; ?>


<?php get_footer(); ?>