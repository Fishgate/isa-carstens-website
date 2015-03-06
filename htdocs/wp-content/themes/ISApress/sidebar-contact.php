				<div id="sidebar1" class="sidebar fourcol last clearfix" role="complementary">

                                        <div class="widget">
                                            <h4 class="widgettitle orange_head">Contact Us</h4>

                                            <p>Please complete the form below and we will get back to you as soon as we can.</p>

                                            <?php gravity_form( 4, false, false, false, '', false ); ?>
                                        </div>
                                    
                                    <?php if ( is_active_sidebar( 'contact' ) ) : ?>

						<?php dynamic_sidebar( 'contact' ); ?>
                                  
					<?php endif; ?>

				</div>