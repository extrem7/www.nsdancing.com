<? global $author; $id = $comment->comment_ID; ?>
<div class="testimonial">
    <div class="review" id="comment-<?= $id ?>">
        <div class="avatar"
             style="background: url(<? the_field( 'photo', $comment ) ?>) center;background-size: cover"></div>
        <div>
            <div class="review-header">
                <div class="title five-title"><?= $author ?></div>
            </div>
            <div class="review-body"><? comment_text( $id ) ?></div>
        </div>
    </div>
    <div class="decorative-line"></div>
</div>