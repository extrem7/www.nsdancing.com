<? /* Template Name: Testimonials */
get_header(); ?>
    <div class="container">
        <h1 class="title main-title text-center base-indent"><? the_title() ?></h1>
        <div class="testimonials">
			<?
			$offset = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;
			$offset -= 1;
			$offset *= 5;

			$comments = get_comments( [
				'parent'  => 0,
				'post_id' => get_the_ID(),
				'status'  => 'approve',
				'number'  => 5,
				'offset'  => $offset,
				'order'   => 'ASC'
			] );
			if ( ! empty( $comments ) ) {
				foreach ( $comments as $comment ) {
					$city = get_field( 'city', $comment );
					global $author;
					$author = "$comment->comment_author";
					if ( $city ) {
						$author .= ", $city";
					}
					get_template_part( 'views/comment' );
				}
			}
			$NS->pagination( true );
			?>
        </div>
    </div>
    <section class="box-text book-form mt-5">
        <div class="container">
            <fieldset class="decorative-border">
                <legend class="title third-title">Add your comment</legend>
                <form action="<? bloginfo( 'url' ) ?>/wp-comments-post.php" method="post" class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="label">Name</label>
                            <input type="text" name="author" class="control-form" required>
                        </div>
                        <div class="form-group">
                            <label class="label">Email</label>
                            <input type="email" name="email" class="control-form">
                        </div>
                        <div class="form-group">
                            <label class="label">City</label>
                            <input type="text" name="city" class="control-form" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="label">Comment</label>
                        <textarea name="comment" id="" cols="30" rows="7" class="control-form" required></textarea>
                    </div>
                    <div class="col-md-12 text-center mt-3">
                        <input type="hidden" name="comment_post_ID" value="<? the_ID() ?>"
                               id="comment_post_ID">
                        <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                        <button type="submit" class="button btn-red">Submit</button>
                    </div>
                </form>
            </fieldset>
        </div>
    </section>
<? get_footer() ?>