/*
function normSignIn() {
    $(".signout-btn").css("display", "block");
    $(".login-btn").css("display", "none");
    $(".signout-btn").css("display", "inline-block");
    $(".signout-btn").css("margin-left", "53%");
}
$(document).ready(function(){  
    normSignIn();
})
function normsignOut() {
    alert("You have been signed out successfully");
    $(".signout-btn").css("display", "none");
    $("login-btn").css("display", "block");
}
$(document).ready(function(){  
    normsignOut();
})
*/
function swapStyleSheet() {
    document.getElementById("pagestyle").setAttribute("href", sheet); 
}

function initiate() {
    var style1 = document.getElementById("out");
    var style2 = document.getElementById("in");

    style1.onclick = swapStyleSheet("css/styles.css");
    style2.onclick = swapStyleSheet("css/loggedstyles.css");
}

window.onload = initiate;