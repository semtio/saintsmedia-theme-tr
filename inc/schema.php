<?php

/**
 * Schema.org JSON-LD output
 */

add_action('wp_head', function () {
    $site_name = get_bloginfo('name');
    $site_desc = get_bloginfo('description');
    $site_url  = home_url('/');

    // Logo
    $logo_url = null;
    if (function_exists('has_custom_logo') && has_custom_logo()) {
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo_src = wp_get_attachment_image_src($custom_logo_id, 'full');
        if (!empty($logo_src[0])) {
            $logo_url = $logo_src[0];
        }
    }

    $graph = [];

    // Organization
    $org = [
        '@type' => 'Organization',
        'name'  => $site_name,
        'url'   => $site_url,
    ];
    if ($logo_url) {
        $org['logo'] = [
            '@type' => 'ImageObject',
            'url'   => $logo_url,
        ];
    }
    $graph[] = $org;

    // WebSite + SearchAction
    $website = [
        '@type' => 'WebSite',
        'name'  => $site_name,
        'url'   => $site_url,
        'potentialAction' => [
            '@type'       => 'SearchAction',
            'target'      => $site_url . '?s={search_term_string}',
            'query-input' => 'required name=search_term_string',
        ],
    ];
    if (!empty($site_desc)) {
        $website['description'] = $site_desc;
    }
    $graph[] = $website;

    // Article for posts
    if (is_single() && get_post_type() === 'post') {
        $post_id   = get_the_ID();
        $head      = get_the_title($post_id);
        $permalink = get_permalink($post_id);
        $date_p    = get_the_date('c', $post_id);
        $date_m    = get_the_modified_date('c', $post_id);

        $article = [
            '@type'            => 'Article',
            'headline'         => $head,
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id'   => $permalink,
            ],
            'datePublished'    => $date_p,
            'dateModified'     => $date_m,
            'publisher'        => [
                '@type' => 'Organization',
                'name'  => $site_name,
            ],
        ];
        if ($logo_url) {
            $article['publisher']['logo'] = [
                '@type' => 'ImageObject',
                'url'   => $logo_url,
            ];
        }
        $author_id = get_post_field('post_author', $post_id);
        if ($author_id) {
            $author_name = get_the_author_meta('display_name', $author_id);
            if ($author_name) {
                $article['author'] = [
                    '@type' => 'Person',
                    'name'  => $author_name,
                ];
            }
        }
        if (has_post_thumbnail($post_id)) {
            $img = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'full');
            if (!empty($img[0])) {
                $article['image'] = [$img[0]];
            }
        }
        $graph[] = $article;
    }

    if (!empty($graph)) {
        $payload = [
            '@context' => 'https://schema.org',
            '@graph'   => $graph,
        ];
        echo "\n<script type=\"application/ld+json\">" . wp_json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "</script>\n";
    }
}, 5);
