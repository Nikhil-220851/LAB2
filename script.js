var name="Nikhil";
function greet(){
    console.log("Hello, "+name+"! Welcome to Mail Section.");
}
greet();
var c=30;
console.log(c);
function a(){
    function b(){
        console.log(name);
    }
    b();
}
a();
function outer(){
    let a=10;
    function inner(){
        let a=100;
        console.log("inner a: "+a);
    }
    console.log("outer a: "+a);
    inner();
}
outer();
(function (name){
    alert("Hi "+name+" Bobbadhi Welcome to Mail Section.");
})(name);

let s1=Symbol("id");
let s2=Symbol("id");
console.log(s1===s2);

let array=[1,2,3,4,5];
for(let i of array){
    console.log(i);
}

function discount(){
    document.getElementById("discount").innerText="89$";
    alert("Coupon Applied! You got 10$ off.");
}

const nameInput = localStorage.getItem("userName") ;
if(nameInput){
    document.getElementById("Heading").innerText = "Welcome, " + nameInput + "! to our Mail";
}

user={
    name:"Nikhil-220851",
    age:"19",
    branch:"CSE",
    role:"Web-Developer"
}

document.getElementById("Frmname").innerText=user.name;
document.getElementById("Frmage").innerText=user.age;
document.getElementById("Frmbranch").innerText=user.branch;
document.getElementById("Frmposition").innerText=user.role;

window.role = function() {
    const positionEl = document.getElementById("Frmposition");
    if(positionEl.innerText === "Web-Developer"){
        positionEl.innerText = "Game-Developer";
    } else {
        positionEl.innerText = "Web-Developer";
    }
};