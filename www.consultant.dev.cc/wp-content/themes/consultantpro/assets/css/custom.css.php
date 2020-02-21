<?php
header("Content-type: text/css; charset: UTF-8");


$options = apply_filters( 'cs_get_option', get_option( CS_OPTION ) );
?>


<?php

if (! empty($options['one_title'])) {
	function get_number_str($str){
	    $number = preg_replace("/[^0-9|\.]/", '', $str);
	    return $number;
	}

	function get_str_by_number($str){
	    $number = preg_replace("/[0-9|\.]/", '', $str);
	    return $number;
	}

foreach ($options['one_title'] as $title) {
	$font_family = $title['one_title_family'];
	?>
	
<?php echo esc_html( $title['one_title_tag'] ); ?> {
	<?php echo  $font_family['family'] ? "	font-family: {$font_family['family']} !important;" : ''; ?>
	<?php echo  $title['one_title_color'] ? "	color: {$title['one_title_color']} !important;" : ''; ?>	
	<?php echo  $title['one_title_size'] ? "	font-size: {$title['one_title_size']}px !important;" : ''; ?>
	<?php echo  $title['one_title_line_height'] ? "	line-height: {$title['one_title_line_height']}px !important;" : ''; ?>
	<?php echo  $title['one_title_letter'] ? "	letter-spacing: {$title['one_title_letter']}px !important;" : ''; ?>
	<?php  $one_title_style = get_str_by_number($font_family['variant']);  ?>
    <?php echo  $font_family['variant'] ? "    font-style:{$one_title_style} !important;"  : ''; ?>
	<?php $one_title_weight = get_number_str($font_family['variant']);  ?>
    <?php echo  $font_family['variant'] ? "    font-weight:{$one_title_weight} !important;"  : ''; ?>
	
}

<?php } }





$site_type            = cs_get_option('site_type');
$favorite_page_option = cs_get_option('favorite_page');
$favorite_page        = ( isset( $favorite_page_option ) ) ? $favorite_page_option : '';

if ( $site_type == 'onepage' ) {

	if(!count($favorite_page)) {
		$favorite_page = array();
	} 
	$args = array(
		'post_type'      => 'page',
		'post__in'       => $favorite_page,
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'order'          => 'ASC',
		'orderby'        => 'menu_order'
	);

	$q = new WP_Query($args);

	$customCss = new Vc_Base;

	if ( $q->have_posts() ) : while (  $q->have_posts() ) :  $q->the_post();

	$content = get_the_content();

	echo  $customCss->parseShortcodesCustomCss($content);

	endwhile; endif;

}
?>




