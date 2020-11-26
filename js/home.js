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
items = [
    {name : "Home",		link : "./index.html"},
    {name : "About",	link : "./about.html"},
    {name : "Works",	link : "./works.html"},
    {name : "Services", link : "./services.html"},
    {name : "Contacts", link : "./contacts.html"}                
]
createNavItem(items, name)
window.scroll(0, 0)
