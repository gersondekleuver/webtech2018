class Reply {

    trim(str) {
        var trimmed = str.replace(/^\s+|\s+$/g, '');
        var trimmed = trimmed.replace(/<[^>]+>/g, '');
        return trimmed;
    }
    
    // QUOTING AN ENTIRE POST
    userQuote(user, id) {
        var post = document.getElementById("post_" + id);
        var textArea = post.getElementsByClassName("posttext")[0];
        var replyArea = document.getElementById("replytext");
        var text = this.trim(textArea.innerText);
    
        //ignore other reactions
        var store = true;
        var count = 0;
        var text_copy = text;
        text = "";
        for (var i = 0; i < text_copy.length; i++) {
            var char = text_copy[i];
            if(char == "@") {
                store = false;
            }
            else if(char == "\`") {
                count += 1;
                if(count % 2 == 0) {
                    store = true;
                    continue;
                }
            }
            if(store) {
                text += char;
            }
        }

        //paste
        var quote = ' @' + user + ' \`' + this.trim(text) + '\` ';
        var position = replyArea.selectionStart;
        var replytext = replyArea.value;
        replyArea.value = [replytext.slice(0, position), quote, replytext.slice(position), "\n"].join('');
        textArea.focus();
    }

    textMarkup(type) {
        var replyArea = document.getElementById("replytext");
        var scope = [replyArea.selectionStart, replyArea.selectionEnd];


        var text = replyArea.value;
        var selected = text.substring(scope[0], scope[1]);

        for (var i = 0; i < 2; i++) {
            text = text.slice(0, scope[i] + i) + type + text.slice(scope[i] + i);
        }
        if (selected.includes(type)) {
            if (selected[0] == type && selected.slice(-1)[0] == type) {
                text = text.substring(2, text.length - 2);
            } else {
                var textdump = "";
                var tagcount = 0;
                for (var i = 0; i < text.length; i++) {
                    if (text[i] == type) {
                        if (tagcount % 3 == 0) {
                            textdump += text[i];
                        }
                        tagcount++; 
                    } else {
                        textdump += text[i];
                    }
                }
                text = textdump;
            }
        }
        replyArea.value = text;
    }

    textLink() {
        var replyArea = document.getElementById("replytext");
        var scope = [replyArea.selectionStart, replyArea.selectionEnd];

        var text = replyArea.value;
        var selected = text.substring(scope[0], scope[1]);
        if(scope[1] - scope[0] == 0) {
            selected = "text_here";
        }
        var format = "|" + selected + ";link_here|";

        text = text.slice(0, scope[0]) + format + text.slice(scope[1]);
        replyArea.value = text;
    }

    validate() {
        var replyArea = document.getElementById("replytext");
        var text = replyArea.value;

        var iClosed = true;   
        var bClosed = true;
        var bStart = 0;
        var iStart = 0;
        for (var j = 0; j < text.length; j++) {  
            if(text[j] == "*") {
                bClosed = !bClosed;
                if (!bClosed) {
                    bStart = j;
                }
                else if(!iClosed && bStart < iStart) {
                    return false;
                }
            }
            else if (text[j] == "^") {
                iClosed = !iClosed;
                if (!iClosed) {
                    iStart = j;
                }
                else if(!bClosed && iStart < bStart) {
                    return false;
                }
            }
        }
        return true;
    }
}