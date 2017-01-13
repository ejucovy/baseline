<?php get_header(); ?>
<?php
	//display Page x of y pages
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$total_pages = $wp_query->max_num_pages;
	// get category name and description
	$cat_id = get_query_var('cat');
	$cat_name = single_cat_title( $prefix = '', $display = false ); 
	$cat_desc = strip_tags( category_description() );
	//get taxonomy name
	global $wp_query;
    $term = $wp_query->get_queried_object();
	$text_on_image_classes = get_option('site_text_on_image_classes');
?>

<header id="archive-header" class="section padding-large bg-transparent width-wide">
	<div class="section-inner" id="archive-header-inner">
		<h2 id="page-title" class="title2">
			<span class="<?php echo $text_on_image_classes; ?>">
				<span class="archive-label"><?php _e('Archive','baseline'); ?>:</span> <?php echo $cat_name; ?>
			</span>
		</h2>
		<?php if ( $cat_desc ): ?>
		<p class="lead"><span class="<?php echo $text_on_image_classes; ?>"><?php echo $cat_desc; ?></span></p>
		<?php endif; ?>
	</div>
</header>	
<?php if ( have_posts() ) : ?>
<div id="archive" class="page-content section bg-white width-wide padding-normal">
	<div id="archive-inner" class="section-inner">
		<?php $pagination_args = array(
			'prev_text'          => __('← Newer Posts','baseline'),
			'next_text'          => __('Older Posts →','baseline')
		);
		if ( $total_pages > 1 ): 
		?>
		<div class="c10 margin-bottom-large">
			<?php echo paginate_links($pagination_args); ?>
		</div>
		<?php 
		endif;
		while ( have_posts()) : the_post();	
			get_template_part( 'content', $post->post_type );
		endwhile; ?>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
<div id="pagination" class="section bg-white width-wide padding-normal">
	<div class="section-inner">
		<?php $pagination_args = array(
			'prev_text'          => __('← Newer Posts','baseline'),
			'next_text'          => __('Older Posts →','baseline')
		);
		echo paginate_links($pagination_args);
		get_search_form(); ?>
	</div>
</div>
<?php endif; ?> 
<!-- end #content -->
<?php get_sidebar('featboxes'); ?>
<?php get_footer(); ?>