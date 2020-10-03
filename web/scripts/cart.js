import {addOrRemoveFromTheSessionCart} from './add_romove_cart_items.js';

var unRegisterAllEventListeners = (element) => {
	if ( typeof element._eventListeners == 'undefined' || element._eventListeners.length == 0 ) {
    alert('Negron 1');
		return;	
  }
  //store how many listeners
  var len = element._eventListeners.length;
	for(var i = 0; i < len; ++i) {
    alert('Negron 2');
    //grab one listener object from the element
    var listener = element._eventListeners[i];
    //remove the event tistener 
		element.removeEventListener(listener.event, listener.callback);
  }
	obj._eventListeners = [];
}

var removeItems = button_clicked => {
  //This prevents users for clicking multiple times atempting to remove an item 
    button_clicked.style.display = "none";
    unRegisterAllEventListeners(button_clicked);

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
      })
    })
  }
  addEventListeners();

  