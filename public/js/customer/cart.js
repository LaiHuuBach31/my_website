function mark(e) {
    let result = document.getElementById('quantity');
    if(e == '-'){
        if(result.value > 1){
            result.value = result.value - 1;
        }
    } else {
        result.value = Number(result.value) + 1;
    }
}

function mark1(e) {
    let result = document.getElementById('quantity1');
    if(e == '-'){
        if(result.value > 1){
            result.value = result.value - 1;
        }
    } else {
        result.value = Number(result.value) + 1;
    }
}