<?php
/*
Template Name: Staff
*/
?>

<?php get_header(); ?>
                        <div id="slides-holder-generic">
                            <div class="slide-img">
                                <img src="<?php echo get_template_directory_uri(); ?>/library/images/about_head.jpg" alt="About Us header image" /><!-- http://www.placehold.it/1920x250 -->
                            </div>
                        </div>

			<div id="content" class="content-generic">
                            
				<div id="inner-content" class="wrap clearfix">
                                    <!-- PAGE H1 -->
                                    <h1 class="page-title"><?php the_title(); ?></h1>
                                        <!-- BREADCRUM NAVXT -->
                                        <div class="breadcrumbs clearfix">
                                            <span class="left fa fa-map-marker"></span>
                                            <p>You are here: </p>
                                            <?php if(function_exists('bcn_display'))
                                            {
                                                bcn_display();
                                            }?>
                                        </div>
						<div id="main" class="eightcol first clearfix" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">


								<section class="entry-content clearfix" itemprop="articleBody">
                                                                    
									<?php the_content(); ?>
                                                                        
                                                                        <?php
                                                                        
                                                                        foreach($termsyo = get_terms('custom_cat') as $term) {
                                                                            echo "<h2>$term->name</h2>";

                                                                            $staffposts = new WP_Query(array(
                                                                                'posts_per_page' => -1,
                                                                                'post_type' => 'staff',
                                                                                'tax_query' => array (
                                                                                    array (
                                                                                        'taxonomy' => 'custom_cat',
                                                                                        'field'    => 'slug',
                                                                                        'terms'    => $term->slug
                                                                                    )
                                                                                )
                                                                            ));

                                                                            if($staffposts->have_posts()) :
                                                                                ?>
                                                                                <div class="col-12 clearfix">
                                                                                <?php
                                                                                    while($staffposts->have_posts()) : $staffposts->the_post();
                                                                                        ?>
                                                                                        <div class='staff-holder left'>
                                                                                            <div class='staff-img'>
                                                                                                <?php if(has_post_thumbnail(get_the_ID())) { ?>
                                                                                                    <img src="<?php echo get_feature_image_url('thumb-208'); ?>" />
                                                                                                <?php } else { ?>
                                                                                                    <img src="http://placehold.it/208x238/" />
                                                                                                <?php } ?>
                                                                                            </div>
                                                                                            <div class='staff-info'>
                                                                                                <p>
                                                                                                    <b><?php echo get_the_title(); ?></b>
                                                                                                    <br />
                                                                                                    <?php if (get_field('job_description')) echo get_field('job_description'); ?>
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                        <?php                                                                                     
                                                                                    endwhile;
                                                                                ?>
                                                                                </div>

                                                                                <hr />
                                                                                <?php
                                                                            endif;

                                                                            wp_reset_postdata();
                                                                        }
                                                                        
                                                                        ?>
								</section>

								<footer class="article-footer">
									<p class="clearfix"><?php the_tags( '<span class="tags">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?></p>

								</footer>

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry clearfix">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>

						<?php get_sidebar('about'); ?>

				</div>

			</div>

<?php get_footer(); ?>
