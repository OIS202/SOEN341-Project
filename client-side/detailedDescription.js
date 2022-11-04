function showIt(id){
    let button = "button";
    let newID = button.concat(id);
    style = document.getElementById(newID);
    if(window.getComputedStyle(style).display == "none"){
        document.getElementById(newID).style.display = "block";
        document.getElementById(id).className = "fa-solid fa-angles-up";
    }else if(window.getComputedStyle(style).display == "block"){
        document.getElementById(newID).style.display = "none";
        document.getElementById(id).className = "fa-solid fa-angles-down";
    }    
}
function showDelete(){
    //alert(id);
    //let status = "status";
    //let statusID = status.concat(id);
    var status1 = document.getElementById("status1").innerHTML;
    var test = "Pending";
    var statuses = document.getElementsByClassName("status");
    for (let index = 0; index < statuses.length; index++) {
        var inner = statuses.item(index).innerHTML;
        if(inner == test){
            var deleteThis = "delete";
            var idNeeded = deleteThis.concat(index+1);
            document.getElementById(idNeeded).style.display = "none";
        }
        
    }
    //alert(statusID);
}