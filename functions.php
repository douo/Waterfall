<?php
if ( function_exists('register_sidebars') )
	register_sidebars(3,array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
//分离Trackback和Pingback
function get_ping_type($trackbacktxt = 'Trackback', $pingbacktxt = 'Pingback') {
  $type = get_comment_type();
  switch( $type ) {
    case 'trackback' :
      return $trackbacktxt;
      break;
    case 'pingback' :
      return $pingbacktxt;
      break;
  }
  return false;
}
//获取自定义字段
function get_custom_meta($s){
	$simg = get_post_meta(get_the_ID(), $s, true);
	if ($simg){
    echo $simg;
  }					
}
//以下内嵌了第三方插件：
/*
Plugin Name: Category Posts Widget
Author URI: http://jameslao.com/
*/
class interjcCategoryPosts extends WP_Widget {

function interjcCategoryPosts() {
	parent::WP_Widget(false, $name='分类文章',$widget_ops = array ('description' => '显示某些分类下的文章'));
}
/**
 * Displays category posts widget on blog.
 */
function widget($args, $instance) {
	global $post, $wp_query;
	extract( $args );
	
	// If not title, use the name of the category.
	if( !$instance["title"] ) {
		$category_info = get_category($instance["cat"]);
		$instance["title"] = $category_info->name;
	}
	
	// Get array of post info.
	$cat_posts = new WP_Query("showposts=" . $instance["num"] . "&cat=" . $instance["cat"]);
	
	echo $before_widget;
	
	// Widget title

	echo $before_title;
	if( (bool) $instance["title_link"] )
		echo '<a href="' . get_category_link($instance["cat"]) . '">' . $instance["title"] . '</a>';
	else
		echo $instance["title"];
	echo $after_title;

	// Post list
	echo "<ul>\n";
	
	while ( $cat_posts->have_posts() ) : $cat_posts->the_post();
	?>
		<li class='cat-post-item'>

		<?php if ( (bool) $instance["thumbnail"] && function_exists('p75HasThumbnail') && p75HasThumbnail($cat_posts->post->ID) ) { ?>
		
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img class='alignleft' src='<?php echo p75GetThumbnail($post->ID, $instance["thumbnail_width"], $instance["thumbnail_height"]); ?>' alt='<?php the_title_attribute(); ?>' /></a>
		
		<?php } // end thumbnail function check ?>

			<a class="post-title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>

			<?php if ( $instance['excerpt'] ) the_excerpt(); ?>
		</li>
<?php
	endwhile;
	
	echo "</ul>\n";
	
	echo $after_widget;
}

/**
 * Form processing... Dead simple.
 */
function update($new_instance, $old_instance) {
    $new_instance["cat"] = absint( $new_instance["cat"] );
    $new_instance["exclude"] = (bool) $new_instance["exclude"];
    
	return $new_instance;
}

/**
 * The configuration form.
 */
function form($instance) {
?>
		<p>
			<label for="<?php echo $this->get_field_id("title"); ?>">
				<?php _e( 'Title' ); ?>:
				<input class="widefat" id="<?php echo $this->get_field_id("title"); ?>" name="<?php echo $this->get_field_name("title"); ?>" type="text" value="<?php echo esc_attr($instance["title"]); ?>" />
			</label>
		</p>
		
		<p>
			<label>
				<?php _e( 'Category' ); ?>:
				<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("cat"), 'selected' => $instance["cat"] ) ); ?>
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id("num"); ?>">
				<?php _e('列表帖子数'); ?>:
				<input style="text-align: center;" id="<?php echo $this->get_field_id("num"); ?>" name="<?php echo $this->get_field_name("num"); ?>" type="text" value="<?php echo absint($instance["num"]); ?>" size='3' />
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id("title_link"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("title_link"); ?>" name="<?php echo $this->get_field_name("title_link"); ?>"<?php checked( (bool) $instance["title_link"], true ); ?> />
				<?php _e( '分类链接' ); ?>
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id("excerpt"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("excerpt"); ?>" name="<?php echo $this->get_field_name("excerpt"); ?>"<?php checked( (bool) $instance["excerpt"], true ); ?> />
				<?php _e( '显示摘要' ); ?>
			</label>
		</p>
		
		<?php if ( function_exists("p75GetThumbnail") ) : ?>
		<p>
			<label for="<?php echo $this->get_field_id("thumbnail"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("thumbnail"); ?>" name="<?php echo $this->get_field_name("thumbnail"); ?>"<?php checked( (bool) $instance["thumbnail"], true ); ?> />
				<?php _e( 'Show post thumbnail' ); ?>
			</label>
		</p>
		<p>
			<label>
				<?php _e('Thumbnail dimensions'); ?>:<br />
				<label for="<?php echo $this->get_field_id("thumbnail_width"); ?>">
					W: <input class="widefat" style="width:40%;" type="text" id="<?php echo $this->get_field_id("thumbnail_width"); ?>" name="<?php echo $this->get_field_name("thumbnail_width"); ?>" value="<?php echo $instance["thumbnail_width"]; ?>" />
				</label>
				
				<label for="<?php echo $this->get_field_id("thumbnail_height"); ?>">
					H: <input class="widefat" style="width:40%;" type="text" id="<?php echo $this->get_field_id("thumbnail_height"); ?>" name="<?php echo $this->get_field_name("thumbnail_height"); ?>" value="<?php echo $instance["thumbnail_height"]; ?>" />
				</label>
			</label>
		</p>
		<?php endif; ?>

<?php

}

}

add_action( 'widgets_init', create_function('', 'return register_widget("interjcCategoryPosts");') );

?>