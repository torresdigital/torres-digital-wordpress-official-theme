<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-140394692-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-140394692-1');
    </script>

    <meta name="google-site-verification" content="zQE-2Pv_zdBHks0QFN1VjRDW-WQC6qAe4pYnuWXR4zI" />
    <meta name="google-site-verification" content="at2jnP3JTE_BhDrSlBgtzyLr5-M-yfw7HzY4wPKzUqs" /><!-- atorres@*/ -->
    <link rel="alternate" href="https://torresdigital.tk/" hreflang="pt-br" />

    <!--

        <link rel="alternate" href="https://site.com.br/conteudo/" hreflang="pt-br" /> (OBS: indicando a versão em português do Brasil)
         <link rel="alternate" href="https://site.com.es/contenido/" hreflang="es" /> (OBS: indicando a versão em espanhol)
         <link rel="alternate" href="https://site.com/content/" hreflang="en" /> (OBS: indicando a versão em inglês).
            <link rel="alternate" href="https://site.com/content/" hreflang="x-default" />
        (OBS: indicando que, caso o usuário não tenha determinado idioma/região, essa é a página que deve ser apresentada)

    -->




    <style type ="text/css">



    /***************************/
/*start mobile menu overlay*/
/***************************/

/*************************/
/*end mobile menu overlay*/
/*************************/


    </style>



    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-2099794476693619",
            enable_page_level_ads: true
        });
    </script>












    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5F54FW');</script>
<!-- End Google Tag Manager -->


    <!--[if lt IE 9]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5shiv.js"></script>
    <![endif]-->

    <meta name="msvalidate.01" content="F9C90E00BD4564D0E17C680D6456AA3E" />

	<meta name="description" content="<?php bloginfo('description'); ?>">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Magnific Popup core CSS file -->
<link rel="stylesheet" href="magnific-popup/magnific-popup.css">

<!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="popup-video.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js"></script>

<!-- Magnific Popup core JS file -->
<script src="magnific-popup/jquery.magnific-popup.js"></script>

   <!-- WP_Head -->
    	<?php wp_head(); ?>
   <!-- /WP_Head -->
</head>

<body <?php body_class(); ?> >

    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v9.0&appId=1551462751835247&autoLogAppEvents=1" nonce="eaV1ucdd"></script>
    <div id="fb-root"></div>

<script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>

    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5F54FW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <div id="sudo-su" class="torres-digital sudo-su">


	<div id="wrap">
            <header id="header">
                <div class="container">
                    <div class="row">

                        <div class="ql_logo_nav col-md-9 col-xs-12">

                           <div id="menu-na-esquerda" class="menu-na-esquerda">
                                        <!-- Menu extra - Torres Digital-->
                                <div class="login_cart_wrap col-md-3 col-xs-12">
                                     <?php wp_nav_menu( array( 'theme_location' => 'top-menu' ) ); ?>
                                </div>
                                        <!-- //Menu extra - Torres Digital-->
                           </div>


                            <div class="login_cart_wrap col-md-3 col-xs-12">
                                 <div class="ql_cart_wrap">
                                    <button href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" class="ql_cart-btn">
                                        <?php echo wp_kses_post( WC()->cart->get_cart_total() ); ?>
                                        <span class="count">(<?php echo esc_html( WC()->cart->cart_contents_count );?>)</span>
                                        <i class="ql-bag"></i><i class="ql-chevron-down"></i>
                                    </button>

                                    <div id="ql_woo_cart">
                                        <?php global $woocommerce; ?>
                                        <?php the_widget('WC_Widget_Cart');  ?>
                                    </div><!-- /ql_woo_cart -->
                                </div>
                                <div class="login_btn_wrap">
                                    <?php if ( is_user_logged_in() ) { ?>
                                        <a class="ql_login-btn" href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" title="<?php esc_attr_e( 'My Account', 'shophistic-lite' ); ?>"><?php esc_html_e( 'My Account', 'shophistic-lite' ); ?></a>
                                     <?php }
                                     else { ?>
                                        <a class="ql_login-btn" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e( 'Login', 'shophistic-lite' ); ?>"><?php esc_html_e( 'Login', 'shophistic-lite' ); ?></a>
                                     <?php } ?>
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- col-md-4 -->

                        <div class="logo_container">
                            </div><!-- /logo_container -->

                            <!--  <a href="< ?php echo home_url(); ?>/" class="ql_logo google-font">
                                < ?php bloginfo('name'); ?> </a> -->
                               <!--  <button id="ql_nav_btn" type="button" class="navbar-ql_nav_btn collapsed" data-toggle="collapse" data-target="#ql-navigation" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                </button> -->


                        <div id="torres-digita-logo" class="torres-digita-logo">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                <img src="/wp-content/themes/torres-digital-wordpress-official-theme-master/img/logo22019.jpg" alt="Logo" width="138" height="156" />
                            </a>
                        </div>



                            <div class="collapse navbar-collapse" id="ql-navigation">
                                <nav id="jqueryslidemenu" class="jqueryslidemenu navbar" role="navigation">
                                    <?php
                                    if ( has_nav_menu( 'menu-1' ) ){
                                            wp_nav_menu( array(
                                            'theme_location'  => 'menu-1',
                                            'depth'             => 3,
                                            'menu_class'        => 'nav navbar-nav',
                                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                            'walker'            => new wp_bootstrap_navwalker()
                                        ));
                                    }else{
                                        echo "<ul id='nav' class='nav navbar-nav'>";
                                        wp_list_pages( array(
                                            'title_li'     => ''
                                            )
                                        );
                                        echo "</ul>";
                                    };
                                    ?>
                                </nav>
                            </div>
                            <div class="clearfix"></div>

                        </div><!-- col-md-8 -->

                        <?php
                       if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                        ?>
                        <?php } //if WooCommerce active ?>

                    </div><!-- row-->
                </div><!-- /container -->


    <div class="clearfix">
                                <div id="torres-digital-background-head" class="torres-digital-background-head"></div>                </div>
