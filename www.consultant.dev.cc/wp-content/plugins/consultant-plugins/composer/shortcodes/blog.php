<?php
/*
** consultant Blog Shortcode
** Version: 1.0.0 
*/

vc_map(array(
    'name' => esc_html__('Blog', 'js_composer'),
    'base' => 'consultant_blog',
    'content_element' => true,
    'show_settings_on_create' => true,
    'category' => esc_html__('From consultant', 'js_composer'),
    'description' => esc_html__('Output Posts from Blog', 'js_composer'),
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'js_composer'),
            'param_name' => 'style_page',
            'value' => array(
                esc_html__('Default', 'js_composer') => '',
                esc_html__('Classic', 'js_composer') => 'consultantpro',
            ),
        ),
        array(
            'type' => 'vc_efa_chosen',
            'heading' => esc_html__('Categories', 'js_composer'),
            'param_name' => 'cats',
            'placeholder' => 'Choose category (optional)',
            'value' => consultant_categories('blog'),
            'std' => '',
            'description' => esc_html__('You can choose spesific categories for blog, default is all categories', 'js_composer'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Columns', 'js_composer'),
            'param_name' => 'width',
            'value' => array(
                esc_html__('full width', 'js_composer') => '1',
                esc_html__('2 columns - 1/6', 'js_composer') => '1/6',
                esc_html__('3 columns - 1/4', 'js_composer') => '1/4',
                esc_html__('4 columns - 1/3', 'js_composer') => '1/3',
            ),
            'description' => esc_html__('Select column width.', 'js_composer'),
        ),
        array(
            'type' => 'textfield',
            'heading' => 'Limit',
            'param_name' => 'limit',
            'admin_label' => true,
            'value' => '',
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Animation on scroll', 'js_composer'),
            'param_name' => 'animation_scroll',
            'group' => 'Animation',
            'value' => array(
                esc_html__('Fade up', 'js_composer') => 'fade-up',
                esc_html__('Flip left', 'js_composer') => 'flip-left',
                esc_html__('Fade zoom in', 'js_composer') => 'fade-zoom-in',
                esc_html__('Fade left', 'js_composer') => 'fade-left',
                esc_html__('Fade right', 'js_composer') => 'fade-right',
                esc_html__('Fade down', 'js_composer') => 'fade-down',
                esc_html__('Fade down left', 'js_composer') => 'fade-down-left',
                esc_html__('Zoom out left', 'js_composer') => 'zoom-out-left',
                esc_html__('Zoom out right', 'js_composer') => 'zoom-out-right',
                esc_html__('Zoom out right', 'js_composer') => 'zoom-out-down',
                esc_html__('Zoom out up', 'js_composer') => 'zoom-out-up',
                esc_html__('Zoom in left', 'js_composer') => 'zoom-in-left',
                esc_html__('Zoom in down', 'js_composer') => 'zoom-in-down',
                esc_html__('Zoom in', 'js_composer') => 'zoom-in',
                esc_html__('No animation', 'js_composer') => 'disable',
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Duration animation', 'js_composer'),
            'param_name' => 'duration_animation',
            'group' => 'Animation',
            'value' => array(
                esc_html__('1000', 'js_composer') => '1000',
                esc_html__('2000', 'js_composer') => '2000',
                esc_html__('3000', 'js_composer') => '3000',
            ),
            'dependency' => array('element' => 'animation_scroll', 'value_not_equal_to' => 'disable'),
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('CSS box', 'js_composer'),
            'param_name' => 'css',
            'group' => esc_html__('Design options', 'js_composer'),
        ),
    ) //end params
));

class WPBakeryShortCode_consultant_blog extends WPBakeryShortCode{
    protected function content($atts, $content = null){

        extract(shortcode_atts(array(
            'el_class' => '',
            'style_page' => '',
            'width' => '1',
            'cats' => '',
            'limit' => '8',
            'animation_scroll' => 'fade-up',
            'duration_animation' => '1000',
            'css' => ''
        ), $atts));

        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $this->settings['base'], $atts);

        // custum css
        $css_class .= vc_shortcode_custom_css_class($css, ' ');

        // custum class
        $css_class .= ' ' . $el_class;

        $paged = (get_query_var('paged') > 1) ? get_query_var('paged') : 1;

        $width_class = array(
            '1' => ' col-xs-12',
            '1/6' => ' col-sm-6 col-xs-12 no-padding-xs',
            '1/4' => ' col-md-4 col-sm-6 col-xs-12  col-md-4 col-sm-6 col-xs-12 no-padding-xs',
            '1/3' => ' col-md-3 col-sm-6 col-xs-12 no-padding-xs'
        );

        // output
        ob_start(); ?>
        <div class="<?php echo esc_attr($css_class); ?>">
            <?php
            $query_blog = new WP_Query(
                array(
                    'post_type' => 'post',
                    'cat' => trim($cats, ' / '),
                    'paged' => $paged,
                    'posts_per_page' => $limit,
                    'category_name' => $cats,
                )
            );

            if ($query_blog->have_posts()) { ?>
            <div class="lx-blog" data-aos="<?php echo esc_attr($animation_scroll); ?>"
                 data-aos-duration="<?php echo esc_attr($duration_animation); ?>">
                <?php while ($query_blog->have_posts()) : $query_blog->the_post();
                    global $post;
                    setup_postdata($post);
                    $classes_post = '';
                    ?>
                    <div <?php post_class($classes_post); ?>>
                        <?php
                        if (is_sticky()) { ?>
                            <i title="<?php esc_html_e('Sticky Post', 'consultantpro'); ?>"
                               class="sticky-icon fa fa-thumb-tack fa-2x"></i>
                        <?php } ?>
                        <div class="<?php echo esc_attr($width_class[$width]); ?>">
                            <div class="lx-blog-post <?php echo esc_attr($style_page); ?>">
                                <?php if (has_post_thumbnail()) { ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="img-wrap s-back-switch">
                                            <?php the_post_thumbnail('', array('class' => 's-img-switch')); ?>
                                        </div>
                                    </a>
                                <?php } ?>
                                <div class="info-wrap">
                                    <a href="<?php echo get_the_permalink(); ?>"
                                       class="date"><?php the_time('d.m.Y'); ?>
                                    </a>
                                    <span class="separator">/</span>
                                    <a class="cats" href="<?php echo get_the_permalink(); ?>"><?php esc_html_e('by ', 'consultantpro');
                                        echo get_the_author(); ?></a>
                                    <?php the_title('<a class="title" href="' . get_the_permalink() . '"><h3>', '</h3></a>'); ?>
                                    <div class="desc">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Blog Item -->
                    <?php
                endwhile;
                } else {
                    esc_html_e('no posts', 'consultantpro');
                } ?>
            </div>
        </div>
        <?php
        wp_reset_postdata();
        return ob_get_clean();
    }
}