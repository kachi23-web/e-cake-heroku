$('.shopping').click(function (e) { 
    e.preventDefault();
    
    var product_id = $(this).closest('.product_data').find('.prod_id').val();
    var product_slug = $(this).closest('.product_data').find('.prod_slug').val();
    var category_slug = $(this).closest('.product_data').find('.cate_slug').val();


    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  
   $.ajax({
       type:"GET", 
       //_method: "PUT",
       url:"/shoppingdetails", 
       data: { 
           'product_id':product_id,
           'product_slug':product_slug, 
           'category_slug':category_slug,
           
           },
          
            success: function (response) {
                swal(response.status ) ;
                loadcart();
              
                
       },
       error: function(e)
    {
       console.log(e);
    }
   });
   
}); 






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


    $(document).ready(function () {
    loadcart();
    loadwishlist();
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    


        
        function loadcart() 
        {
            $.ajax({
                type: "GET",
                url: "/load-cart-data",
                
                success: function (response) {

                    // sending the count value to the span
                    $('.cart-count').html('');
                    $('.cart-count').html(response.count);
                    //console.log(response.count)
                    
                }
            });
        }




 
function loadwishlist() 
{
     $.ajax({
         type: "GET",
         url: "/load-wishlist-data",
         
         success: function (response) {

            // sending the count value to the span
            $('.wishlist-count').html('');
            $('.wishlist-count').html(response.count);
            //console.log(response.count)
             
         }
     });
}

 




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
                loadcart();
              
                
       },
       error: function(e)
    {
       console.log(e);
    }
   });
   
}); 



$('.addToWishlist').click(function (e) { 
    e.preventDefault();

    var product_id = $(this).closest('.product_data').find('.prod_id').val();
    var product_qty = $(this).closest('.product_data').find('.qty-input').val();
    var flavour_id = $(this).closest('.product_data').find('.flav_select').val();
    var size_id = $(this).closest('.product_data').find('.size_select').val();
    var cake_message= $(this).closest('.product_data').find('.message').val();

 
    $.ajax({
        type:"POST", 
        //_method: "PUT",
        url:"/addToWishlist", 
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
                 loadwishlist();

               
                 
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


//$('.delete-cart-item').click(function (e) { 
    $(document).on('click','.delete-cart-item', function (e) {
    
    e.preventDefault();
    
    var prod_id = $(this).closest('.product_data').find('.prod_id').val();

    $.ajax({
        method: "POST",
        url: "delete-cart-item",
        data:{
            'prod_id':prod_id,
      }, 
        success: function (response) {
            //window.location.reload();  
            loadcart();
            //make sure there's a space btw the concatenation & the class selector
            $('.cartitems').load(location.href + " .cartitems");
          
            swal("",response.status,"successfully deleted");
        }
    });
});


$('.remove-wishlist-item').click(function (e) { 
    e.preventDefault();
    var prod_id = $(this).closest('.product_data').find('.prod_id').val();

    $.ajax({
        method: "POST",
        url: "delete-wishlist-item",
        data:{
            'prod_id':prod_id,
      }, 
        success: function (response) {
           // window.location.reload();

           
           $('.wishlistitems').load(location.href + " .wishlistitems");
            swal("",response.status,"successfully deleted");
        } ,
        error: function(e)
        {
           console.log(e);
        }
    });
});

 
});