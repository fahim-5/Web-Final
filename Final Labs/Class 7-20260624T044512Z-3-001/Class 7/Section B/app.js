document.getElementById("btnPlus").addEventListener("click",increaseCount);

let count = 0;

function updateCount(){
    document.getElementById("count").textContent=count;
}

function increaseCount(){
    count++;
    console.log(count);
    updateCount();
}