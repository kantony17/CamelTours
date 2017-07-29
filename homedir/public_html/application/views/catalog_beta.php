    <!-- Page Body-->
    <br>
    <div class="row" style="text-align:center">
      <div class="small-11 medium-11 large-11 columns small-centered medium-centered large-centered">
        <div class="row">
        	<h3>Welcome to the CamelTours Catalog Beta!</h3>
        	<p>CamelTours is a digitally responsive, ethically responsible and culturally inclusive educational tool. As a fluid immersive technology, CamelTours can serve a diverse set of purposes. Below are example tours:</p>
        </div>
          
        <div class="row" id="mapHolder"></div>
    <!--<div class="small-12 medium-5 large-4 columns">
      
    
	<table style="width:325%">
	  <tr>
	    <th>Tour Name</th>
	    <th>Tour Creator</th>
	    <th>Location</th>
	  </tr>-->
        <div class="row" id="catalog">
        <?php
            foreach ($tours as $tour){
                $tour_link= $tour[0];
                $tour_name= $tour[1];
                $tour_location= $tour[2];
                $tour_id= $tour[5];
                $tour_item ='
                <div class="container" id="'.$tour_id.'">
                  <img src="'.base_url().'media/img/img_avatar.png" alt="Avatar" class="image">
                  <div class="overlay">
                    <div class="text">
                        <span class="tour">'.$tour_name.'</span><br>
                        <span class="creator">Creator</span><br>
                        <a class="discover" href="'.$tour_link.'"><span>Discover </span></a>
                    </div> 
                  </div>
                </div>';
                
                echo $tour_item;
            }
        ?>
        </div>
      </div>
   </div>
        <script>
            function myMap() {
                var mapHolder = document.getElementById("mapHolder");
                mapHolder.style.height ="310px"
                
                var mapDiv = document.createElement("div");
                mapDiv.setAttribute("id","map");
                mapDiv.style.height ="300px"
                mapHolder.appendChild(mapDiv);
                var mapOptions = {
                        center: new google.maps.LatLng(41.3311485, -72.3895955),
                        zoom: 10,
                        };
                var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            <?php
                foreach ($tours as $tour) {
                    $tour_link = $tour[0];
                    $tour_name = $tour[1];
                    $tour_location = $tour[2];
                    $tour_lat = $tour[3];
                    $tour_long = $tour[4];
                    $tour_id= $tour[5];
                    $tour_link2 = '<a class=\"link\" href=\"'.base_url().'/'.$tour_link.'\">'.$tour_name.'</a>';

                    echo 'var marker'.$tour_id.' = new google.maps.Marker({
                            position: new google.maps.LatLng('.$tour_lat.','.$tour_long.'),
                            title: "'.$tour_name.'"});
                        var contentString = "<img src=\"'.base_url().'/ct/u16/t10/n102/media/thumbs/58f12d2621f28.jpg\">'.$tour_link2.'<div class=\"info\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>";
                        marker'.$tour_id.'.info = new google.maps.InfoWindow({
                            content: contentString,
                            maxWidth: 250});
                        document.getElementById("'.$tour_id.'").addEventListener("click", function() {
                            marker'.$tour_id.'.setAnimation(google.maps.Animation.BOUNCE);
                            map.setCenter({lat : '.$tour_lat.',lng : '.$tour_long.'});
                            map.setZoom(15);
                            marker'.$tour_id.'.info.open(map, marker'.$tour_id.');
                            var time'.$tour_id.' = setTimeout(function(){
                                marker'.$tour_id.'.setAnimation(null);
                                clearTimeout(time'.$tour_id.');
                                marker'.$tour_id.'.info.close(map, marker'.$tour_id.')
                            }, 3000);
                        });    
                        marker'.$tour_id.'.addListener("click", function() {
                            this.info.open(map, this);
                        });
                        marker'.$tour_id.'.setMap(map);';
                }
            ?>
            }
        </script>
        <?php echo '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZRfXTzzroSaw75H3RmUSAuO14haEZtHQ&callback=myMap"></script>';?>
