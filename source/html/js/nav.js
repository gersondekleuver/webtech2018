// nav.js: contains all clientside scripting for the navbar

var dropPageArray = [];
var accountPageArray = [];

var coinTitle;
var coinNav;
var coinRising;
var coinDeclining;

class Nav {

    init() {
        // drop-nav init 
        var buttonArray = document.getElementsByClassName("dropnav");
        dropPageArray = document.getElementsByClassName("droppage");
        
        for (var i = 0; i < buttonArray.length; i++) {
            buttonArray[i].setAttribute("onclick", "nav.show('drop','" + buttonArray[i].dataset.ref + "');");
        }

        for (var i = 0; i < dropPageArray.length; i++) { dropPageArray[i].style.display = "none"; }

        //account-nav init
        buttonArray = document.getElementsByClassName("accountnav");
        accountPageArray = document.getElementsByClassName("accountpage");

        for (var i = 0; i < buttonArray.length; i++) {
            buttonArray[i].setAttribute("onclick", "nav.show('account','" + buttonArray[i].dataset.ref + "');");
        }    

        for (var i = 0; i < accountPageArray.length; i++) { accountPageArray[i].style.display = "none";}

        accountPageArray[0].style.display = "block";

        //coin-nav init 
        
        coinTitle = document.getElementsByClassName("cointitle")[0];
        coinNav = document.getElementById("coinnav");
        coinRising = document.getElementById("coin-rising");
        coinDeclining = document.getElementById("coin-declining");

        coinNav.setAttribute("onclick", "nav.toggle();");
        coinRising.style.display = "block";
        coinDeclining.style.display = "none";
    }

    // displays a menu of a given type and id
    show(type, id) {
        var pageArray = (type == "drop") ? dropPageArray : accountPageArray;
        for (var i = 0; i < pageArray.length; i++) {
            if (pageArray[i].id == id && pageArray[i].style.display == "none") {
                pageArray[i].style.display = "block";
            } else {
                pageArray[i].style.display = "none";
            }
        }
    }

    // a simple toggle button switching the displayed coin information 
    toggle() {
        if (coinRising.style.display == "block") {
            coinTitle.innerHTML = "Most Declining Coins";
            coinDeclining.style.display = "block";
            coinRising.style.display = "none";
            coinNav.innerHTML = "↓";
        } else {
            coinTitle.innerHTML = "Best Rising Coins";
            coinDeclining.style.display = "none";
            coinRising.style.display = "block";
            coinNav.innerHTML = "↑";
        }
    }
}