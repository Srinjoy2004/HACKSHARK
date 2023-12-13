function myFunction() {
    var x = document.getElementById("myNavbar");
    if (x.className === "navbar") {
        x.className += " responsive";
    } else {
        x.className = "navbar";
    }
}
 
function openConnectionsOverlay() {
    var overlay = document.getElementById("connectionsOverlay");
    overlay.style.display = "flex";
}


function closeConnectionsOverlay() {
    var overlay = document.getElementById("connectionsOverlay");
    overlay.style.display = "none";
}


function openConnectionsOverlay() {
    var overlay = document.getElementById("connectionsOverlay");
    overlay.style.display = "flex";
    
    
    document.body.style.overflow = "hidden";
}


function closeConnectionsOverlay() {
    var overlay = document.getElementById("connectionsOverlay");
    overlay.style.display = "none";
    
    
    document.body.style.overflow = "auto";
}


function closeConnectionsOverlay() {
    var overlay = document.getElementById("connectionsOverlay");
    overlay.style.display = "none";

   
    document.body.style.overflow = "auto";

   
    window.location.href = "index.html"; 
}

 function comingsoon()
 {
    window.alert('Coming Soon');
 }