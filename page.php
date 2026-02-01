<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saintsmedia
 */

?>

<?php get_header(); ?>

<div class="spacer-on-top"></div>

<?php if (function_exists('saintsmedia_breadcrumbs')) {
	saintsmedia_breadcrumbs();
} ?>

<div id="primary" class="content-area" style="width:100%; margin:0 auto;">
	<main id="main" class="site-main">
		<?php
		while (have_posts()) :
			the_post();
			the_content();
		endwhile;
		?>
	</main>
</div>

<?php get_footer(); ?>

<script>
	// Обновляем высоту верхнего отступа под фиксированную шапку
	(function() {
		const header = document.querySelector('.saintsmedia-theme-header');
		const spacer = document.querySelector('.spacer-on-top');

		function updateSpacer() {
			if (header && spacer) {
				spacer.style.height = Math.max(0, header.clientHeight - 2) + 'px';
			}
		}

		window.addEventListener('DOMContentLoaded', updateSpacer);
		window.addEventListener('resize', updateSpacer);
	})();
</script>
