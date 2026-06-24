document.getElementById("btnPlus").addEventListener("click",increaseCount);
document.getElementById("btnMinus").addEventListener("click",decreaseCount);
document.getElementById("btnReset").addEventListener("click",resetCount);
document.getElementById("btnSave").addEventListener("click",saveCount);
document.getElementById("btnLoad").addEventListener("click",loadCount);


let count = 0;
// let saved = 0;

function updateCount(){
    document.getElementById("count").textContent=count;
}

function increaseCount(){
    count++;
    console.log(count);
    updateCount();
}

function decreaseCount(){
    if (count > 0){
    count--;
    console.log(count);
    updateCount();
    }
}

function resetCount(){
    count = 0;
    updateCount();
}

function saveCount(){
    // saved = count ;
    localStorage.setItem("Count",count);
}

function loadCount(){
    let saved = localStorage.getItem("Count");
    count = saved ;
    updateCount();
}