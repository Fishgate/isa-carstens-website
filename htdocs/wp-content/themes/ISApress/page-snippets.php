<?php
/*
Template Name: kitchensink
*/
?>

<?php get_header(); ?>
<div id="slides-holder-generic">
    <div class="slide-img">
        <img src="http://www.placehold.it/1920x250" />
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
                                                                    <!-- START DUMMY ABOUT -->
                                                                    <img class="response" src="http://placehold.it/400x80" />
                                                                    <div class="left col-6-entry">LEFT</div>
                                                                    <div class="left divide-entry">&nbsp;</div>
                                                                    <div class="left col-6-entry">RIGHT</div>
                                                                    <br clear="all" />
                                                                    <hr />
                                                                    <h2>Student Life</h2>
                                                                    <div class="left col-6-entry">LEFT</div>
                                                                    <div class="left divide-entry">&nbsp;</div>
                                                                    <div class="left col-6-entry">RIGHT</div>
                                                                    <br clear="all" />
                                                                    <hr />
                                                                    <!-- END DUMMY ABOUT -->
                                                                    
                                                                    
                                                                    <!-- START DUMMY GALLERY -->
                                                                    <div class="left col-6-entry">
                                                                        <div class="gallery-thumb-holder">
                                                                            <img class="response" src="http://placehold.it/370x240" />
                                                                            <div class="gallery-view-opt clearfix">
                                                                                <span class="gallery-view-count right">23</span>
                                                                                <a href="#" class="fa fa-search right"></a>
                                                                            </div>
                                                                        </div>
                                                                        <h3>3rd Years Diploma Ceremony</h3><!-- title of album -->
                                                                        <p class="byline vcard">
                                                                            <?php
                                                                                printf( __( 'Posted by <span class="author">%3$s</span> on <time class="green updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time( get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', ') );
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                    <div class="left divide-entry">&nbsp;</div>
                                                                    <div class="left col-6-entry">
                                                                        <div class="gallery-thumb-holder">
                                                                            <img class="response" src="http://placehold.it/370x240" />
                                                                            <div class="gallery-view-opt clearfix">
                                                                                <span class="gallery-view-count right">23</span>
                                                                                <a href="#" class="fa fa-search right"></a>
                                                                            </div>
                                                                        </div>
                                                                        <h3>SANCCOB Fundraiser</h3><!-- title of album -->
                                                                        <p class="byline vcard">
                                                                            <?php
                                                                                printf( __( 'Posted by <span class="author">%3$s</span> on <time class="green updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time( get_option('date_format')), get_the_author() );
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                    <br clear="all" />
                                                                    <hr />
                                                                    <!-- END DUMMY GALLERY -->
                                                                    
                                                                    <!-- START DUMMY NEWS -->
                                                                    <div class="left col-6-entry">
                                                                        <img class="response" src="http://placehold.it/370x240" />
                                                                        <h3>Live life beautifully</h3>
                                                                        <p class="byline vcard">
                                                                            <?php
                                                                                printf( __( 'Posted by <span class="author">%3$s</span> on <time class="green updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time( get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', ') );
                                                                            ?>
                                                                        </p>
                                                                        <p>excerpt here</p>
                                                                    </div>
                                                                    <div class="left divide-entry">&nbsp;</div>
                                                                    <div class="left col-6-entry">
                                                                        <img class="response" src="http://placehold.it/370x240" />
                                                                        <h3>Live life beautifully</h3>
                                                                        <p class="byline vcard">
                                                                            <?php
                                                                                printf( __( 'Posted by <span class="author">%3$s</span> on <time class="green updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time( get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', ') );
                                                                            ?>
                                                                        </p>
                                                                        <p>excerpt here</p>
                                                                    </div>
                                                                    <br clear="all" />
                                                                    <hr />
                                                                    <!-- END DUMMY NEWS -->
                                                                    
                                                                     <!-- START DUMMY NEWS ARTICLE -->
                                                                    <div class="left col-6-entry">
                                                                        <h3>Live life Beautifully</h3>
                                                                        <p class="byline vcard">
                                                                            <?php
                                                                                printf( __( 'Posted by <span class="author">%3$s</span> on <time class="green updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time( get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', ') );
                                                                            ?>
                                                                        </p>
                                                                        <!-- social media stuff -->
                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce commodo feugiat eros a vulputate. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque tincidunt fringilla odio in blandit. Cras ac metus in neque rutrum sodales. Donec consectetur consequat porttitor. Etiam vestibulum est hendrerit egestas varius.</p>
                                                                            <p>Maecenas quam mauris, bibendum sed tellus eu, interdum porttitor arcu. Sed rhoncus sem in tristique tristique. Sed in ligula vel nibh hendrerit faucibus nec id ligula. Aliquam tincidunt rutrum nunc nec vulputate. Nunc nulla nulla, ullamcorper et mi faucibus, imperdiet porttitor metus. Fusce ante urna, pharetra nec arcu at, pulvinar aliquam nulla.</p>
                                                                    </div>
                                                                    <div class="left divide-entry">&nbsp;</div>
                                                                    <div class="left col-6-entry">
                                                                        <div class="news-article-holder">
                                                                            <img class="response" src="http://placehold.it/370x240" />
                                                                            <div class="panel">
                                                                                <h2>Related Articles</h2>
                                                                                <ul>
                                                                                    <li><a href="#">Article</a></li>
                                                                                    <li><a href="#">Article</a></li>
                                                                                    <li><a href="#">Article</a></li>
                                                                                    <li><a href="#">Article</a></li>
                                                                                    <li><a href="#">Article</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <br clear="all" />
                                                                    <hr />
                                                                    <!-- END DUMMY NEWS ARTICLE -->
                                                                    
                                                                    
                                                                    <!-- START DUMMY JOBS AVAILABLE -->
                                                                    <div class="left col-6-entry">
                                                                        <h3>Live life Beautifully</h3>
                                                                        <p class="byline vcard">
                                                                            <?php
                                                                                printf( __( 'Posted by <span class="author">%3$s</span> on <time class="green updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme' ), get_the_time( 'Y-m-j' ), get_the_time( get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', ') );
                                                                            ?>
                                                                        </p>
                                                                        <!-- social media stuff -->
                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce commodo feugiat eros a vulputate. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque tincidunt fringilla odio in blandit. Cras ac metus in neque rutrum sodales. Donec consectetur consequat porttitor. Etiam vestibulum est hendrerit egestas varius.</p>
                                                                            <p>Maecenas quam mauris, bibendum sed tellus eu, interdum porttitor arcu. Sed rhoncus sem in tristique tristique. Sed in ligula vel nibh hendrerit faucibus nec id ligula. Aliquam tincidunt rutrum nunc nec vulputate. Nunc nulla nulla, ullamcorper et mi faucibus, imperdiet porttitor metus. Fusce ante urna, pharetra nec arcu at, pulvinar aliquam nulla.</p>
                                                                    </div>
                                                                    <div class="left divide-entry">&nbsp;</div>
                                                                    <div class="left col-6-entry">
                                                                        <div class="news-article-holder">
                                                                            <div class="panel-dark">
                                                                                <p>Please click the button below to apply for this job</p>
                                                                                <div class="center">
                                                                                    <a href="#" class="btn-primary">APPLY NOW</a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel">
                                                                                <h2>Related Jobs</h2>
                                                                                <ul>
                                                                                    <li><a href="#">Job Title</a></li>
                                                                                    <li><a href="#">Job Title</a></li>
                                                                                    <li><a href="#">Job Title</a></li>
                                                                                    <li><a href="#">Job Title</a></li>
                                                                                    <li><a href="#">Job Title</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <br clear="all" />
                                                                    <hr />
                                                                    <!-- END DUMMY JOBS AVAILABLE -->
                                                                    
                                                                     <!-- START STAFF -->
                                                                     <h2>Staff Section</h2>
                                                                    <div class="left col-12 clearfix">
                                                                        <div class='staff-holder left'>
                                                                            <div class='staff-img'>
                                                                                <img src='http://placehold.it/138x157' />
                                                                            </div>
                                                                            <div class='staff-info'>
                                                                                <p><b>A Schoeman</b><br />Education Administrator</p>
                                                                            </div>
                                                                        </div>
                                                                        <!-- -->
                                                                        <div class='staff-holder left'>
                                                                            <div class='staff-img'>
                                                                                <img src='http://placehold.it/138x157' />
                                                                            </div>
                                                                            <div class='staff-info'>
                                                                                <p><b>A Schoeman</b><br />Education Administrator</p>
                                                                            </div>
                                                                        </div>
                                                                        <!-- -->
                                                                        <div class='staff-holder left'>
                                                                            <div class='staff-img'>
                                                                                <img src='http://placehold.it/138x157' />
                                                                            </div>
                                                                            <div class='staff-info'>
                                                                                <p><b>A Schoeman</b><br />Education Administrator</p>
                                                                            </div>
                                                                        </div>
                                                                        <!-- -->
                                                                        <div class='staff-holder left'>
                                                                            <div class='staff-img'>
                                                                                <img src='http://placehold.it/138x157' />
                                                                            </div>
                                                                            <div class='staff-info'>
                                                                                <p><b>A Schoeman</b><br />Education Administrator</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END STAFF -->
                                                                    
									<?php the_content(); ?>
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

						<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
