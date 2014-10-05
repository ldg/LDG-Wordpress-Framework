<?php
/**
* -----------------------------------------------------------------------------------
* 6.0 - Display navigation to the next/previous posts
* -----------------------------------------------------------------------------------
*/
if( ! function_exists( 'lost_paging_nav' )) {
	function lost_paging_nav() { ?>
	<ul>
		<?php if( get_previous_posts_link() ) :?>
			<li class="next">
				<?php previous_posts_link( __( 'Newer Posts &rarr;', 'lost') ); ?>
			</li>
		<?php endif; ?>
		<?php if( get_next_posts_link() ) :?>
			<li class="previous">
				<?php next_posts_link( __( '&larr; Older Posts', 'lost') ); ?>
			</li>
		<?php endif; ?>
	</ul> <?php

	}
}