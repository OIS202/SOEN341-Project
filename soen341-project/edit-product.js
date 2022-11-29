const inputs = document.querySelectorAll('.storage');
const button = document.querySelectorAll('.button');

const savename = () => {
    localStorage.setItem('productname', inputs[0].value)
}

const saveprice = () => {
    localStorage.setItem('productprice', inputs[1].value)
}

button[0].addEventListener('click', savename);
button[1].addEventListener('click',saveprice);