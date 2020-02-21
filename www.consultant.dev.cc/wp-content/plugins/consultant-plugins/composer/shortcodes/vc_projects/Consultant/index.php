<?php
/*
Template: Consultant
Version: 1.0.0
*/
defined( 'ABSPATH' ) or exit;

/**
* @var $data (array) - all params shortcodes
* @var $post
**/
$meta_data = get_post_meta( get_the_ID(), '_custom_portfolio_options', true );
$hover_src = ( !empty( $meta_data['portfolio_hover_image'] ) && is_numeric( $meta_data['portfolio_hover_image'] ) ) ? wp_get_attachment_url( $meta_data['portfolio_hover_image'] ) : false;

$category_slug = '';

if (!empty($data['taxonomies'])) {
	$categories = get_the_terms( get_the_ID(), $data['taxonomies']['portfolio-category'] );
	foreach ( $categories as $category ) {
		$category_slug .= $category->slug . ' ';
	}
} ?>

<a href="<?php the_permalink(); ?>">
	<div class="item col-md-4 col-sm-6 col-xs-12 no-padding-xs p_consultant <?php echo esc_attr( $category_slug ); ?>">
		<?php if(has_post_thumbnail()) { ?>
			<div class="img portfolio-item s-back-switch" alt="">
				<?php the_post_thumbnail( (!empty($data['image_original_size']) ? $data['image_original_size'] : 'large' ), array('class'=>'wow fadeIn s-img-switch','height'=>'auto') ); ?>
				<div class="wrap-info">
					<h4 class="title"><?php the_title(); ?></h4>
				</div>
			</div>
		<?php } ?>
	</div>
</a>
