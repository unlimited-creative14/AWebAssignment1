// limits: [[lb, ub], [lb, ub], ...]
function checkLimit(num, limits) {
    if (limits.length == 0)
        return false;
    if ((num <= limits[0][1]) && (num >= limits[0][0]))
        return true;
    return checkLimit(num, limits.slice(1))
}

function createNavItem(listItem, name) {
    // Just place a logo in brand tag
    let myLogo = document.createElement("img");
    myLogo.src = "../public/images/lhvl.png"
    myLogo.width = 90;
    myLogo.height = 28;
    myLogo.alt = "LHVL";
    document.getElementsByClassName("navbar-brand")[0].innerHTML = "";
    document.getElementsByClassName("navbar-brand")[0].appendChild(myLogo);

    for (let index = 0; index < listItem.length; index++) {
        const element = listItem[index];
        var li_tag = document.createElement("li")
        li_tag.classList.add("nav-item")
        if (element["name"] == name)
            li_tag.classList.add("active")
        var a_tag = document.createElement("a")
        a_tag.href = element["link"]
        a_tag.innerText = element["rname"]
        a_tag.classList.add("nav-link")
        li_tag.appendChild(a_tag)

        document.getElementById("navListItem").append(li_tag)
    }
}

function createPartnerItem(partners) {
    for (let index = 0; index < partners.length; index++) {
        const partner = partners[index];
        const clientBox = document.getElementById("clientBox");

        let pdiv = document.createElement("div");
        let img = document.createElement("img");
        let h = document.createElement("h4");
        let desc = document.createElement("div");

        pdiv.classList.add("col-sm-6", "col-lg-3", "text-center");

        img.src = partner.src;
        img.style.maxWidth = "100%";
        img.alt = "logo" + partner.name;

        h.innerText = partner.name;

        pdiv.appendChild(img);
        pdiv.appendChild(h);

        clientBox.appendChild(pdiv);
    }
}
items = [
    { name: "Home", rname: "Trang chủ", link: "./index.php" },
    { name: "About", rname: "Giới thiệu", link: "./about.php" },
    { name: "Services", rname: "Dịch vụ", link: "./services.php" },
    { name: "Product", rname: "Sản phẩm", link: "./price.php" },
    { name: "Contacts", rname: "Liên hệ", link: "./contacts.php" }
    // { name: "Login", rname: "Đăng nhập", link: "./login.php" }
]
createNavItem(items, name);
window.scroll(0, 0);