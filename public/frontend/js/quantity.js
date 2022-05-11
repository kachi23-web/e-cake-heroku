

var proQty = $('.pro-qty');
// proQty.prepend('<span class="changeQuantity dec qtybtn">-</span>');
// proQty.append('<span class="changeQuantity inc qtybtn ">+</span>');
  proQty.on('click', '.qtybtn',  function () {


  var $button = $(this);
  var oldValue = $button.parent().find('input').val();  
  //inc = $(this).closest('.product_data').find('.qty_input').val(newVal);

  if ($button.hasClass('inc')) {
      var newVal = parseFloat(oldValue);
      newVal++
  } else {
      // Don't allow decrementing below zero
      if (oldValue > 1) {
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
    var flavour_id = $(this).closest('.product_data').find('.flav_select').val();
    var size_id = $(this).closest('.product_data').find('.size_select').val();
    var cake_message= $(this).closest('.product_data').find('.message').val();


  //   alert(product_id);
  // alert(product_qty);

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  
   $.ajax({
       type:"POST", 
       //_method: "PUT",
       url:"/add-to-cart", 
       data: { 
           'product_id':product_id,
           'product_qty':product_qty, 
           'flavour_id':flavour_id,
           'size_id':size_id,
           'cake_message':cake_message,
           
        //    'order_details' :order_details,
        //    'total_price' :total_price,
           
           },
          
            success: function (response) {
                alert(response.status ) ;
              
                
       },
       error: function(e)
    {
       console.log(e);
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
    //var price = $(this).closest('.product_data').find('.prod_price').val();

        data = { 
            'prod_id':prod_id,
            'prod_qty':qty, 
            //'prod_price':prod_price,
            
            
            }

    $.ajax({
        type:"POST",
        url: "update-cart",
       // _method: "PUT",
        data:data,
       
        success: function (response) {

            //  window.location.reload();
        },
        error: function(e)
        {
           console.log(e);
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



 
