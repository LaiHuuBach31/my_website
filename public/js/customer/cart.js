
function mark_cart(e, id) {
    let form = document.getElementById('form' + id);
    let result = document.getElementById('quantity' + id);
    if (e == '-') {
        if (result.value > 1) {
            result.value = result.value - 1;
        }
    } else {
        result.value = Number(result.value) + 1;
    }
    form.submit();
}

function quantityCart(id) {
    let form = document.getElementById('form' + id);

    let result1 = document.getElementById('quantity' + id);
    if(result1.value <= 0) {
        document.getElementById('quantity' + id).value = 1;
    }
    if(isNaN(result1.value)) {
        document.getElementById('quantity' + id).value = 1;
    }
    form.submit();

}


function mark_cart_768(e, id) {
    let form = document.getElementById('form' + id);
    let result = document.getElementById('quantity' + id);
    if (e == '-') {
        if (result.value > 1) {
            result.value = result.value - 1;
        }
    } else {
        result.value = Number(result.value) + 1;
    }
    form.submit();
}

