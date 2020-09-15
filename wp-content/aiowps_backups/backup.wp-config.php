<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'vhotelh_3_hote');

/** Имя пользователя MySQL */
define('DB_USER', 'vhotelh_3_hote');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'Duo7O308');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '0_y2IVYMP==qZ<V-et*:J$Z1u4yHdxvs__PCb4Li,~G QN!5]P$$cQz.<z2n@0oS');
define('SECURE_AUTH_KEY',  '&fpO`#j*}<haQgaLvYmvz ;dh`&VWp 2 ,M0en([yzh=jn6UM}]MR~r:.}Gj`Woa');
define('LOGGED_IN_KEY',    'Qk4ZJNby#ALE,P!:I[hF_8C^L5o8UB1okl>f;oi}UFOJUguhuw?ku#8u$w36NZE%');
define('NONCE_KEY',        'J$YdmhVbw[~5`EG.k=o &ULxaV; (MMhpD*f Xy,%PJ`Dpw,Eg:_o 9lkuke]Ir=');
define('AUTH_SALT',        'xt,inITr`bJ+-2+c2v]Pk^N?>}l+GQZ!aQGrfe9&AP$J)eS0JtJEnr,/A6BUN@Fe');
define('SECURE_AUTH_SALT', 'J=-z!Tv1MWHW!I&H<0^Bflu/d`X[>T/Q|*L$(6s,y$#8`O$Q*$REtW16@/F9Abpj');
define('LOGGED_IN_SALT',   'x@:xA|@C#vPz1ImDu[+C|M$w:C>T:T4,4g.7D38fbBgF/gPH^:lYUV!P?J6L$^Qs');
define('NONCE_SALT',       'S5$:nOZS~NtU2A,* NJ3ol/-^xNOjB[NO2mi;OB%nsPUA2FmT4 wFu1,qMJKKZPD');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'htlhs_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
