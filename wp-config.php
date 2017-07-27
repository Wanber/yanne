<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa user o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'bd_yanne');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Zx1r_cv~n8pk&j@^Sg4Q4Hda3T#-jj.WqEI3bQ0I?(Gj(6/zkd$vP=H}0iCY`d] ');
define('SECURE_AUTH_KEY',  ')iF.Cqo-e-*h-/Sb0!H&32<BviY8VUg{yo2D zYcoxwoUd7Uh |_z/rdJh/ztgU`');
define('LOGGED_IN_KEY',    'j<S] }V8$qe,e=xM=G`lfTf_$sm|ak/VD)8uOe+=<fFs`3`Y[U;TxcQ^.xy-Dlw}');
define('NONCE_KEY',        '2Hna+yMNV[;7>V` SX|V-sgSO2gpFGkIY)Qo~KEzpi!0s:<A/ _^,q>NmKO_}~0p');
define('AUTH_SALT',        '+uI2*iv.)S&9=&vxpPxavn0xq_=. 3kITqQT]:eH82Rp&>%-H M) 4|jQd<a>-Q|');
define('SECURE_AUTH_SALT', '@Dk](T%0VW,}d 8i<]BM^5wokR>[w6wm{qM2SZS~g?1TuqQeVAmI60p+Z]k],7P<');
define('LOGGED_IN_SALT',   'hA7nVCbUTF(EMRaO.r22(Yl:!-];4PixmAuXhS-Bmh-YMZxh[JU+lb%>R.`nQErc');
define('NONCE_SALT',       '?-Jzic.DTPi,=,1UBdr:z~bY_=[<L4}&NAY/wJc:(E%4N:U{B`D+k(JAuKhWnhM}');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * para cada um um único prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
