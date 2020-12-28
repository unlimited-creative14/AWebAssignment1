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
                <div class="card m-3" style="width: 18rem;">
                    <img class="card-img-top" src="${imgsrc}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">${pname}</h5>
                        <p class="card-text">${desc}</p>
                        <a href="#" class="btn btn-primary">Liên hệ</a>
                    </div>
                </div>`;
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
                        <a class="btn btn-primary" style="max-width:40%" value=${id} id="edit${id}" onclick=editClick(this.attributes["value"].value)>Edit</a>
                        <a class="btn btn-primary" style="max-width:40%" value=${id} id="remove${id}" onclick=removeClick(this.attributes["value"].value)>Remove</a>
                    </div>
                    <img class="card-img-top" src="${imgsrc}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">${pname}</h5>
                        <p class="card-text">${desc}</p>
                        <a href="#" class="btn btn-primary">Liên hệ</a>
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
        title: 'Edit product',
        html:
          `<input id="pname" class="swal2-input" value=${pname} placeholder="Ten san pham">
          <img id="imgPreview" class="swal2-image" src=${imgBase64}></img> 
          <input id="refImg" type="file" accept="image/*" class="swal2-file" onchange=changeRefImg(event)>
          <input id="price" class="swal2-input" value=${price} placeholder="Gia san pham">
          <textarea id="other" type="text" class="swal2-textarea" value="${other}" placeholder="Thong tin them"></textarea>`,
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
                        title: 'Edit success'
                    })
                }
                else {
                    Swal.fire({
                        title: 'Edit failed'
                    })
                }
            })
        }
    );
}

function removeClick(id) {
    Swal.fire({
        title: 'Delete product ' + id,
        text: 'Do you want to continue',
        icon: 'info',
        confirmButtonText: 'Cool'
      }).then() 
}

$("#editBtn").click(() => {
    // enter edit mode
    if(!editmode)
    {
        loadEditProduct();
        $(".card-overlay").css("display", "flex")
        editmode = true; 
        addBtn = $('<div class="btn btn-primary" id="addBtn">Them</div>');
        $("#prodControlGroup").append(addBtn);
    }
    else {
        loadProduct()
        editmode = false; 
        $("#addBtn").remove();
    }
    
})


loadProduct()
