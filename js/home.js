function createNavItem(listItem, name){
    for (let index = 0; index < listItem.length; index++) {
        const element = listItem[index];
        var li_tag = document.createElement("li")
        li_tag.classList.add("nav-item")
        if (element["name"] == name)
            li_tag.classList.add("active")
        var a_tag = document.createElement("a")
        a_tag.href = element["link"]
        a_tag.innerText = element["name"]
        a_tag.classList.add("nav-link")
        li_tag.appendChild(a_tag)

        document.getElementById("navListItem").append(li_tag)
    }
}
function createPartnerItem(partners){
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
    {name : "Trang chủ",		link : "./index.html"},
    {name : "Giới thiệu",	link : "./about.html"},
    {name : "Dịch vụ", link : "./services.html"},
    {name : "Bảng giá",	link : "./price.html"},
    {name : "Liên hệ", link : "./contacts.html"}                
]
partners = [
    {name: "Company 1", src: "./images/partner_icon/logo1.png", description: ""},
    {name: "Company 2", src: "./images/partner_icon/logo2.png", description: ""},
    {name: "Company 3", src: "./images/partner_icon/logo3.jpg", description: ""},
    {name: "Company 4", src: "./images/partner_icon/logo4.jpg", description: ""},
    {name: "Company 5", src: "./images/partner_icon/logo5.png", description: ""},
    {name: "Company 6", src: "./images/partner_icon/logo2.png", description: ""},
    {name: "Company 7", src: "./images/partner_icon/logo3.jpg", description: ""},
    {name: "Company 8", src: "./images/partner_icon/logo4.jpg", description: ""}
]
createNavItem(items, name);
window.scroll(0, 0);
createPartnerItem(partners);
