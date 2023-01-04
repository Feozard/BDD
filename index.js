var isOnClients = true;

document.getElementById("clients").onclick = function() {
    isOnClients = true;
    console.log("hello")
    
    document.getElementById("clients").style.borderBottom = "4px solid #22333B";
    document.getElementById("orders").style.borderBottom = "4px solid transparent";
}

document.getElementById("orders").onclick = function() {
    isOnClients = false;
    console.log("hello2")
    
    document.getElementById("clients").style.borderBottom = "4px solid transparent";
    document.getElementById("orders").style.borderBottom = "4px solid #22333B";
}

