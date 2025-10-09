<?php

/**
 * saintsmedia Theme Customizer
 * Unified Customizer configuration (single source of truth)
 *
 * @package saintsmedia
 */

/**
 * Возвращает массив полей кастомайзера.
 * Каждое поле: id, label, default, section, type, css_var, live (массив селекторов+свойств), sanitize, transport.
 */
function saintsmedia_get_customizer_fields(): array
{
	$fields = [
		[
			'id'        => 'saintsmedia_header_bg',
			'label'     => __('Фон меню + подвал', 'saintsmedia'),
			'default'   => '#111315',
			'section'   => 'colors',
			'type'      => 'color',
			'css_var'   => '--sm-menu-bg',
			'sanitize'  => 'sanitize_hex_color',
			'transport' => 'postMessage',
		],
		[
			'id'        => 'saintsmedia_header_bg_sub_menu',
			'label'     => __('Фон дочерних элем.меню', 'saintsmedia'),
			'default'   => '#222222',
			'section'   => 'colors',
			'type'      => 'color',
			'css_var'   => '--sm-menu-sub-bg',
			'sanitize'  => 'sanitize_hex_color',
			'transport' => 'postMessage',
		],
		[
			'id'        => 'saintsmedia_header_bg_hover_menu',
			'label'     => __('Фон наводки дочерних элем.меню', 'saintsmedia'),
			'default'   => '#E61E4D',
			'section'   => 'colors',
			'type'      => 'color',
			'css_var'   => '--sm-menu-hover-bg',
			'sanitize'  => 'sanitize_hex_color',
			'transport' => 'postMessage',
		],
		[
			'id'        => 'saintsmedia_header_link_color',               // уникальный ID
			'label'     => __('Цвет текста меню', 'saintsmedia'),     // подпись в кастомайзере
			'default'   => '#ffffff',                                     // дефолт
			'section'   => 'colors',                                      // куда положить (вкладка "Colors")
			'type'      => 'color',                                       // тип контрола
			'css_var'   => '--sm-menu-link',                              // имя CSS-переменной
			'sanitize'  => 'sanitize_hex_color',                          // санитайзер под тип
			'transport' => 'postMessage',                                 // live-превью без перезагрузки
		],
		[
			'id'        => 'saintsmedia_focus_outline',
			'label'     => __('Цвет фокуса (outline)', 'saintsmedia'),
			'default'   => '#6CA2FF',
			'section'   => 'colors',
			'type'      => 'color',
			'css_var'   => '--sm-focus-outline',
			'sanitize'  => 'sanitize_hex_color',
			'transport' => 'postMessage',
		],
		[
			'id'        => 'saintsmedia_menu_text',
			'label'     => __('Текст в шапке по умолчанию', 'saintsmedia'),
			'default'   => '#B8BDC5',
			'section'   => 'colors',
			'type'      => 'color',
			'css_var'   => '--sm-menu-text',
			'sanitize'  => 'sanitize_hex_color',
			'transport' => 'postMessage',
		],
		[
			'id'        => 'saintsmedia_burger_color',
			'label'     => __('Цвет иконки-бургера', 'saintsmedia'),
			'default'   => '#B8BDC5',
			'section'   => 'colors',
			'type'      => 'color',
			'css_var'   => '--sm-burger-color',
			'sanitize'  => 'sanitize_hex_color',
			'transport' => 'postMessage',
		],
		[
			'id'        => 'saintsmedia_menu_badge_bg',
			'label'     => __('Бейдж: фон', 'saintsmedia'),
			'default'   => '#E61E4D',
			'section'   => 'colors',
			'type'      => 'color',
			'css_var'   => '--sm-menu-badge-bg',
			'sanitize'  => 'sanitize_hex_color',
			'transport' => 'postMessage',
		],
		[
			'id'        => 'saintsmedia_menu_badge_color',
			'label'     => __('Бейдж: текст', 'saintsmedia'),
			'default'   => '#FFFFFF',
			'section'   => 'colors',
			'type'      => 'color',
			'css_var'   => '--sm-menu-badge-color',
			'sanitize'  => 'sanitize_hex_color',
			'transport' => 'postMessage',
		],
		// Footer links
		[
			'id'        => 'saintsmedia_footer_link',
			'label'     => __('Футер: цвет ссылки', 'saintsmedia'),
			'default'   => '#B8BDC5',
			'section'   => 'colors',
			'type'      => 'color',
			'css_var'   => '--sm-footer-link',
			'sanitize'  => 'sanitize_hex_color',
			'transport' => 'postMessage',
		],
		[
			'id'        => 'saintsmedia_footer_link_hover',
			'label'     => __('Футер: ссылка при наведении', 'saintsmedia'),
			'default'   => '#FFFFFF',
			'section'   => 'colors',
			'type'      => 'color',
			'css_var'   => '--sm-footer-link-hover',
			'sanitize'  => 'sanitize_hex_color',
			'transport' => 'postMessage',
		],
		[
			'id'        => 'saintsmedia_header_first_btn_bg',
			'label'     => __('Фон кнопки #1 (меню)', 'saintsmedia'),
			'default'   => '#F0A21A',
			'section'   => 'colors',
			'type'      => 'color',
			'css_var'   => '--sm-menu-first-btn-bg',
			'sanitize'  => 'sanitize_hex_color',
			'transport' => 'postMessage',
		],
		[
			'id'        => 'saintsmedia_header_first_btn_cl',
			'label'     => __('Текст кнопки #1 (меню)', 'saintsmedia'),
			'default'   => '#FFFFFF',
			'section'   => 'colors',
			'type'      => 'color',
			'css_var'   => '--sm-menu-first-btn-color',
			'sanitize'  => 'sanitize_hex_color',
			'transport' => 'postMessage',
		],
		[
			'id'        => 'saintsmedia_header_second_btn_bg',
			'label'     => __('Фон кнопки #2 (меню)', 'saintsmedia'),
			'default'   => '#FF3156',
			'section'   => 'colors',
			'type'      => 'color',
			'css_var'   => '--sm-menu-second-btn-bg',
			'sanitize'  => 'sanitize_hex_color',
			'transport' => 'postMessage',
		],
		[
			'id'        => 'saintsmedia_header_second_btn_cl',
			'label'     => __('Текст кнопки #2 (меню)', 'saintsmedia'),
			'default'   => '#FFFFFF',
			'section'   => 'colors',
			'type'      => 'color',
			'css_var'   => '--sm-menu-second-btn-color',
			'sanitize'  => 'sanitize_hex_color',
			'transport' => 'postMessage',
		],
		[
			'id'        => 'saintsmedia_enable_footer_menu',
			'label'     => __('Страницы в подвале', 'saintsmedia'),
			'default'   => false,
			'section'   => 'custom_homepage_settings',
			'type'      => 'checkbox',
			'css_var'   => '',
			'sanitize'  => 'wp_validate_boolean',
			'transport' => 'refresh',
		],
		[
			'id'        => 'saintsmedia_enable_footer_pay_method',
			'label'     => __('Метод оплаты и 18+', 'saintsmedia'),
			'default'   => false,
			'section'   => 'custom_homepage_settings',
			'type'      => 'checkbox',
			'css_var'   => '',
			'sanitize'  => 'wp_validate_boolean',
			'transport' => 'refresh',
		],
		[
			'id'        => 'saintsmedia_text_botton_1',
			'label'     => __('Текст кнопки #1', 'saintsmedia'),
			'default'   => '',
			'section'   => 'custom_homepage_settings',
			'type'      => 'text',
			'css_var'   => '',
			'sanitize'  => 'sanitize_text_field',
			'transport' => 'refresh',
		],
		[
			'id'        => 'saintsmedia_link_botton_1',
			'label'     => __('Ссылка кнопки #1', 'saintsmedia'),
			'default'   => '',
			'section'   => 'custom_homepage_settings',
			'type'      => 'url',
			'css_var'   => '',
			'sanitize'  => 'esc_url_raw',
			'transport' => 'refresh',
		],
		[
			'id'        => 'saintsmedia_text_botton_2',
			'label'     => __('Текст кнопки #2', 'saintsmedia'),
			'default'   => '',
			'section'   => 'custom_homepage_settings',
			'type'      => 'text',
			'css_var'   => '',
			'sanitize'  => 'sanitize_text_field',
			'transport' => 'refresh',
		],
		[
			'id'        => 'saintsmedia_link_botton_2',
			'label'     => __('Ссылка кнопки #2', 'saintsmedia'),
			'default'   => '',
			'section'   => 'custom_homepage_settings',
			'type'      => 'url',
			'css_var'   => '',
			'sanitize'  => 'esc_url_raw',
			'transport' => 'refresh',
		],
		[
			'id'        => 'logo_size_heder_menu',
			'label'     => __('Размер логотипа', 'saintsmedia'),
			'default'   => '200',
			'section'   => 'custom_homepage_settings',
			'type'      => 'number',
			'css_var'   => '--logo-size-heder-menu',
			'sanitize'  => 'sanitize_text_field',
			'transport' => 'refresh',
		],
		[
			'id'        => 'footer_mail_link',
			'label'     => __('Почта в подвале', 'saintsmedia'),
			'default'   => '',
			'section'   => 'custom_homepage_settings',
			'type'      => 'text',
			'css_var'   => '',
			'sanitize'  => 'sanitize_text_field',
			'transport' => 'refresh',
		],
		[
			'id'        => 'footer_contact_us',
			'label'     => __('Contact Us', 'saintsmedia'),
			'default'   => '',
			'section'   => 'custom_homepage_settings',
			'type'      => 'text',
			'css_var'   => '',
			'sanitize'  => 'sanitize_text_field',
			'transport' => 'refresh',
		],
		[
			'id'        => 'saintsmedia_font_file',
			'label'     => __('Шрифт', 'saintsmedia'),
			'default'   => 'system',
			'section'   => 'custom_homepage_settings',
			'type'      => 'select',
			'choices'   => array_merge([
				'system' => 'System (-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif)'
			], saintsmedia_scan_font_files()),
			'css_var'   => '',
			'sanitize'  => 'sanitize_text_field',
			'transport' => 'refresh',
		],
		[
			'id'        => 'border_radius_for_img_gutenberg',
			'label'     => __('Закругление img в Gutenberg', 'saintsmedia'),
			'default'   => '',
			'section'   => 'custom_homepage_settings',
			'type'      => 'number',
			'css_var'   => '--sm-gut-bord-radius',
			'sanitize'  => 'sanitize_text_field',
			'transport' => 'refresh',
		],
	];
	return apply_filters('saintsmedia_customizer_fields', $fields);
}

/**
 * Регистрация всех полей из единой конфигурации.
 */
function saintsmedia_customize_register_unified(WP_Customize_Manager $wp_customize)
{
	// Новая секция для дополнительных настроек главной страницы (регистрируем заранее)
	if (!$wp_customize->get_section('custom_homepage_settings')) {
		$wp_customize->add_section('custom_homepage_settings', [
			'title'       => __('Дополнительные настройки страниц | текста, логика', 'saintsmedia'),
			'description' => __('Здесь можно включить дополнительные параметры.', 'saintsmedia'),
			'priority'    => 30,
		]);
	}

	// Сохраняем postMessage для базовых полей темы underscores
	foreach (['blogname', 'blogdescription', 'header_textcolor'] as $core_id) {
		$setting = $wp_customize->get_setting($core_id);
		if ($setting) {
			$setting->transport = 'postMessage';
		}
	}

	// Selective refresh для стандартных (оставляем как было)
	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial('blogname', [
			'selector'        => '.site-title a',
			'render_callback' => 'bloginfo',
			'container_inclusive' => false,
			'args'            => ['name'],
		]);
		$wp_customize->selective_refresh->add_partial('blogdescription', [
			'selector'        => '.site-description',
			'render_callback' => 'bloginfo',
			'args'            => ['description'],
		]);
	}

	foreach (saintsmedia_get_customizer_fields() as $field) {
		$args = [
			'default'           => $field['default'] ?? '',
			'transport'         => $field['transport'] ?? 'refresh',
			'sanitize_callback' => $field['sanitize'] ?? null,
		];
		$wp_customize->add_setting($field['id'], $args);

		// Контрол
		switch ($field['type']) {
			case 'color':
				$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $field['id'], [
					'label'   => $field['label'],
					'section' => $field['section'],
				]));
				break;
			case 'checkbox':
				$wp_customize->add_control($field['id'], [
					'label'   => $field['label'],
					'section' => $field['section'],
					'type'    => 'checkbox',
				]);
				break;
			case 'text':
				$wp_customize->add_control($field['id'], [
					'label'   => $field['label'],
					'section' => $field['section'],
					'type'    => 'text',
				]);
				break;
			case 'url':
				$wp_customize->add_control($field['id'], [
					'label'   => $field['label'],
					'section' => $field['section'],
					'type'    => 'url',
				]);
				break;
			case 'select':
				$wp_customize->add_control($field['id'], [
					'label'   => $field['label'],
					'section' => $field['section'],
					'type'    => 'select',
					'choices' => $field['choices'] ?? [],
				]);
				break;
			// При необходимости: text, select, etc.
			default:
				$wp_customize->add_control($field['id'], [
					'label'   => $field['label'],
					'section' => $field['section'],
					'type'    => $field['type'],
				]);
		}
	}
}
add_action('customize_register', 'saintsmedia_customize_register_unified');

/**
 * Генерация CSS-переменных из настроек.
 */
function saintsmedia_customizer_output_css()
{
	$fields = saintsmedia_get_customizer_fields();
	$vars = [];
	foreach ($fields as $field) {
		if (!empty($field['css_var'])) {
			$value = get_theme_mod($field['id'], $field['default']);
			if ($value !== '') {
				$vars[] = $field['css_var'] . ':' . $value;
			}
		}
	}

	// Выбранный файл шрифта или system
	$font_file = get_theme_mod('saintsmedia_font_file', 'system');
	$faces_css = '';
	if ($font_file === 'system' || $font_file === '') {
		// Системный стек (без внешних кавычек вокруг всего списка)
		$vars[] = '--sm-font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';
	} else {
		$family = saintsmedia_pretty_family_label_from_filename($font_file);
		if ($family !== '') {
			$family_quoted = '"' . str_replace('"', '\"', $family) . '"';
			$vars[] = '--sm-font-family:' . $family_quoted;
		}
		$faces_css = saintsmedia_generate_font_face_css_from_file($font_file);
	}

	$css_parts = [];
	if ($vars) {
		$css_parts[] = ':root{' . implode(';', $vars) . ';}';
	}
	if (!empty($faces_css)) {
		$css_parts[] = $faces_css;
	}
	if (!empty($css_parts)) {
		$css = implode("", $css_parts);
		wp_add_inline_style('saintsmedia-style', $css);
	}
}
add_action('wp_enqueue_scripts', 'saintsmedia_customizer_output_css', 20);

/**
 * Скрипт live preview + передача конфигурации.
 */
function saintsmedia_customize_preview_assets()
{
	wp_enqueue_script('saintsmedia-customizer', get_template_directory_uri() . '/js/customizer.js', ['customize-preview', 'jquery'], _S_VERSION, true);
	$export = [];
	foreach (saintsmedia_get_customizer_fields() as $field) {
		$export[] = [
			'id'      => $field['id'],
			'css_var' => $field['css_var'] ?? '',
		];
	}
	wp_add_inline_script('saintsmedia-customizer', 'window.saintsmediaCustomizerFields=' . wp_json_encode($export) . ';', 'before');
}
add_action('customize_preview_init', 'saintsmedia_customize_preview_assets');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function saintsmedia_customize_preview_js()
{
	wp_enqueue_script('saintsmedia-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview', 'jquery'), _S_VERSION, true);
}
add_action('customize_preview_init', 'saintsmedia_customize_preview_js');


/**
 * ===== Fonts helpers =====
 * Папка по умолчанию: /assets/fonts внутри активной темы (можно переопределить фильтрами).
 */
function saintsmedia_get_fonts_dir(): string
{
	$dir = get_stylesheet_directory() . '/assets/fonts';
	return apply_filters('saintsmedia_fonts_dir', $dir);
}

function saintsmedia_get_fonts_url(): string
{
	$url = get_stylesheet_directory_uri() . '/assets/fonts';
	return apply_filters('saintsmedia_fonts_url', $url);
}

/**
 * Сканирует папку шрифтов и возвращает список семейств вида ['Inter' => 'Inter'].
 * Предпочитает имена подпапок как название семейства; при их отсутствии пробует вывести семейство из имён файлов.
 */
function saintsmedia_scan_font_families(): array
{
	$dir = saintsmedia_get_fonts_dir();
	$families = [];

	if (is_dir($dir) && is_readable($dir)) {
		$allowed = ['woff2', 'woff', 'ttf', 'otf'];

		// 1) Сканируем ТОЛЬКО корень папки (файлы шрифтов в assets/fonts)
		$it = new DirectoryIterator($dir);
		foreach ($it as $fi) {
			if ($fi->isDot() || !$fi->isFile()) continue;
			$ext = strtolower(pathinfo($fi->getFilename(), PATHINFO_EXTENSION));
			if (!in_array($ext, $allowed, true)) continue;

			// Выводим читаемое имя семейства из имени файла
			$base = pathinfo($fi->getFilename(), PATHINFO_FILENAME);
			$label = str_replace(['_', '-'], ' ', $base);
			$tokens = '(regular|italic|ital|oblique|variable|wght|opsz|wdth|condensed|cond|extended|ext|compressed|comp|mono|display|text|caption|black|extra black|heavy|extra bold|semibold|demi bold|bold|medium|book|light|extra light|ultra light|thin|hairline|[1-9]00)';
			$label = preg_replace('/\b' . $tokens . '\b/iu', '', $label);
			$label = trim(preg_replace('/\s{2,}/', ' ', $label));
			$family = ucwords(strtolower($label));
			if ($family !== '') {
				$families[$family] = $family;
			}
		}

		// 2) (Опционально) Если корень пуст и включён фильтр — берём подпапки как семейства
		if (empty($families) && apply_filters('saintsmedia_fonts_scan_subdirs', false)) {
			$it2 = new DirectoryIterator($dir);
			foreach ($it2 as $fi) {
				if ($fi->isDot()) continue;
				if ($fi->isDir()) {
					$family = trim($fi->getFilename());
					if ($family !== '') {
						$families[$family] = $family;
					}
				}
			}
		}
	}

	if (!empty($families)) {
		natcasesort($families);
		$families = array_combine(array_values($families), array_values($families));
	}

	return apply_filters('saintsmedia_font_family_choices', $families);
}


/**
 * Возвращает список файлов шрифтов из корня папки assets/fonts.
 * Ключ и значение — полное имя файла (с расширением), чтобы в select показывать именно файл.
 */
function saintsmedia_scan_font_files(): array
{
	$dir = saintsmedia_get_fonts_dir();
	$out = [];
	if (is_dir($dir) && is_readable($dir)) {
		$allowed = ['woff2', 'woff', 'ttf', 'otf'];
		$it = new DirectoryIterator($dir);
		foreach ($it as $fi) {
			if ($fi->isDot() || !$fi->isFile()) continue;
			$ext = strtolower(pathinfo($fi->getFilename(), PATHINFO_EXTENSION));
			if (!in_array($ext, $allowed, true)) continue;
			$fn = $fi->getFilename();
			$out[$fn] = $fn;
		}
	}
	if (!empty($out)) {
		natcasesort($out);
		$out = array_combine(array_values($out), array_values($out));
	}
	return $out;
}

/**
 * Получает читаемое имя семейства из имени файла.
 * Правило: берём часть имени до первой «-», подчёркивания остаются как разделитель.
 */
function saintsmedia_pretty_family_label_from_filename(string $filename): string
{
	$base = pathinfo($filename, PATHINFO_FILENAME);
	$dashPos = strpos($base, '-');
	if ($dashPos !== false) {
		$base = substr($base, 0, $dashPos);
	}
	$base = str_replace(array('_', '-'), ' ', $base);
	while (strpos($base, '  ') !== false) {
		$base = str_replace('  ', ' ', $base);
	}
	$base = trim($base);
	return ucwords($base);
}

/**
 * Определение веса шрифта по имени файла.
 */
function saintsmedia_map_weight_from_string(string $s): int
{
	$s = strtolower($s);
	for ($w = 100; $w <= 900; $w += 100) {
		if (strpos($s, (string)$w) !== false) return $w;
	}
	$map = array(
		'thin' => 100,
		'hairline' => 100,
		'extra light' => 200,
		'ultra light' => 200,
		'extralight' => 200,
		'ultralight' => 200,
		'light' => 300,
		'book' => 400,
		'normal' => 400,
		'regular' => 400,
		'medium' => 500,
		'semibold' => 600,
		'semi bold' => 600,
		'demibold' => 600,
		'demi bold' => 600,
		'bold' => 700,
		'extra bold' => 800,
		'extrabold' => 800,
		'ultra bold' => 800,
		'ultrabold' => 800,
		'heavy' => 800,
		'black' => 900,
		'extra black' => 900,
		'ultra black' => 900
	);
	foreach ($map as $k => $v) {
		if (strpos($s, $k) !== false) return $v;
	}
	return 400;
}

/**
 * Определение стиля по имени файла.
 */
function saintsmedia_map_style_from_string(string $s): string
{
	$s = strtolower($s);
	if (strpos($s, 'italic') !== false || strpos($s, 'ital') !== false) return 'italic';
	if (strpos($s, 'oblique') !== false) return 'oblique';
	return 'normal';
}

/**
 * Генерация @font-face для одного выбранного файла из корня assets/fonts.
 */
function saintsmedia_generate_font_face_css_from_file(string $filename): string
{
	$dir = saintsmedia_get_fonts_dir();
	// Убираем завершающие слэши (и прямой, и обратный)
	$path = rtrim($dir, "/\\") . DIRECTORY_SEPARATOR . $filename;
	if (!is_file($path) || !is_readable($path)) return '';

	$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
	$format = ($ext === 'ttf') ? 'truetype' : (($ext === 'otf') ? 'opentype' : $ext);
	$family = saintsmedia_pretty_family_label_from_filename($filename);
	$weight = saintsmedia_map_weight_from_string($filename);
	$style  = saintsmedia_map_style_from_string($filename);

	$url = rtrim(saintsmedia_get_fonts_url(), '/');
	$src = $url . '/' . rawurlencode($filename);

	$styleVal = ($style === 'oblique') ? 'oblique' : (($style === 'italic') ? 'italic' : 'normal');
	$css = "@font-face{font-family:'" . str_replace("'", "\'", $family) . "';font-style:" . $styleVal . ";font-weight:" . $weight . ";font-display:swap;src:url('" . $src . "') format('" . $format . "');}";
	return $css;
}
