<?php
/**
 * This class manage admin notices
 *
 * @package WPIT Premiums plugins
 * @subpackage manage all admin notices
 */

if ( ! class_exists( Wpit_Messages ) ){

	class Wpit_Messages {

		/**
		 * Wpit_Messages::__construct()
		 * Locked down the constructor, therefore the class cannot be externally instantiated
		 *
		 * @param array $args various params some overidden by default
		 *
		 * @return
		 */
		public function __construct(  ) {


			add_action( 'admin_notices', array( $this, 'first_install' ) );
			add_action( 'admin_notices', array( $this, 'notice_1_2' ) );

		}

		/**
		 * notice function.
		 *
		 * @access public
		 * @return void
		 */
		public function first_install(){

			if ( ! is_array( get_option( 'wpit-stats-options' ) ) ){

		 		?>
    	<div class="notice updated">


    	    <p><?php
	    	    $wpit_blog_stats_admin_page = admin_url( 'options-general.php?page=wpit-stats-settings' );
	    	    printf( __( 'There are no stats yet. <a href="%s">Please, click here to create stats</a>', 'wpit-blog-stats' ), $wpit_blog_stats_admin_page );

	    	     ?></p>
    	</div>

    	<?php


			}
		}

 		public function notice_1_2(){

	 		if ( false == get_option( 'wpit-decimal' ) && is_array( get_option( 'wpit-stats-options' ) ) ) {

		 		?>
    	<div class="notice updated">


    	    <p><?php
	    	    $wpit_blog_stats_admin_page = admin_url( 'options-general.php?page=wpit-stats-settings' );
	    	    printf( __( 'Please, you have to recreate stats in order to display decimal in average comments. <a href="%s"> click here</a>', 'wpit-blog-stats' ), $wpit_blog_stats_admin_page );

	    	     ?></p>
    	</div>

    	<?php


			}

 		}

	}// chiudo la classe

	$wpit_messages = new Wpit_Messages();


 } //if ! class exist

