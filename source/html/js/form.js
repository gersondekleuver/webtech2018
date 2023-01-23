$( document ).ready(function() {
    // runs on every form submit
    $('form').on('submit', function(){ 
        // runs after every successful request
        $.post($(this).attr('action'), $(this).serialize(), function(message) {
            if (message) {
                var message = message.split(" | ");

                // enables displaying error/success messages
                try {
                    var messageBox = document.getElementById(message[0]);
                    messageBox.innerHTML = message[1];
                    messageBox.style.color = message[2] || "#fc8686"; //"#66ff66"
                    messageBox.style.display = "block";
                } catch {}

                // enables redirecting to any page after any delay value
                if (message[3]) {
                    if (isNaN(message[3])) {
                        window.setTimeout(function(){ window.location.replace(message[3]); }, message[4] || 0);
                    } else {
                        window.setTimeout(function(){ location.reload(); }, message[3]);
                    }
                }
            } else {
                // reloads page if php action script did not return anything
                location.reload();
            }
        });
        // makes sure users aren't redirected to the form action page
        return false;
    });
});