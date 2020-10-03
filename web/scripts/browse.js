import { addOrRemoveFromTheSessionCart } from './add_romove_cart_items.js';

//variable to store the products 
var products;
var requestProducts = () => {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      products = JSON.parse(this.responseText);
    }
  };
  xhttp.open("GET", "../data/products.json", true);
  xhttp.send();
}
requestProducts();



var addRemoveItems = button_clicked => {
  var button_id = button_clicked.id;
  var query = '';
  if(button_clicked.className == 'add_to_cart_btn')
  {
    button_clicked.classList.remove('add_to_cart_btn'); 
    button_clicked.classList.add('remove_from_cart_btn'); 
    button_clicked.innerHTML = "Remove from Cart";
    query += "itemID=" + button_id ;
    query +=  "&name=" + products[button_id].name ;
    query +=  "&price=" + products[button_id].price ;
    query +=  "&category=" + products[button_id].category ;
    query +=  "&image_address=" + products[button_id].image_address;
    addOrRemoveFromTheSessionCart(query);
  }
  else
  {
    button_clicked.classList.remove('remove_from_cart_btn'); 
    button_clicked.classList.add('add_to_cart_btn'); 
    button_clicked.innerHTML = "Add to Cart";
    var query = "itemID=" + button_id;
    addOrRemoveFromTheSessionCart(query);
  }
}

var addEventListeners = () => {
  var add_remove_btns = document.getElementsByName('add_remove_btn');
  add_remove_btns.forEach(button => {
    button.addEventListener('click', () => {
      addRemoveItems(button);
    })
  })
}
addEventListeners();













