/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function toggle_function() {
    var x = document.getElementById("sidemenu");
    if (x.className === "sidemenu") {
        x.className += " responsive";
    } else {
        x.className = "sidemenu";
    }
}
