function mark(e) {
    let result = document.getElementById('quantity');
    if (e == '-') {
        if (result.value > 1) {
            result.value = result.value - 1;
        }
    } else {
        result.value = Number(result.value) + 1;
    }
}


function mark_cart(e, id) {
    let result = document.getElementById('quantity' + id);
    if (e == '-') {
        if (result.value > 1) {
            result.value = result.value - 1;
        }
    } else {
        result.value = Number(result.value) + 1;
    }
}


function mark_cart_768(e, id) {
    let result = document.getElementById('quantity' + id);
    if (e == '-') {
        if (result.value > 1) {
            result.value = result.value - 1;
        }
    } else {
        result.value = Number(result.value) + 1;
    }
}