<?php
/*
Template: Projects Grid
Version: 1.0.0
*/
defined( 'ABSPATH' ) or exit;

/**
* @var $data (array) - all params shortcodes
* @var $post
**/
print_r($data);
?>

<div class="col-md-4 col-sm-6 col-xs-12 work-item <?php echo esc_attr( $data['terms_string'] ); ?>">

	<?php the_post_thumbnail( (!empty($data['image_original_size']) ? $data['image_original_size'] : 'large' ), array('class'=>'wow fadeIn','height'=>'auto') ); ?>
	<div class="image-overlay">
		<a href="<?php the_post_thumbnail_url(); ?>" class="media-popup" title="<?php the_title(); ?>">
			<div class="work-item-info">
				<?php the_title( '<h3>', '</h3>' ); ?>
				<?php the_excerpt(); ?>
			</div>
		</a>
	</div>

</div>