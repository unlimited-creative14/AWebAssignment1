data = []
//load data form database
function loadSlider(){
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
            SliderItem = `
            <div class="SliderItem m-auto pd-1" id="${id}">
                <div class="iheader ml-3 mr-3">
                    <div class="iheader1">
                        <strong data-id="${id}">${id}</strong>
                    </div>
                    <div class="iheader2">
                        <a class="btn btn-outline-info" href='#' data-role='update' data-id='${id}'>Update</a>
                        <a class="btn btn-outline-danger" href='#' data-role='delete' data-id='${id}'>Delete</a>
                    </div>
                </div>
                <div class="ibody ml-3 mr-3">
                    <p data-id="${id}">
                        ${desc}
                    </p>
                    <img data-id="${id}" src="data:image/${b64type};base64,${img}" class="mb-3" alt="image">
                </div>
            </div>
            `
            $('#sliderList').append(SliderItem)
        }
    })
}
// show form for edit slider
async function InsertForm(){
    insertForm = `
    <div class="modal-header">
    <h4 class="modal-title">Insert</h4>
    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
</div>
<div class="modal-body" id="modalbody">
    <div class="form-group">
        <label>Picture</label><br>
        <input type="file" id="img" accept="image/*" value="" class="" onchange=changeRefImg(event)> <br>
        <label>Preview</label> <br>
        <img id="imgPreview" class="swal2-image" src=""></img><br>
        <label>Description</label>
        <textarea class="form-control" rows="5" id="desc"></textarea>
    </div>
    <div id="error"></div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline-success" id="submit">Submit</button>
</div>
        `
    $('#modalcontent').get(0).innerHTML = insertForm
}
function changeRefImg(params){
    files = params.target.files[0]
    reader = new FileReader()
    reader.onload = function(e){
        $('#imgPreview').attr('src', e.target.result);
    }
    reader.readAsDataURL(files)
}

//show update modal
async function updateSlider(id, img, b64type, desc){
    updateModal = `
        <div class="modal-header">
    <h4 class="modal-title">Update</h4>
    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
</div>
<div class="modal-body" id="modalbody">
    <div class="form-group">
        <label><strong>Id: ${id}</strong></label> <br>
        <label>Picture</label><br>
        <input type="file" id="img" accept="image/*" value="" class="" onchange=changeRefImg(event)> <br>
        <label>Preview</label> <br>
        <img id="imgPreview" class="swal2-image" src="data:image/${b64type};base64,${img}"></img><br>
        <label>Description</label>
        <textarea class="form-control" rows="5" id="desc">${desc}</textarea>
    </div>
    <div id="error"></div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline-success" id="submit">Submit</button>
</div>`
    $('#modalcontent').get(0).innerHTML = updateModal
}

// show delete modal
function deleteSlider(){
    deleteModal = `
    <div class="modal-header">
    <h4 class="modal-title">Delete</h4>
    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
</div>
<div class="modal-body" id="modalbody">
    <strong>Do you want to delete this record?</strong>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline-danger" id="delyes">Yes</button>
    <button type="button" class="btn btn-outline-success" id="delno">No</button>
</div>
    `
    $('#modalcontent').get(0).innerHTML = deleteModal   
    
}


//load slider
loadSlider()

// some handler user
$(document).ready(function(){
    // insert
    $('#btnInsert').click(function(){
        InsertForm()
        $('#SliderModal').modal('toggle')

        $('#submit').click(function(){
            var img = $('#imgPreview').attr('src')
            var desc = $('#desc').val()
            if (img == '' || desc == ''){
                $('#error').get(0).innerHTML = `<strong class="text-danger">You must enter all field </strong>`
            }
            else{
                $.ajax({
                    url : '../controllers/SliderController.php',
                    method: 'POST',
                    data : {img : img, desc : desc, type: 'insert'},
                    success : function (res){
                        SliderItem = `<div class="SliderItem m-auto pd-1">
                        <div class="iheader ml-3 mr-3">
                            <div class="iheader1">
                                <strong>${id}</strong>
                            </div>
                            <div class="iheader2">
                                <a class="btn btn-outline-info" href='#' data-role='update' data-id='"${id}"'>Update</a>
                                <a class="btn btn-outline-danger" href='#' data-role='delete' data-id='"${id}"'>Delete</a>
                            </div>
                        </div>
                        <div class="ibody ml-3 mr-3">
                            <p>
                                ${desc}
                            </p>
                            <img src="${img}" class="mb-3" alt="image">
                        </div>
                    </div>
                    `
                        if (res == true){ 
                            $('#sliderList').append(SliderItem)
                            $('#SliderModal').modal('toggle')
                            alert("successful")
                        }
                        else(
                            alert(res)
                        )
                    }
                })
            }
        })
    })

    //delete
    $(document).on('click', 'a[data-role=delete]', function(){
        var id = parseInt($(this).data('id'))
        deleteSlider()
        $('#SliderModal').modal('toggle')
        $('#delyes').click(function(){
            $.ajax({
                url: '../controllers/SliderController.php',
                method: 'POST',
                data: {type : 'delete', id: id},
                success : function(res){
                    if (res == true){
                        $('#SliderModal').modal('toggle')
                        alert("delete successful")
                        $('#'+id).remove()
                    }
                    else{
                        alert(res)
                    }
                }
            })
        })
        $('#delno').click(function(){
            $('#SliderModal').modal('toggle')
        })
    })
    //update
    $(document).on('click', 'a[data-role=update]', function(){
        var id = parseInt($(this).data('id'))
        $.ajax({
            url : "../controllers/SliderController.php?type=item&id=" + id,
            method : 'GET',
            success: function(res){
                data = JSON.parse(res)
                id = data[0][0]
                img = data[0][1]
                b64type = data[0][2]
                desc = data[0][3]
                updateSlider(id, img, b64type, desc)
                $('#SliderModal').modal('toggle')
                $('#submit').click(function(){
                    console.log("asdfasfd")
                    var img = $('#imgPreview').attr('src')
                    var desc = $('#desc').val()
                    if (img == '' || desc == ''){
                        $('#error').get(0).innerHTML = `<strong class="text-danger">You must enter all field </strong>`
                    }else{
                        $.ajax({
                            url: '../controllers/SliderController.php',
                            method : 'POST',
                            data : {id: id, img: img, desc: desc, type: 'edit'},
                            success: function(res){
                                if (res == true){
                                    $('#SliderModal').modal('toggle')
                                    $("img[data-id="+id+"]").attr('src', img)
                                    $("p[data-id="+id+"]").get(0).innerHTML = desc
                                    alert("edit successful")
                                }
                                else{
                                    alert(res)
                                }
                            }
                        })
                    }
                })
            }
        })
    })
})