<?php
/*
Template Name: Specials
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
								</section>

								<footer class="article-footer">
									<p class="clearfix"><?php the_tags( '<span class="tags">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?></p>

								</footer>

							</article>

							<?php endwhile; endif; ?>
                                                    
                                                    <?php
                                                    
                                                    $treatments_specials = new WP_Query(array(
                                                        'post_type' => 'post',
                                                        'order' => 'DESC',
                                                        'orderby' => 'date',
                                                        'tax_query' => array (
                                                            array (
                                                                'taxonomy' => 'category',
                                                                'field'    => 'slug',
                                                                'terms'    => 'treatments'
                                                            )
                                                        )
                                                    ));
                                                    
                                                    if($treatments_specials->have_posts()) :
                                                        $i=1;
                                                        ?>
                                                        
                                                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
                                                                            
                                                            <section class="entry-content clearfix" itemprop="articleBody">
                                                    
                                                                    <?php
                                                                    while($treatments_specials->have_posts()) :
                                                                        $treatments_specials->the_post(); 
                                                                        ?>

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

                                                                        <?php
                                                                        $i++;

                                                                    endwhile;
                                                                endif;

                                                                ?>
                                                                                
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

						</div>

						<?php get_sidebar('treatments'); ?>

				</div>

			</div>

<?php get_footer(); ?>
