
// console.log("hello world ");
// var price = 0;

// let addCartItem = document.querySelectorAll('.add');
// let decreaseCartItem = document.querySelectorAll('.minus');
// // console.log(addCartItem.length);
// let selectItemNumber = document.querySelectorAll('.product_no');
// let itemsPrice = document.querySelectorAll('.price');

// for (var i = 0; i < (selectItemNumber.length -2 ); i++){
//     var input = selectItemNumber[i];
//     input.addEventListener('change', ()=> {
//         noofItems();
//     })
//     }

//     decreaseCartItem.forEach(element => {
//         element.addEventListener('click', function(event){
//             var clickedButton = event.target;
//         clickedButton.parentElement.childNodes[1].children[1].value--;
//         console.log(clickedButton.parentElement.childNodes[1].children[1]);
//         })
// })


// for (i = 0; i < (addCartItem.length); i++){
//     addCartItem[i].addEventListener('click', ()=> {
//         addItems();
//     })
// }


// // for (i = 0; i < (decreaseCartItem.length); i++){
// //     decreaseCartItem[i].addEventListener('click', function(event) {
// //         var clickedButton = event.target;
// //         clickedButton.parentNode.children[1].value--;
// //         console.log(clickedButton.parentNode.children[1]);
// //         updateCartTotal();
// //         // reduceItems();
// //     })
// // }
// function addItems(){
//     input.value++;
//     // input.textContent = input.value;
//     // console.log(input.value);
// }
// // function reduceItems(event){
// //     var clickedButton = event.target;
// //     console.log(clickedButton.parentElement);
// //     input.value-= 1;
// //     // console.log(input.value);
// // }

// function noofItems(event){
//     var input = event.target;
//     if (isNaN(input.value) || input.value <= 0) {
//         input.value = 1;
//         console.log(input.value);
//     }
// }


// for ( i = 0; i < (itemsPrice.length); i++){
//     var itemPrice = itemsPrice[i].innerHTML.match(/\d/g).join("");
//     console.log(itemPrice);
//     }

// function updateCartTotal() {
//     var cartItemContainer = document.getElementsByClassName('cart-items')[0];
//     // var addRemovePart = cartItemContainer.getElementsByClassName('addremove');
//     var cartRows = cartItemContainer.getElementsByClassName('details');
//     for (i = 0; i < (cartRows.length); i++) {
//         var cartRow = cartRows[i];
//         var priceElement = cartRow.getElementsByClassName('price')[0];
//         // var quantityElement = addRemovePart.getElementsByClassName('product_no')[0];
//         console.log(priceElement.innerHTML);
//     }
// }

// STOLEN CODE

if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready() {
    // var removeCartItemButtons = document.getElementsByClassName('btn-danger')
    // for (var i = 0; i < removeCartItemButtons.length; i++) {
    //     var button = removeCartItemButtons[i]
    //     button.addEventListener('click', removeCartItem)
    // }

    var quantityInputs = document.getElementsByClassName('cart-quantity-input');
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i];
        input.addEventListener('change', quantityChanged);
    }

    // var addToCartButtons = document.getElementsByClassName('shop-item-button')
    // for (var i = 0; i < addToCartButtons.length; i++) {
    //     var button = addToCartButtons[i]
    //     button.addEventListener('click', addToCartClicked)
    // }

//     document.getElementsByClassName('btn-purchase')[0].addEventListener('click', purchaseClicked)
// }

// function purchaseClicked() {
//     alert('Thank you for your purchase')
//     var cartItems = document.getElementsByClassName('cart-items')[0]
//     while (cartItems.hasChildNodes()) {
//         cartItems.removeChild(cartItems.firstChild)
//     }
//     updateCartTotal()
// }

// function removeCartItem(event) {
//     var buttonClicked = event.target
//     buttonClicked.parentElement.parentElement.remove()
//     updateCartTotal()
// }

function quantityChanged(event) {
    var input = event.target;
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1;
    }
    updateCartTotal();
}

// function addToCartClicked(event) {
//     var button = event.target
//     var shopItem = button.parentElement.parentElement
//     var title = shopItem.getElementsByClassName('shop-item-title')[0].innerText
//     var price = shopItem.getElementsByClassName('shop-item-price')[0].innerText
//     var imageSrc = shopItem.getElementsByClassName('shop-item-image')[0].src
//     addItemToCart(title, price, imageSrc)
//     updateCartTotal()
// }

// function addItemToCart(title, price, imageSrc) {
//     var cartRow = document.createElement('div')
//     cartRow.classList.add('cart-row')
//     var cartItems = document.getElementsByClassName('cart-items')[0]
//     var cartItemNames = cartItems.getElementsByClassName('cart-item-title')
//     for (var i = 0; i < cartItemNames.length; i++) {
//         if (cartItemNames[i].innerText == title) {
//             alert('This item is already added to the cart')
//             return
//         }
//     }
//     var cartRowContents = `
//         <div class="cart-item cart-column">
//             <img class="cart-item-image" src="${imageSrc}" width="100" height="100">
//             <span class="cart-item-title">${title}</span>
//         </div>
//         <span class="cart-price cart-column">${price}</span>
//         <div class="cart-quantity cart-column">
//             <input class="cart-quantity-input" type="number" value="1">
//             <button class="btn btn-danger" type="button">REMOVE</button>
//         </div>`
//     cartRow.innerHTML = cartRowContents
//     cartItems.append(cartRow)
//     cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItem)
//     cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)
// }

function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('cart-items')[0];
    var cartRows = cartItemContainer.getElementsByClassName('cart_items');
    var total = 0;
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i];
        var priceElement = cartRow.getElementsByClassName('cart-price')[0];
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0];
        console.log(quantityElement);
        var price = parseFloat(priceElement.innerText.match(/\d/g).join(""));
        var quantity = quantityElement.value;
        console.log(price);
        total = total + (price * quantity);
    }
    total = Math.round(total * 100) / 100
    document.getElementsByClassName('cart-total-price')[0].innerText = 'KSh ' + total
}


}


const navToggle = document.querySelector('.nav-toggle');
const nav = document.querySelector('.nav');

navToggle.addEventListener('click', ()=> {
    nav.classList.toggle('nav--visible');
})

const constraints = {
    first_name: {
        presence: { allowEmpty: false }
    },
    last_name: {
        presence: { allowEmpty: false }
    },
    email: {
        presence: { allowEmpty: false },
        email: true
    },
    comments: {
        presence: { allowEmpty: false }
    }
};

const form = document.getElementById('contact-form');

form.addEventListener('submit', function (event) {
  const formValues = {
    first_name: form.elements.first_name.value,
    last_name: form.elements.last_name.value,
      email: form.elements.email.value,
      comments: form.elements.comments.value
  };

  const errors = validate(formValues, constraints);

  if (errors) {
    event.preventDefault();
    const errorMessage = Object
        .values(errors)
        .map(function (fieldValues) { return fieldValues.join(', ')})
        .join("\n");

    alert(errorMessage);
  }
}, false);