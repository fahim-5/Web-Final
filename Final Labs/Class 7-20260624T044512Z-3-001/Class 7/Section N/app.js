let count=0;

document.getElementById("btnPlus").addEventListener("click",increaseCount);

document.getElementById("btnMinus").addEventListener("click",decreaseCount);

document.getElementById("btnReset").addEventListener("click",resetCount);

document.getElementById("btnSave").addEventListener("click",saveCount);

document.getElementById("btnLoad").addEventListener("click",loadCount);


function updateCount(){
  document.getElementById("count").innerHTML=count;
}

function increaseCount(){
  count++;
  updateCount();
  console.log(count);
}

function decreaseCount(){
  if(count > 0){
  count--;
  updateCount();
  console.log(count);
  }
}

function resetCount(){
  count = 0;
  updateCount();
}

function saveCount(){
  localStorage.setItem("count",count);
}

function loadCount(){
  let saved = localStorage.getItem("count");

  count = Number(saved);
  updateCount();
}

