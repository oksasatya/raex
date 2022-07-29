(function($) {
  'use strict';

  // initializing inputmask
  $(":input").inputmask();

  // initializing form product
   $(":input[name='price']").inputmask("numeric", {
    radixPoint: ".",
    groupSeparator: ",",
    digits: 2,
    autoGroup: true,
    prefix: 'Rp ',
    rightAlign: false,
    allowMinus: false,
    allowPlus: false,
    allowLeadingZeroes: true,
    removeMaskOnSubmit: true,
    });
})(jQuery);
