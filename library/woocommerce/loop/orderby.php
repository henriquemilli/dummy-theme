<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}




?>
<!--
<div class="sherlock-filters">
	<div class="oderby-wrapper">
		<div class="product-search-filter-sort-heading"><?php _e('Order by', 'sherlock');?></div>
		<form class="sherlock-ordering" method="get">
			<div class="dropdown">
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
					<?php esc_attr_e( 'Shop order', 'woocommerce' ); ?>
				</button>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
					<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
						<li><a class="dropdown-item" href="<?php echo "?swoof=1&orderby=" . esc_attr( $id ); ?>"> <?php echo esc_html( $name ); ?> </a></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</form>
	</div>
	<?php 

	?>
</div>
-->