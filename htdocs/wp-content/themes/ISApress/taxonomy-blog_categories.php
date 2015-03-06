<?php get_header(); ?>

                        <div id="slides-holder-generic">
                            <div class="slide-img">
                                <img src="<?php echo get_template_directory_uri(); ?>/library/images/about_head.jpg" alt="About Us header image" /><!-- http://www.placehold.it/1920x250 -->
                            </div>
                        </div>

			<div id="content" class="content-generic">
                            
				<div id="inner-content" class="wrap clearfix">
                                    
                                        <!-- PAGE H1 -->
                                        <h1 class="page-title">
                                        Blog /
                                        <?php 
                                        
                                        if (is_tax('blog_categories')) {
                                            foreach(get_the_terms($post, 'blog_categories') as $blog_cats) {
                                                if($blog_cats->slug == get_query_var('term') ) {
                                                    echo $blog_cats->name;
                                                }
                                            }
                                        }
                                        
                                        /*elseif (is_tag()) {
                                            single_tag_title();
                                        } elseif (is_author()) {
                                            global $post;
                                            $author_id = $post->post_author;
                                            _e('Posts by ', 'bonestheme') . the_author_meta('display_name', $author_id);
                                            
                                        } elseif (is_day()) {
                                            the_time('l, F j, Y');

                                        } elseif (is_month()) {
                                            the_time('F Y');

                                        } elseif (is_year()) {
                                            the_time('Y');
                                        } 
                                        */
                                        ?>
                                        </h1>
                                    
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
                                                                                
                                                                                    <div class="left col-6-entry">
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
                                                                                                printf( __( 'Posted by <span class="author">%3$s</span> on <time class="green updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time( get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', ') );
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
                                                    
                                                        <?php else : ?>
                                                            
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

						<?php get_sidebar('blog'); ?>

				</div>

			</div>

<?php get_footer(); ?>
