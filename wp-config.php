<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'mariavershina_skm');

/** Имя пользователя MySQL */
define('DB_USER', '045892094_skm');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'skm14/88');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '6o,Xi!3{-&=!uyTuu5pM8-4m5Ej2DC|HOr0`nsr!+!v<{yFR`kE^s-!0F-NZuPYE');
define('SECURE_AUTH_KEY',  '@zAU<I1TY~WTzuWf;2.s.~y6|))o2[K(bHX]rm|k4i3la0_M]*3G9pD=-+yE`(/w');
define('LOGGED_IN_KEY',    'gjG2wVax5%,_40wY|rC{9jpWv4@sx<JO/!9`!(~oh8|-X)U1(PB%[Fl{)9@ie+9i');
define('NONCE_KEY',        'uY%:ATT@~c*bI>L@ipbgpI1 ]_00<*BUy&B@gmb%l&YH}S.R>1NY{<DlM0J)J?|*');
define('AUTH_SALT',        'pNWU{Z@xXgB%>h~U8_a=Lns)Sp7(a| z#4&P4z]ui*k->4z4WHpHEu9%`(32y;!V');
define('SECURE_AUTH_SALT', '>[!v|Wscsb7Sw1yVZIf}cxc./fL2l4!&y:uDVdg:|uvr-9AI@h%L|*U;F5Q5X*&w');
define('LOGGED_IN_SALT',   'dNo{TZYBA-O@5ykO2%se %-jLECznHnV^m8#NKTE|o]=OwI@X[0:bnFJdWmkDEc>');
define('NONCE_SALT',       'It-OUZw:x~~Fk5)^Bi[qB$0T(~1;Sj94uK,-]X|{d499g~n-&>iQm2Tcd83p5Hld');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');