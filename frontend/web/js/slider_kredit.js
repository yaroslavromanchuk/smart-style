 $(document).ready(function() {
     
          $("#slider").slider({
              create: function() {
        update(1,$( this ).slider( "value" ));
        },
              animate: true,
              value:25,
              min: 25,
              max: 70,
              step: 5,
              slide: function(event, ui) {
                  update(1,ui.value); //changed
              }
          });

          $("#slider2").slider({
               create: function() {
        update(2,$( this ).slider( "value" ));
        },
              animate: true,
              value:12,
              min: 12,
              max: 72,
              step: 1,
              slide: function(event, ui) {
                  update(2,ui.value); //changed
              }
          });

          //Added, set initial value.
          var $vnesok = Math.round($('#credit-price').val() * (25/100));
          var $credit = $('#credit-price').val()-$vnesok;
          $("#credit-vnesok").val($vnesok);
          $("#amount").val(25);
          
          $("#credit-month").val(12);
          $("#credit-credit").val($credit);
          $("#amount-label").text($vnesok);
          $("#duration-label").text(12);
          $("#credit-label").text($credit);
          
         // update();
      });

      //changed. now with parameter
      function update(slider,val) {
          console.log(slider+'-'+val);
        //changed. Now, directly take value from ui.value. if not set (initial, will use current value.)
        var $amount = slider == 1?val:$("#amount").val();
        var $duration = slider == 2?val:$("#credit-month").val();
        
        var $vnesok = Math.round($('#credit-price').val() * ($amount/100));
        var $credit = $('#credit-price').val()-$vnesok;
        /* commented
        $amount = $( "#slider" ).slider( "value" );
        $duration = $( "#slider2" ).slider( "value" );
         */
         if($amount < 40){
             $('#credit-stavka').val(18.99);
             $( "#stavka-label" ).text(18.99);
         }else if($amount > 39 && $amount < 50){
             $('#credit-stavka').val(17.99);
              $( "#stavka-label" ).text(17.99);
         }else if($amount > 49){
             $('#credit-stavka').val(16.99);
              $( "#stavka-label" ).text(16.99);
         }
   
         var $total = Math.round(($credit/$duration) + ($credit/$duration*($('#credit-stavka').val()/100)));// "$" + ($amount * $duration);
         $( "#credit-vnesok" ).val($vnesok);
         $( "#amount" ).val($amount);
         
         $( "#amount-label" ).text($vnesok);
         $( "#credit-month" ).val($duration);
         $( "#duration-label" ).text($duration);
         $( "#credit-credit").val($credit);
         $( "#credit-label").text($credit);
         $( "#credit-platij" ).val($total);
         $( "#total-label" ).text($total);
         $( '#slider span.ui-slider-handle').html($amount);
         $( '#slider2 span.ui-slider-handle').html($duration);
        // $('#slider a').html('<label><span class="glyphicon glyphicon-chevron-left"></span> '+$amount+' <span class="glyphicon glyphicon-chevron-right"></span></label>');
       // $('#slider2 a').html('<label><span class="glyphicon glyphicon-chevron-left"></span> '+$duration+' <span class="glyphicon glyphicon-chevron-right"></span></label>');
      }