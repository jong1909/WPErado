<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
function jam_read_num_forvietnamese( $num = false ) {
    $str = '';
    $num  = trim($num);

    $arr = str_split($num);
    $count = count( $arr );

    $f = number_format($num);
    //KHÔNG ĐỌC BẤT KÌ SỐ NÀO NHỎ DƯỚI 999 ngàn
    if ( $count < 7 ) {
        $str = $num;
    } else {
        // từ 6 số trở lên là triệu, ta sẽ đọc nó !
        // "32,000,000,000"
        $r = explode(',', $f);
        switch ( count ( $r ) ) {
            case 4:
                $str = $r[0] . ' tỉ';
                if ( (int) $r[1] ) { $str .= ' '. $r[1] . ' Tr'; }
                break;
            case 3:
                $str = $r[0] . ' Triệu';
                if ( (int) $r[1] ) { $str .= ' '. $r[1] . 'K'; }
                break;
        }
    }
    return ( $str);
}
$filter_value_args = array(
    'check_price_filter' => true,
    'instance' => $instance,
    'queried_object' => get_queried_object()
);

$filter_value  = yit_get_filter_args( $filter_value_args );

if( ! empty( $prices ) ) : ?>
    <ul class="yith-wcan-list-price-filter">
        <?php foreach( $prices as $price ) : ?>
            <li class="price-item">
                <?php $is_active = yit_check_active_price_filter( $price['min'], $price['max'] ); ?>
                <?php
                if ( $is_active ) {
                    $filter_value = yit_remove_price_filter_query_args( $filter_value );
                }

                else {
                    $filter_value = array_merge( $filter_value, array( 'min_price' => $price['min'], 'max_price' => $price['max'] ) );
                }
                ?>
                <?php $link_class = $is_active ? 'yith-wcan-price-link active' : 'yith-wcan-price-link'; ?>
                <a class="<?php echo $link_class ?> yith-wcan-price-filter-list-link" href="<?php echo esc_url( add_query_arg( $filter_value, $shop_page_uri ) ) ?>">
                    <?php echo _x( 'Từ', 'Price filter option: price starts from', 'yith-woocommerce-ajax-navigation' ) . ' ' . jam_read_num_forvietnamese( $price['min'] ) . ' ' . _x( '-', 'Price filter option: price ends to', 'yith-woocommerce-ajax-navigation' ) . ' ' . jam_read_num_forvietnamese( $price['max'] );  ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>