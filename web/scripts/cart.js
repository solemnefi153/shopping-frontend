import {addOrRemoveFromTheSessionCart} from './add_romove_cart_items.js';

var removeItems = button_clicked => {
  //This prevents users for clicking multiple times in the same element atempting to remove an item 
  button_clicked.parentElement.style.display = "none";
  
  //this removes the item from the session
  var button_id = button_clicked.id;
  var query = "itemID=" + button_id;
  addOrRemoveFromTheSessionCart(query, reloadItemsInCart);
}

var reloadItemsInCart = () => {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var content_element = document.getElementById('content');
      content_element.innerHTML = this.responseText;
      addEventListeners();
    }
  };
  xhttp.open("GET", "../php/load_items_in_cart.php", true);
  xhttp.send();
}
  
  var addEventListeners = () => {
    var remove_btns = document.getElementsByName('remove_btn');
    remove_btns.forEach(button => {
      button.addEventListener('click', () => {
        removeItems(button);
        //This indicates that the listener will only work once
      }, {once : true});
    })
  }
  addEventListeners();
