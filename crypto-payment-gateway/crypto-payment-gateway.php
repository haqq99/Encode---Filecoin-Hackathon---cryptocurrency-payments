<?php
/**
*Plugin name: Crypto Payment Gateway
*Description: With the growth of crypto-tokens and gradual adoption of thistechnology. Nerchants and Individuals are at best posiion to offer customers a stream of payments. This gateway is a hackathon project aimed to make crypto payments possible to merchants using any token on any chain.
*Author: Haqq & S29  
*Version: 0.01
*License: GPLV2
*Plugin URI: https://haqq.dreamoptimum.com/cp-gateway
*/
if (! defined('ABSPATH'))
{
    exit;
}

class CryptoPaymentGateway{


    public function __construct()
    {
        //add admin pages
        add_action('admin_menu',array($this,'add_admin_pages'));

        //create custom post type
        add_action('init',array($this,'create_custom_post_type'));
        
        //add assests(js,css)
        add_action('wp_enqueue_scripts',array($this,'enqueue'));

        //add shortcode
        add_shortcode('payment-button',array($this,'payment_shortcode'));

        //add settings menu
        add_filter('plugin_action_links_'.plugin_basename(__FILE__),array($this,'settings_link'));

        //payment JS
        //add_action('wp_footer',array($this,'load_scripts'));

        //Register API
        //add_action('rest_api_init',array($this, 'register_rest_api'));
        
        //register admin settings
        add_action('admin_init',array($this,'register_admin_settings'));

    }



    public function settings_link($links){
        //add custom settings link
	    $settings_link_1="<a href='mailto:abubakriibrahim19@gmail.com'>Support</a>";
	    $settings_link_2="<a href='admin.php?page=crypto_payment'>Settings</a>";
        array_push($links,$settings_link_1,$settings_link_2);
	    return $links;
    }

    public function add_admin_pages(){
        add_menu_page('Payment Gateway','Crypto Payment Gateway','manage_options','crypto_payment',array($this,'admins_index'),'dashicons-money-alt',20);
        
    }


    public function admins_index(){
        require_once plugin_dir_path(__FILE__).'templates/admins.php';
    }

    

    public function enqueue(){
            //enqueue attached files
            //wp_enqueue_style("the name you're assigning",plugins_url("stack location",__FILE__))
            wp_enqueue_style('pluginstyle',plugins_url('/assets/style.css',__FILE__));
            wp_enqueue_script('pluginscript',plugins_url('/assets/script.js',__FILE__));
    }

    public function payment_shortcode(){
            require_once plugin_dir_path(__FILE__).'gateway/payment-gateway.php';
        }

    public function register_admin_settings(){
            register_setting('formSettings','walletId');
    }

}
    new CryptoPaymentGateway();

