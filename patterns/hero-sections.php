<?php

/**
 * Title: Hero section
 * Slug: mytheme/hero-section
 * Categories: mytheme, featured
 * Description: Широкий hero-блок с заголовком, описанием и кнопкой.
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","justifyContent":"center","contentSize":"100%"}} -->
<div class="wp-block-group" style="padding-top:0;padding-bottom:0"><!-- wp:cover {"url":"<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/hero.jpg","dimRatio":60,"focalPoint":{"x":0.5,"y":0.5},"minHeight":90,"minHeightUnit":"vh","contentPosition":"center center","align":"center","style":{"color":{"duotone":"var:preset|duotone|dark-grayscale"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
    <div class="wp-block-cover aligncenter" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:90vh"><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/hero.jpg" style="object-position:50% 50%" data-object-fit="cover" data-object-position="50% 50%" /><span aria-hidden="true" class="wp-block-cover__background has-background-dim-60 has-background-dim"></span>
        <div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"80%"}} -->
            <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1,"fontSize":"large"} -->
                <h1 class="wp-block-heading has-text-align-center has-large-font-size"><?php echo esc_html__('Razor Shark Slot online spielen', 'mytheme'); ?></h1>
                <!-- /wp:heading -->

                <!-- wp:heading {"textAlign":"center","fontSize":"medium"} -->
                <h2 class="wp-block-heading has-text-align-center has-medium-font-size"><?php echo esc_html__('Der Razor Shark Slot ist ein Online-Casino-Spiel von Push Gaming. Es spielt in der Unterwasserwelt. Das Spiel hat fünf Walzen, vier Reihen und zwanzig Gewinnlinien. Diese bieten eine lebendige Szenerie unter dem Meer.', 'mytheme'); ?></h2>
                <!-- /wp:heading -->
            </div>
            <!-- /wp:group -->

            <!-- wp:spacer {"height":"25px"} -->
            <div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer -->

            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"nowrap","orientation":"horizontal"}} -->
            <div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"luminous-vivid-amber","textColor":"black","className":"is-style-outline","style":{"border":{"radius":"8px"},"spacing":{"padding":{"left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"fontSize":"medium"} -->
                <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-black-color has-luminous-vivid-amber-background-color has-text-color has-background has-link-color has-medium-font-size has-custom-font-size wp-element-button" style="border-radius:8px;padding-right:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><?php echo esc_html__('Gehe zur Webseite', 'mytheme'); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->

            <!-- wp:spacer {"height":"20vh"} -->
            <div style="height:20vh" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->


<!-- 
    --------------------------------------------------
    functions.php — категория для паттернов (добавить один раз)
    --------------------------------------------------
    add_action('init', function () {
        register_block_pattern_category('mytheme', [
        'label' => __('MyTheme', 'mytheme'),
        ]);
    }); 
-->