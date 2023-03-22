
var MenuItems = document.getElementById("MenuItems");

MenuItems.style.maxHeight = "0px";
function menutoggle() {
    // body...
    if (MenuItems.style.maxHeight == "0px") {
        MenuItems.style.maxHeight = "200px"
    } else {
        MenuItems.style.maxHeight = "0px"
    }
}


var icon = document.getElementById('icon');
var menu = document.getElementById('menu-toggle')

if(localStorage.getItem("theme") == null){
    localStorage.setItem("theme", "light");
}

let localData = localStorage.getItem("theme");

if( localData == "light"){
    icon.src = "../image/moon.png";
    menu.src = "../image/menu.png";
    document.body.classList.remove("dark-theme");
}else if(localData == "dark"){
    icon.src = "../image/sun.png";
    menu.src = "../image/menu-light.png"
    document.body.classList.add("dark-theme");
}

icon.onclick = function() {
    console.log('cambio de aspecto')
    document.body.classList.toggle('dark-theme');
    if (document.body.classList.contains('dark-theme')) {
        icon.src = "../image/sun.png";
        menu.src = "../image/menu-light.png";
        localStorage.setItem("theme" , "dark");
    } else {
        icon.src = "../image/moon.png";
        menu.src = "../image/menu.png";
        localStorage.setItem("theme" , "dark");
    }
}


