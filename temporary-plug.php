<?php

/**
 * Template Name: Временная заглушка
 * Description: Кастомный шаблон страницы-заглушки.
 */

defined('ABSPATH') || exit;

get_header();
?>

<?php
if (is_page('home-page')) : ?>
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

<main id="primary" class="site-main plug-page">
    <?php
    if (have_posts()):
        while (have_posts()): the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('plug-page-article'); ?>>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php
        endwhile;
    else: ?>
        <div class="no-content">
            <?php esc_html_e('Nothing found.', 'saintsmedia-theme'); ?>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
