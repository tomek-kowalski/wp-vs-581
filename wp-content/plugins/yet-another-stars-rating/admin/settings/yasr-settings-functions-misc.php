<?php

if ( !defined( 'ABSPATH' ) ) {
    exit( 'You\'re not allowed to see this page' );
}
// Exit if accessed directly
/**Drow settings tab*/
function yasr_settings_tabs( $active_tab )
{
    ?>

    <h2 class="nav-tab-wrapper yasr-no-underline">

        <a href="?page=yasr_settings_page&tab=general_settings"
           id="general_settings"
           class="nav-tab <?php 
    if ( $active_tab === 'general_settings' ) {
        echo  'nav-tab-active' ;
    }
    ?>">
            <?php 
    esc_html_e( 'General Settings', 'yet-another-stars-rating' );
    ?>
        </a>

        <a href="?page=yasr_settings_page&tab=style_options"
           id="style_options"
           class="nav-tab <?php 
    if ( $active_tab === 'style_options' ) {
        echo  'nav-tab-active' ;
    }
    ?>">
            <?php 
    esc_html_e( 'Aspect & Styles', 'yet-another-stars-rating' );
    ?>
        </a>

        <a href="?page=yasr_settings_page&tab=manage_multi"
           id="manage_multi"
           class="nav-tab <?php 
    if ( $active_tab === 'manage_multi' ) {
        echo  'nav-tab-active' ;
    }
    ?>">
            <?php 
    esc_html_e( 'Multi Sets', 'yet-another-stars-rating' );
    ?>
        </a>

        <a href="?page=yasr_settings_page&tab=rankings"
           id="rankings"
           class="nav-tab <?php 
    if ( $active_tab === 'rankings' ) {
        echo  'nav-tab-active' ;
    }
    ?>">
            <?php 
    esc_html_e( "Rankings", 'yet-another-stars-rating' );
    ?>
        </a>

        <?php 
    do_action( 'yasr_add_settings_tab', $active_tab );
    $rating_plugin_exists = new YasrImportRatingPlugins();
    
    if ( $rating_plugin_exists->yasr_search_wppr() || $rating_plugin_exists->yasr_search_rmp() || $rating_plugin_exists->yasr_search_kksr() || $rating_plugin_exists->yasr_search_mr() ) {
        ?>
            <a href="?page=yasr_settings_page&tab=migration_tools"
               id="migration_tools"
               class="nav-tab <?php 
        if ( $active_tab === 'migration_tools' ) {
            echo  'nav-tab-active' ;
        }
        ?>">
                <?php 
        esc_html_e( "Migration Tools", 'yet-another-stars-rating' );
        ?>
            </a>
            <?php 
    }
    
    ?>

    </h2>

    <?php 
}

/**
 * Return the description of auto insert
 *
 * @author Dario Curvino <@dudo>
 * @since  2.6.6
 * @return string
 */
function yasr_description_auto_insert()
{
    $name = esc_html__( 'Auto Insert Options', 'yet-another-stars-rating' );
    $div_desc = '<div class="yasr-settings-description">';
    $description = sprintf( esc_html__( 'Automatically adds YASR in your posts or pages. %s
            Disable this if you prefer to use shortcodes.', 'yet-another-stars-rating' ), '<br />' );
    $end_div = '</div>';
    return $name . $div_desc . $description . $end_div;
}

/**
 * @author Dario Curvino <@dudo>
 * @since  2.6.6
 *
 * @return string
 */
function yasr_description_stars_title()
{
    $name = esc_html__( 'Enable stars next to the title?', 'yet-another-stars-rating' );
    $div_desc = '<div class="yasr-settings-description">';
    $description = esc_html__( 'Enable this if you want to show stars next to the title.', 'yet-another-stars-rating' );
    $description .= '<br />';
    $description .= esc_html__( 'Please note that this may not work with all themes', 'yet-another-stars-rating' );
    $end_div = '.</div>';
    return $name . $div_desc . $description . $end_div;
}

/**
 * @author Dario Curvino <@dudo>
 * @since  2.6.6
 * @return string
 */
function yasr_description_archive_page()
{
    $name = esc_html__( 'Archive Pages', 'yet-another-stars-rating' );
    $div_desc = '<div class="yasr-settings-description">';
    $description = esc_html__( 'Enable or disable these settings if you want to show ratings in archive pages (categories, tags, etc.)', 'yet-another-stars-rating' );
    $end_div = '.</div>';
    return $name . $div_desc . $description . $end_div;
}

/**
 * @author Dario Curvino <@dudo>
 * @since  2.6.6
 * @return string
 */
function yasr_description_vv_stats()
{
    $name = esc_html__( 'Show stats for visitors votes?', 'yet-another-stars-rating' );
    $div_desc = '<div class="yasr-settings-description">';
    $description = sprintf( esc_html__( 'Enable or disable the chart bar icon (and tooltip hover it) next to the %syasr_visitor_votes%s shortcode', 'yet-another-stars-rating' ), '<em>', '</em>' );
    $end_div = '.</div>';
    return $name . $div_desc . $description . $end_div;
}

/**
 * @author Dario Curvino <@dudo>
 * @since  2.6.6
 * @return string
 */
function yasr_description_allow_vote()
{
    $name = esc_html__( 'Who is allowed to vote?', 'yet-another-stars-rating' );
    $div_desc = '<div class="yasr-settings-description">';
    $description = sprintf(
        esc_html__( 'Select who can rate your posts for %syasr_visitor_votes%s and %syasr_visitor_multiset%s shortcodes', 'yet-another-stars-rating' ),
        '<em>',
        '</em>',
        '<em>',
        '</em>'
    );
    $end_div = '.</div>';
    return $name . $div_desc . $description . $end_div;
}

/**
 * @author Dario Curvino <@dudo>
 * @since  2.6.6
 * @return string
 */
function yasr_description_cstm_txt()
{
    $name = esc_html__( 'Customize strings', 'yet-another-stars-rating' );
    $div_desc = '<div class="yasr-settings-description">';
    $description = '<p>' . esc_html__( 'Customize YASR strings.', 'yet-another-stars-rating' ) . '</p>';
    $end_div = '</div>';
    return $name . $div_desc . $description . $end_div;
}

/**
 * @author Dario Curvino <@dudo>
 * @since  2.6.6
 * @return string
 */
function yasr_description_strucutured_data()
{
    $name = esc_html__( 'Stuctured data options', 'yet-another-stars-rating' );
    $div_desc = '<div class="yasr-settings-description">';
    $description = esc_html__( 'If ratings in a post or page are found, YASR will create structured data to show them in search results
    (SERP)', 'yet-another-stars-rating' );
    $description .= '<br /><a href="https://yetanotherstarsrating.com/docs/rich-snippet/reviewrating-and-aggregaterating/?utm_source=wp-plugin&utm_medium=settings_resources&utm_campaign=yasr_settings&utm_content=yasr_rischnippets_desc"
                        target="_blank">';
    $description .= esc_html__( 'More info here', 'yet-another-stars-rating' );
    $description .= '</a>';
    $end_div = '.</div>';
    return $name . $div_desc . $description . $end_div;
}

function yasr_upgrade_pro_box()
{
    
    if ( yasr_fs()->is_free_plan() ) {
        ?>

        <div class="yasr-donatedivdx">
            <h2 class="yasr-donate-title" style="color: #34A7C1">
                <?php 
        esc_html_e( 'Upgrade to YASR Pro', 'yet-another-stars-rating' );
        ?>
            </h2>
            <div class="yasr-upgrade-to-pro">
                <ul>
                    <li><strong><?php 
        esc_html_e( ' User Reviews', 'yet-another-stars-rating' );
        ?></strong></li>
                    <li><strong><?php 
        esc_html_e( ' Custom Rankings', 'yet-another-stars-rating' );
        ?></strong></li>
                    <li><strong><?php 
        esc_html_e( ' 20 + ready to use themes', 'yet-another-stars-rating' );
        ?></strong></li>
                    <li><strong><?php 
        esc_html_e( ' Upload your own theme', 'yet-another-stars-rating' );
        ?></strong></li>
                    <li><strong><?php 
        esc_html_e( ' Dedicate support', 'yet-another-stars-rating' );
        ?></strong></li>
                    <li><strong><?php 
        esc_html_e( ' ...And much more!!', 'yet-another-stars-rating' );
        ?></strong></li>
                </ul>
                <a href="<?php 
        echo  esc_url( yasr_fs()->get_upgrade_url() ) ;
        ?>">
                    <button class="button button-primary">
                        <span style="font-size: large; font-weight: bold;">
                            <?php 
        esc_html_e( 'Upgrade Now', 'yet-another-stars-rating' );
        ?>
                        </span>
                    </button>
                </a>
                <div style="display: block; margin-top: 10px; margin-bottom: 10px; ">
                 --- or ---
                </div>
                <a href="<?php 
        echo  esc_url( yasr_fs()->get_trial_url() ) ;
        ?>">
                    <button class="button button-primary">
                        <span style="display: block; font-size: large; font-weight: bold; margin: -3px;">
                            <?php 
        esc_html_e( 'Start Free Trial', 'yet-another-stars-rating' );
        ?>
                        </span>
                        <span style="display: block; margin-top: -10px; font-size: smaller;">
                             <?php 
        esc_html_e( 'No credit-card, risk free!', 'yet-another-stars-rating' );
        ?>
                        </span>
                    </button>
                </a>
            </div>
        </div>

        <?php 
    }

}

/*
 *   Add a box on with the resouces
 *   Since version 1.9.5
 *
*/
function yasr_resources_box()
{
    ?>

    <div class='yasr-donatedivdx' id='yasr-resources-box'>
        <div class="yasr-donate-title">Resources</div>
        <div class="yasr-donate-single-resource">
            <span class="dashicons dashicons-star-filled" style="color: #6c6c6c"></span>
            <a target="blank" href="https://yetanotherstarsrating.com/?utm_source=wp-plugin&utm_medium=settings_resources&utm_campaign=yasr_settings&utm_content=yasr_official">
                <?php 
    esc_html_e( 'YASR official website', 'yet-another-stars-rating' );
    ?>
            </a>
        </div>
        <div class="yasr-donate-single-resource">
            <img src="<?php 
    echo  esc_attr( YASR_IMG_DIR . 'github.svg' ) ;
    ?>"
                 width="20" height="20" alt="github logo" style="vertical-align: bottom;">
            <a target="blank" href="https://github.com/Dudo1985/yet-another-stars-rating">
                GitHub Page
            </a>
        </div>
        <div class="yasr-donate-single-resource">
            <span class="dashicons dashicons-edit" style="color: #6c6c6c"></span>
            <a target="blank" href="https://yetanotherstarsrating.com/docs/?utm_source=wp-plugin&utm_medium=settings_resources&utm_campaign=yasr_settings&utm_content=documentation">
                <?php 
    esc_html_e( 'Documentation', 'yet-another-stars-rating' );
    ?>
            </a>
        </div>
        <div class="yasr-donate-single-resource">
            <span class="dashicons dashicons-book-alt" style="color: #6c6c6c"></span>
            <a target="blank" href="https://yetanotherstarsrating.com/docs/faq/?utm_source=wp-plugin&utm_medium=settings_resources&utm_campaign=yasr_settings&utm_content=faq">
                <?php 
    esc_html_e( 'F.A.Q.', 'yet-another-stars-rating' );
    ?>
            </a>
        </div>
        <div class="yasr-donate-single-resource">
            <span class="dashicons dashicons-video-alt3" style="color: #6c6c6c"></span>
            <a target="blank" href="https://www.youtube.com/channel/UCU5jbO1PJsUUsCNbME9S-Zw">
                <?php 
    esc_html_e( 'Youtube channel', 'yet-another-stars-rating' );
    ?>
            </a>
        </div>
        <div class="yasr-donate-single-resource">
            <span class="dashicons dashicons-smiley" style="color: #6c6c6c"></span>
            <a target="blank" href="https://yetanotherstarsrating.com/#yasr-pro?utm_source=wp-plugin&utm_medium=settings_resources&utm_campaign=yasr_settings&utm_content=yasr-pro">
                Yasr Pro
            </a>
        </div>
    </div>

    <?php 
}

/**
 * Adds buy a cofee box
 *
 * @author Dario Curvino <@dudo>
 */
function yasr_buy_cofee()
{
    $buymecofeetext = esc_html__( 'Coffee is vital to make YASR development going on!', 'yet-another-stars-rating' );
    $buymecofeetext .= '<br />';
    
    if ( yasr_fs()->is_free_plan() ) {
        $buymecofeetext .= esc_html__( 'If you are enjoying YASR, and you don\'t need the pro version, please consider to buy me a coffee, thanks!', 'yet-another-stars-rating' );
    } else {
        $buymecofeetext .= esc_html__( 'If you are enjoying YASR, please consider to buy me a coffee, thanks!', 'yet-another-stars-rating' );
    }
    
    $div = "<div class='yasr-donatedivdx' id='yasr-buy-cofee'>";
    $text = '<div class="yasr-donate-title">' . __( 'Buy me a coffee!', 'yet-another-stars-rating' ) . '</div>';
    $text .= '<div style="text-align: center">';
    $text .= '<a href="https://www.paypal.com/donate/?hosted_button_id=SVTAVUF62QZ4W" target="_blank">
                <img src="' . YASR_IMG_DIR . '/button_paypal.png" alt="paypal" width="200">
              </a>';
    $text .= '</div>';
    $text .= '<div style="margin-top: 15px;">';
    $text .= $buymecofeetext;
    $text .= '</div>';
    $div_and_text = $div . $text . '</div>';
    echo  wp_kses_post( $div_and_text ) ;
}

/**
 * Show related plugins
 *
 * @author Dario Curvino <@dudo>
 */
function yasr_related_plugins()
{
    $div = "<div class='yasr-donatedivdx' id='yasr-related-plugins'>";
    $text = '<div class="yasr-donate-title">' . esc_html__( 'You may also like...', 'yet-another-stars-rating' ) . '</div>';
    $text .= yasr_movie_helper();
    $text .= '<hr />';
    $text .= yasr_cnrt();
    $div_and_text = $div . $text . '</div>';
    echo  wp_kses_post( $div_and_text ) ;
}

/**
 * @author Dario Curvino <@dudo>
 * @since 2.9.3
 * @return string
 */
function yasr_movie_helper()
{
    $movie_helper_description = esc_html__( 'Movie Helper allows you to easily add links to movie and tv shows, just by searching
    them while you\'re writing your content. Search, click, done!', 'yet-another-stars-rating' );
    $text = '<div style="text-align: center">';
    $text .= '<a href="https://wordpress.org/plugins/yet-another-movie/" target="_blank">
                <img src="' . esc_attr( YASR_IMG_DIR ) . '/movie_helper.svg" alt="Movie Helper" >
              </a>';
    $text .= '</div>';
    $text .= '<div style="margin-top: 15px;">';
    $text .= $movie_helper_description;
    $text .= '</div>';
    return $text;
}

/**
 * @author Dario Curvino <@dudo>
 * @since 2.9.3
 * @return string
 */
function yasr_cnrt()
{
    $text = '<div style="text-align: center">';
    $text .= '<a href="https://wordpress.org/plugins/comments-not-replied-to/">';
    $text .= '<img src="' . esc_attr( YASR_IMG_DIR ) . '/cnrt.png" alt="cnrt" width="110">';
    $text .= '<div>Comments Not Replied To</div>';
    $text .= '</a>';
    $text .= '</div>';
    $text .= '<div style="margin-top: 15px;">';
    $text .= esc_html__( '"Comments Not Replied To" introduces a new area in the administrative dashboard that allows you to
        see what comments to which you - as the site author - have not yet replied.', 'yet-another-stars-rating' );
    $text .= '</div>';
    return $text;
}

/** Add a box on the right for asking to rate 5 stars on Wordpress.org
 *   Since version 0.9.0
 */
function yasr_ask_rating()
{
    $div = "<div class='yasr-donatedivdx' id='yasr-ask-five-stars'>";
    $text = '<div class="yasr-donate-title">' . esc_html__( 'Can I ask your help?', 'yet-another-stars-rating' ) . '</div>';
    $text .= '<div style="font-size: 32px; color: #F1CB32; text-align:center; margin-bottom: 20px; margin-top: -5px;">
                <span class="dashicons dashicons-star-filled" style="font-size: 26px;"></span>
                <span class="dashicons dashicons-star-filled" style="font-size: 26px;"></span>
                <span class="dashicons dashicons-star-filled" style="font-size: 26px;"></span>
                <span class="dashicons dashicons-star-filled" style="font-size: 26px;"></span>
                <span class="dashicons dashicons-star-filled" style="font-size: 26px;"></span>
            </div>';
    $text .= esc_html__( 'Please rate YASR 5 stars on', 'yet-another-stars-rating' );
    $text .= ' <a href="https://wordpress.org/support/view/plugin-reviews/yet-another-stars-rating?filter=5">
        WordPress.org.</a><br />';
    $text .= esc_html__( ' It will require just 1 min but it\'s a HUGE help for me. Thank you.', 'yet-another-stars-rating' );
    $text .= "<br /><br />";
    $text .= "<em>> Dario Curvino</em>";
    $div_and_text = $div . $text . '</div>';
    echo  wp_kses_post( $div_and_text ) ;
}

/**
 * @author Dario Curvino <@dudo>
 * @since 1.9.5
 */
function yasr_right_settings_panel()
{
    do_action( 'yasr_right_settings_panel_box' );
    yasr_upgrade_pro_box();
    yasr_resources_box();
    yasr_buy_cofee();
    yasr_related_plugins();
    yasr_ask_rating();
}

/** Change default admin footer on yasr settings pages
 *  $text is the default wordpress text
 *  Since 0.8.9
 */
add_filter( 'admin_footer_text', 'yasr_custom_admin_footer' );
function yasr_custom_admin_footer( $text )
{
    
    if ( isset( $_GET['page'] ) ) {
        $yasr_page = $_GET['page'];
        
        if ( $yasr_page === 'yasr_settings_page' || $yasr_page === 'yasr_stats_page' ) {
            $custom_text = ' | <i>';
            $custom_text .= sprintf(
                esc_html__( 'Thank you for using %s. Please %s rate it%s 5 stars on %s', 'yet-another-stars-rating' ),
                '<a href="https://yetanotherstarsrating.com/?utm_source=wp-plugin&utm_medium=footer&utm_campaign=yasr_settings"
                            target="_blank">Yet Another Stars Rating</a>',
                '<a href="https://wordpress.org/support/view/plugin-reviews/yet-another-stars-rating?filter=5" target="_blank">',
                '</a>',
                '<a href="https://wordpress.org/support/view/plugin-reviews/yet-another-stars-rating?filter=5" target="_blank">
                    WordPress.org</a>'
            );
            $custom_text .= '</i>';
            return $text . $custom_text;
        }
        
        return $text;
    }
    
    return $text;
}

/**
 * Return true if tidy is installed and version is later than 25 Nov 2017, false otherwise
 *
 * @author Dario Curvino <@dudo>
 * @since  3.0.5
 * @return bool
 */
function yasr_is_tidy_installed()
{
    
    if ( extension_loaded( 'tidy' ) ) {
        $tidy_release_date = strtotime( tidy_get_release() );
        $tidy_working_release_date = strtotime( '2017/11/25' );
        if ( $tidy_release_date >= $tidy_working_release_date ) {
            return true;
        }
    }
    
    return false;
}
