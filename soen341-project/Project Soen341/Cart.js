var removeItemButton = document.getElementsByClassName('remove')
console.log(removeItemButton)
for (var i = 0; i < removeItemButton.length; i++){
    var button = removeItemButton[i]
    button.addEventListener('click', function(event) {
        var buttonClicled = event.target
        buttonClicled.parentElement.parentElement.parentElement.parentElement.remove()
        updateTotal()
    })
}
/*
$( document ).ready(function() {
    let inputObject = document.getElementById("input");
    //var productName = $("#title").text();
    let e;
    var value = 1;

    var price = parseFloat($("#productPrice").text());
    var totalPrice = parseFloat(value)*price;
    var estPrice = "estimated total : $" + totalPrice;

    //console.log(productName);

    $(".plus").on("click",function(e){
        if(value === 9){
            value=9;
        }
        else{
            value++;
        }
        document.getElementById("input").value = value;

        price = parseFloat($("#productPrice").text());
        totalPrice = parseFloat(value)*price;
        estPrice = "estimated total : $" + totalPrice.toFixed(2);

        $("#change").html(estPrice);
        console.log(estPrice);

    })

    $(".minus").on("click", function(e){
        if(value === 1){
            value = 1
            document.getElementById("input").value = value;
        }
        else{
            value--;
            document.getElementById("input").value = value;

            price = parseFloat($("#productPrice").text());
            totalPrice = parseFloat(value)*price;
            estPrice = "estimated total : $" + totalPrice.toFixed(2);

            $("#change").html(estPrice);
            console.log(estPrice);

        }
        console.log(value);
    })
});
*/
/*

function updateTotal(){
    var carItemContainer = document.getElementsByClassName('cart-info')[0]
    var cartRows = carItemContainer.getElementsByClassName('cart-row')
    for (var i = 0; i < cartRows.length; i++){
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName('prices')[0]
        var quantityElement = cartRow.getElementsByClassName('cart-quantity')[0]
        console.log(priceElement, quantityElement)
    }
}


//Global variables
let subtotal_value = 0;
let taxes_value = 0;
let total_value = 0;


//Display total function which displays the subtotal, taxes and total
function displayTotal() {
    let subtotal = document.getElementById('subtotal')
    let taxes = document.getElementById('taxes')
    let total = document.getElementById('total')
    calculateTotal();
    subtotal.innerText = subtotal_value.toFixed(2) + "$";
    taxes.innerText = taxes_value.toFixed(2) + "$";
    total.innerText = total_value.toFixed(2) + "$";
}

//Display total function which calculates the subtotal, taxes and total
function calculateTotal() {
    let prices = document.getElementsById('prices');
    subtotal_value = 0;
    for (let i = 0; i < prices.length; i++) {
        let value = prices[i].textContent.substr(1, prices[i].textContent.length);
        prices[i].textContent = "$" + parseFloat(value).toFixed(2);
        subtotal_value += parseFloat(value);
    }
    taxes_value = subtotal_value * 0.15;
    total_value = subtotal_value + taxes_value;
}


/*
//Deletes an item of the cart and recalculates the total
function removeElement(e) {
    e.parentElement.parentElement.parentElement.remove();
    displayTotal();
    displayNumberOfItems();
    let id = e.parentElement.querySelector('input[name="id"]')
    $.ajax(
        'updateCart.php',
        {
            type: "POST",
            data: {
                action: 'remove',
                id: id.value
            },
            success: function(data) {

            },
            error: function() {
            }
        }
    );
}

//Functions that changes the count of an item in the cart and recalculates the total
function changeCount(e) {
    let isPlus = true;
    if(e.getAttribute('name') === "minus")
        isPlus = false;

    let number = e.parentElement.querySelector('.number-selector')
    let unitary = e.parentElement.querySelector('input[name="unitary"]')
    let id = e.parentElement.parentElement.querySelector('input[name="id"]')
    let price = e.parentElement.parentElement.querySelector('span[name="price"]')

    if(number.value === "1" && !isPlus) return;
    if(number.value === "9" && isPlus) return;

    number.value = (isPlus) ? (parseInt(number.value)+1): (parseInt(number.value)-1);
    price.textContent = "$" + (parseFloat(unitary.value) * number.value).toFixed(2);
    displayTotal();
    $.ajax(
        'updateCart.php',
        {
            type: "POST",
            data: {
                action: (isPlus) ? "add" : "minus",
                id: id.value
            },
            success: function(data) {

            },
            error: function() {
            }
        }
    );
}

//First calls to the functions (when the user opens the page)
displayTotal();
displayNumberOfItems();
*/