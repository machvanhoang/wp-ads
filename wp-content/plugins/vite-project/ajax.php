<?php
// wp_ajax get Social
add_action('wp_ajax_get_social', function () {
    $socials = get_option('ads_social', [
        'facebook' => null,
        'instagram' => null,
        'twitter' => null,
        'youtube' => null
    ]);
    wp_send_json([
        'success' => true,
        'message' => 'Get social successfully !!!',
        'result' => $socials
    ]);
    wp_die();
});
// wp_ajax save Social
function saveSocial()
{
    try {
        $data = [];
        $data['facebook'] = esc_url($_POST['facebook']);
        $data['instagram'] = esc_url($_POST['instagram']);
        $data['twitter'] = esc_url($_POST['twitter']);
        $data['youtube'] = esc_url($_POST['youtube']);
        if (get_option('ads_social')) {
            update_option('ads_social', $data);
        } else {
            add_option('ads_social', $data);
        }
        wp_send_json([
            'success' => true,
            'message' => 'Update social successfully !!!',
            'result' => $data
        ]);
        wp_die();
    } catch (\Throwable $th) {
        wp_send_json([
            'success' => false,
            'message' => 'Update social wrong !!!',
        ]);
        wp_die();
    }
}
add_action('wp_ajax_save_social', 'saveSocial');


// wp_ajax get Configs
add_action('wp_ajax_get_configs', function () {
    $configs = get_option('ads_configs', [
        'address' => null,
        'email' => null,
        'hotline' => null,
        'phone' => null,
        'zalo' => null,
        'website' => null,
        'fanpage' => null,
        'slogan' => null,
        'iframe' => null,
        'google_analytics' => null,
        'google_mastertool' => null,
        'head_js' => null,
        'body_js' => null,
    ]);
    wp_send_json([
        'success' => true,
        'message' => 'Get configs successfully !!!',
        'result' => $configs
    ]);
    wp_die();
});
// wp_ajax save Configs
function saveConfigs()
{
    try {
        $configs = $_POST['configs'];
        if (get_option('ads_configs')) {
            update_option('ads_configs', $configs);
        } else {
            add_option('ads_configs', $configs);
        }
        wp_send_json([
            'success' => true,
            'message' => 'Update configs successfully !!!',
            'result' => $configs,
        ]);
        wp_die();
    } catch (\Throwable $th) {
        wp_send_json([
            'success' => false,
            'message' => 'Update configs wrong !!!',
        ]);
        wp_die();
    }
}
add_action('wp_ajax_save_configs', 'saveConfigs');
