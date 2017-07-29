		    function myMap() {
		    		var i = 1
				var mapHolder = document.getElementById("mapHolder");
				mapHolder.style.width ="100%"
				mapHolder.style.height ="400px"
				var mapDiv = document.createElement("div");
				mapDiv.setAttribute("id","map");
				mapDiv.style.width ="100%"
				mapDiv.style.height ="400px"
				mapHolder.appendChild(mapDiv);
				var mapOptions = {
		                	center: new google.maps.LatLng(41.3787,-72.1046),
			        	zoom: 17
	             		};
				var map = new google.maps.Map(document.getElementById("map"), mapOptions);
				var label1 = "No"
				var label2 = (isNaN(parseInt(label1))) ? "" : label1;
				var marker = new google.maps.Marker({
          			position: new google.maps.LatLng(41.3787,-72.1046),label:label2,
					title:"Node 1 Cute Dogs"
				});
				marker.info = new google.maps.InfoWindow({
 				content: "<a href=\"http://localhost/CamelTours/homedir/public_html/ct/u1/t44/n214\">Node 1 Cute Dogs</a>"
  			});
				marker.addListener("click", function() {
    			this.info.open(map, this);
  			});
          		marker.setMap(map);
          		i++
			}