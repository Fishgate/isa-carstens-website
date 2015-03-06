				<div id="sidebar1" class="sidebar fourcol last clearfix" role="complementary">

					<?php if ( is_active_sidebar( 'careers' ) ) : ?>

						<?php dynamic_sidebar( 'careers' ); ?>
                                  
					<?php endif; ?>
                                    
                                        <?php
                                        $latestnews = new WP_Query(array(
                                            'post_type' => 'jobs',
                                            'posts_per_page' => 5, 
                                            'order' => 'DESC',
                                            'orderby' => 'date',
                                        ));

                                        if($latestnews->have_posts()) :
                                            ?>
                                            <div class="widget">
                                            <h4 class="widgettitle">Latest Jobs</h4>
                                                <ul>
                                                <?php
                                                while($latestnews->have_posts()) :
                                                    $latestnews->the_post();
                                                    ?>
                                                    <li class="cat-item"><a href="<?php echo get_permalink(get_the_ID()); ?>"><?php the_title(); ?></a></li>
                                                    <?php
                                                endwhile;
                                                ?>
                                                </ul>
                                            </div>
                                            <?php
                                        endif;
                                        ?>

				</div>