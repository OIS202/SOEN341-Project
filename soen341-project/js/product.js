$( document ).ready(function() {
    let inputObject = document.getElementById("quantity");
    var productName = $("#title").text();
    let e;
    var value = 1;

    var price = parseFloat($("#product-Price").text());
    var totalPrice = parseFloat(value) * price;
    var estimPrice = "Total (before taxes) : $" + totalPrice;

    console.log(productName);

    $(".plus").on("click", function (e) {
        if (value === 9) {
            value = 9;
        } else {
            value++;
        }
        document.getElementById("quantity").value = value;

        price = parseFloat($("#product-Price").text());
        totalPrice = parseFloat(value) * price;
        estimPrice = "Total (before taxes) : $" + totalPrice.toFixed(2);

        $("#change").html(estimPrice);
        console.log(estimPrice);

    })

    $(".minus").on("click", function (e) {
        if (value === 1) {
            value = 1
            document.getElementById("quantity").value = value;
        } else {
            value--;
            document.getElementById("quantity").value = value;

            price = parseFloat($("#product-Price").text());
            totalPrice = parseFloat(value) * price;
            estimPrice = "Total (before taxes) : $" + totalPrice.toFixed(2);

            $("#change").html(estimPrice);
            console.log(estimPrice);

        }
        console.log(value);
    })


})