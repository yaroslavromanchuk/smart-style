
          $("#slider_proc").slider({
              create: function() {
        update(1, $( this ).slider( "value" ));
        },
              animate: true,
              value:20,
              min: 20,
              max: 70,
              step: 5,
              slide: function(event, ui) {
                  update(1,ui.value); //changed
              }
          });

          $("#slider_mouth").slider({
               create: function() {
        update(2,$( this ).slider( "value" ));
        },
              animate: true,
              value:12,
              min: 12,
              max: 60,
              step: 12,
              slide: function(event, ui) {
                  update(2,ui.value); //changed
              }
          });
          $("#leasing-avans").val(20);
          $("#leasing-mouth").val(12);
          
         // update();
    
      //changed. now with parameter
      function update(slider,val) {
          console.log(slider+'-'+val);
        //changed. Now, directly take value from ui.value. if not set (initial, will use current value.)
        
        switch(slider){
            case 1: $("#leasing-avans").val(val); $( '#slider_proc span.ui-slider-handle').html(val); break;
            case 2: $("#leasing-mouth").val(val);  $( '#slider_mouth span.ui-slider-handle').html(val); break;
            default: break;
        }
       
        
      }