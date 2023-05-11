function show_image(ip) {
    let files = Object.values(ip.files);

        files.forEach( (item, index) => {

            let render = new FileReader();

            let img = document.getElementById('show_'+(index+1));

            render.onload = e => {
                img.src = e.target.result;
            }

            render.readAsDataURL(item);

        });
}