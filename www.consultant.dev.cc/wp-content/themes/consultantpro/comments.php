<?php

/**
 *
 * consultant Comment Form
 *
 * @package consultant
 * @since 1.0.0
 * @version 1.0.0
 */

if ( post_password_required() ) { return; }
?>
  <h3 class="title">
    <?php esc_html_e( 'LEAVE A COMMENT', 'consultantpro' ); ?>

  </h3>

  <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
      <h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'consultantpro' ); ?></h1>
      <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'consultantpro' ) ); ?></div>
      <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'consultantpro' ) ); ?></div>
    </nav>
  <?php endif; ?>

<?php

  

  $comments_args = array(
    'id_form' => 'comment-form',
      'fields'               => array(
          'author'            => '<div class="form-group name col-sm-6 no-padding-left"><label for="author">'.esc_attr__( 'Name', 'consultantpro' ).'</label><input id="author" type="text" name="author"  placeholder="" required /></div>',
          'email'             => '<div class="form-group email col-sm-6 no-padding-right"><label for="email">'.esc_attr__( 'E-mail', 'consultantpro' ).'</label><input name="email" id="email" type="email" placeholder="" required /></div>',
      ),
      'comment_field' => '<label for="comments">'.esc_attr__( 'Your comment', 'consultantpro' ).'</label><textarea id="comments" cols="30"  name="comment" rows="10" placeholder="" required></textarea>',
      'must_log_in' => '',
      'logged_in_as' => '',
      'title_reply' => '',
      'title_reply_to' => esc_html__('Leave a Reply to %s', 'consultantpro' ),
      'cancel_reply_link' => esc_html__('Cancel', 'consultantpro' ),
      'label_submit' => esc_html__('Send', 'consultantpro' ),
      'submit_field'  => '%1$s %2$s',
  );



  comment_form($comments_args);


if(get_comments_number() > 0){ ?>
  <h3 class="count-comments"><?php echo esc_html( get_comments_number() );?> <?php echo esc_html__('COMMENTS', 'consultantpro');  ?></h3>
<?php }

  wp_list_comments( array( 'callback' => 'consultant_comment' ) ); 
