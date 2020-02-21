<?php
/**
 *
 * Footer
 * @since 1.0.0
 * @version 1.0.0
 *
 */

$witoutPluginClass = '';
if ( !class_exists('consultant_Plugins') ) {
    $witoutPluginClass = 'no-plugin-lx-post';
}

?>

<!-- FOOTER -->
<footer class="lx-footer <?php echo esc_attr($witoutPluginClass); ?>">
    <div class="container">
        <div class="row">
            <div class=" <?php echo (class_exists('consultant_Plugins'))? 'col-md-7 col-sm-12' : 'col-sm-12 text-center'; ?>">
                <?php 
                    consultant_footer_menu();
                    if(cs_get_option('footer_text')) { ?>
                    <div class="text-footer">
                        <?php 
                            echo wp_kses_post( cs_get_option('footer_text') );
                        ?>
                    </div>
                <?php } 
                if(!class_exists('consultant_Plugins')) { ?>
                    <div class="text-footer text-center">
                        <?php esc_html_e( 'Copyright &copy; Consultant WordPress Theme', 'consultantpro' ); ?>
                    </div>
                <?php } ?>
            </div>
            <?php if(class_exists('consultant_Plugins')) { ?>
                <div class="col-md-3 col-lg-2 col-lg-offset-1 col-sm-12">
                    <div class="text-footer classic">
                        <?php 
                            if(cs_get_option('footer_contact')) {
                                echo wp_kses_post( cs_get_option('footer_contact') );
                            } 
                        ?>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12">
                    <div class="text-footer">
                        <?php  
                            if(cs_get_option('content_before_social')) {
                                echo wp_kses_post( cs_get_option('content_before_social') );
                            }
                            if( cs_get_option('footer_social') ) { ?>
                                <div class="social-icons">
                                    <?php foreach ( cs_get_option('footer_social') as $social_item ) { ?>
                                        <a class="btn" href="<?php echo  esc_html($social_item['footer_social_link']); ?>"><i class="<?php echo esc_attr($social_item['footer_social_icon']); ?>"></i></a>
                                    <?php } ?>
                                </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>