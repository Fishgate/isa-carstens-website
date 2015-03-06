			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap clearfix">
                                    <div class='left col-3 dropoff-1030'>
                                        <nav role="navigation">
                                            <?php bones_footer_links(); ?>
                                        </nav>
                                    </div>
                                    <div class='left col-3'>
                                        <h3>stellenbosch</h3>
                                                                               
                                        <p>
                                            <?php
                                            output_option('stell_address', '%s<br />');
                                            output_option('stell_num', 't: %s<br />');
                                            output_option('stell_fax', 'f: %s<br />');
                                            output_option('stell_email', 'e: <a href="mailto:%1$s">%1$s</a><br />');
                                            output_option('stell_gps', 'GPS: %s')
                                            ?>
                                        </p>
                                    </div>
                                    
                                    <div class='left col-3'>
                                        <h3>pretoria</h3>
                                        
                                        <p>
                                            <?php
                                            output_option('pre_address', '%s<br />');
                                            output_option('pre_num', 't: %s<br />');
                                            output_option('pre_fax', 'f: %s<br />');
                                            output_option('pre_email', 'e: <a href="mailto:%1$s">%1$s</a><br />');
                                            output_option('pre_gps', 'GPS: %s')
                                            ?>
                                        </p>
                                    </div>
                                    <div class='left col-3 dropoff-768'>
                                        <?php get_latest_news(); ?>
                                    </div>
				</div>
                            
                                <div class='outer-footer'>
                                    <p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved</p>
                                    <?php
                                    output_option('facebook_url',   '<a target="_blank" href="%s" class="fa fa-facebook"></a>');
                                    output_option('twitter_url',    '<a target="_blank" href="%s" class="fa fa-twitter"></a>');
                                    output_option('youtube_url',    '<a target="_blank" href="%s" class="fa fa-youtube"></a>');
                                    ?>
                                    
                                </div>
                            
			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>
                
                <?php user_bar(); ?>
                
	</body>

</html>
