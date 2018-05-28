<?php
/**
 * Grundeinstellungen für WordPress
 *
 * Zu diesen Einstellungen gehören:
 *
 * * MySQL-Zugangsdaten,
 * * Tabellenpräfix,
 * * Sicherheitsschlüssel
 * * und ABSPATH.
 *
 * Mehr Informationen zur wp-config.php gibt es auf der
 * {@link https://codex.wordpress.org/Editing_wp-config.php wp-config.php editieren}
 * Seite im Codex. Die Zugangsdaten für die MySQL-Datenbank
 * bekommst du von deinem Webhoster.
 *
 * Diese Datei wird zur Erstellung der wp-config.php verwendet.
 * Du musst aber dafür nicht das Installationsskript verwenden.
 * Stattdessen kannst du auch diese Datei als wp-config.php mit
 * deinen Zugangsdaten für die Datenbank abspeichern.
 *
 * @package WordPress
 */

// ** MySQL-Einstellungen ** //
/**   Diese Zugangsdaten bekommst du von deinem Webhoster. **/

/**
 * Ersetze datenbankname_hier_einfuegen
 * mit dem Namen der Datenbank, die du verwenden möchtest.
 */
define('DB_NAME', 'thomasblei');

/**
 * Ersetze benutzername_hier_einfuegen
 * mit deinem MySQL-Datenbank-Benutzernamen.
 */
define('DB_USER', 'root');

/**
 * Ersetze passwort_hier_einfuegen mit deinem MySQL-Passwort.
 */
define('DB_PASSWORD', 'root');

/**
 * Ersetze localhost mit der MySQL-Serveradresse.
 */
define('DB_HOST', 'localhost');

/**
 * Der Datenbankzeichensatz, der beim Erstellen der
 * Datenbanktabellen verwendet werden soll
 */
define('DB_CHARSET', 'utf8');

/**
 * Der Collate-Type sollte nicht geändert werden.
 */
define('DB_COLLATE', '');

/**#@+
 * Sicherheitsschlüssel
 *
 * Ändere jeden untenstehenden Platzhaltertext in eine beliebige,
 * möglichst einmalig genutzte Zeichenkette.
 * Auf der Seite {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * kannst du dir alle Schlüssel generieren lassen.
 * Du kannst die Schlüssel jederzeit wieder ändern, alle angemeldeten
 * Benutzer müssen sich danach erneut anmelden.
 *
 * @since 2.6.0
 */
 define('AUTH_KEY',         '2>[fO$-=/|C=C0IIX>APVvu<o.}3u.^#ad?7Frx;|Ck9BJdbTc+~#h|,wzg7V5D`X');
 define('SECURE_AUTH_KEY',  '2P]xO@Y1NsqwM1u<-5v5<6s}`B{SF*|P3c0$oq,2Drn5|<>JJNZ67u !7:X(#FM%6');
 define('LOGGED_IN_KEY',    'F+o7Rf:;r_N`CV2TF+dox#[1;Y<jE5hHeg^f{tR9q:UGEfdY/-?q%D>+!D6|QN0ru');
 define('NONCE_KEY',        'Tn==o,Xq:PCq22Hf5hm>N[u+c>Jm+ihx!yP!XPln p=a!e-]+CH}KeTrIl4,pvtGi');
 define('AUTH_SALT',        'C?Q?mqNI9-KC(l ZDT!OJfE`gn3Fwp+5T`de,W(Dm;gfWf:sZf$@0+ogRGy<JXZg(');
 define('SECURE_AUTH_SALT', '(rys5BPoa|?/v.i$FjaHE;<]WTqN#2sLTCU^ZsGZ$v)R)Xf/cnoYBv9Ouo)u}l,8*');
 define('LOGGED_IN_SALT',   'fzUCvNzX9 {23Kg@`,P@zv+$5u-+%G)+_?v;CQxF?Yac,~Tqf,fqcA,J)h~SJ+^/Z');
 define('NONCE_SALT',       'M8a/w38k{XZc,:/T8AT$zzNNuSd$_vMs-|w]`lk.s,)Le;KR6GXizvsz}_i(,]xS_');

/**#@-*/

/**
 * WordPress Datenbanktabellen-Präfix
 *
 * Wenn du verschiedene Präfixe benutzt, kannst du innerhalb einer Datenbank
 * verschiedene WordPress-Installationen betreiben.
 * Bitte verwende nur Zahlen, Buchstaben und Unterstriche!
 */
$table_prefix  = 'tb_';

/**
 * Für Entwickler: Der WordPress-Debug-Modus.
 *
 * Setze den Wert auf „true“, um bei der Entwicklung Warnungen und Fehler-Meldungen angezeigt zu bekommen.
 * Plugin- und Theme-Entwicklern wird nachdrücklich empfohlen, WP_DEBUG
 * in ihrer Entwicklungsumgebung zu verwenden.
 *
 * Besuche den Codex, um mehr Informationen über andere Konstanten zu finden,
 * die zum Debuggen genutzt werden können.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Das war’s, Schluss mit dem Bearbeiten! Viel Spaß beim Bloggen. */
/* That's all, stop editing! Happy blogging. */

/** Der absolute Pfad zum WordPress-Verzeichnis. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Definiert WordPress-Variablen und fügt Dateien ein.  */
require_once(ABSPATH . 'wp-settings.php');
