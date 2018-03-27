		</div><!--main-->
	
	</div><!--wrapper-->
	
	<footer>
		<div id="footercontent">
			
			<?php wp_nav_menu( array( 
				'theme_location' => 'footer_nav',
				) );
			?>
			
			<?php /* Bei Bedarf aktivieren
            
				if(is_active_sidebar('footer-sidebar')){
					dynamic_sidebar('footer-sidebar');   
				}
                
                */
			?>
		</div>
	</footer>

	<?php
		wp_footer();
	?>
	
</body>
</html>