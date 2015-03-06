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
                                    <h1 class="page-title">News Feed</h1>
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
                                                                                
                                                                                <?php $i=1; while (have_posts()) : the_post(); ?>
                                                                                
                                                                                    <?php if($i % 2 == 0) echo '<div class="left divide-entry">&nbsp;</div>'; ?>
                                                                                
                                                                                    <div class="left col-6-entry arc-single">
                                                                                        <a href="<?php echo get_permalink(get_the_ID()); ?>">
                                                                                            <?php if(has_post_thumbnail(get_the_ID())) : ?>
                                                                                                <img class="response" src="<?php get_feature_image_url('thumb-370'); ?>" />
                                                                                            <?php else : ?>
                                                                                                <img class="response" src="http://placehold.it/370x250" />
                                                                                            <?php endif; ?>
                                                                                        </a>

                                                                                        <h3><?php the_title(); ?></h3>

                                                                                        <p class="byline vcard">
                                                                                            <?php
                                                                                                printf( __( 'Posted by <span class="author">%3$s</span> on <time class="green updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time( get_option('date_format')), get_the_author());
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

						<?php get_sidebar('news'); ?>

				</div>

			</div>

<?php get_footer(); ?>
