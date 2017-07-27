<footer id="contato">
    <div class="logo">
        <img src="<?php echo get_template_directory_uri() ?>/img/logo_yanne_cristina_inv.png">
    </div>
    <div class="endereco">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <?php echo do_shortcode('[shortcode-variables slug="frase-rodape"]'); ?>
            </div>
        </div>
    </div>
    <div id="newsletter" class="newsletter">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input type="email" class="form-control" name="newsletter-email" placeholder="Deixe seu Email"
                               required>
                        <button type="submit" name="submit" value="newsletter" class="input-group-addon">INSCREVER
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="social">
        <a href="<?php echo do_shortcode('[shortcode-variables slug="instagram"]'); ?>" target="_blank">
            <img src="<?php echo get_template_directory_uri() ?>/img/inst.png">
        </a>
        <a href="<?php echo do_shortcode('[shortcode-variables slug="facebook"]'); ?>" target="_blank">
            <img src="<?php echo get_template_directory_uri() ?>/img/fbk.png">
        </a>
        <a href="javascript: jalert('Whatsapp','<?php echo do_shortcode('[shortcode-variables slug="whatsapp"]'); ?>')">
            <img src="<?php echo get_template_directory_uri() ?>/img/wpp.png">
        </a>
    </div>
    <div class="copyright">
        <?php echo do_shortcode('[shortcode-variables slug="copyright"]'); ?>
    </div>
</footer>

<?php

if (@$_REQUEST['submit'] == 'newsletter') {
    //$add = add_newsletter_tribulant($_REQUEST['newsletter-email']);
    $add = add_newsletter_stefano($_REQUEST['newsletter-email']);

    if ($add == 1)
        echo '
            <script language="javascript">
                jQuery(function ($) {
                    swal({
                        title: "Você foi inscrito em nossa Newsletter",
                        text: "",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#030570",
                        confirmButtonText: "Ok",
                        closeOnConfirm: false,
                        html: false
                    });
                });
            </script>
        ';
    elseif ($add == 0)
        echo '
            <script language="javascript">
                jQuery(function ($) {
                    swal({
                        title: "Informe um email válido",
                        text: "",
                        type: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#030570",
                        confirmButtonText: "Ok",
                        closeOnConfirm: false,
                        html: false
                    });
                });
            </script>
        ';
    elseif ($add == -1)
        echo '
            <script language="javascript">
                jQuery(function ($) {
                    swal({
                        title: "Você já esta inscrito em nossa newsletter",
                        text: "",
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonColor: "#030570",
                        confirmButtonText: "Ok",
                        closeOnConfirm: false,
                        html: false
                    });
                });
            </script>
        ';
}

if (@$_REQUEST['submit'] == 'contato') {
    $nome = htmlspecialchars(addslashes($_REQUEST['contato-nome']));
    $email = htmlspecialchars(addslashes($_REQUEST['contato-email']));
    $telefone = htmlspecialchars(addslashes($_REQUEST['contato-tel']));
    $mensagem = htmlspecialchars(addslashes($_REQUEST['contato-mensagem'])) . "<br />Telefone: " . $telefone;

    if (contato($nome, $email, 'Mensagem enviada pelo formulário de contato', $mensagem))
        echo '
            <script language="javascript">
                jQuery(function ($) {
                    swal({
                        title: "Mensagem enviada!",
                        text: "",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#030570",
                        confirmButtonText: "Ok",
                        closeOnConfirm: false,
                        html: false
                    });
                });
            </script>
        ';
    else
        echo '
            <script language="javascript">
                jQuery(function ($) {
                    swal({
                        title: "Verifique todos os campos",
                        text: "",
                        type: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#030570",
                        confirmButtonText: "Ok",
                        closeOnConfirm: false,
                        html: false
                    });
                });
            </script>
        ';
}
?>

<script language="JavaScript">
    function jalert(titulo, conteudo) {
        jQuery.alert({
            title: titulo,
            content: conteudo,
            type: 'blue',
            theme: 'material',
            buttons: {
                ok: {
                    text: 'OK',
                    btnClass: 'btn-success',
                    keys: ['enter'],
                    action: function () {
                        //
                    }
                }
            }
        });
    }

    jQuery(function ($) {
        $(window).bind('scroll', function () {
            if ($(window).scrollTop() > 192) {
                $('#menu').addClass('fix');
            } else {
                $('#menu').removeClass('fix');
            }
        });
    });
</script>

<?php wp_footer(); ?>

</body>
</html>