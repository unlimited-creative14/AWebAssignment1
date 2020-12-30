editmode = false;
data = [];
function loadProduct() {
    $("#productCardList").empty();
    $.get(
        "../controllers/productController.php?type=list"
    ).then((d, sts, xhr) => {
        data = JSON.parse(d);
        for (let index = 0; index < data.length; index++) {
            const element = data[index];
            id = element[0]
            pname = element[1]
            imgsrc = element[2]
            price = element[3]
            desc = element[5]
            cardTemplate = `
                <a href="./productDetail.php?id=${id}" style="text-decoration:none">
                    <div class="card m-2" style="width: 18rem;">
                        <img class="card-img-top" src="${imgsrc}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">${pname}</h5>
                            <p class="card-text">${desc}</p>
                            <a href="#" class="btn btn-primary">${price}</a>
                        </div>
                    </div>
                </a>`;
            $("#productCardList").append(cardTemplate);            
        }
    })    
}
function loadEditProduct() {
    $("#productCardList").empty();
    $.get(
        "../controllers/productController.php?type=editlist"
    ).then((d, sts, xhr) => {
        data = JSON.parse(d);
        for (let index = 0; index < data.length; index++) {
            const element = data[index];
            id = element[0]
            pname = element[1]
            imgsrc = element[2]
            price = element[3]
            desc = element[5]
            cardTemplate = `
                <div class="card m-3" style="width: 18rem;">
                    <div class="card-overlay d-flex" style="flex-direction: column;">
                        <a class="btn btn-primary" style="max-width:40%" value=${id} id="access${id}" href="./productDetail.php?id=${id}">Truy cập</a>
                        <a class="btn btn-primary" style="max-width:40%" value=${id} id="edit${id}" onclick=editClick(this.attributes["value"].value)>Sửa</a>
                        <a class="btn btn-primary" style="max-width:40%" value=${id} id="remove${id}" onclick=removeClick(this.attributes["value"].value)>Xoá</a>
                    </div>
                    <img class="card-img-top" src="${imgsrc}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">${pname}</h5>
                        <p class="card-text">${desc}</p>
                        <a href="#" class="btn btn-primary">${price}</a>
                    </div>
                </div>`;
            $("#productCardList").append(cardTemplate);            
        }
    })    
}

function deleteProduct(pid) {
    $.post(
        "../controllers/productController.php?type=delete",
        {
            'id' : pid
        }
    ).then((d, sts, xhr) =>{
        data = JSON.parse(d);
        alert(data);
    })
}
async function editForm(pname, imgBase64, price, other)
{
    formVal = await Swal.fire({
        title: 'Chỉnh sửa sản phẩm',
        html:
          `<input id="pname" class="swal2-input" value=${pname} placeholder="Tên sản phẩm">
          <img id="imgPreview" class="swal2-image" src=${imgBase64}></img> 
          <input id="refImg" type="file" accept="image/*" class="swal2-file" onchange=changeRefImg(event)>
          <input id="price" class="swal2-input" value=${price} placeholder="Giá">
          <textarea id="other" type="text" class="swal2-textarea" value="${other}" placeholder="Thông tin thêm"></textarea>`,
        focusConfirm: false,
        preConfirm: () => {
          return [
            document.getElementById('pname').value,
            document.getElementById('imgPreview').attributes["src"].value,
            document.getElementById('price').value,
            document.getElementById('other').value
          ]
        }
    })
    return formVal
}

async function addForm()
{
    formVal = await Swal.fire({
        title: 'Thêm sản phẩm',
        html:
          `<input id="pname" class="swal2-input" placeholder="Ten san pham">
          <img id="imgPreview" class="swal2-image" ></img> 
          <input id="refImg" type="file" accept="image/*" class="swal2-file" onchange=changeRefImg(event)>
          <input id="price" class="swal2-input" placeholder="Gia san pham">
          <textarea id="other" type="text" class="swal2-textarea" placeholder="Thong tin them"></textarea>`,
        focusConfirm: false,
        preConfirm: () => {
          return [
            document.getElementById('pname').value,
            document.getElementById('imgPreview').attributes["src"].value,
            document.getElementById('price').value,
            document.getElementById('other').value
          ]
        }
    })
    return formVal
}

function changeRefImg(params) {
    files = params.target.files[0]
    console.log(files)
    reader = new FileReader()

    reader.onload = function(e) {
        $('#imgPreview').attr('src', e.target.result);
    }

    reader.readAsDataURL(files)
}

function addClick() {
    addForm().then(
        (fv) => {
            formVal = fv.value
            if (typeof(formVal) == 'undefined')
                return;
            $.post(
                "../controllers/productController.php?type=create",
                {
                    "pname" : formVal[0],
                    "img" : formVal[1],
                    "price" : formVal[2],
                    "other" : formVal[3]
                }
            )
            .then((d, st, xhr) => {
                if (st != 'success')
                    Swal.fire({
                        title: 'Thêm thất bại'
                    })
                else{
                    cdata = JSON.parse(d)
    
                    if (cdata[0] == true){
                        Swal.fire({
                            title: 'Thêm thành công'
                        })
                        loadEditProduct()
                    }
                    else {
                        Swal.fire({
                            title: 'Thêm thất bại'
                        })
                    }
                }
                
            })
        }
    )
}

function editClick(id) {
    for (let index = 0; index < data.length; index++) {
        const element = data[index];
        if (element[0] == id)
            item = element
    }
    editForm(item[1], item[2], item[3], item[5]).then(
        (pr) => {
            formVal = pr.value
            if (typeof(formVal) == 'undefined')
                return;
            console.log(formVal)
            $.post(
                "../controllers/productController.php?type=edit",
                {
                    "id" : id,
                    "pname" : formVal[0],
                    "img" : formVal[1],
                    "price" : formVal[2],
                    "other" : formVal[3]
                }
            ).then((d, st, xhr) => {
                cdata = JSON.parse(d)
                if (cdata[0]){
                    Swal.fire({
                        title: 'Sửa thành công'
                    })
                    loadEditProduct()
                }
                else {
                    Swal.fire({
                        title: 'Sửa thành công'
                    })
                }
            })
        }
    );
}

function removeClick(id) {
    Swal.fire({
        title: 'Xoá tin số ' + id,
        text: 'Bạn chắc chắn chứ?',
        icon: 'info',
        confirmButtonText: 'Ok',
        cancelButtonText: 'Huỷ'        
      }).then(
          (v) => {
              if (v.isConfirmed)
              {
                  $.post(
                      "../controllers/productController.php?type=delete", 
                      {
                        "id" : id
                      }
                  ).then(
                      (d, sts, xhr) => {
                        cdata = JSON.parse(d)
                        if (cdata[0]){
                            Swal.fire({
                                title: 'Xoá thành công',
                                icon: 'info'
                            })
                            loadEditProduct()
                        }
                        else {
                            Swal.fire({
                                title: 'Xoá thất bại',
                                icon: 'danger'
                            })
                        }
                      }
                  )
              }
          }
      ) 
}


