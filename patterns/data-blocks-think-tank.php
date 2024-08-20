<?php
/**
 * Title: Data Blocks - Think Tank
 * Slug: ttt/data-blocks-think-tank
 * Categories: transparency
 * Inserter: false
 */
$post_id            = get_the_ID();
$limited_info       = get_post_meta( $post_id, 'limited_info', true );
$is_limited         = ( $limited_info && strtolower( trim( $limited_info ) ) == 'x' ) ? true : false;
$no_domestic        = get_post_meta( $post_id, 'no_domestic_accepted', true );
$no_defense         = get_post_meta( $post_id, 'no_defense_accepted', true );
$no_foreign         = get_post_meta( $post_id, 'no_foreign_accepted', true );
$transparency_score = ( $score = get_post_meta( $post_id, 'transparency_score', true ) ) ? (int) $score : 0;
$think_tank_term    = wp_get_post_terms( $post_id, 'think_tank' );
$column_count       = ( $is_limited ) ? 2 : 4;
?>

<!-- wp:group {"layout":{"type":"grid","columnCount":<?php echo intval( $column_count ); ?>,"minimumColumnWidth":"12rem","rowCount":"1"}} -->
<div class="wp-block-group">

	<?php
	if ( $is_limited ) :
		?>
		<!-- wp:group {"metadata":{"name":"No Data"},"className":"no-data","style":{"border":{"width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}}},"borderColor":"contrast-3","backgroundColor":"gray-100","layout":{"type":"default"}} -->
		<div class="wp-block-group has-border-color has-contrast-3-border-color has-gray-100-background-color has-background no-data" style="border-width:1px;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">

			<!-- wp:heading {"level":4} -->
				<h4><?php esc_html_e( 'No donation data available for this think tank.', 'ttt' ); ?></h4>
			<!-- /wp:heading -->
			
		</div>
		<!-- /wp:group -->
		<?php
	else :
		?>
		<!-- wp:group {"metadata":{"name":"U.S. Government Funding"},"className":"<?php echo ( $no_domestic ) ? 'no-funding' : 'is-funded'; ?>","style":{"border":{"width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}}},"borderColor":"gray-300","backgroundColor":"gray-200","layout":{"type":"default"}} -->
		<div class="wp-block-group has-border-color has-gray-300-border-color has-gray-200-background-color has-background <?php echo ( $no_domestic ) ? 'no-funding' : 'is-funded'; ?>"
			style="border-width:1px;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">

			<?php
			if ( $is_limited ) :
				?>
				Limited Info
				<?php
			endif;
			?>
			<!-- wp:heading {"level":4} -->
			<h4><?php esc_html_e( 'U.S. Government Funding', 'ttt' ); ?></h4>
			<!-- /wp:heading -->
			
			<?php
			if ( $no_domestic ) :
				?>

				<!-- wp:paragraph  -->
				<p><?php esc_html_e( 'Did not accept any donations from the U.S. Government', 'ttt' ); ?></p>
				<!-- /wp:paragraph -->

				<?php
			else :
				?>

				<!-- wp:paragraph {
					"metadata":{
						"bindings":{
							"content":{
								"source":"core/post-meta",
								"args":{
									"key":"amount_domestic"
								}
							}
						}
					}
				} -->
				<p>$X</p>
				<!-- /wp:paragraph -->


				<?php
			endif;
			?>

		</div>
		<!-- /wp:group -->

		<!-- wp:group {"metadata":{"name":"Pentagon Contractor Funding"},"className":"<?php echo ( $no_defense ) ? 'no-funding' : 'is-funded'; ?>","style":{"border":{"width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}}},"borderColor":"gray-300","backgroundColor":"gray-200","layout":{"type":"default"}} -->
		<div class="wp-block-group has-border-color has-gray-300-border-color has-gray-200-background-color has-background <?php echo ( $no_defense ) ? 'no-funding' : 'is-funded'; ?>"
			style="border-width:1px;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">

			<!-- wp:heading {"level":4} -->
			<h4><?php esc_html_e( 'Pentagon Contractor Funding', 'ttt' ); ?></h4>
			<!-- /wp:heading -->

			<?php
			if ( $no_defense ) :
				?>

				<!-- wp:paragraph  -->
				<p><?php esc_html_e( 'Did not accept any donations from Pentagon Contractors', 'ttt' ); ?></p>
				<!-- /wp:paragraph -->

				<?php
			else :
				?>

				<!-- wp:paragraph {
					"metadata":{
						"bindings":{
							"content":{
								"source":"core/post-meta",
								"args":{
									"key":"amount_defense"
								}
							}
						}
					}
				} -->
				<p>$X</p>
				<!-- /wp:paragraph -->

				<?php
			endif;
			?>
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"metadata":{"name":"Foreign Interest Funding"},"className":"<?php echo ( $no_foreign ) ? 'no-funding' : 'is-funded'; ?>","style":{"border":{"width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}}},"borderColor":"gray-300","backgroundColor":"gray-200","layout":{"type":"default"}} -->
		<div class="wp-block-group has-border-color has-gray-300-border-color has-gray-200-background-color has-background <?php echo ( $no_foreign ) ? 'no-funding' : 'is-funded'; ?>"
			style="border-width:1px;padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)">

			<!-- wp:heading {"level":4} -->
			<h4><?php esc_html_e( 'Foreign Interest Funding', 'ttt' ); ?></h4>
			<!-- /wp:heading -->

			<?php
			if ( $no_foreign ) :
				?>

				<!-- wp:paragraph  -->
				<p><?php esc_html_e( 'Did not accept any donations from Foreign Interests', 'ttt' ); ?></p>
				<!-- /wp:paragraph -->

				<?php
			else :
				?>

				<!-- wp:paragraph {
					"metadata":{
						"bindings":{
							"content":{
								"source":"core/post-meta",
								"args":{
									"key":"amount_foreign"
								}
							}
						}
					}
				} -->
				<p>$X</p>
				<!-- /wp:paragraph -->

				<?php
			endif;
			?>
			
		</div>
		<!-- /wp:group -->
		<?php
	endif;
	?>

	<!-- wp:pattern {"slug":"ttt/transparency-score"} /-->
</div>
<!-- /wp:group -->
