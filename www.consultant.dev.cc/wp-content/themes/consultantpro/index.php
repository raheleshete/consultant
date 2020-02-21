<?php
/**
 * Index Page
 *
 * @package consultant
 * @since 1.0
 *
 */
get_header();

// Banner img
$baner_img = cs_get_option('bg_blog_banner');
$empty_banner = ( ! empty( $baner_img ) ) ? '' : 'empty-banner';

$witoutPluginClass = '';

if ( !class_exists('consultant_Plugins') ) {
    $witoutPluginClass = 'no-plugin-lx';
}

// width blog
if (cs_get_option('width_blog') == 'two_col') {
    $width_blog = "col-sm-6 col-xs-12";
} elseif (cs_get_option('width_blog') == 'three_col') {
    $width_blog = "no-padd-xs col-md-4 col-sm-6 col-xs-12";
} else {
    $width_blog = "col-xs-12";
}

$divider_form_style = cs_get_option('divider_form_style') ? cs_get_option('divider_form_style') : 'career';
$content_width_class = ( is_active_sidebar( 'sidebar' ) && !is_search() && (!function_exists('cs_framework_init') || cs_get_option('blog_sidebar')) ) ? 'col-sm-12 col-md-9' : 'col-sm-12';

?>

<div class="blog posts-page <?php echo esc_attr( $empty_banner ); ?>">

    <?php if ( ! empty( $baner_img ) && cs_get_option('banner_blog')=='show' ) : ?>
        <div class="lx-main-wrapper"
             style="background-image: url( <?php echo esc_url(cs_get_option('bg_blog_banner')); ?>); ">
            <div class="container lx-v-align">
                <div class="consultant_heading text-center">
                    <?php if (cs_get_option('title_banner')) { ?>
                        <h3 class="title large"><?php echo esc_html(cs_get_option('title_banner')); ?></h3>
                    <?php }
                    if (cs_get_option('subtitle_banner')) { ?>
                        <p class="subtitle small"><?php echo esc_html(cs_get_option('subtitle_banner')); ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="container blog-main-page simple-article-block <?php echo esc_attr($witoutPluginClass); echo (cs_get_option('banner_blog')=='hide')? 'no-banner' : ''; ?>">
        <div class="row">
            <div class="<?php echo esc_attr($content_width_class); ?>">
                <div class="lx-blog">
                    <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div <?php post_class($width_blog); ?>>
                            <div class="lx-blog-post <?php echo esc_html(cs_get_option('style_blog')); ?>">
                                <?php if (has_post_thumbnail()) { ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="img-wrap s-back-switch">
                                            <?php the_post_thumbnail('',
                                                array('class' => 's-img-switch')); ?>
                                        </div>
                                    </a>
                                <?php } ?>
                                <a href="<?php echo esc_url(get_the_permalink()); ?>"
                                   class="date"><?php the_time(get_option('date_format')); ?>
                                </a>
                                <span class="separator">/</span>
                                <a class="cats" href="<?php the_permalink(); ?>"><?php esc_html_e('by ', 'consultantpro');
                                    the_author(); ?></a>
                                <?php the_title(
                                    '<h3 class="title"><a class="title" href="' . get_the_permalink() . '">', '</a></h3>'); ?>

                                <div class="desc">
                                    <?php
                                    the_excerpt();
                                    ?>
                                </div>
                                <?php if(!function_exists( 'cs_framework_init' )){ ?>
                                    <div class="read-wrap text-left marg-lg-t10">
                                        <a href="<?php the_permalink(); ?>" class="read-more-post"><?php echo esc_html('Read more'); ?></a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <div class="col-xs-12">
                        <?php

                        $paginate_links = paginate_links(array('prev_text' => '', 'next_text' => ''));
                        if ((!empty($paginate_links) && cs_get_option('pager') == "show") || !class_exists('CSFramework')) { ?>
                            <div id="pager text-center" class="pager">
                                <?php echo wp_kses_post($paginate_links); ?>
                            </div>
                        <?php } ?>
                        <?php else : ?>
                            <div id="empty-search-result">
                                <p><?php esc_html_e('Sorry, no posts matched your criteria.', 'consultantpro'); ?></p>
                                <?php get_search_form(true); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php if ( ( cs_get_option('blog_sidebar') || !class_exists('CSFramework') ) && !is_search() ) { 
                get_sidebar();
            } ?>
        </div>

    </div>

<?php if (function_exists('frm_forms_autoloader') && cs_get_option('contact_form_blog')=='show') { ?>

    <div class="bottom-blog" style="background-color: <?php echo esc_attr(cs_get_option('bg_color_form')); ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="consultant_heading dark">
                        <?php if (cs_get_option('title_form')) { ?>
                            <h3 class="title medium"><?php echo esc_html(cs_get_option('title_form')); ?></h3>
                        <?php } ?>
                        <?php if (cs_get_option('subtitle_form')) { ?>
                            <p class="subtitle small"><?php echo esc_html(cs_get_option('subtitle_form')); ?></p>
                        <?php } ?>
                        <div class="lx-divider">
                            <div class="icon icon-consultant"></div>
                        </div>
                        <?php if (cs_get_option('desc_form')) { ?>
                            <div class="desc">
                                <?php echo cs_get_option('desc_form'); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="lx-formidable career">
                        <?php
                        echo do_shortcode(esc_html('[formidable id=' . cs_get_option('choose_form_blog') . ']'));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php } ?>

<?php get_footer();
