var iconArray = [""];
var choice;

class Icon {

    // initializes icon button functions if user is logged in
    init() {
        try {
            for (var i = 1; i <= 6; i++) {
                var button = document.getElementById("icon_" + i);
                button.setAttribute("onclick", "icon.set(" + i + ");");
                iconArray.push(button);
            }

            choice = document.getElementsByName("_icon")[0];
        } catch {}
    }

    // sets the users icon choice to clicked icon
    set(id) {
        for (var i = 1; i <= 6; i++) {
            if (iconArray[i].id.endsWith(id)) {
                iconArray[i].style.background = "#00000033";
                choice.value = id;
            } else {
                iconArray[i].style.background = "#424242";
            }
        }
    }
}