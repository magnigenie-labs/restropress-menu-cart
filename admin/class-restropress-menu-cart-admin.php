<?php

class Restropress_Menu_Cart_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_filter( 'rpress_settings_general' , array( $this, 'menu_cart' ), 1, 1  );

		add_filter( 'rpress_settings_sections_general', array( $this, 'rpress_add_manu_settings' ) );
         
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Restropress_Menu_Cart_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Restropress_Menu_Cart_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/restropress-menu-cart-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Restropress_Menu_Cart_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Restropress_Menu_Cart_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/restropress-menu-cart-admin.js', array( 'jquery' ), $this->version, false );

	}


	public function menu_cart( $general_settings ) {
		$general_settings['menu']['menu_cart_heading'] = array(
            'id'            => 'menu_cart_heading',
            'class'         => 'menu_cart_heading',
            'name'          => '<h3>' . __( ' Menu Cart Setting', 'rp-menu-cart' ) . '</h3>',
            'desc'          => '',
            'type'          => 'header',
            'tooltip_title' => __( ' Menu Cart Setting', 'rp-menu-cart' ),
        );
		$general_settings['menu']['display_cart_content'] = array(
            'id'            => 'enable_menu_cart',
            'name'          =>  __( 'Enable Menu Cart', 'rp-menu-cart' ),
            'desc'          => '',
            'type'          => 'checkbox',
        );
         
		$general_settings['menu']['always_display_cart'] = array(
            'id'            => 'always_display_cart',
            'name'          =>  __( ' Always display cart,if it empty ', 'rp-menu-cart' ),
            'desc'          => '',
            'type'          => 'checkbox',
        );

		$general_settings['menu']['display_icon'] = array(
            'id'            => 'display_icon',
            'class'         => 'display_icon',
            'name'          =>  __( '  Choose a cart icon. ', 'rp-menu-cart' ),
            'desc'          => '',
            'type'          => 'radio',
			'options' => array(
				'1'         	=> __( 'icon 1', 'rp-menu-cart' ),
				'2'            	=> __( 'icon 2', 'rp-menu-cart' ),
				'3'            	=> __( 'icon 3', 'rp-menu-cart' ),
				'4'			   	=> __( 'icon 4', 'rp-menu-cart' ),
				'5'				=> __( 'icon 5', 'rp-menu-cart' ),
		    ),
        );
 
		 
		$general_settings['menu']['display_menu'] = array(
            'id'            => 'display_menu',
            'class'         => 'display_menu',
            'name'          =>  __( ' What would you like to display in the menu? ', 'rp-menu-cart' ),
            'desc'          => '',
            'type'          => 'radio',
			'options' => array(
                'items-only'            => __( 'Items Only', 'rp-menu-cart' ),
                'price-only'            => __( 'Price Only', 'rp-menu-cart' ),
                'both-items-price'      => __( 'Both Items and Price', 'rp-menu-cart' ),
            ),
        );
	
		return $general_settings;
	}	


	public function rpress_add_manu_settings( $section ) {
		$section['menu'] = __( 'Menu Cart', 'rpress-menu' );
		return $section;
	}
    
}
