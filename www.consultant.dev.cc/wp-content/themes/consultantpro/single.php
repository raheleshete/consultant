<?php
/**
* Single post
*
* @package consultant
* @since 1.0
*
*/
get_header();

$content_width_class = !function_exists( 'cs_framework_init' )  || cs_get_option('single_sidebar') ? 'col-sm-12 col-md-9' : 'col-sm-12';

if ( !class_exists('consultant_Plugins') ) {
    $witoutPluginClass = 'no-plugin-lx-post';
}

?>

<?php while ( have_posts() ) : the_post(); ?>


    <div class="container">
        <div class="lx-heading-post">
            <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="date"><?php  the_time( get_option('date_format') ); ?>
            </a>
            <span class="separator">/</span>
            <a class="cats" href="<?php the_permalink(); ?>"><?php esc_html_e( 'by ', 'consultantpro' ); the_author(); ?></a>
            <?php the_title( 
                    '<h3 class="title">', '</h3>' ); ?>
            </div>
        
        <?php if ( class_exists('consultant_Plugins') ) { ?>
            <div class="lx-banner-post s-back-switch"><?php the_post_thumbnail( 'large', array('class' => 's-img-switch')); ?></div>
        <?php } else { ?>
            <?php the_post_thumbnail( 'large'); ?>
        <?php } ?>

    </div>

    <div class="container single-posts <?php echo esc_attr($witoutPluginClass); ?>">
    	<div class="row">
        	<div class="post-block-article posts-wrapper <?php echo esc_attr( $content_width_class ); ?>">
                <div class="lx-article">
                	<?php the_content();

                    if(!function_exists( 'cs_framework_init' )){ ?>
                        <div class="tags-wrap marg-lg-t30 marg-lg-b30">
                            <div class="tags-cat"><?php esc_html_e('Categories: ', 'consultantpro'); the_category( ', ' ); ?></div>
                            <div class="tags-cat"><?php the_tags(); ?></div>
                        </div>
                   <?php } ?>

                    <?php wp_link_pages('link_before=<span class="pages">&link_after=</span>&before=<div class="post-nav"> <span>' . esc_html__( "Page:", 'consultantpro' ) . ' </span> &after=</div>'); ?>
                </div>
                <?php if ( comments_open() || get_comments_number()) { ?>
                    <div class="comment-widget">
                        <?php if( comments_open( $post->ID )  || get_comments_number()) { ?>
                            <?php echo comments_template(); ?>
                        <?php } ?>
                    </div>

                <?php } ?>
                <?php if( !function_exists( 'cs_framework_init' ) || cs_get_option('post_navigation') ) { ?>
                    <div class="single-post-navigation clearfix">
                        <?php
                        $prev_post = get_previous_post();
                        $next_post = get_next_post();

                        if ( ! empty( $prev_post ) ) : ?>
                            <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" class="prev">
                                <i class="fa fa-angle-left" aria-hidden="true"></i><?php esc_html_e('Prev', 'consultantpro'); ?>
                            </a>
                        <?php endif;

                        if ( ! empty( $next_post ) ) : ?>
                            <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="next">
                                <?php esc_html_e('Next', 'consultantpro'); ?><i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php } ?>
            </div>
            <?php 
                if(is_active_sidebar( 'sidebar' ) && (!function_exists( 'cs_framework_init' )  || cs_get_option('single_sidebar')=='yes') ) {
                    get_sidebar();
                }
            ?>
        </div>
    </div>
<?php endwhile; ?>
<?php get_footer();