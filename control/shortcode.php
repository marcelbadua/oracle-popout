<?php
if(!class_exists('ORACLE_POPUP_SHORTCODE'))
{
    class ORACLE_POPUP_SHORTCODE
    {
        /**
         * Construct the plugin object
         */
        public function __construct()
        {
            // register actions
            //[oracle_popup]content[/oracle_popup]
            add_shortcode( 'oracle_popup', array( &$this, 'shortcode_function' ));
            
        } // END public function __construct
        
        public function shortcode_function($atts, $content = null)
        {
            ob_start();
            ?>
            
            <style>
                #popupMessage {
                    display: none;
                    position: fixed;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    left: 0;
                    background-color: rgba(0, 0, 0 , 0.85);
                    z-index: 9999;
                }
                #popupMessage.show{
                    display: block;
                }
                #popupMessage .popupBox{
                    position: relative;
                    background-color: #FFFFFF;
                    width: 600px;
                    min-width: 600px;
                    min-height: 400px;
                    margin: 120px auto 0;
                    color: #333;
                }
                #popupMessage .close {
                    text-align: center;
                }
                #popupMessage .close a{
                    color: #CCCCCC;
                    font-size: 12px;
                    text-decoration: none;
                }
            </style>
            <div id="popupMessage" class="wrap">
                <div class="popupBox">
                    <?php echo $content ; ?>
                </div>
                <div class="close" data-toggle="closePopup"><a href="javascript:void();">Close this message</a></div>
            </div>
            <script>
            
            (function($) {
                
                "use strict";
                
		$(document).ready(function() {
		    var yetVisited = localStorage['visited'];
		    if (!yetVisited) {
    		        $("#popupMessage").addClass('show').prependTo("body");
		        localStorage['visited'] = "yes";
		    }
		});

                $('*[data-toggle="closePopup"]').click(function() {
                
                    $( '#popupMessage' ).removeClass('show');
                });
    
            })(jQuery);
                
            </script>
            
            <?php
            
            return ob_get_clean();

        }

    } // END class ORACLE_POPUP_SHORTCODE
} // END if(!class_exists('ORACLE_POPUP_SHORTCODE'))