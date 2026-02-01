<?php

/**
 * saintsmedia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package saintsmedia
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	// define('_S_VERSION', date('YmdHis')); // бодрим кэш пока ведутся разработки
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function saintsmedia_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on saintsmedia, use a find and replace
		* to change 'saintsmedia' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('saintsmedia', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	// Отключил RSS
	// add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	// Отключил Убрал лишний тайтл.
	// add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in multiple locations (one for each language).
	// Menu locations are dynamically registered based on Customizer settings
	$menu_locations = saintsmedia_get_registered_menu_locations();
	if ( ! empty( $menu_locations ) ) {
		register_nav_menus( $menu_locations );
	}

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'saintsmedia_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	// Поддержка возможностей Gutenberg
	add_theme_support('align-wide');
	add_theme_support('editor-styles');
	add_theme_support('wp-block-styles');
	add_theme_support('responsive-embeds');
	add_theme_support('custom-line-height');
	add_theme_support('custom-spacing');
	add_theme_support('custom-units');
	add_editor_style('editor-style.css');
}
add_action('after_setup_theme', 'saintsmedia_setup');


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function saintsmedia_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'saintsmedia'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'saintsmedia'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'saintsmedia_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function saintsmedia_scripts()
{
	wp_enqueue_style('saintsmedia-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('saintsmedia-style', 'rtl', 'replace');

	wp_enqueue_script('saintsmedia-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	// 7on подключил собственные CSS стили темы
	wp_enqueue_style('menu-style', get_template_directory_uri() . '/assets/css/menu-style.css', array('saintsmedia-style'), _S_VERSION);
	wp_enqueue_style('footer-style', get_template_directory_uri() . '/assets/css/footer-style.css', array('saintsmedia-style'), _S_VERSION);

	// 7on подключил собственные CSS стили для Gutenberg
	wp_enqueue_style('gutenberg-style', get_template_directory_uri() . '/assets/css/gutenberg-style.css', array('saintsmedia-style'), _S_VERSION);

	// 7on подключил собственные CSS стили для Gutenberg
	wp_enqueue_style('fonts-style', get_template_directory_uri() . '/assets/css/fonts-style.css', array('saintsmedia-style'), _S_VERSION);

	// Стили для хлебных крошек
	wp_enqueue_style('breadcrumbs-style', get_template_directory_uri() . '/assets/css/breadcrumbs.css', array('saintsmedia-style'), _S_VERSION);

	// Инлайн CSS с переменной для цвета фона хедера из кастомайзера
	// (перенесено в unified customizer: saintsmedia_customizer_output_css())

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'saintsmedia_scripts');


// Автоматически подставлять title изображения в alt
add_filter('wp_get_attachment_image_attributes', 'auto_title_to_alt', 10, 2);

function auto_title_to_alt($attr, $attachment)
{
	// если alt пустой
	if (empty($attr['alt'])) {
		$attr['alt'] = get_the_title($attachment->ID);
	}
	return $attr;
}




/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Multilingual menu customizer settings.
 */
require get_template_directory() . '/inc/customizer-multilingual.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Отключение лишних стилей и скриптов
add_action('wp_enqueue_scripts', function () {
	wp_dequeue_style('wp-block-library-theme');
	// Добавьте другие dequeue, если нужно
}, 100);

// Gutenberg patterns
add_action('init', function () {
	register_block_pattern_category('mytheme', [
		'label' => __('MyTheme', 'mytheme'),
	]);
});

/**
 * Иконки Font Awesome для пунктов меню через админку.
 * Добавляйте классы FA (например: 'fa-solid fa-house') в поле «CSS классы» пункта меню.
 * Внутрь <a> добавляется слева слот .menu-icon-slot с <i>, либо пустой слот — текст не смещается.
 * Работает для всех языковых меню.
 */
add_filter('walker_nav_menu_start_el', function ($item_output, $item, $depth, $args) {
	// Применяем только к локациям меню нашей темы (все языковые варианты)
	$menu_locations = array_keys( saintsmedia_get_registered_menu_locations() );
	if (!isset($args->theme_location) || !in_array($args->theme_location, $menu_locations)) {
		return $item_output;
	}

	// Если слот уже добавлен (фильтр вызвался повторно) — ничего не делаем
	if (strpos($item_output, 'menu-icon-slot') !== false) {
		return $item_output;
	}

	$fa_classes = [];
	if (!empty($item->classes) && is_array($item->classes)) {
		foreach ($item->classes as $class) {
			if (!$class) continue;
			// Разрешаем стили/наборы иконок FA и конкретные иконки 'fa-*'
			if (
				strpos($class, 'fa-') === 0 ||
				in_array($class, ['fa', 'fas', 'far', 'fal', 'fat', 'fad', 'fab', 'fa-solid', 'fa-regular', 'fa-light', 'fa-thin', 'fa-duotone', 'fa-brands'], true)
			) {
				$fa_classes[] = sanitize_html_class($class);
			}
		}
	}

	// Иконку добавляем только если действительно есть FA-классы; иначе ничего не вставляем
	if (!empty($fa_classes)) {
		$icon_html = '<span class="menu-icon-slot"><i class="' . esc_attr(implode(' ', $fa_classes)) . '" aria-hidden="true"></i></span>';
		// Вставим сразу после открывающего <a>
		$item_output = preg_replace('/(<a\b[^>]*>)/i', '$1' . $icon_html, $item_output, 1);
	}
	return $item_output;
}, 10, 4);

/**
 * Убираем FA-классы с <li>, чтобы Font Awesome не рисовала вторую иконку на элементе списка.
 * Классы FA задаём в админке, но рендерим их только внутри <a> через <i>, см. фильтр выше.
 */
add_filter('nav_menu_css_class', function ($classes, $item, $args, $depth) {
	$menu_locations = array_keys( saintsmedia_get_registered_menu_locations() );
	if (!isset($args->theme_location) || !in_array($args->theme_location, $menu_locations)) {
		return $classes;
	}
	$classes = array_filter((array)$classes, function ($class) {
		if (!$class) return false;
		if (
			strpos($class, 'fa-') === 0 ||
			in_array($class, ['fa', 'fas', 'far', 'fal', 'fat', 'fad', 'fab', 'fa-solid', 'fa-regular', 'fa-light', 'fa-thin', 'fa-duotone', 'fa-brands'], true)
		) {
			return false; // убрать FA-классы с li
		}
		return true;
	});
	return array_values($classes);
}, 10, 4);


/**
 * Get configured languages from theme_mod
 *
 * @return array List of languages: [ ['code' => 'en', 'name' => 'English'], ... ]
 */
function saintsmedia_get_languages() {
	$languages_json = get_theme_mod( 'saintsmedia_languages', '' );

	// If no custom languages, use defaults
	if ( empty( $languages_json ) ) {
		return array(
			array( 'code' => 'en', 'name' => 'English' ),
			array( 'code' => 'es', 'name' => 'Spanish' ),
			array( 'code' => 'de', 'name' => 'German' ),
			array( 'code' => 'fr', 'name' => 'French' ),
			array( 'code' => 'ru', 'name' => 'Russian' ),
		);
	}

	// Decode JSON
	$languages = json_decode( $languages_json, true );
	if ( ! is_array( $languages ) ) {
		return saintsmedia_get_languages(); // fallback to defaults
	}

	return $languages;
}

/**
 * Generate menu locations based on configured languages
 *
 * @return array Menu locations: [ 'primary-en' => 'Primary Menu (English)', ... ]
 */
function saintsmedia_get_registered_menu_locations() {
	$languages = saintsmedia_get_languages();
	$locations = array();

	foreach ( $languages as $lang ) {
		if ( ! isset( $lang['code'] ) || ! isset( $lang['name'] ) ) {
			continue;
		}

		$code = sanitize_text_field( $lang['code'] );
		$name = sanitize_text_field( $lang['name'] );
		$location_id = $code === '' ? 'primary' : 'primary-' . $code;
		$locations[ $location_id ] = sprintf( __( 'Primary Menu (%s)', 'saintsmedia' ), $name );
	}

	return $locations;
}

/**
 * Get current page language based on URL prefix
 *
 * @return string Language code: 'en', 'es', 'de', 'fr', 'ru', etc.
 */
function saintsmedia_get_current_language() {
	// Get the requested URI
	$uri = trim( $_SERVER['REQUEST_URI'], '/' );

	// Check if first segment could be a language code
	$segments = explode( '/', $uri );
	if ( ! empty( $segments[0] ) && preg_match( '/^[a-z0-9_-]+$/', $segments[0] ) ) {
		// Check if this language code is configured
		$languages = saintsmedia_get_languages();
		$lang_codes = wp_list_pluck( $languages, 'code' );

		if ( in_array( $segments[0], $lang_codes, true ) ) {
			return sanitize_text_field( $segments[0] );
		}
	}

	// Default to language with empty code (main language without URL prefix)
	$languages = saintsmedia_get_languages();
	foreach ( $languages as $lang ) {
		if ( isset( $lang['code'] ) && $lang['code'] === '' ) {
			return '';
		}
	}

	// Fallback to first configured language if no empty code found
	return ! empty( $languages[0] ) ? $languages[0]['code'] : 'en';
}

/**
 * Get the WordPress menu location for current language
 *
 * @return string Theme location ID: 'primary-en', 'primary-es', 'primary-de', etc.
 */
function saintsmedia_get_current_menu_location() {
	$language = saintsmedia_get_current_language();
	$language = sanitize_text_field( $language );
	return $language === '' ? 'primary' : 'primary-' . $language;
}


// Разгружаем файл: подключаем отдельные модули
require_once get_template_directory() . '/inc/breadcrumbs.php';
require_once get_template_directory() . '/inc/schema.php';



