function show_img(ip) {

    let image = document.getElementById('avatar');

    let file = ip.files[0];
    
    let render = new FileReader();

    render.onload = e => {
        image.src = e.target.result;
    }

    render.readAsDataURL(file);
}
function show_imgs(ip){

    let files = Object.values(ip.files);

    files.forEach( (item, index) => {

        let render = new FileReader();

        let img = document.getElementById('avatar_'+(index+1));

        render.onload = e =>{
            img.src = e.target.result;
        }

        render.readAsDataURL(item);

    });
}