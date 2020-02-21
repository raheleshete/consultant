<?php
defined( 'ABSPATH' ) or exit;

/**
* @var $data (array) - all params shortcodes
**/
?>
<!-- PROJECTS -->
<div class="essentilas-projects projects lx-portfolio animation section portfolio padding-top">

	<div class="section-heading">
	    <?php if(!empty($data['title'])) : ?>
		<h2><?php echo esc_html($data['title']); ?></h2>
		<?php endif; ?>
		<?php if(!empty($data['separator'])) : ?>
		<hr />
		<?php endif; ?>
	</div>
	
	<?php if (!empty($data['filter'])): ?>
	<div class="fillter-wrap essentilas-projects-filter filter_group margin-top text-center wow fadeIn" data-wow-duration="2s" id="filters">  
		<a class="but activbut" data-filter="*"><?php esc_html_e('All', 'essential'); ?></a>
		<?php
		if (!empty($data['taxonomies'])) {
			$categories = get_terms( array_shift($data['taxonomies']), '' );
			foreach ( $categories as $category ) {?>
					<a class="but" data-filter=".<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></a>
				<?php
			}
		}
		?>
	</div>
	<?php endif ?>
	<div class="section-content animation p_barber">
		<div class="work-item-wrapper">
			<div class="row izotope-container">