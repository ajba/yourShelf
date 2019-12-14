<?php
class BeRocket_AAPF_display_filters_update_button_type extends BeRocket_AAPF_display_filters_additional_type {
    public static $type_slug = 'update_button';
    public static $type_name;
    public static $needed_options = array(
        'title' => 'Update',
        'is_hide_mobile' => false
    );
    function init() {
        static::$type_name = __('Update Products button', 'BeRocket_AJAX_domain');
        parent::init();
    }
    public static function return_html($html, $additional) {
        $br_options = self::get_option();
        $set_query_var_title = array(
            'title'          => $additional['options']['title'],
            'uo'             => br_aapf_converter_styles( (empty($br_options['styles']) ? NULL : $br_options['styles']) ),
            'is_hide_mobile' => ( empty($additional['options']['is_hide_mobile']) ? '' : $additional['options']['is_hide_mobile'] )
        );
        set_query_var( 'berocket_query_var_title', $set_query_var_title );
        ob_start();
        br_get_template_part( 'widget_update_button' );
        return ob_get_clean();
    }
}
new BeRocket_AAPF_display_filters_update_button_type();

