<?php
/**
 * Plugin Name: Talenavi
 * Description: Menampilkan semua kebutuhan website yang dibangun secara custom
 * Version: 1.0
 * Author: Anugra Dewa
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Registrasi block Gutenberg
function ec_register_countdown_block() {
    wp_register_script(
        'event-countdown-block',
        plugins_url( 'event-countdown.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-editor' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'event-countdown.js' )
    );

    register_block_type( 'ec/event-countdown', array(
        'editor_script' => 'event-countdown-block',
        'render_callback' => 'ec_render_countdown_block'
    ));
}
add_action( 'init', 'ec_register_countdown_block' );

// Enqueue CSS untuk countdown
function ec_enqueue_styles() {
    wp_enqueue_style(
        'event-countdown-style',
        plugins_url('event-countdown.css', __FILE__),
        array(),
        filemtime(plugin_dir_path(__FILE__) . 'event-countdown.css')
    );
}
add_action('wp_enqueue_scripts', 'ec_enqueue_styles');


// Render block di frontend
function ec_render_countdown_block( $attributes, $content ) {
    global $post;
    $event_datetime = get_post_meta( $post->ID, 'event_datetime', true );

    if ( ! $event_datetime ) {
        return '<p>Tanggal event belum ditentukan.</p>';
    }

    ob_start(); ?>
    <div id="countdown-<?php echo esc_attr($post->ID); ?>" class="event-countdown">
        <h3>Hitung mundur event</h3>
        <div class="countdown-box">
            <div class="countdown-item">
                <span class="days">-</span>
                <label>Hari</label>
            </div>
            <div class="countdown-item">
                <span class="hours">-</span>
                <label>Jam</label>
            </div>
            <div class="countdown-item">
                <span class="minutes">-</span>
                <label>Menit</label>
            </div>
            <div class="countdown-item">
                <span class="seconds">-</span>
                <label>Detik</label>
            </div>
        </div>
    </div>


    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var countdownElement = document.getElementById("countdown-<?php echo esc_attr($post->ID); ?>");
        if (!countdownElement) return;

        var eventDate = new Date("<?php echo date('Y-m-d H:i:s', strtotime($event_datetime)); ?>").getTime();

        var timer = setInterval(function() {
            var now = new Date().getTime();
            var distance = eventDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            countdownElement.querySelector(".days").innerHTML = days;
            countdownElement.querySelector(".hours").innerHTML = ("0" + hours).slice(-2);
            countdownElement.querySelector(".minutes").innerHTML = ("0" + minutes).slice(-2);
            countdownElement.querySelector(".seconds").innerHTML = ("0" + seconds).slice(-2);

            if (distance < 0) {
                clearInterval(timer);
                countdownElement.innerHTML = "<h3>Event sudah dimulai!</h3>";
            }
        }, 1000);
    });
    </script>
    <?php
    return ob_get_clean();
}
