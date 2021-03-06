<?php get_header(); ?>
<div id="core" class="container">
	<div class="row">
    
        <div class="eightcol">
              <h2>Search Results</h2>
		<?php if (have_posts()) : ?>
              <ul class="medpost">
				<?php while (have_posts()) : the_post(); ?>
                    
                           <li><?php get_template_part('/includes/post-types/medpost');?></li>
                                    
                <?php endwhile; ?><!-- end post -->
                </ul><!-- end latest posts section-->
               
<div style="clear: both;"></div>




			<ul class="navigation">
			<li class="fl"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older Items' ) ); ?></li>
			<li class="fr"><?php previous_posts_link( __( 'Newer Items <span class="meta-nav">&rarr;</span>' ) ); ?></li>
			</ul><!-- end navigation -->
		<?php else : ?>

                <div class="post">
                <h2>Not Found!</h2>
                    <p class="center">Sorry, but you are looking for something that isn't here.</p>
                    <?php get_search_form(); ?>
                    <?php wp_tag_cloud('smallest=8&largest=36&'); ?>
                    </div>

		<?php endif; ?>
        </div><!-- end #core .eightcol-->

    
    
    
        <div class="fourcol last">
        
        		<?php get_sidebar(); ?>
        
        </div>
	</div><!--end #core .row-->

    
   <div style="clear: both;"></div>
</div><!--end #core-->
<?php get_footer(); ?>