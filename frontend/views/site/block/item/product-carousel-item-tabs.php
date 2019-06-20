<?php


	$products = array(
		array(
			'product_name' => 'Wireless Audio System Multiroom 360',
			'product_category' => 'Audio Speakers',
			'productImageURL' => '/images/products/3.jpg',
			'oldPrice'		=>'$2,299.00',
			'newPrice'		=>'$1,999.00',
			'price'			=>''


			),
		array(
			'product_name' => 'Tablet Thin EliteBook  Revolve 810 G6',
			'product_category' => 'Laptops',
			'productImageURL' => '/images/products/1.jpg',
			'oldPrice'		=>'',
			'newPrice'		=>'',
			'price'			=>'$1,999.00'



			),
		array(
			'product_name' => 'Purple Solo 2 Wireless',
			'product_category' => 'Headphones',
			'productImageURL' => '/images/products/5.jpg',
			'oldPrice'		=>'$2,299.00',
			'newPrice'		=>'$1,999.00',
			'price'			=>''


			),
		array(
			'product_name' => 'Tablet Red EliteBook  Revolve 810 G2',
			'product_category' => 'Laptops',
			'productImageURL' => '/images/products/2.jpg',
			'oldPrice'		=>'',
			'newPrice'		=>'',
			'price'			=>'$1,999.00'


			),
		array(
			'product_name' => 'White Solo 2 Wireless',
			'product_category' => 'Headphones',
			'productImageURL' => '/images/products/6.jpg',
			'oldPrice'		=>'$2,299.00',
			'newPrice'		=>'$1,999.00',
			'price'			=>''



			),
		array(
			'product_name' => 'Smartphone 6S 32GB LTE',
			'product_category' => 'Smartphones',
			'productImageURL' => '/images/products/4.jpg',
			'oldPrice'		=>'',
			'newPrice'		=>'',
			'price'			=>'$1,999.00'


			)
		);

		?>

		<div class="products owl-carousel home-v3-carousel-tabs products-carousel columns-4">
			<?php foreach($products as $product){
				//shuffle($products);
			?>

			<?php
				if ( empty( $loop ) ) {
					$loop = 0;
				}
				$loop++;
				$classes = '';
				if ( 0 === ( $loop - 1 ) % 4 || 1 === 4 ) {
					$classes = 'first';
				}
				if ( 0 === $loop % 4 ) {
					$classes = 'last';
				}
			?>

			<div class="product <?=$classes?>">
				<?php
                                echo $this->render('product.php',
                                        [
                                            'productCategories' => $product['product_category'],
                                           'productName' => $product['product_name'],
                                           'productImageURL' => $product['productImageURL'],
                                            'oldPrice' =>$product['oldPrice'],
                                            'newPrice' =>$product['newPrice'],
                                            'price' =>$product['price']
                                        ]);
                              ?>
			</div><!-- /.product -->
			<?php } ?>
		</div><!-- /.products -->

