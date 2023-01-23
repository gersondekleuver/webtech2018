<?php
    // markup.php: contains the php for user input markup used when users
    // create posts and/or threads.

    function markup($text) {
        // returns text in html format with bold and italic text being taken
        // care of

        $bTot = 1;
        $iTot = 1;
        for ($j = 0; $j < strlen($text); $j++) {
            if ($text[$j] == "*") {
                $bTot += 1;
            } 
            else if ($text[$j] == "^") {
                $iTot += 1;
            }
        }
        $bTot = $bTot - ($bTot % 2);
        $iTot = $iTot - ($iTot % 2);

        $newtext = "";
        $b = 0;
        $i = 0;
        for ($j = 0; $j < strlen($text); $j++) {
            if ($text[$j] == "*" && $b < $bTot) {
                if ($b % 2 == 0) {
                    $newtext .= "<b>";
                }
                else {
                    $newtext .= "</b>";
                }
                $b += 1;
            }
            else if ($text[$j] == "^" && $i < $iTot) {
                if ($i % 2 == 0) {
                    $newtext .= "<i>";
                }
                else {
                    $newtext .= "</i>";
                }
                $i += 1;
            }
            else {
                $newtext .= $text[$j];
            }
        }
        return $newtext;
    }

    function makeLink($text) {
        // returns text in html format with hrefs being taken care of
        
        $flipped = false;
        $store = false;
        $newtext = "";
        $href = "";
        $j = 0;
        for($i = 0; $i < strlen($text); $i++) {
            if ($text[$i] == "|") {
                $flipped = true;
                if ($j == 1) {
                    $link = explode(";", $href);
                    $newtext .= "<a class='link' href=" . $link[1] . ">" . $link[0] . "</a>";
                    $j = 0;
                    $href = "";
                    $store = false;
                }
                else {
                    $store = true;
                    $j += 1;
                }
            }
            else {
                if ($store) {
                    $href .= $text[$i];
                }
                else {
                    $newtext .= $text[$i];
                }
            }
        }
        if ($flipped) {
            return "<span nowrap>" . $newtext;
        }
        else {
            return $newtext;
        }
    }

?>