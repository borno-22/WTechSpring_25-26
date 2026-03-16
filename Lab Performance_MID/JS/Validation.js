const unitPrice = 1000;
const days = 30;

let quantityInput = document.getElementById('quantity');
let totalPriceInput = document.getElementById('totalPrice');

function calculateTotal() {
    let quantity = quantityInput.value;
    if (quantityInput.value == "") {
        quantity = 0;
    }

    if (quantity < 0) {
        quantity = 0;
        quantityInput.value = 0;
    }

    let total = unitPrice * quantity * days;
    totalPriceInput.value = total;

    if (total > 1000) {
      alert("Congratulations! You are eligible for a gift coupon!");
    }
}

quantityInput.addEventListener('input', calculateTotal);