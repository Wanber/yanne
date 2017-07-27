<?php
//desativa a edição do tema
define('DISALLOW_FILE_EDIT', true);
//remove a barra de admin
add_filter('show_admin_bar', '__return_false');
//remove a tag do generator
remove_action('wp_head', 'wp_generator');
//habilita ediçao de menus
add_theme_support('menus');
//habilita thumb em posts
add_theme_support('post-thumbnails');

//habilita upload pelo tema
include_once ABSPATH . 'wp-admin/includes/media.php';
include_once ABSPATH . 'wp-admin/includes/file.php';
include_once ABSPATH . 'wp-admin/includes/image.php';

//retornar somente texto no excerpt
add_filter('the_excerpt', function ($content) {
    return strip_tags(strip_shortcodes($content));
});

//limitar excerpt
add_filter('excerpt_length', function () {
    return 40;
});

//substituir classe nos menus bootstrap v4
function add_menuclass($ulclass) {
    return preg_replace('/<a title="nav-link"/', '<a class="nav-link"', $ulclass, -1);
}
add_filter('wp_nav_menu','add_menuclass');

//registrar espaço para widgets
/*
function registrar_espacos_widgets () {

    register_sidebar( array(
        'name' => 'nome do espaço',
        'id' => 'slug_widget',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );
}
add_action( 'widgets_init', 'registrar_espacos_widgets' );
*/

//ativar single.php para categorias
add_filter('single_template', 'checar_single_categoria');

function checar_single_categoria($t)
{
    foreach ((array)get_the_category() as $cat) {
        if (file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php"))
            return TEMPLATEPATH . "/single-{$cat->slug}.php";

        if ($cat->parent) {
            $cat = get_the_category_by_ID($cat->parent);

            if (file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php"))
                return TEMPLATEPATH . "/single-{$cat->slug}.php";
        }
    }
    return $t;
}

//Segurança
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

//funçoes uteis
function pegaMeioStr($inicio, $fim, $str)
{
    @$ex = explode($inicio, $str);
    @$ex2 = explode($fim, $ex[1]);
    return $ex2[0];
}

function get_attachment_url_by_slug($slug)
{
    $args = array(
        'post_type' => 'attachment',
        'name' => sanitize_title($slug),
        'posts_per_page' => 1,
        'post_status' => 'inherit',
    );
    $_header = get_posts($args);
    $header = $_header ? array_pop($_header) : null;
    return $header ? wp_get_attachment_url($header->ID) : '';
}

function add_newsletter_stefano($email)
{
    global $wpdb;

    if (is_email($email)) {
        $email = addslashes($email);
        $query = "INSERT INTO " . $wpdb->prefix . "newsletter (email, status) VALUES ('" . $email . "','C')";
        $wpdb->get_results($query);
        return true;
    } else
        return false;
}

function add_newsletter_tribulant($email)
{
    global $wpdb;

    if (is_email($email)) {

        if (class_exists('wpMail')) {
            $wpMail = new wpMail();
            global $Subscriber;
            $data = array('email' => $email, 'list_id' => array(1));

            if ($Subscriber -> optin($data, false)) {
                return 1;
            } else {
                return -1;
            }
        } else
            return 0;

        /*
        $query = "INSERT INTO " . $wpdb->prefix . "wpmlsubscribers (email, list) VALUES ('" . $email . "', '1')";
        $wpdb->get_results($query);
        if (strstr(strtolower($wpdb->last_error), 'duplicate'))
            return -1;
        else
            return 1;
        */
    } else
        return 0;
}

function contato($nome, $email, $assunto, $mensagem)
{
    $headers = 'From: ' . $nome . ' <' . $email . '>' . "\r\n";
    $mensagem .= '<br /><br />Mensagem enviada via formulário de contato pelo site <i>' . bloginfo('name') . '</i>';
    wp_mail(get_bloginfo("admin_email"), $assunto, $mensagem, $headers);
    return true;
}

//adiciona o css/js do tema ao header
function theme_style()
{
    //jquery
    wp_enqueue_script('jquery');
    //style.css
    wp_enqueue_style('theme-style', get_stylesheet_uri(), false, null, 'all');
    wp_enqueue_style('theme-style2', get_template_directory_uri()."/css/main.css", false, null, 'all');
    wp_enqueue_style('slit-slider', get_template_directory_uri()."/css/slit-slider.css", false, null, 'all');
    wp_enqueue_script('theme-js', get_template_directory_uri() . '/js/main.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'theme_style');

//adiciona o favicon
add_action('wp_head', 'theme_favicon');

function theme_favicon()
{
    echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_stylesheet_directory_uri() . '/favicon.ico" />';
}

//texto do rodape admin
add_filter('admin_footer_text', 'theme_admin_footer');
function theme_admin_footer()
{
    $my_theme = wp_get_theme();
    echo 'Desenvolvido por: ' . $my_theme->get('Author') . ' - <a href="mailto:wanber@outlook.com">wanber@outlook.com</a>';
}

//script para rolar suavemente links para ID's
function script_scroll_footer()
{
    echo '
        <!--rolar suavemente -->
        <script type="text/javascript">
            jQuery(function ($) {
                $("a").click(function(event){
                    var url = event.target.baseURI;
                    if(url.indexOf("#") > -1) {
                        //event.preventDefault();
                        $(\'html,body\').animate({scrollTop: $(this.hash).offset().top - 0}, 800);//ajustar aqui
                    }
               });
            });
        </script>
    ';
}

function add_script_scroll()
{
    add_action('wp_footer', 'script_scroll_footer');
}

//bootstrap
function bootstrap($tema = null)
{
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/plugins/bootstrap/css/bootstrap.min.css', false, null, 'all');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/plugins/bootstrap/js/bootstrap.min.js', array(), null, true);

    if ($tema != null)
        wp_enqueue_style('bootstrap-theme', get_template_directory_uri() . '/plugins/bootstrap/css/' . $tema . '.css', false, null, 'all');
}

//incluir fancybox
function fancybox_footer()
{
    echo '
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".fancybox").fancybox();
            });
        </script>
    ';
}

function add_fancybox()
{
    wp_enqueue_style('fancybox', get_template_directory_uri() . '/plugins/fancybox/lib/jquery.fancybox.css', false, null, 'all');
    wp_enqueue_script('fancybox-js', get_template_directory_uri() . '/plugins/fancybox/lib/jquery.fancybox.pack.js', array(), null, true);
    wp_enqueue_script('mousewheel-js', get_template_directory_uri() . '/plugins/fancybox/lib/jquery.mousewheel-3.0.6.pack.js', array(), null, true);
    wp_enqueue_style('fancybox-buttons', get_template_directory_uri() . '/plugins/fancybox/lib/helpers/jquery.fancybox-buttons.css', false, null, 'all');
    wp_enqueue_script('fancybox-buttons-js', get_template_directory_uri() . '/plugins/fancybox/lib/helpers/jquery.fancybox-buttons.js', array(), null, true);
    wp_enqueue_style('fancybox-thumbs', get_template_directory_uri() . '/plugins/fancybox/lib/helpers/jquery.fancybox-thumbs.css', false, null, 'all');
    wp_enqueue_script('fancybox-thumbs-js', get_template_directory_uri() . '/plugins/fancybox/lib/helpers/jquery.fancybox-thumbs.js', array(), null, true);
    wp_enqueue_script('fancybox-media-js', get_template_directory_uri() . '/plugins/fancybox/lib/helpers/jquery.fancybox-media.js', array(), null, true);

    add_action('wp_footer', 'fancybox_footer');
}

function flexslider_footer()
{
    echo '
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                  $(".flexslider").flexslider({
                    animation: "slide"
                });
            });
        </script>
    ';
}

function add_flexslider()
{
    wp_enqueue_script('flexslider-js', get_template_directory_uri() . '/plugins/flexslider/jquery.flexslider-min.js', array(), null, true);
    wp_enqueue_style('flexslider', get_template_directory_uri() . '/plugins/flexslider/flexslider.css', false, null, 'all');

    add_action('wp_footer', 'flexslider_footer');
}

//adicionar animate.css + wow
function wow_footer()
{
    echo '
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                var wow = new WOW({
                    boxClass:     \'wow\',      // animated element css class (default is wow)
                    animateClass: \'animated\', // animation css class (default is animated)
                    offset:       0,          // distance to the element when triggering the animation (default is 0)
                    mobile:       true,       // trigger animations on mobile devices (default is true)
                    live:         true,       // act on asynchronously loaded content (default is true)
                    callback:     function(box) {
                      // the callback is fired every time an animation is started
                      // the argument that is passed in is the DOM node being animated
                    },
                    scrollContainer: null // optional scroll container selector, otherwise use window
                });
                wow.init();
            });
        </script>
    ';
}

/*
add_action( 'init', 'create_post_type_film' );
function create_post_type_film() {
    register_post_type( 'film',
        array(
            'labels' => array(
                'name' => _x( 'Categories', 'taxonomy general name' ),
                'singular_name' => _x( 'Category', 'taxonomy singular name' ),
                'search_items' =>  __( 'Search Categories' ),
                'all_items' => __( 'All Categories' ),
                'parent_item' => __( 'Parent Category' ),
                'parent_item_colon' => __( 'Parent Category:' ),
                'edit_item' => __( 'Edit Category' ),
                'update_item' => __( 'Update Category' ),
                'add_new_item' => __( 'Add New Category' ),
                'new_item_name' => __( 'New Category Name' ),
                'menu_name' => __( 'Category' ),
            ),
            'public' => true,
        )
    );
}
*/

function add_sweetalert()
{
    wp_enqueue_script('sweetalert-js', get_template_directory_uri() . '/plugins/sweetalert/sweetalert.min.js', array(), null, true);
    wp_enqueue_style('sweetalert', get_template_directory_uri() . '/plugins/sweetalert/sweetalert.css', false, null, 'all');
}

function add_wow()
{
    wp_enqueue_script('wow', get_template_directory_uri() . '/plugins/animate.css + wow/wow.min.js', array(), null, true);
    wp_enqueue_style('animate.css', get_template_directory_uri() . '/plugins/animate.css + wow/animate.css', false, null, 'all');
    add_action('wp_footer', 'wow_footer');
}

function add_masked_input()
{
    wp_enqueue_script('markedinput-js', get_template_directory_uri() . '/plugins/maskedinput/jquery.maskedinput.min.js', array(), null, true);
    wp_enqueue_script('maskmoney-js', get_template_directory_uri() . '/plugins/maskedinput/jquery.maskmoney.min.js', array(), null, true);
}

function add_bxslider()
{
    wp_enqueue_style('bxslider', get_template_directory_uri() . '/plugins/bxslider/jquery.bxslider.css', false, null, 'all');
    wp_enqueue_script('bxslider-js', get_template_directory_uri() . '/plugins/bxslider/jquery.bxslider.min.js', array(), null, true);
}

//executar bxslider
function bxslider($id)
{
    add_bxslider();

    global $wpdb;
    $query = "SELECT * FROM " . $wpdb->prefix . "huge_itslider_sliders WHERE id = '$id'";
    $slider = $wpdb->get_results($query)[0];

    if ($slider->slider_list_effects_s == "fade")
        $efeito = $slider->slider_list_effects_s;
    else if (strstr($slider->slider_list_effects_s, "cubeV"))
        $efeito = "vertical";
    else
        $efeito = "horizontal";

    if ($slider->show_thumb == "nonav")
        $navegador = "false";
    else
        $navegador = "true";

    $tempo_troca = $slider->param;
    $tempo_pausa = $slider->description;

    $query = "SELECT name,image_url,description FROM " . $wpdb->prefix . "huge_itslider_images WHERE slider_id = '$id' ORDER BY ordering";
    $imgs = $wpdb->get_results($query);

    if ($slider->random_images == "on" && $wpdb->num_rows > 1)
        $autoload = "true";
    else
        $autoload = "false";

    if ($slider->random_images == "on")
        $random = "true";
    else
        $random = "false";

    if ($slider->pause_on_hover == "on")
        $hover_stop = "true";
    else
        $hover_stop = "false";

    if ($slider->sl_loading_icon == "on")
        $preload = "true";
    else
        $preload = "false";

    echo '
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(".bxslider").bxSlider({
                  mode: "' . $efeito . '",
                  auto: ' . $autoload . ',
                  pause: ' . $tempo_pausa . ',
                  controls: ' . $navegador . ',
                  speed: ' . $tempo_troca . ',
                  randomStart: ' . $random . ',
                  autoHover: ' . $hover_stop . ',
                  preloadImages: ' . $preload . ',
                  pager: false,
                  autoControls: false,
                  captions: true
                });
            });
        </script>
    ';

    echo '<ul class="bxslider">';

    foreach ($imgs as $img) {

        if ($img->description != "")
            $descricao = 'title="' . $img->description . '"';
        else
            $descricao = "";

        echo '<li><img style="width: 100%; height: 100vh;" src="' . $img->image_url . '" ' . $descricao . ' /></li>';
    }

    echo '</ul>';
}

//obter imagens de um slider
function obter_imagens_slider($slider_id, $rand = false, $qtd = 0)
{
    global $wpdb;

    $query = "SELECT title AS name,attachment_id AS image_url, description
    FROM " . $wpdb->prefix . "hugeit_slider_slide
    WHERE slider_id = '$slider_id'
    ";

    if ($rand)
        $query .= ' ORDER BY rand()';
    else
        $query .= ' ORDER BY `order`';

    if ($qtd > 0)
        $query .= ' LIMIT ' . $qtd;

    $resultados = $wpdb->get_results($query);

    foreach ($resultados as $resultado) {
        $resultado->image_url = wp_get_attachment_url($resultado->image_url);
    }

    return $resultados;
}

//incluir fontes
function fonte_google($fonte, $tam)
{
    wp_enqueue_style("fonte-" . $fonte, 'https://fonts.googleapis.com/css?family='.$fonte.':'.$tam, false, null, 'all');
}
function fonte($fonte)
{
    wp_enqueue_style("fonte-" . $fonte, get_template_directory_uri().'/fonts/'.$fonte.'.css', false, null, 'all');
}