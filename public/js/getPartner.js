$.get(
    "../controllers/PartnerController.php?type=list"
).then((d,stsm, xhr) => {
    data = JSON.parse(d);
    console.log(data)
    partners = [];
    for (let i = 0; i < data.length; i++) {
        const element = data[i];
        namep = element[0];
        img = element[1];
        b64type = element[2];
        desc = element[3];
        partners.push({
            name: namep,
            src : "data:image/" + b64type + ";base64," + img,
            description: desc
        })
    }
    createPartnerItem(partners);
})