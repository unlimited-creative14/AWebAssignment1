// limits: [[lb, ub], [lb, ub], ...]
function checkLimit(num, limits) {
    if (limits.length == 0)
        return false;
    if ((num <= limits[0][1]) && (num >= limits[0][0]))
        return true;
    return checkLimit(num, limits.slice(1))
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
window.scroll(0, 0);