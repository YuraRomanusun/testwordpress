<?php

show_admin_bar(false);


function blankslate_custom_pings( $comment )
{
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
    <?php
    }
    add_filter( 'get_comments_number', 'blankslate_comments_number' );
    function blankslate_comments_number( $count )
    {
    if ( !is_admin() ) {
    global $id;
    $comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
    return count( $comments_by_type['comment'] );
    } else {
    return $count;
    }
}
add_filter( 'auto_update_plugin', '__return_true' );
add_filter( 'allow_dev_auto_core_updates', '__return_false' );



add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
    if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
    }
    add_filter( 'the_title', 'blankslate_title' );
    function blankslate_title( $title ) {
    if ( $title == '' ) {
    return '&rarr;';
    } else {
    return $title;
    }
}


add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
    return $title . esc_attr( get_bloginfo( 'name' ) );
}