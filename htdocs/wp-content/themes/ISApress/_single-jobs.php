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
                                        Jobs Available
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

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<section class="entry-content clearfix" itemprop="articleBody">
                                                                    
                                                                    <div class="left col-6-entry">
                                                                        <h1 class="single_h1"><?php the_title(); ?></h1>
                                                                        <p class="byline vcard">
                                                                            <?php
                                                                                $author_business = get_the_author_meta('business_name');
                                                                            
                                                                                printf( __( 'Posted on <time class="green updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time( get_option('date_format')) );
                                                                            ?>
                                                                        </p>
                                                                        
                                                                        <p>
                                                                            <strong>Position Location</strong>:<br />
                                                                            <?php echo do_shortcode('[wpuf-meta name="position_location"]'); ?>
                                                                        </p>
                                                                        
                                                                        <p>
                                                                            <strong>Position Description</strong>:<br />
                                                                            <?php echo do_shortcode('[wpuf-meta name="position_description"]'); ?>
                                                                        </p>
                                                                        
                                                                        <p>
                                                                            <strong>Position Type</strong>:<br />
                                                                            <?php echo do_shortcode('[wpuf-meta name="position_type"]'); ?>
                                                                        </p>
                                                                        
                                                                        <p>
                                                                            <strong>Qualifications / Diplomas required</strong>:<br />
                                                                            <?php echo do_shortcode('[wpuf-meta name="qualifications"]'); ?>
                                                                        </p>
                                                                        
                                                                        <p>
                                                                            <strong>Experience required</strong>:<br />
                                                                            <?php echo do_shortcode('[wpuf-meta name="experience_required"]'); ?>
                                                                        </p>
                                                                        
                                                                        <p>
                                                                            <strong>Duties</strong>:<br />
                                                                            <?php echo do_shortcode('[wpuf-meta name="duties"]'); ?>
                                                                        </p>
                                                                        
                                                                        <p>
                                                                            <strong>Minimum Salary</strong>:<br />
                                                                            <?php echo do_shortcode('[wpuf-meta name="minimum_salary"]'); ?>
                                                                        </p>
                                                                        
                                                                        <p>
                                                                            <strong>Maximum Salary</strong>:<br />
                                                                            <?php echo do_shortcode('[wpuf-meta name="maximum_salary"]'); ?>
                                                                        </p>
                                                                        
                                                                        <p>
                                                                            <strong>Commission Structure</strong>:<br />
                                                                            <?php echo do_shortcode('[wpuf-meta name="commission_structure"]'); ?>
                                                                        </p>
                                                                        
                                                                        <p>
                                                                            <strong>Benefits</strong>:<br />
                                                                            <?php echo do_shortcode('[wpuf-meta name="benefits"]'); ?>
                                                                        </p>
                                                                        
                                                                        <p>
                                                                            <strong>Annual leave</strong>:<br />
                                                                            <?php echo do_shortcode('[wpuf-meta name="annual_leave"]'); ?>
                                                                        </p>
                                                                        
                                                                        <p>
                                                                            <strong>Working hours per week</strong>:<br />
                                                                            <?php echo do_shortcode('[wpuf-meta name="working_hours"]'); ?>
                                                                        </p>
                                                                        
                                                                        <p>
                                                                            <strong>Starting Date</strong>:<br />
                                                                            <?php echo do_shortcode('[wpuf-meta name="starting_date"]'); ?>
                                                                        </p>
                                                                        
                                                                        <p>
                                                                            <strong>Gender</strong>:<br />
                                                                            <?php echo do_shortcode('[wpuf-meta name="gender"]'); ?>
                                                                        </p>
                                                                        
                                                                    </div>
                                                                    <div class="left divide-entry">&nbsp;</div>
                                                                    <div class="left col-6-entry">
                                                                        <div class="news-article-holder">
                                                                            <div class="panel-dark">
                                                                                <h3 style="color: white; text-align: center;">Interested?</h3>
                                                                                <p>Please click below to submit your CV for this or another available position. We will also keep your CV on file for future consideration. </p>
                                                                                <div class="center">
                                                                                    <a class="btn-primary" href="<?php echo site_url('/careers/submit-a-cv/'); ?>">SUBMIT YOUR CV</a>
                                                                                </div>
                                                                            </div>
                                                                                
                                                                            <?php 
                                                                            $related = p2p_type( 'jobs_to_jobs' )->get_connected( get_queried_object() );
                                                                                if ($related->have_posts()) :
                                                                            ?>
                                                                                <div class="panel">
                                                                                    <h2>Related Jobs</h2>
                                                                                    <ul>
                                                                                        <?php
                                                                                        while ($related->have_posts()) : $related->the_post(); ?>
                                                                                            <li><a href="<?php echo get_permalink(get_the_ID()); ?>"><?php echo get_the_title(); ?></a></li> <?php                                                                                
                                                                                        endwhile; 
                                                                                        ?>
                                                                                    </ul>
                                                                                </div>
                                                                            <?php
                                                                            endif;
                                                                            
                                                                            wp_reset_postdata();
                                                                            ?>
                                                                                
                                                                        </div>
                                                                    </div>
                                                                    <br clear="all" />
								</section>


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

						<?php get_sidebar('careers'); ?>

				</div>

			</div>

<?php get_footer(); ?>
