<?php get_header(); ?>

                        <div id="slides-holder-generic">
                            <div class="slide-img">
                                <img src="<?php echo get_template_directory_uri(); ?>/library/images/about_head.jpg" alt="Header image" />
                            </div>
                        </div>

			<div id="content" class="content-generic">
                            
				<div id="inner-content" class="wrap clearfix">
                                    <!-- PAGE H1 -->
                                    <h1 class="page-title">
                                        Blog / 
                                        <?php 
                                        foreach(get_terms('blog_categories') as $category) { 
                                            echo $category->name . ' '; 
                                            break; // only display one of them
                                        } 
                                        ?>
                                    </h1>
                                        <!-- BREADCRUM NAVXT -->
                                        <div class="breadcrumbs clearfix">
                                            <span class="left fa fa-map-marker"></span>
                                            <p>You are here: </p>
                                            <?php if(function_exists('bcn_display'))
                                            {
                                                bcn_display();
                                            } ?>
                                        </div>
						<div id="main" class="eightcol first clearfix" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<section class="entry-content clearfix" itemprop="articleBody">
                                                                    
                                                                    <div>
                                                                        <h1 class="single_h1"><?php the_title(); ?></h1>
                                                                        <p class="byline vcard">
                                                                            <?php
                                                                                printf( __( 'Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">, </span> filed under %4$s.', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time( __( 'F jS, Y', 'bonestheme' )), bones_get_the_author_posts_link(), get_the_term_list( get_the_ID(), 'blog_categories', '', ', ' ) );
                                                                            ?>
                                                                        </p>

                                                                        <?php the_content(); ?>
                                                                    </div>
                                                                    
                                                                </section>
                                                            
                                                            <section class="blog-footer">
                                                                <table>
                                                                    <tr>
                                                                        <td class="author-avatar" valign="top">
                                                                            <?php echo get_avatar(get_the_author_meta(ID), 96); ?>
                                                                        </td>
                                                                        <td class="author-meta" valign="top">
                                                                            <p><?php echo get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name'); ?></p>
                                                                            <p><?php echo get_the_author_meta('description'); ?></p>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                
                                                            </section>

                                                            <?php comments_template(); ?>
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

						<?php get_sidebar('blog'); ?>

				</div>

			</div>

<?php get_footer(); ?>
