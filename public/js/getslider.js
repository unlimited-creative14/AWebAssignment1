$('#sliderList').empty();
$.get(
    "../controllers/SliderController.php?type=list"
).then((d,stsm, xhr) => {
    data = JSON.parse(d);
    for (let i = 0; i < data.length; i++) {
        const element = data[i];
        id = element[0];
        img = element[1];
        b64type = element[2];
        desc = element[3];
        if (i == 0){
            SliderItem = `
            <div class="carousel-item active" data-interval="2000">
                            <img src="data:image/${b64type};base64,${img}" height="320" class="d-block " alt="...">
                        </div>
            `
        }
        else{
            SliderItem = `
            <div class="carousel-item" data-interval="2000">
                            <img src="data:image/${b64type};base64,${img}" height="320" class="d-block " alt="...">
                        </div>
            `
        }
        if (i == data.length -1){
            SliderItem = `
            <div class="carousel-item">
                            <img src="data:image/${b64type};base64,${img}" height="320" class="d-block " alt="...">
                        </div>
            `
        }
        $('#slider').append(SliderItem)
    }

})