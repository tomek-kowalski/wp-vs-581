<?php

/*

Copyright 2014 Dario Curvino (email : d.curvino@tiscali.it)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>
*/

if (!defined('ABSPATH')) {
    exit('You\'re not allowed to see this page');
} // Exit if accessed directly

/**
 * Return the html to print the metabox below the editor
 *
 * @author Dario Curvino <@dudo>
 * @since  3.0.6
 * Class YasrMetaboxBelowEditor
 */
class YasrMetaboxBelowEditor {

    /**
     * @author Dario Curvino <@dudo>
     * @since 3.0.6
     * @param $multi_set     bool|array|object|\stdClass[]|null
     * @param $n_multi_set   bool|int
     */
    public function printMetabox ($multi_set = false, $n_multi_set = false) {
        global $post;
        $post_id   = $post->ID;

        if($multi_set === false || $n_multi_set === false) {
            global $wpdb;

            $multi_set = YasrMultiSetData::returnMultiSetNames();
            $n_multi_set = $wpdb->num_rows; //wpdb->num_rows always store the count number of rows of the last query
        }

        $this->addMetaboxContent($post_id, $multi_set);

        ?>
        <div>
            <div style="display: table">
                <?php
                    //use this hook to add new tabs
                    do_action('yasr_metabox_below_editor_add_tab');
                ?>
            </div>

            <?php
                //Use this hook to add new content
                do_action('yasr_metabox_below_editor_content', $post_id, $multi_set, $n_multi_set);
            ?>

        </div>
        <?php
    }

    /**
     * Add action for schema and multiset tab and acontent
     *
     * @author Dario Curvino <@dudo>
     * @since  3.0.6
     * @param $post_id
     * @param $multi_set
     */
    public function addMetaboxContent($post_id, $multi_set) {
        // Add "Structured Data" tab
        add_action('yasr_metabox_below_editor_add_tab', array($this, 'addSchemaTab'),10);

        //add the content
        add_action('yasr_metabox_below_editor_content', array($this, 'metaboxSchema'), 10);

        //if multiset are used...
        if ($multi_set) {
            //add the tab
            add_action('yasr_metabox_below_editor_add_tab', array($this, 'addMultisetTab'), 20);

            //add the content
            add_action('yasr_metabox_below_editor_content', array($this, 'metaboxMultiset'),20, 3);
        }
    }

    /**
     * Html code for schema tab
     *
     * @author Dario Curvino <@dudo>
     * @since 3.0.6
     */
    public function addSchemaTab() {
        ?>
        <a href="#" id="yasr-metabox-below-editor-structured-data-tab" class="nav-tab nav-tab-active yasr-nav-tab">
            <?php esc_html_e('Structured Data', 'yet-another-stars-rating'); ?>
        </a>
        <?php
    }

    /**
     * Hook into yasr_metabox_below_editor_content and add multiset content
     *
     * @author Dario Curvino <@dudo>
     * @since  3.0.6
     */
    public function metaboxSchema() {
        ?>
        <div id="yasr-metabox-below-editor-structured-data" class="yasr-metabox-below-editor-content">
            <?php include(YASR_ABSOLUTE_PATH_ADMIN . '/editor/yasr-metabox-schema.php'); ?>
        </div>
        <?php
    }

    /**
     * Html code for multiset tab
     *
     * @author Dario Curvino <@dudo>
     * @since 3.0.6
     */
    public function addMultisetTab() {
        ?>
        <a href="#" id="yasr-metabox-below-editor-multiset-tab" class="nav-tab yasr-nav-tab">
            <?php esc_html_e('Multi Sets', 'yet-another-stars-rating'); ?>
        </a>
        <?php
    }

    /**
     * Hook into yasr_metabox_below_editor_content and add multiset content
     *
     * @author Dario Curvino <@dudo>
     * @since  3.0.6
     * @param $post_id
     * @param $multi_set
     */
    public function metaboxMultiset($post_id, $multi_set, $n_multi_set) {
        wp_nonce_field('yasr_nonce_save_multi_values_action',      'yasr_nonce_save_multi_values');
        wp_nonce_field('yasr_nonce_multiset_review_enabled_action','yasr_nonce_multiset_review_enabled');

        //this is always the first set id
        $set_id = $multi_set[0]->set_id;
        $set_id = (int)$set_id;

        ?>
        <div id="yasr-metabox-below-editor-multiset" class="yasr-metabox-below-editor-content" style="display:none">
            <?php
                if ($n_multi_set > 1) {
                    $this->printSelectMultiset($multi_set);
                } //End if ($n_multi_set>1)

                $this->printMultisetDiv($n_multi_set, $set_id, $post_id);
                $this->printMultisetProFeatures($post_id, $set_id);
            ?>
        </div>

        <?php
    }

    /**
     * Print HTML Select
     *
     * @author Dario Curvino <@dudo>
     * @since  3.0.6
     * @param $multi_set
     */
    private function printSelectMultiset($multi_set) {
        ?>
        <div style="margin-bottom: 15px">
            <?php esc_html_e("Choose which set you want to use", 'yet-another-stars-rating'); ?>
            <br />
            <label for="yasr_select_set">
                <select id="yasr_select_set" autocomplete="off">
                    <?php
                    foreach ($multi_set as $name) {
                        echo "<option value='".esc_attr($name->set_id)."'>".esc_attr($name->set_name)."</option>";
                    } //End foreach
                    ?>
                </select>
            </label>

            <span id="yasr-loader-select-multi-set" style="display:none;" >&nbsp;
            <img src="<?php echo esc_url(YASR_IMG_DIR . "/loader.gif") ?>" alt="yasr-loader">
        </span>
        </div>

        <?php
    }

    /**
     * Print the content of the Multiset Div
     *
     * @author Dario Curvino <@dudo>
     * @since  3.0.6
     * @param $n_multi_set
     * @param $set_id
     * @param $post_id
     */
    private function printMultisetDiv($n_multi_set, $set_id, $post_id) {
        ?>
        <div class="yasr-settings-row-48" style="justify-content: left;">
            <div id="yasr-editor-multiset-container"
                 data-nmultiset="<?php echo esc_attr($n_multi_set) ?>"
                 data-setid="<?php echo esc_attr($set_id) ?>"
                 data-postid="<?php echo esc_attr($post_id) ?>">

                <?php do_action('yasr_add_content_multiset_tab_top', $post_id, $set_id); ?>

                <input type="hidden" name="yasr_multiset_author_votes" id="yasr-multiset-author-votes" value="">
                <input type="hidden" name="yasr_multiset_id" id="yasr-multiset-id" value="<?php echo esc_attr($set_id) ?>">

                <table class="yasr_table_multi_set_admin" id="yasr-table-multi-set-admin">
                </table>

                <div class="yasr-multi-set-admin-explain">
                    <div>
                        <?php
                        $span = '<span title="'.esc_attr__('Copy Shortcode', 'yet-another-stars-rating').'">
                                <code id="yasr-editor-copy-readonly-multiset"
                                      class="yasr-copy-shortcode">[yasr_multiset setid=<span class="yasr-editor-multiset-id"></span>]</code>
                             </span>';

                        $text_multiset = sprintf(esc_html__( 'Rate each element, and copy this shortcode %s where you want to display this rating.',
                            'yet-another-stars-rating'), $span);

                        echo wp_kses_post($text_multiset);
                        ?>
                    </div>
                </div>

            </div>

            <div id="yasr-visitor-multiset-container">
                <table class="yasr_table_multi_set_admin" id="yasr-table-multi-set-admin-visitor">
                </table>

                <div class="yasr-multi-set-admin-explain">
                    <?php
                    esc_html_e( 'If, you want allow your visitor to vote on this multiset, use this shortcode',
                        'yet-another-stars-rating' );
                    ?>
                    <span title="<?php esc_attr_e('Copy Shortcode', 'yet-another-stars-rating') ?>">
                <code id="yasr-editor-copy-visitor-multiset"
                      class="yasr-copy-shortcode">[yasr_visitor_multiset setid=<span class="yasr-editor-multiset-id"></span>]</code>
            </span>

                    <br />
                    <?php esc_html_e('This is just a preview, you can\'t vote here.', 'yet-another-stars-rating');?>
                </div>
            </div>

        </div>

        <p></p>

        <?php
    }

    /**
     * Print the box below the multiset
     *
     * @author Dario Curvino <@dudo>
     * @since 3.0.6
     * @param $post_id
     * @param $set_id
     */
    private function printMultisetProFeatures($post_id, $set_id) {
        global $post;
        ?>
        <div style="width: 98%">
            <div class="yasr-metabox-editor-pro-only-box-padding">
                <div class="yasr-metabox-editor-title-pro-only">
                    <?php
                    esc_html_e('Pro Only features', 'yet-another-stars-rating');
                    echo '&nbsp;'.YASR_LOCKED_FEATURE;
                    ?>
                </div>

                <div class="yasr-settings-row">
                    <div class="yasr-settings-col-30">
                        <?php do_action('yasr_add_content_multiset_tab_pro', $post_id, $set_id); ?>

                        <div class="yasr-metabox-editor-title">
                            <?php
                                esc_html_e('Insert this Multi Set in the comment form?', 'yet-another-stars-rating');
                            ?>
                        </div>
                        <div class="yasr-onoffswitch-big" id="yasr-pro-multiset-review-switcher-container">
                            <input type="checkbox"
                                   name="yasr_pro_multiset_review_enabled"
                                   class="yasr-onoffswitch-checkbox"
                                   value='yes'
                                   id="yasr-pro-multiset-review-switcher"
                                <?php
                                //required to check !== otherwise setid=0 is checked even if not enabled
                                if ($post->yasr_pro_review_setid !== '' && (int)$post->yasr_pro_review_setid === $set_id) {
                                    echo " checked='checked' ";
                                }
                                echo YASR_LOCKED_FEATURE_HTML_ATTRIBUTE;
                                ?>
                            >
                            <label class="yasr-onoffswitch-label" for="yasr-pro-multiset-review-switcher">
                                <span class="yasr-onoffswitch-inner"></span>
                                <span class="yasr-onoffswitch-switch"></span>
                            </label>
                        </div>
                        <div class="yasr-element-row-container-description">
                            <?php
                            esc_html_e('By enabling this, all ratings fields will be mandatory.',
                                'yet-another-stars-rating')
                            ?>
                        </div>
                    </div>

                    <div class="yasr-settings-col-65">
                        <div class="yasr-metabox-editor-title">
                            <?php esc_html_e('Shortcodes', 'yet-another-stars-rating'); ?>
                        </div>

                        <div>
                            <span title="<?php esc_attr_e('Copy Shortcode', 'yet-another-stars-rating') ?>">
                                <code id="yasr-editor-copy-average-multiset" class="yasr-copy-shortcode">
                                    [yasr_pro_average_multiset setid=<span class="yasr-editor-multiset-id"></span>]</code>
                            </span>

                            <span>
                                <?php esc_html_e('Use this shortcode to print only the average of '); ?>
                                [yasr_multiset setid=<span class="yasr-editor-multiset-id"></span>]
                            </span>
                        </div>

                        <p></p>

                        <div>
                            <span title="<?php esc_attr_e('Copy Shortcode', 'yet-another-stars-rating') ?>">
                                <code id="yasr-editor-copy-average-vvmultiset" class="yasr-copy-shortcode">
                                [yasr_pro_average_visitor_multiset setid=<span class="yasr-editor-multiset-id"></span>]</code>
                            </span>

                            <span>
                                <?php esc_html_e('Use this shortcode to print only the average of '); ?>
                                [yasr_visitor_multiset setid=<span class="yasr-editor-multiset-id"></span>]
                            </span>
                        </div>

                        <p></p>

                        <div>
                            <span title="<?php esc_attr_e('Copy Shortcode', 'yet-another-stars-rating') ?>">
                                <code id="yasr-editor-copy-comments-multiset" class="yasr-copy-shortcode">
                                    [yasr_pro_average_comments_multiset setid=<span class="yasr-editor-multiset-id"></span>]</code>
                            </span>

                            <span>
                                <?php esc_html_e('This shortcode will print a Multi Set with all the ratings given through the comment form '); ?>
                            </span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <?php
    }
}