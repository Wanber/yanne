<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Por favor, não acesse este arquivo diretamente, Obrigado!');

if ( post_password_required() ) {
    echo '<p class="sem-comentarios">Este artigo está protegido por senha. Insira-a para ver os comentários.</p>';
    return;
} ?>

<div class="comentarios" id="comments">
    <h3><?php comments_number('0 Comentários', '1 Comentário', '% Comentários' );?></h3>

    <?php if ( have_comments() ) : ?>

        <ol class="lista-comentarios">
            <?php wp_list_comments('avatar_size=40&type=comment'); ?>
        </ol>

        <div class="paginacao"><?php paginate_comments_links(); ?></div>


    <?php endif; ?>

    <?php if ( comments_open() ) : ?>

        <div class="comentar" id="respond">
            <h3>Deixe o seu comentário!</h3>

            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                <fieldset>
                    <?php if ( $user_ID ) : ?>

                        <p>Autentificado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.&nbsp;&nbsp;&nbsp;<a href="<?php echo wp_logout_url(); ?>" title="Sair desta conta">Sair desta conta &raquo;</a></p>

                    <?php else : ?>

                        <div class="row grid-form">
                            <div class="col-md-6 item-form">
                                <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" placeholder="Nome" required />
                            </div>
                            <div class="col-md-6 item-form">
                                <input type="email" name="email" id="email" value="<?php echo $comment_author_email; ?>" placeholder="Email" required />
                            </div>
                            <!--
                            <div class="col-md-4 item-form">
                                <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" placeholder="Website (opcional)" />
                            </div>
                            -->
                        </div>

                    <?php endif; ?>

                    <div class="form-textarea">
                        <textarea name="comment" id="comment" rows="" placeholder="Mensagem" required cols=""></textarea>
                    </div>

                    <input type="submit" class="commentsubmit" value="Enviar Comentário" />

                    <?php comment_id_fields(); ?>
                    <?php do_action('comment_form', $post->ID); ?>
                </fieldset>
            </form>
            <p class="cancel"><?php cancel_comment_reply_link('Cancelar Resposta'); ?></p>
        </div>
    <?php else : ?>
        <h3>Os comentários estão desativados neste post.</h3>
    <?php endif; ?>
</div>
