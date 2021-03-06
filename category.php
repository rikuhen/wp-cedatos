<?php get_header(); ?> 		
	<main class="container my-0 <?php if(is_front_page()) : ?> px-0 <?php endif; ?>">

			<div class="row">
				<div class="col-12 p-0">
					<?php $category = get_the_category() ?>
					<?php $tax_id = get_term_meta($category[0]->cat_ID,'thumbnail_id',true); ?>
					<?php $header = wp_get_attachment_image($tax_id,'full',false,['class' => 'img-fluid']);?>
					<?php echo $header; ?>
				</div>
			</div>
			
			<div class="row mt-3">

				<div class="col-12 col-lg-9 col-md-8 mb-3"> 
						<?php if (have_posts()): ?>
							<div class="row">
							<?php while(have_posts()): the_post(); ?>
									<div class="col-12 col-md-6 mb-3  the-post">
										<div class="post-header p-4" style="background: url(<?php the_post_thumbnail_url( 'large' ); ?>);">
											<a href="<?php the_permalink( ) ?>" class="position-absolute read-more-post read-more">Leer más</a>
											<?php the_post_thumbnail( 'large',['class'=>'img-fluid hidden']); ?>
										</div>
										<div class="p-2 bg-dark">
											<div class="vc_custom_heading text-light no-border vc_gitem-post-data vc_gitem-post-data-source-post_title">
												<h3 class="text-left"><a href="<?php the_permalink( )?>"><?php the_title(); ?></a></h3>
											</div>
										</div>
									</div>
							<?php endwhile; ?>
								
							</div>
							
							<div class="row">
								<div class="col-12 text-center mt-2">
									<?php 
										the_posts_pagination( array(
											'mid_size'  => 2,
											'prev_text' => __( '<<', 'jlcdatos' ),
											'next_text' => __( '>>', 'jlcdatos' ),
											'screen_reader_text' => ''
										) ); 
									?>
								</div>
							</div>

						</div>
						
						<?php get_sidebar(); ?>
						
					<?php else: ?>
						<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>
					</div>
				</div>

				<?php get_sidebar(); ?>
				
			</div>
	
<?php get_footer(); ?>