<?php
$post_id = get_the_ID();
$comments = get_comments( 'post_id=' . $post_id );
$total_comments = count( $comments );

if ( ! $comments ) {
    _e('<p class="no-revs">No reviews yet</p><span class="rev-write">Write a review!</span>', 'dummy-theme');
    return '';
}

$total_rating = 0;
$html = '<div class="woocommerce-tabs"><div id="reviews"><ol class="commentlist">';

foreach ( $comments as $comment ) {   
    $rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
    $total_rating = $total_rating + $rating;
    
    $html .= '<li class="review"><div class="comment-text"><div class="author-wrapper"><p class="author">' . get_comment_author( $comment ) . ' </p><p class="verified">utente verificato</p></div>';

    if ( $rating ) $html .= wc_get_rating_html( $rating );
    $html .= '<span class="rev-date">' . get_comment_date( 'd F Y', $comment ) . '</span><div class="description">' . $comment->comment_content . '</div></div></li>';
}

$html .= '</ol></div></div>';
$heading = '';

if( $total_rating > 0 ) {

    $total_average = $total_rating / $total_comments;
    $total_average =  number_format($total_average, 2, '.', '');
    
    $heading = '<div class="rev-heading">';
    $heading .= '<span class="rev-avg">' . $total_average . '</span>';
    $heading .= wc_get_rating_html( $total_average );
    $heading .= '<span class="total-rev">' . $total_comments . ' reviews</span>';
    $heading .= '<span class="rev-write">Review</span>';
    $heading .= '</div>';

}