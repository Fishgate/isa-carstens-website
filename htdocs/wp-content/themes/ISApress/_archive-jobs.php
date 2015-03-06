<?php
/*
Template Name: About
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
                                    <h1 class="page-title">Positions Available</h1>
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

							<?php if (have_posts()) : ?>
                                                    
                                                                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
                                                                            
                                                                            <section class="entry-content clearfix" itemprop="articleBody">
                                                                                <p>See below positions currently available. If you wish to apply for any of these positions, read more about the position and complete the <a href=“http://staging.fishgate.co.za/isa_new/careers/submit-a-cv/“ target=“_blank”>application form here</a>.</p>
                                                                                <hr />
                                                                                
                                                                                <?php $i=1; while (have_posts()) : the_post(); ?>
                                                                                
                                                                                    <?php if($i % 2 == 0) echo '<div class="left divide-entry">&nbsp;</div>'; ?>
                                                                                
                                                                                    <div class="left col-6-entry arc-single">
                                                                                        <h3><?php the_title(); ?></h3>
                                                                                        <?php echo do_shortcode('[wpuf-meta name="position_location"]'); ?>
                                                                                        <p class="byline vcard">
                                                                                            <?php
                                                                                                $author_business = get_the_author_meta('business_name');
                                                                                                
                                                                                                printf( __( 'Posted on <time class="green updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time( get_option('date_format')) );
                                                                                            ?>
                                                                                        </p>
                                                                                        <?php the_excerpt(); ?>
                                                                                        <a href="<?php echo get_permalink(get_the_ID()); ?>">Read More</a>
                                                                                    </div>
                                                                                
                                                                                    <?php if($i % 2 == 0) echo '<br clear="all" /><hr />'; ?>
                                                                                
                                                                                <?php $i++; endwhile; ?>
                                                                                        
                                                                            </section>
                                                                            
                                                                        </article>
                                                    
                                                                        <?php if ( function_exists( 'bones_page_navi' ) ) { ?>
										<?php bones_page_navi(); ?>
									<?php } else { ?>
										<nav class="wp-prev-next">
											<ul class="clearfix">
												<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
												<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?></li>
											</ul>
										</nav>
									<?php } ?>
                                                    
							<?php endif; ?>

						</div>

						<?php get_sidebar('careers'); ?>

				</div>

			</div>

<?php get_footer(); ?>
