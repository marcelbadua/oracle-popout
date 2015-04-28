<?php
if(!class_exists('ORACLE_SLIDER_SHORTCODE'))
{
	class ORACLE_SLIDER_SHORTCODE
	{
        /**
         * Construct the plugin object
         */
        public function __construct()
        {
            // register actions
            add_shortcode( 'oracle_slider', array( &$this, 'shortcode_view_control' ));
            
        } // END public function __construct
        
        public function shortcode_view_control()
        {
            ob_start();
            include(sprintf("%s/../view/loop.php", dirname(__FILE__)));
            return ob_get_clean();
        }

    } // END class ORACLE_SLIDER_SHORTCODE
} // END if(!class_exists('ORACLE_SLIDER_SHORTCODE'))