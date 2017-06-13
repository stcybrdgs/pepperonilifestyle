<?php 

/* Social Links Widget! */
    class frindle_Social_Links extends WP_Widget { 
		function __construct() {
    parent::__construct(
            'frindle_Social_Links',
            __('Frindle Social Links', 'frindle'), // Name

            array(
        'description' => __('This widget will diplay your social media profile links with respective icon.', 'frindle'),
            
    )
    );
	}
	
	
	
	public function form($instance) {

        isset($instance['title']) ? $title = $instance['title'] : null;
        empty($instance['title']) ? $title = 'Follow Us' : null;
        $facebook = '';$twitter = '';$google = '';$linkedin = '';
        isset($instance['facebook']) ? $facebook = $instance['facebook'] : null;
        isset($instance['twitter']) ? $twitter = $instance['twitter'] : null;
        isset($instance['google']) ? $google = $instance['google'] : null;
        isset($instance['linkedin']) ? $linkedin = $instance['linkedin'] : null;
        ?>
		
		
		<!--the widget controller-->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','frindle'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
 
        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php esc_html_e('Facebook Page:','frindle'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" value="<?php echo esc_attr($facebook); ?>">
        </p>
 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php esc_html_e('Twitter:','frindle'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_attr($twitter); ?>">
        </p>
 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('google')); ?>"><?php esc_html_e('Google+ URL:','frindle'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('google')); ?>" name="<?php echo esc_attr($this->get_field_name('google')); ?>" type="text" value="<?php echo esc_attr($google); ?>">
        </p>
 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>"><?php esc_html_e('Linkedin URL:','frindle'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>">
        </p>
 
        <?php
    }

	
	
	public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? sanitize_text_field($new_instance['title']) : '';
        $instance['facebook'] = (!empty($new_instance['facebook']) ) ? esc_url_raw($new_instance['facebook']) : '';
        $instance['twitter'] = (!empty($new_instance['twitter']) ) ? esc_url_raw($new_instance['twitter']) : '';
        $instance['google'] = (!empty($new_instance['google']) ) ? esc_url_raw($new_instance['google']) : '';
        $instance['linkedin'] = (!empty($new_instance['linkedin']) ) ? esc_url_raw($new_instance['linkedin']) : '';
 
        return $instance;
    }

	
	
	public function widget($args, $instance) {
 
        $title = apply_filters('widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $google = $instance['google'];
        $linkedin = $instance['linkedin'];
 
// the profile link setup
        $facebook_profile = '<a class="facebook" href="' . esc_attr($facebook) . '"><i class="fa fa-facebook-square" style="font-size:30px"></i></a>';
        $twitter_profile = '<a class="twitter" href="' . esc_attr($twitter) . '"><i class="fa fa-twitter-square" style="font-size:30px"></i></a>';
        $google_profile = '<a class="google" href="' . esc_attr($google) . '"><i class="fa fa-google-plus-square" style="font-size:30px"></i></a>';
        $linkedin_profile = '<a class="linkedin" href="' . esc_attr($linkedin) . '"><i class="fa fa-linkedin-square" style="font-size:30px"></i></a>';
 
echo $args['before_widget'];
if (!empty($title)) {
		echo $args['before_title'] . $title . $args['after_title'];
}
	// output from here
        echo '<div class="social-icons">';
        echo (!empty($facebook) ) ? $facebook_profile : null;
        echo (!empty($twitter) ) ? $twitter_profile : null;
        echo (!empty($google) ) ? $google_profile : null;
        echo (!empty($linkedin) ) ? $linkedin_profile : null;
        echo '</div>';
        echo $args['after_widget'];
}



}
register_widget('frindle_Social_Links'); ?>
