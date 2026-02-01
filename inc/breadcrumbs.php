<?php

/**
 * Breadcrumbs component
 */

if (!function_exists('saintsmedia_breadcrumbs')) {
    function saintsmedia_breadcrumbs()
    {
        if (is_front_page()) {
            return;
        }

        $home_url = home_url('/');
        $position = 1;

        echo '<nav class="breadcrumbs" aria-label="Хлебные крошки" itemscope itemtype="https://schema.org/BreadcrumbList">';
        echo '<ul class="breadcrumbs__list">';



        // Home
        echo '<li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">'
            . '<a class="breadcrumbs__link" itemprop="item" href="' . esc_url($home_url) . '"><span itemprop="name">' . $front_page_title = get_the_title(get_option('page_on_front')) . '</span></a>'
            . '<meta itemprop="position" content="' . intval($position) . '" />'
            . '</li>';
        $position++;

        // Blog home
        if (is_home()) {
            $posts_page_id = get_option('page_for_posts');
            if ($posts_page_id) {
                echo '<li class="breadcrumbs__item breadcrumbs__item--current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">'
                    . '<span class="breadcrumbs__current" itemprop="name">' . esc_html(get_the_title($posts_page_id)) . '</span>'
                    . '<meta itemprop="position" content="' . intval($position) . '" />'
                    . '</li>';
            }
            echo '</ul></nav>';
            return;
        }

        // Category archive
        if (is_category()) {
            $cat = get_queried_object();
            $anc = array_reverse(get_ancestors($cat->term_id, 'category'));
            foreach ($anc as $cat_id) {
                $term = get_category($cat_id);
                echo '<li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">'
                    . '<a class="breadcrumbs__link" itemprop="item" href="' . esc_url(get_category_link($term)) . '"><span itemprop="name">' . esc_html($term->name) . '</span></a>'
                    . '<meta itemprop="position" content="' . intval($position) . '" />'
                    . '</li>';
                $position++;
            }
            echo '<li class="breadcrumbs__item breadcrumbs__item--current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">'
                . '<span class="breadcrumbs__current" itemprop="name">' . single_cat_title('', false) . '</span>'
                . '<meta itemprop="position" content="' . intval($position) . '" />'
                . '</li>';
            echo '</ul></nav>';
            return;
        }

        // Single
        if (is_single()) {
            if (get_post_type() === 'post') {
                // Posts page
                $posts_page_id = get_option('page_for_posts');
                if ($posts_page_id) {
                    echo '<li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">'
                        . '<a class="breadcrumbs__link" itemprop="item" href="' . esc_url(get_permalink($posts_page_id)) . '"><span itemprop="name">' . esc_html(get_the_title($posts_page_id)) . '</span></a>'
                        . '<meta itemprop="position" content="' . intval($position) . '" />'
                        . '</li>';
                    $position++;
                }
                // Categories
                $cats = get_the_category();
                if (!empty($cats)) {
                    $primary = $cats[0];
                    $anc = array_reverse(get_ancestors($primary->term_id, 'category'));
                    foreach ($anc as $cat_id) {
                        $term = get_category($cat_id);
                        echo '<li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">'
                            . '<a class="breadcrumbs__link" itemprop="item" href="' . esc_url(get_category_link($term)) . '"><span itemprop="name">' . esc_html($term->name) . '</span></a>'
                            . '<meta itemprop="position" content="' . intval($position) . '" />'
                            . '</li>';
                        $position++;
                    }
                    echo '<li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">'
                        . '<a class="breadcrumbs__link" itemprop="item" href="' . esc_url(get_category_link($primary)) . '"><span itemprop="name">' . esc_html($primary->name) . '</span></a>'
                        . '<meta itemprop="position" content="' . intval($position) . '" />'
                        . '</li>';
                    $position++;
                }
            } else {
                // CPT
                $pt = get_post_type_object(get_post_type());
                if ($pt && !empty($pt->has_archive)) {
                    echo '<li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">'
                        . '<a class="breadcrumbs__link" itemprop="item" href="' . esc_url(get_post_type_archive_link($pt->name)) . '"><span itemprop="name">' . esc_html($pt->labels->name) . '</span></a>'
                        . '<meta itemprop="position" content="' . intval($position) . '" />'
                        . '</li>';
                    $position++;
                }
            }
            // Current
            echo '<li class="breadcrumbs__item breadcrumbs__item--current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">'
                . '<span class="breadcrumbs__current" itemprop="name">' . esc_html(get_the_title()) . '</span>'
                . '<meta itemprop="position" content="' . intval($position) . '" />'
                . '</li>';
            echo '</ul></nav>';
            return;
        }

        // Page hierarchy
        if (is_page()) {
            $anc = get_post_ancestors(get_queried_object_id());
            if (!empty($anc)) {
                $anc = array_reverse($anc);
                foreach ($anc as $ancestor_id) {
                    echo '<li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">'
                        . '<a class="breadcrumbs__link" itemprop="item" href="' . esc_url(get_permalink($ancestor_id)) . '"><span itemprop="name">' . esc_html(get_the_title($ancestor_id)) . '</span></a>'
                        . '<meta itemprop="position" content="' . intval($position) . '" />'
                        . '</li>';
                    $position++;
                }
            }
            echo '<li class="breadcrumbs__item breadcrumbs__item--current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">'
                . '<span class="breadcrumbs__current" itemprop="name">' . esc_html(get_the_title()) . '</span>'
                . '<meta itemprop="position" content="' . intval($position) . '" />'
                . '</li>';
            echo '</ul></nav>';
            return;
        }

        // Other contexts
        if (is_search()) {
            echo '<li class="breadcrumbs__item breadcrumbs__item--current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">'
                . '<span class="breadcrumbs__current" itemprop="name">' . sprintf(esc_html__('Результаты поиска: %s', 'saintsmedia'), esc_html(get_search_query())) . '</span>'
                . '<meta itemprop="position" content="' . intval($position) . '" />'
                . '</li>';
        } elseif (is_tag()) {
            echo '<li class="breadcrumbs__item breadcrumbs__item--current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">'
                . '<span class="breadcrumbs__current" itemprop="name">' . sprintf(esc_html__('Метка: %s', 'saintsmedia'), single_tag_title('', false)) . '</span>'
                . '<meta itemprop="position" content="' . intval($position) . '" />'
                . '</li>';
        } elseif (is_author()) {
            $author = get_queried_object();
            echo '<li class="breadcrumbs__item breadcrumbs__item--current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">'
                . '<span class="breadcrumbs__current" itemprop="name">' . sprintf(esc_html__('Автор: %s', 'saintsmedia'), esc_html($author->display_name)) . '</span>'
                . '<meta itemprop="position" content="' . intval($position) . '" />'
                . '</li>';
        } elseif (is_year() || is_month() || is_day()) {
            $label = get_the_date(is_day() ? _x('j F Y', 'breadcrumbs date', 'saintsmedia') : (is_month() ? _x('F Y', 'breadcrumbs date', 'saintsmedia') : _x('Y', 'breadcrumbs date', 'saintsmedia')));
            echo '<li class="breadcrumbs__item breadcrumbs__item--current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">'
                . '<span class="breadcrumbs__current" itemprop="name">' . esc_html($label) . '</span>'
                . '<meta itemprop="position" content="' . intval($position) . '" />'
                . '</li>';
        } elseif (is_404()) {
            echo '<li class="breadcrumbs__item breadcrumbs__item--current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">'
                . '<span class="breadcrumbs__current" itemprop="name">' . esc_html__('Ошибка 404', 'saintsmedia') . '</span>'
                . '<meta itemprop="position" content="' . intval($position) . '" />'
                . '</li>';
        }

        echo '</ul></nav>';
    }
}
