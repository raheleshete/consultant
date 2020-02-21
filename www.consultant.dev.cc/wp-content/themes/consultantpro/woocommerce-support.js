;(function($, window, document, undefined) {

    /* For quantity */
    $('<div class="quantity-nav"><div class="quantity-button quantity-down">-</div><div class="quantity-button quantity-up">+</div></div>').insertAfter('.quantity input');


    $('.quantity').each(function() { 
      
      var $quantity = $(this),
          $input = $quantity.find('input[type="number"]'),
          min = parseFloat($input.attr('min')),
          max = parseFloat($input.attr('max')),
          oldValue = parseFloat($input.val());
      $quantity.find('.quantity-button').on('click',function(){

        if ($(this).hasClass('quantity-up')) {
            oldValue++; 
            if(max) {
              oldValue = (oldValue >= max) ? max : oldValue;
            }
        } else {
            oldValue--;
            if(min) {
              oldValue = (oldValue <= min) ? min : oldValue;
            }
        } 
        // alert(oldValue);
        $quantity.find("input").val(oldValue).trigger("change");
      });
     
    });

    /* For share button */
    $('[data-share]').on('click',function(){
     
      var w = window,
        url = this.getAttribute('data-share'),
        title = '',
        w_pop = 600,
        h_pop = 600,
        scren_left = w.screenLeft ? w.screenLeft : screen.left,
        scren_top = w.screenTop ? w.screenTop : screen.top,
        width = w.innerWidth,
        height = w.innerHeight,
        left = ((width / 2) - (w_pop / 2)) + scren_left,
        top = ((height / 2) - (h_pop / 2)) + scren_top,
        newWindow = w.open(url, title, 'scrollbars=yes, width=' + w_pop + ', height=' + h_pop + ', top=' + top + ', left=' + left);
     
      if (w.focus) {
          newWindow.focus();
      }
     
      return false;
    });

})(jQuery, window, document);