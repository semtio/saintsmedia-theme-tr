<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package saintsmedia
 */

get_header();
?>

<?php
if (is_404()) : ?>
	<style>
		.saintsmedia-theme-header {
			display: none !important;
		}

		.site-title-fallback {
			display: flex;
			justify-content: center;
		}

		.site-custom-logo-plug img {
			margin: 20px 0;
			width: 250px;
		}

		.site-title-fallback a {
			margin: 20px 0;
		}

		.site-custom-logo-plug {
			display: flex;
			justify-content: center;
		}
	</style>
<?php endif; ?>

<?php
if (function_exists('the_custom_logo') && has_custom_logo()) {
	echo '<div class="site-custom-logo-plug">';
	the_custom_logo();
	echo '</div>';
} else {
	echo '<div class="site-title-fallback"><a href="' . esc_url(home_url('/')) . '">' . esc_html(get_bloginfo('name')) . '</a></div>';
}
?>

<style>
	.main {
		margin-top: 5%;

		display: flex;
		align-items: center;
		flex-direction: column;
	}

	h1 {
		font-size: 8rem;
		line-height: 1;
	}

	h1,
	h2 {
		margin: 0;
	}

	a {
		text-decoration: none;
		color: inherit;

		margin-top: 12px;
	}

	a:hover {
		transition: .3s;
		opacity: .8;

		text-shadow: -1px 1px 0 #000;
	}

	a:visited {
		color: inherit;
		text-decoration: none;
	}

	a:focus,
	a:active {
		outline: none;
	}
</style>

<div class="spacer-on-top"></div>
<div class="main">
	<h1>404</h1>
	<h2>NOT FOUND</h2>
	<a href="/">BACK TO HOME</a>
</div>

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

<?php
get_footer();
