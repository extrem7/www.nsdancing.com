<? global $NS ?>
<div class="recomended-link">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-6">
                <div class="quote"><? $NS->quote() ?>
                    <div><? the_field( 'quote' ) ?></div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="title four-title text-shadow-title text-center">You might also like</div>
                <div class="link">
					<?
					$parents = get_posts( [
						'post_type'   => 'page',
						'post_parent' => 143,//Dances we teach
						'fields'      => 'ids'
					] );

					$dances = get_posts( [
						'post_type'       => 'page',
						'posts_per_page'  => - 1,
						'post_parent__in' => $parents,
						'exclude'         => $post->ID
					] );

					if ( is_single() ) {
						$dances = get_posts( [
							'post_type'      => 'method',
							'posts_per_page' => - 1,
							'exclude'        => $post->ID
						] );
					}

					$dancesString = "";
					$i            = 0;
					foreach ( $dances as $post ) {
						$name         = get_the_title();
						$link         = get_permalink();
						$dancesString .= $i > 0 ? ", " : '';
						$dancesString .= "<a href=\"$link\">$name</a>";
						$i ++;
					}
					echo $dancesString;
					?>.
                </div>
            </div>
        </div>
    </div>
</div>