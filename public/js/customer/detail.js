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


function quantityDetail() {

    let result1 = document.getElementById('quantity');
    if(result1.value <= 0) {
        document.getElementById('quantity').value = 1;
    }
    if(isNaN(result1.value)) {
        document.getElementById('quantity').value = 1;
    }

}