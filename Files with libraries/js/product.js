var cartSummary = [];
var retrievedData;
if(sessionStorage.getItem("cartSummary"))
{
  retrievedData = sessionStorage.getItem("cartSummary");
}

if(retrievedData)
{
   cartSummary = JSON.parse(retrievedData);
}
$('.block2-btn-addcart').each(function(){
  var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
  var priceProduct = $(this).parent().parent().parent().find('.block2-price').html();
  var imageProduct = $(this).parent().parent().parent().find('.block2-img').children("img").attr("src");
  var id = $(this).parent().parent().parent().find('.block2-product-id').html();
  var quantity = 1;
  $(this).on('click', function(){
    swal(nameProduct, "is added to cart !", "success");
    productDetails = [];
    nameProduct=nameProduct.replace(/[\n\t\r]/g,"");
    priceProduct=priceProduct.replace(/[\n\t\r]/g,"");
    priceProduct = priceProduct.replace(/\$/g, '');
    id = id.replace(/[\n\t\r]/g,"");
    productDetails.push(imageProduct, nameProduct, priceProduct, id, quantity, priceProduct);
    cartSummary.push(productDetails);
    sessionStorage.setItem("cartSummary", JSON.stringify(cartSummary))
  });
});

$('.block2-btn-addwishlist').each(function(){
  var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
  $(this).on('click', function(){
    swal(nameProduct, "is added to wishlist !", "success");
  });
});
