<?php

/**
 * Multilingual Menu Customizer Settings
 *
 * Compact repeater fields for languages (admin never touches JSON)
 *
 * @package saintsmedia
 */

/**
 * Register Customizer section and control
 */
add_action( 'customize_register', function( $wp_customize ) {
	if ( ! class_exists( 'WP_Customize_Control' ) ) {
		return;
	}

	if ( ! class_exists( 'Saintsmedia_Languages_Repeater_Control' ) ) {
		/**
		 * Custom control for languages repeater
		 */
		class Saintsmedia_Languages_Repeater_Control extends WP_Customize_Control {
			public $type = 'saintsmedia-languages';

			public function render_content() {
				$languages = saintsmedia_get_languages_from_mod();
				if ( empty( $languages ) ) {
					$languages = array(
						array( 'code' => '', 'name' => '' ),
					);
				}

				?>
				<label>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				</label>

				<div class="sml-languages-control">
					<div class="sml-languages-list">
						<?php foreach ( $languages as $lang ) : ?>
							<?php
							// Отображаем пустой код как "/" для пользователя
							$display_code = ( isset( $lang['code'] ) && $lang['code'] === '' ) ? '/' : ( $lang['code'] ?? '' );
							?>
							<div class="sml-language-item">
								<div class="sml-field">
							<label><?php esc_html_e( 'Код или название стр.', 'saintsmedia' ); ?></label>
								<input type="text" class="sml-lang-code" value="<?php echo esc_attr( $display_code ); ?>" placeholder="en" />
								</div>
								<div class="sml-field">
									<label><?php esc_html_e( 'Название', 'saintsmedia' ); ?></label>
									<input type="text" class="sml-lang-name" value="<?php echo esc_attr( $lang['name'] ?? '' ); ?>" placeholder="English" />
								</div>
								<button type="button" class="button-link sml-remove" aria-label="<?php esc_attr_e( 'Удалить язык', 'saintsmedia' ); ?>">✕</button>
							</div>
						<?php endforeach; ?>
					</div>

					<button type="button" class="button sml-add">+ <?php esc_html_e( 'Добавить язык', 'saintsmedia' ); ?></button>
				</div>

				<input type="hidden" class="sml-languages-json" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" />
				<?php
			}
		}
	}
	$wp_customize->add_section( 'saintsmedia_multilingual', array(
		'title'       => __( 'Языки меню + UX мобильного', 'saintsmedia' ),
		'description' => __( 'Настройки языков и отображения меню', 'saintsmedia' ),
		'priority'    => 35,
	) );

	$wp_customize->add_setting( 'saintsmedia_languages', array(
		'default'           => '',
		'type'              => 'theme_mod',
		'sanitize_callback' => 'saintsmedia_sanitize_languages_json',
		'transport'         => 'refresh',
	) );

	$wp_customize->add_control( new Saintsmedia_Languages_Repeater_Control( $wp_customize, 'saintsmedia_languages', array(
		'label'   => __( 'Языки', 'saintsmedia' ),
		'section' => 'saintsmedia_multilingual',
	) ) );

	// Mobile Menu UX Settings
	$wp_customize->add_setting( 'saintsmedia_mobile_menu_layout', array(
		'default'           => 'list',
		'type'              => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );

	$wp_customize->add_control( 'saintsmedia_mobile_menu_layout', array(
		'label'       => __( 'Режим отображения мобильного меню', 'saintsmedia' ),
		'description' => __( 'Выберите как отображать меню на мобильных устройствах', 'saintsmedia' ),
		'section'     => 'saintsmedia_multilingual',
		'type'        => 'select',
		'choices'     => array(
			'list' => __( 'Список (вертикально)', 'saintsmedia' ),
			'grid' => __( 'Сетка', 'saintsmedia' ),
		),
	) );


} );

/**
 * Get languages from theme_mod
 */
function saintsmedia_get_languages_from_mod() {
	$languages_json = get_theme_mod( 'saintsmedia_languages', '' );
	if ( empty( $languages_json ) ) {
		return array();
	}

	$decoded = json_decode( $languages_json, true );
	return is_array( $decoded ) ? $decoded : array();
}

/**
 * Sanitize languages JSON
 */
function saintsmedia_sanitize_languages_json( $value ) {
	if ( empty( $value ) ) {
		return '';
	}

	$decoded = json_decode( $value, true );
	if ( ! is_array( $decoded ) ) {
		return '';
	}

	$sanitized = array();
	$seen      = array();

	foreach ( $decoded as $lang ) {
		if ( ! is_array( $lang ) ) {
			continue;
		}

		$code = isset( $lang['code'] ) ? sanitize_text_field( $lang['code'] ) : '';
		$name = isset( $lang['name'] ) ? sanitize_text_field( $lang['name'] ) : '';
		$code = strtolower( $code );

		if ( $code === '/' || $code === './' || $code === '.' ) {
			$code = '';
		}

		if ( empty( $name ) ) {
			continue;
		}

		$seen_key = $code === '' ? '__default__' : $code;
		if ( isset( $seen[ $seen_key ] ) ) {
			continue;
		}

		$seen[ $seen_key ] = true;
		$sanitized[]   = array(
			'code' => $code,
			'name' => $name,
		);
	}

	if ( empty( $sanitized ) ) {
		return '';
	}

	return wp_json_encode( $sanitized );
}

/**
 * Enqueue Customizer assets
 */
add_action( 'customize_controls_enqueue_scripts', function() {
	wp_enqueue_script(
		'saintsmedia-customizer-languages',
		get_template_directory_uri() . '/js/customizer-languages.js',
		array( 'customize-controls', 'jquery' ),
		filemtime( get_template_directory() . '/js/customizer-languages.js' ),
		true
	);

	wp_enqueue_style(
		'saintsmedia-customizer-languages',
		get_template_directory_uri() . '/assets/css/customizer-languages.css',
		array(),
		filemtime( get_template_directory() . '/assets/css/customizer-languages.css' )
	);
} );

/**
 * Clear menu locations cache on save
 */
add_action( 'customize_save_after', function() {
	delete_transient( 'saintsmedia_menu_locations' );
} );
