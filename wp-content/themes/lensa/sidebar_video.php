<div class="primary-sidebar column col4">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('colabs_right') ) : ?>   

			
  
                    <aside class="widget block-background block-inner sidebar">
					<h4 class="widget-title"><a href="../video" >Все видео</a></h4>
					<ul>
                      
                      <?php $recent = new WP_Query("cat=4&showposts=5"); while($recent->have_posts()) : $recent->the_post();?>
<li><a href="<?php the_permalink() ?>" rel="bookmark">
<?php the_title(); ?>
</a></li>
<?php endwhile; ?>

						
                      </ul>
  </aside>
	
	<?php endif; ?>
</div><!-- .primary-sidebar -->
