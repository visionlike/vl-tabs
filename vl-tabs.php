<?php
/*
Plugin Name: VisionLike - CSS Tabs
Plugin URI: 
Description: Full CSS Tabs with Shortcode. [tabbing][tab name="TITLE" check="1"]CONTENT[/tab][/tabbing]
Author: Dennis Gohdes
Version: 1.0
Author URI: http://visionlike.de/
*/

class vl_tabbing {

	var $tabbing = 1;
	var $tabbing_tab = 1;
	var $tabbing_tab_ani;
	var $tabbing_tab_width;
	var $tabbing_tab_left = 0;
	var $tabbing_tab_char_width;
	var $tabbing_tab_navi_font_size;

	public function __construct() {

		/* Add Adminpage */
		add_action('admin_init', array(&$this, 'admin_init'));
		add_action('admin_menu', array(&$this, 'add_menu'));	
		
		/* Add Custom Style */
		add_action('wp_head', array($this,'add_new_style'));
		add_action( 'admin_enqueue_scripts', array($this,'add_new_style'));

		/* Fix empty Paragraph in Shortcode */
		remove_filter( 'the_content', 'wpautop' );
		add_filter( 'the_content', 'wpautop' , 99);
		add_filter( 'the_content', 'shortcode_unautop',100);

		remove_filter( 'acf_the_content', 'wpautop' );
		add_filter( 'acf_the_content', 'wpautop' , 99);
		add_filter('acf_the_content', 'shortcode_unautop',100);

		/* Text Widget do Shortcode */
		add_filter('widget_text', 'do_shortcode');
		
		/* Nested Shortcodes */
		add_filter( 'the_content', 'do_shortcode' );	
		
		/* Add Shortcode Button */
		if(get_option('vl_tabbing_editor_button')) add_filter( 'mce_external_plugins', array($this,'vl_mce_external_plugins'));
		if(get_option('vl_tabbing_editor_button')) add_filter( 'mce_buttons_2', array($this,'vl_mce_buttons_2'));	
		
		/* Wrap Tab */
		add_shortcode('tabbing',array($this,'vl_tabbing'));

		/* Tab */
		add_shortcode('tab',array($this,'vl_tabbing_tab'));
		
		/* Add Settings Link */
		$plugin = plugin_basename(__FILE__);
		add_filter("plugin_action_links_$plugin", array( $this, 'plugin_settings_link' ));		
	
	}

	/* add custom style */
	function add_new_style($hook) {
		
		wp_enqueue_style( 'vl-tabbing', plugins_url( '/css/tabbing.css' , __FILE__ ) );
		wp_enqueue_style( 'vl-tabbing-tabicon', plugins_url( '/css/tabicon.css' , __FILE__ ) );
		if(get_option('vl_tabbing_animation_css')) wp_enqueue_style( 'vl-tabbing-animation', plugins_url( '/css/animate.min.css' , __FILE__ ) );
		if(get_option('vl_tabbing_style_css')) wp_enqueue_style( 'vl-tabbing-style', plugins_url( '/css/style.css' , __FILE__ ) );
		
	}
	
	/* Set Settings */
	public function admin_init() {
		$this->init_settings();
	}	
	
	/* Register the Settings */
	public function init_settings() {

		register_setting('vl_tabbing', 'vl_tabbing_default_animation');
		register_setting('vl_tabbing', 'vl_tabbing_animation_css', 'intval');
		register_setting('vl_tabbing', 'vl_tabbing_style_css', 'intval');
		register_setting('vl_tabbing', 'vl_tabbing_default_width');	
		register_setting('vl_tabbing', 'vl_tabbing_editor_button');
		register_setting('vl_tabbing', 'vl_tabbing_tab_title_char_with');
		
	}	
	
	/* Add Link to Settingspage */
    function plugin_settings_link($links) {
		$links['settings'] = '<a href="themes.php?page=vl_tabbing">'.__('Settings').'</a>';
        return $links; 
    }	
	
	/* Add Menu to Theme Menu */
	public function add_menu() {
		add_theme_page('VisionLike - CSS Tabs', 'VisionLike - CSS Tabs', 'manage_options', 'vl_tabbing', array(&$this, 'plugin_settings_page'));
	}

	/* Theme Settings Page */
	public function plugin_settings_page() {
		if(!current_user_can('manage_options'))
		{
			wp_die(__('You do not have sufficient permissions to access this page.'));
		}

		// Render the settings template
		include(dirname(__FILE__).'/settings.php');
	}	
	
	function vl_tabbing($atts,$content) {
		
		$default_animation = get_option('vl_tabbing_default_animation');
		$default_width = get_option('vl_tabbing_default_width');
		
		extract(shortcode_atts(array('width' => $default_width,'ani' => $default_animation, 'char_width' => '', 'navi_font_size' => ''),$atts));
		
		/* USE Animate.css by dan.eden@me.com - https://daneden.me

		bounce                     bounceOut                     fadeOutDown              rotateInDownLeft             zoomInRight
		flash                          bounceOutDown           fadeOutDownBig         rotateInDownRight           zoomInUp
		pulse                         bounceOutLeft              fadeOutLeft                 rotateInUpLeft                  zoomOut
		rubberBand              bounceOutRight             fadeOutLeftBig           rotateInUpRight                zoomOutDown
		shake                        bounceOutUp                fadeOutRight               rotateOut                          zoomOutLeft
		headShake               fadeIn                             fadeOutRightBig         rotateOutDownLeft          zoomOutRight
		swing                        fadeInDown                    fadeOutUp                  rotateOutDownRight        zoomOutUp
		tada                          fadeInDownBig              fadeOutUpBig              rotateOutUpLeft              slideInDown
		wobble                      fadeInLeft                       flipInX                          rotateOutUpRight             slideInLeft
		jello                           fadeInLeftBig                 flipInY                           hinge                                 slideInRight
		bounceIn                  fadeInRight                     flipOutX                       rollIn                                  slideInUp
		bounceInDown         fadeInRightBig               flipOutY                        rollOut                               slideOutDown
		bounceInLeft            fadeInUp                        lightSpeedIn                 zoomIn                             slideOutLeft
		bounceInRight          fadeInUpBig                  lightSpeedOut              zoomInDown                    slideOutRight
		bounceInUp              fadeOut                         rotateIn                         zoomInLeft                       slideOutUp
		
		*/
		
		if($content) {
			$this->tabbing_tab_width = $width;
			$this->tabbing_tab_ani = $ani;
			$this->tabbing_tab_char_width = $char_width;
			$this->tabbing_tab_navi_font_size = $navi_font_size;
			$new_content = '<div id="tabbing-'.$this->tabbing.'" class="tabbing" style="width:'.$width.'px;"><ul class="ultab">';
			$new_content .= do_shortcode($content);
			$new_content .= '</ul></div>';
			$this->tabbing++;
			
			$this->tabbing_tab_ani = '';
			$this->tabbing_tab_width = '';
			$this->tabbing_tab_left = 0;
			$this->tabbing_tab_char_width = 8;
			$this->tabbing_tab_navi_font_size = '';			
			return $new_content;
		}
		
	}

	function vl_tabbing_tab($atts,$content) {
		
		$tab_title_char_with = get_option('vl_tabbing_tab_title_char_with');
		$tab_title_char_with = ($tab_title_char_with) ? $tab_title_char_with : 8;
		$char_width = ($this->tabbing_tab_char_width) ? $this->tabbing_tab_char_width : $tab_title_char_with;
		$navi_font_size = ($this->tabbing_tab_navi_font_size) ? ' font-size:'.$this->tabbing_tab_navi_font_size.'px;' : '';		
		
		extract(shortcode_atts(array('name' => '','check' => ''),$atts));
		
		$id = $this->tabbing_tab;
		
		$labelwidth = strlen($name)*$char_width+20;
		
		$style = ' style="';
			if($this->tabbing_tab_width) $style .='width:'.$this->tabbing_tab_width.'px; ';
		$style .='"';
		
		$new_content = '<li class="litab"><input type="radio"'.(($check) ? ' checked' : '').' name="tabs'.$this->tabbing.'" id="tab'.$id.'"><label style="width:'.$labelwidth.'px; left:'.$this->tabbing_tab_left.'px; '.$navi_font_size.'" for="tab'.$id.'" class="labeltab">'.$name.'</label><div id="tab-content-'.$id.'" class="tab-content ct"'.$style.'>';
			if($this->tabbing_tab_ani) $new_content .= '<div class="vl-tabbing-animated '.$this->tabbing_tab_ani.'">';
				$new_content .= do_shortcode($content);
			if($this->tabbing_tab_ani) $new_content .= '</div>';
		$new_content .= '</div></li>';
		
		$this->tabbing_tab_left = $this->tabbing_tab_left+$labelwidth+1;
		$this->tabbing_tab++;
		return $new_content;
		
	}
	
	/* Add Shortcode Button */	
	function vl_mce_external_plugins( $plugin_array ) {
		$plugin_array['vl_button'] = plugins_url( '/js/shortcode.js' , __FILE__ );
		return $plugin_array;
	}

	function vl_mce_buttons_2( $buttons ) {
		if ( ! $pos = array_search( 'Redo', $buttons ) ) {
			array_push( $buttons, 'vl_button' );
			return $buttons;
		}

		$buttons = array_merge( array_slice( $buttons, 0, $pos ), array( 'vl_button' ), array_slice( $buttons, $pos ) );
		
		return $buttons;
	}

	/* activate */
	public static function activate() {
		
		add_option('vl_tabbing_default_animation', '');
		add_option('vl_tabbing_animation_css', '');
		add_option('vl_tabbing_style_css', 1);
		add_option('vl_tabbing_default_width', 700);
		add_option('vl_tabbing_editor_button', 1);
		add_option('vl_tabbing_tab_title_char_with', 8);
		
	}

	/* deactivate */
	public static function deactivate() {

		unregister_setting('vl_tabbing', 'vl_tabbing_default_animation');
		unregister_setting('vl_tabbing', 'vl_tabbing_animation_css', 'intval');
		unregister_setting('vl_tabbing', 'vl_tabbing_style_css', 'intval');
		unregister_setting('vl_tabbing', 'vl_tabbing_default_width');
		unregister_setting('vl_tabbing', 'vl_tabbing_editor_button');
		unregister_setting('vl_tabbing', 'vl_tabbing_tab_title_char_with');
		
		delete_option('vl_tabbing_default_animation');
		delete_option('vl_tabbing_animation_css');
		delete_option('vl_tabbing_style_css');
		delete_option('vl_tabbing_default_width');
		delete_option('vl_tabbing_editor_button');
		delete_option('vl_tabbing_tab_title_char_with');
	
	}	
	
}

if(class_exists('vl_tabbing')) {
	
    // Installation and uninstallation hooks
    register_activation_hook(__FILE__, array('vl_tabbing', 'activate'));
    register_deactivation_hook(__FILE__, array('vl_tabbing', 'deactivate'));

    // instantiate the plugin class
    $vl_tabbing = new vl_tabbing();
	
}

?>
