
function updateCartImage (num_of_items){
    var cart = document.getElementById('cart_image');

    if(num_of_items != 0)
    {
       cart.src = '../images/full_cart.png';
    }
    else{
        cart.src = '../images/empty_cart.png';
    }
 }

 
 export function addOrRemoveFromTheSessionCart(query, callBackFunction = null){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var numb_of_items_in_cart = this.response;
        updateCartImage(numb_of_items_in_cart);
        if(callBackFunction)
        {
         callBackFunction();
        }
      }
    }
    xhttp.open("GET", "../php/remove_add_items.php?" + query, true);
    xhttp.send();
 }

 