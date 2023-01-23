<!-- 
    sidebar.php: this is the file that is included in every main php file
    wherever the sidebar is expected.
-->

<div class="sidebar">
    <!-- top sidebar container -->
    <div id="top">
        <div class="side-header">
            <div id="coinnav">↑</div>
            <div class="cointitle">Best Rising Coins</div>
        </div>
        <div id="coin-rising">
            <?php 
                // fetches desired coin data once
                $coin_data = get_coin_data();
                foreach ($coin_data['rising'] as $coin) {
                    print_coin($coin);
                } 
            ?> 
        </div>
        <div id="coin-declining">
            <?php 
                foreach ($coin_data['declining'] as $coin) {
                    print_coin($coin);
                } 
            ?> 
        </div>
    </div>
    
    <!-- bottom sidebar container -->
    <div id="bot">
        <div class="side-header">
            <div class="cointitle">Top Coins</div>
        </div>
        <div id="coin-top">
            <?php 
                foreach ($coin_data['top'] as $coin) {
                    print_coin($coin);
                } 
            ?> 
        </div>
    </div>
</div>

<?php 

    // returns all desired coin data
    function get_coin_data() {
        $data = json_decode(file_get_contents("https://api.coinlore.com/api/tickers/"), true);
        $data = $data['data'];

        // uses custom sorting function
        usort($data, "sort_top");
        $top = array_slice($data, 0, 5, true);

        // uses custom sorting function
        usort($data, "sort_rising");

        $rising = array_slice($data, 0, 5, true);
        $declining = array_reverse(array_slice($data, -5, 5, true));

        return array("top" => $top, "rising" => $rising, "declining" => $declining);
    }

    function sort_rising($x, $y) {
        return $x["percent_change_24h"] < $y["percent_change_24h"];
    }

    function sort_top($x, $y) {
        return $x["market_cap_usd"] < $y["market_cap_usd"];
    }
    
    function get_absolute($value, $percent) {
        $absolute = ($value / (100 + $percent)) * $percent;
        return round($absolute, 3, 1); // too small numbers shouldn't be shown
    }

    function print_coin($coin) {
        $absolute = get_absolute($coin["price_usd"], $coin["percent_change_24h"]);
        $color = $coin["percent_change_24h"] > 0 ? "#66ff66" : "#fc8686" ;
        echo 
        '<div class="coinbox">
            <div class="cointext">
                <div class="cointype">
                    <div class="coinlogo">
                        <img 
                            src="https://raw.githubusercontent.com/atomiclabs/cryptocurrency-icons/master/32/color/',strtolower($coin["symbol"]),'.png" 
                            alt="',$coin["symbol"],'"
                            onError="this.onerror=null;this.src=\'img/missing.png\';"
                        >
                    </div>
                    <div class="coinname">',$coin["name"],'</div>                                                                        
                </div>
            </div>
            <div class="coindata">
                <div class="gain">
                    <div class="absolute">$',$absolute,'</div>
                    <div class="percentage" style="color:',$color,'"><b>',$coin["percent_change_24h"],'%</b></div>
                </div>
                <div class="marketcap">$',$coin["price_usd"],'</div>
            </div>
        </div>';
    }

?>