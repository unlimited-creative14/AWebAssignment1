const counters = document.querySelectorAll('.counter');
const speed = 200;

counters.forEach(counter => {
    const UpdateCount = () =>{
        const target = +counter.getAttribute('data-target')
        const count = +counter.innerText;
        const inc = Math.ceil(target / speed);
        if (count < target) {
            counter.innerText = count + inc;
            setTimeout(UpdateCount, 1);
        }
        else{
            counter.innerText = target;
        }
    }
    UpdateCount();
});