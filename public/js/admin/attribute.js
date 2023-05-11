function optionAttr(e) {
    let name = e.value;
    console.log(name);
    document.getElementById('value').setAttribute('type', name == 'size' ? 'text' : name );
    document.getElementById('value').value = '';
}
// function option_attr(a){
//     let name = a.value;
//     document.getElementById('value').setAttribute('type', name=='size' ? 'text' : name );
//     document.getElementById('value').value = '';
// }   