<?php global $wp_embed;

// The Query
$query = FLBuilderLoop::query( $settings );

// The Loop
if ( $query->have_posts() ) {
	echo '<div class="sbpp-grid">';
		while ( $query->have_posts() ) {
			$query->the_post(); ?>
			<a class="sbpp-block" onClick='sbpp_show_post_js(<?php echo $query->post->ID; ?>)'>
				<div class="sbpp-wrap">
					<div class="sbpp-img-holder">
						<?php echo get_the_post_thumbnail(); ?>
					</div>
					<div class="sbpp-overlay">
						<h2 class="sbpp-grid-title"></h2>
						<div class="sbpp-grid-text fl-clearfix">
						</div>
					</div>
				</div>
			</a>
		<?php }
	echo '</div>';
	wp_reset_postdata();
	} else {
	// no posts found
} ?>



<div id="spinFrame" class="spin-frame">
	<div class="spinner"></div>
</div>
<div class="modal fade" id="sbppModal" tabindex="-1" role="dialog" aria-labelledby="sbppLabel" aria-hidden="true">
	<div class="modal-dialog">
		<button type="button" class="close" data-dismiss="modal">
			<span class="x" aria-hidden="true"></span>
			<span class="sr-only">Close</span>
		</button>
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modalTitle">Modal title</h4>
			</div>
			<div class="modal-body" id="modalBody">
			</div>
		</div>
	</div>
</div>
