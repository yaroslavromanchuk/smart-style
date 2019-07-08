<?php  echo $this->render('_search', ['model' => $model]); ?>
<?php
$script = <<< JS
        

						jQuery('.widget_electro_products_filter .widget .widget-title + .form-group ul').hideMaxListItems({
							'max': 3,
							'speed': 500,
							'moreText': "+",
							'lessText': "-",
						});
						if( jQuery('.widget_electro_products_filter > .widget').length == 0 ) {
						jQuery('.widget_electro_products_filter').hide();
						}
                                            
         
         jQuery("input[type='reset']").on("click", function(){
        alert('dfhdf');
        jQuery('#sears_cars input[type="checkbox":checked]').each(function(){
      jQuery(this).checked = false;  
                    });
            });
JS;


$this->registerJsFile('/js/hidemaxlistitem.min.js', ['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJs($script, yii\web\View::POS_READY);


