<?php
/**
 * Template file index
 *
 * @package Raindrops
 * @since Raindrops 0.940
 *
 * @uses get_header( $raindrops_document_type )	include template part file
 * @uses is_home( )	Check Conditional is home page or not
 * @uses is_active_sidebar( 'sidebar-3' )	include template part file
 * @uses dynamic_sidebar( 'sidebar-3' )	include template part file
 * @uses raindrops_yui_class_modify( )	add class attribute value
 * @uses is_2col_raindrops( 'style="width:99%;"' )	add inline style attribute
 * @uses get_template_part( 'loop', 'default' )	include template part file
 * @uses get_sidebar( 'extra' )	include template part file
 * @uses get_sidebar( 'default' )	include template part file
 * @uses get_footer( $raindrops_document_type ) 
 */
 
		get_header( $raindrops_document_type );
		
		raindrops_debug_navitation( __FILE__ );
		
?>
	<div id="yui-main">
		<div class="yui-b">
<?php
/**
 *  Widget only home
 *
 */
		if ( is_home( ) and  is_active_sidebar( 'sidebar-3' ) ) {
		
			echo '<div class="topsidebar">'."\n".'<ul>';
			
			dynamic_sidebar( 'sidebar-3' );
			
			echo '</ul>'."\n".'</div>'."\n".'<br class="clear" />';
		} 
?>
    	<div class="<?php echo raindrops_yui_class_modify( );?>" id="container">
			<div class="yui-u first<?php raindrops_add_class( 'yui-u first', true );?>">
<?php
			get_template_part( 'loop', $raindrops_document_type );
?>
				<br style="clear:both" />
			</div>
			<div class="yui-u">
<?php 
		raindrops_prepend_extra_sidebar( );
		
		if ( $rsidebar_show ) {
		
			get_sidebar( 'extra' );
		
		}

		raindrops_append_extra_sidebar( );
?>
	  </div>
<?php 
		//add nest grid here 
?>
    </div>
  </div>
</div>
	<div class="yui-b">
<?php 
		raindrops_prepend_default_sidebar( );
		
		get_sidebar( 'default' );
		
		raindrops_append_default_sidebar( );
?>	
	</div>
</div>
<?php get_footer( $raindrops_document_type ); ?>