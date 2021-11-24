

var proQty = $('.pro-qty');
proQty.prepend('<span class="changeQuantity dec qtybtn">-</span>');
proQty.append('<span class="changeQuantity inc qtybtn ">+</span>');
proQty.on('click', '.qtybtn',  function () {


  var $button = $(this);
  var oldValue = $button.parent().find('input').val();
  //inc = $(this).closest('.product_data').find('.qty_input').val(newVal);

  if ($button.hasClass('inc')) {
      var newVal = parseFloat(oldValue);
      newVal++
  } else {
      // Don't allow decrementing below zero
      if (oldValue > 0) {
          var newVal = parseFloat(oldValue);
          newVal--
      } else {
          newVal = 0;
      }
  }
 $button.parent().find('input').val(newVal);
  //inc = $(this).closest('.product_data').find('.qty_input').val(newVal);

});


$('.addToCartBtn').click(function (e) { 
    e.preventDefault();
    
    var product_id = $(this).closest('.product_data').find('.prod_id').val();
    var product_qty = $(this).closest('.product_data').find('.qty-input').val();

  //   alert(product_id);
  // alert(product_qty);

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  
   $.ajax({
       method:"POST", 
       url:"/add-to-cart", 
       /* type="multipart/form-data", */
       data: { 
           'product_id':product_id,
           'product_qty':product_qty, 
           
           },
          
            success: function (response) {
                alert(response.status);
       } 
   });
}); 






$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$('.changeQuantity').click(function (e) { 
    e.preventDefault();
    var prod_id = $(this).closest('.product_data').find('.prod_id').val();
    var qty = $(this).closest('.product_data').find('.qty-input').val();

        data = { 
            'prod_id':prod_id,
            'prod_qty':qty, 
            
            }

    $.ajax({
        method:"POST",
        url: "update-cart",
        data:data,
       
        success: function (response) {

            window.location.reload();
        }
    });
});


$('.delete-cart-item').click(function (e) { 
    e.preventDefault();
    
    var prod_id = $(this).closest('.product_data').find('.prod_id').val();

    $.ajax({
        method: "POST",
        url: "delete-cart-item",
        data:{
            'prod_id':prod_id,
      }, 
        success: function (response) {
            window.location.reload();
            alert("",response.status,"successfully deleted");
        }
    });
});



