<x-app-layout>
   <x-slot name="header">
      <style type="text/css">
         body{
            width: 100%;
         }
         #view-event{
            margin-left: 400px;
         }
         .view-event-title{
            background-color: #f5f5f5;
            height: 100px;
            width: 800px;
            margin-top: 50px;
            margin-bottom: -60px;
            margin-left: 6px;
         }
         .event-view-title{
            margin: 1em 0.5em 0;
            margin-left: 90px;
            font-weight: normal;
            position: relative;
            text-shadow: 0 -1px rgba(0,0,0,0.6);
            font-size: 42px;
            line-height: 60px;
            width: 1500px;
            background: #355681;
            background: rgba(53, 86, 129, 0.8);
            border: 1px solid #fff;
            padding: 5px 15px;
            color: #ffffff;
            border-radius: 0 10px 0 10px;
            box-shadow: inset 0 0 5px rgba(53, 86, 129, 0.5);
            text-align: center;
            border-color: #ffffe0;
            border-width: 12px;
         }
         #view-event{
            margin-left: -250px;
            margin-top: 50px;
            border-color: #ff1a1a;
         }
         .card{
            border-color: #000000;
            border-width: 8px;
         }
         h4{
            margin-left: 360px;
            text-decoration: underline;
         }
         .event-details{
            left: 200px;
         }
         .btn{
            left: 248px;
         }
         #map{
            height: 580px;
            width: 620px;
            left: 1280px;
            bottom: 700px;
            border-color: #000000;
            border-width: 4px;
         }
      </style>
      <img src="{{url('/images/Branding-Circle-Plus-Logo.png')}}" class="center" alt="Circle-Plus-logo" />
   </x-slot>

   <body>
   <div class="view-event-title">
      <h2 class="event-view-title">
         View Event<b> </b>
      </h2>
   </div>
   <div id="view-event" class="py-12">
      <div class= "container">
         <div class = "row">
            <div class="col-md-8">
               <div class="card">
                  <div class="card-header"><h4>Event Details</h4></div>
                  <div class="card-body">
                     <form class="event-details" action="{{url('event/view/'.$events->id)}}"method="GET">
                        <div class="card text-white bg-primary mb-3" style="max-width: 22rem; left: 248px;">
                           <div class="card-header">Event Name</div>
                           <div class="card-body">
                              <p class="card-text"  name="event_name" >{{$events->event_name}}</p>
                           </div>
                        </div>
                        <div class="card text-white bg-danger mb-3" style="max-width: 22rem; left: 248px;">
                           <div class="card-header">Event Postcode</div>
                           <div class="card-body">
                              <p class="card-text">{{$events->event_location}}</p>
                           </div>
                        </div>
                        <div class="card text-white bg-primary mb-3" style="max-width: 22rem; left: 248px;">
                           <div class="card-header">Event Date</div>
                           <div class="card-body">
                              <p class="card-text">{{$events->event_date}}</p>
                           </div>
                        </div>
                        <div class="card text-white bg-danger mb-3" style="max-width: 22rem; left: 248px;">
                           <div class="card-header">Event description</div>
                           <div class="card-body">
                              <p class="card-text">{{$events->event_description}}</p>
                           </div>
                        </div>
                        <div class="card text-white bg-primary mb-3" style="max-width: 22rem; left: 248px;">
                           <div class="card-header">Covid Limit</div>
                           <div class="card-body">
                              <p class="card-text">{{$events->covid_limit}}</p>
                           </div>
                        </div>
                        <!-- <button type="submit" class="btn btn-primary">Register for Event</button> -->
                        <a href="{{url('event/cancelupdate') }}" class="btn btn-danger" style="margin-left: 248px;">Return to Events</a>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>






      <script>
      function initAutocomplete() {
        const map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: 54.58333, lng: -5.93333 },
          zoom: 6,
          mapTypeId: "roadmap",
        });
        // Create the search box and link it to the UI element.
        const input = document.getElementById("event-postcode");
        const searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener("bounds_changed", () => {
          searchBox.setBounds(map.getBounds());
        });
        let markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener("places_changed", () => {
          const places = searchBox.getPlaces();
      
          if (places.length == 0) {
            return;
          }
          // Clear out the old markers.
          markers.forEach((marker) => {
            marker.setMap(null);
          });
          markers = [];
          // For each place, get the icon, name and location.
          const bounds = new google.maps.LatLngBounds();
          places.forEach((place) => {
            if (!place.geometry || !place.geometry.location) {
              console.log("Returned place contains no geometry");
              return;
            }
            const icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25),
            };
            // Create a marker for each place.
            markers.push(
              new google.maps.Marker({
                map,
                icon,
                title: place.name,
                position: place.geometry.location,
              })
            );
      
            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }
      
      
   </script>
   <input id="event-postcode" class="controls" type="text" placeholder="search-box"/>
   <div id="map"></div>
   <script src="https:maps.googleapis.com/maps/api/js?key=AIzaSyB61M8nXMU8gqdlSEKZJhJ3ilh643V6Bdc&callback=initAutocomplete&libraries=places&v=weekly" async></script>
   </div>


   </body>

</x-app-layout>

