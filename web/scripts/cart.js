import {addOrRemoveFromTheSessionCart} from './add_romove_cart_items.js';

var removeItems = button_clicked => {
    var button_id = button_clicked.id;
    var query = "itemID=" + button_id;
    addOrRemoveFromTheSessionCart(query);
    reloadItemsInCart();
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
      })
    })
  }
  addEventListeners();

  