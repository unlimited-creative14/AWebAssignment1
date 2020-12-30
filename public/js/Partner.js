data = []
//load data form database
function loadSlider(){
    $('#partnerList').empty();
    $.get(
        "../controllers/PartnerController.php?type=list"
    ).then((d,stsm, xhr) => {
        data = JSON.parse(d);
        console.log(data)
        for (let i = 0; i < data.length; i++) {
            const element = data[i];
            id = element[0];
            namep = element[1];
            img = element[2];
            b64type = element[3];
            desc = element[4];
            SliderItem = `
            <div class="SliderItem m-auto pd-1" id="${id}">
                <div class="iheader ml-3 mr-3">
                    <div class="iheader1">
                        <strong>Id:${id}</strong> <br>
                        <strong data-id="${namep}">${namep}</strong>
                    </div>
                    <div class="iheader2">
                        <a class="btn btn-outline-info" href='#' data-role='update' data-id='${id}'>Cập nhật</a>
                        <a class="btn btn-outline-danger" href='#' data-role='delete' data-id='${id}'>Xóa</a>
                    </div>
                </div>
                <div class="ibody ml-3 mr-3">
                    <p data-id="${namep}">
                        ${desc}
                    </p>
                    <img data-id="${namep}" src="data:image/${b64type};base64,${img}" class="mb-3" alt="image">
                </div>
            </div>
            `
            $('#partnerList').append(SliderItem)
        }
    })
}
// show form for edit slider
async function InsertForm(){
    insertForm = `
    <div class="modal-header">
    <h4 class="modal-title">Thêm</h4>
    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Đóng</button>
</div>
<div class="modal-body" id="modalbody">
    <div class="form-group">
        <label>Tên</label>
        <input type="text" id="namep" value="" class="form-control">
        <label>Hình ảnh</label><br>
        <input type="file" id="img" accept="image/*" value="" class="" onchange=changeRefImg(event)> <br>
        <label>Xem trước</label> <br>
        <img id="imgPreview" class="swal2-image" src=""></img><br>
        <label>Mô tả</label>
        <textarea class="form-control" rows="5" id="desc"></textarea>
    </div>
    <div id="error"></div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline-success" id="submit">Gửi</button>
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
async function updateSlider(id ,namep, img, b64type, desc){
    updateModal = `
        <div class="modal-header">
    <h4 class="modal-title">Cập nhật</h4>
    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Đóng</button>
</div>
<div class="modal-body" id="modalbody">
    <div class="form-group">
        <strong>Id:${id}</strong> <br>
        <label>Tên</label>
        <input type="text" id="namep" value="${namep}" class="form-control">
        <label>Hình ảnh</label><br>
        <input type="file" id="img" accept="image/*" value="" class="" onchange=changeRefImg(event)> <br>
        <label>Xem trước</label> <br>
        <img id="imgPreview" class="swal2-image" src="data:image/${b64type};base64,${img}"></img><br>
        <label>Mô tả</label>
        <textarea class="form-control" rows="5" id="desc">${desc}</textarea>
    </div>
    <div id="error"></div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline-success" id="submit">Gửi</button>
</div>`
    $('#modalcontent').get(0).innerHTML = updateModal
}

// show delete modal
function deleteSlider(){
    deleteModal = `
    <div class="modal-header">
    <h4 class="modal-title">Xóa</h4>
    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Đóng</button>
</div>
<div class="modal-body" id="modalbody">
    <strong>Bạn có muốn xóa dữ liệu này?</strong>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline-danger" id="delyes">Có</button>
    <button type="button" class="btn btn-outline-success" id="delno">Không</button>
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
            var namep = $('#namep').val()
            var img = $('#imgPreview').attr('src')
            var desc = $('#desc').val()
            if (namep == '' || img == '' || desc == ''){
                $('#error').get(0).innerHTML = `<strong class="text-danger">You must enter all field </strong>`
            }
            else{
                $.ajax({
                    url : '../controllers/PartnerController.php',
                    method: 'POST',
                    data : {namep : namep, img : img, desc : desc, type: 'insert'},
                    success : function (res){
                        console.log(res)
                        id = parseInt(res)
                        if (isNaN(id)){
                            alert(res)
                        }else{
                        SliderItem = `<div class="SliderItem m-auto pd-1">
                        <div class="iheader ml-3 mr-3">
                            <div class="iheader1">
                                <strong>Id:${id}</strong> <br>
                                <strong>${namep}</strong>
                            </div>
                            <div class="iheader2">
                                <a class="btn btn-outline-info" href='#' data-role='update' data-id='"${namep}"'>Cập nhật</a>
                                <a class="btn btn-outline-danger" href='#' data-role='delete' data-id='"${namep}"'>Xóa</a>
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
                            $('#partnerList').append(SliderItem)
                            $('#SliderModal').modal('toggle')
                            alert("Thêm thành công")
                        }
                    }
                })
            }
        })
    })

    //delete
    $(document).on('click', 'a[data-role=delete]', function(){
        var id = $(this).data('id')
        deleteSlider()
        $('#SliderModal').modal('toggle')
        $('#delyes').click(function(){
            $.ajax({
                url: '../controllers/PartnerController.php',
                method: 'POST',
                data: {type : 'delete', id: id},
                success : function(res){
                    console.log(res)
                    if (res == true){
                        $('#SliderModal').modal('toggle')
                        alert("Xóa thành công")
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
        var id = $(this).data('id')
        console.log(namep)
        $.ajax({
            url : "../controllers/PartnerController.php?type=item&id=" + id,
            method : 'GET',
            success: function(res){
                console.log(res)
                data = JSON.parse(res)
                namep = data[0][1]
                img = data[0][2]
                b64type = data[0][3]
                desc = data[0][4]
                updateSlider(id, namep, img, b64type, desc)
                $('#SliderModal').modal('toggle')
                $('#submit').click(function(){
                    console.log("asdfasfd")
                    var newnamep = $('#namep').val()
                    var img = $('#imgPreview').attr('src')
                    var desc = $('#desc').val()
                    if (namep == '' || img == '' || desc == ''){
                        $('#error').get(0).innerHTML = `<strong class="text-danger">Bạn phải điền đầy đủ thông tin</strong>`
                    }else{
                        $.ajax({
                            url: '../controllers/PartnerController.php',
                            method : 'POST',
                            data : {namep: namep, newnamep: newnamep, img: img, desc: desc, type: 'edit'},
                            success: function(res){
                                if (res == true){
                                    $('#SliderModal').modal('toggle')
                                    $("strong[data-id=\'"+namep+"\']").get(0).innerHTML = newnamep
                                    $("strong[data-id=\'"+namep+"\']").attr("data-id", newnamep)
                                    $("img[data-id=\'"+namep+"\']").attr({
                                        'data-id': newnamep,
                                        'src': img,
                                    })
                                    $("p[data-id=\'"+namep+"\']").get(0).innerHTML = desc
                                    $("p[data-id=\'"+namep+"\']").attr("data-id", newnamep)
                                    alert("Cập nhật thành công")
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