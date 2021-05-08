<x-app-layout>
   <x-slot name="header">

   <style type="text/css">



      .table-responsive{
         height: 458px;
      }


      
      .event-actions{
         background-color: #ffffff;
         color: black;
         padding: 10px 5px;
         top: auto;
         left: 0;
         right: 0;
         height: 40px;
         max-width: 1000px;
         width: 100%;
         margin-left: 50px;
         position: relative;
      }

      
      .event-actions a {
         color: black;
         text-decoration: none;
      }


      #archived-table{
         margin-top: 20px;
      }


      #map {
        height: 400px;
        width: 440px;
        margin-left: 1060px;
        margin-top: 120px;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }   

      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #event-postcode {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #event-postcode {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }

      #target {
        width: 345px;
      }


   </style>
   

      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         All Events<b> </b>
      </h2>
   </x-slot>
   <div class="py-12">
   <div class="container">
         <div class = "row">
            <div class="col-md-10">
               <div class="card">
                  @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong>{{ session('success' ) }}</strong>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span> 
                     </button>
                  </div>
                  @endif
                  <div class="card-header">All Event</div>
                  <div class="table-responsive">
                  <table class="table table-hover table">
                     <thead>
                        <tr>
                           <th scope="col">ID</th>
                           <th scope="col">Event Name</th>
                           <th scope="col">Event Organiser</th>
                           <th scope="col">Event Postcode</th>
                           <th scope="col">Event Date</th>
                           <th scope="col">Event Description</th>
                           <th scope="col">Covid Limit</th>
                           <th scope="col">Created At</th>
                           <th scope="col">Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        <!-- @php($i = 1) -->
                        @foreach($events as $event)
                        <tr>
                           <th scope="row">{{$events->firstItem()+$loop->index }}</th>
                           <td style="text-align:center;">{{$event->event_name}}</td>
                           <td style="text-align:center;">{{$event->user->name}}</td>
                           <td style="text-align:center;">{{$event->event_location}}</td>
                           <td style="text-align:center;">{{$event->event_date}}</td>
                           <td style="text-align:center;">{{$event->event_description}}</td>
                           <td style="text-align:center;">{{$event->covid_limit}}</td>
                           <td>
                              @if($event->created_at == NULL)
                              <span class ="text-danger">No Date Set</span>
                              @else
                              {{  Carbon\Carbon::parse($event->created_at)->diffForHumans() }}
                              @endif
                           </td>
                           <td>
                           <div class="btn-group">
                        <button type="button" class="btn btn-danger">Event Actions</button>
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                           <li class="event-actions"><a href="#">View</a></li>
                           <li class="event-actions"><a href="#">Register</a></li>
                           <li class="event-actions"><a href="{{url('event/edit/'.$event->id) }}">Edit</a></li>
                           <li class="event-actions"><a href="{{url('softdelete/event/'.$event->id) }}">Cancel</a></li>
                        </ul>
                           </div>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>

                  </table>
                  </div>
                  {{ $events->links() }}
               </div>
            </div>
            <div class="col-md-2">
               <div class="card">
                  <div class="card-header">Create a New Event</div>
                  <div class="card-body">
                     <form action="{{route('store.event')}}"method="POST">
                        @csrf
                        <div class="mb-2">
                           <label for="exampleInputEmail1">Event Name</label>
                           <input type="text" name="event_name" class="form-control" 
                              id="exampleInputEmail1" aria-describedby="emailHelp">
                           @error('event_name')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="mb-2">
                           <label for="exampleInputEmail1">Event Postcode</label>
                           <input type="text" name="event_location" class="form-control" 
                              id="exampleInputEmail1" aria-describedby="emailHelp">
                           @error('event_location')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="mb-2">
                           <label for="exampleInputEmail1">Event Date</label>
                           <input type="date" name="event_date" class="form-control" 
                              id="exampleInputEmail1" aria-describedby="emailHelp">
                           @error('event_date')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="mb-2">
                           <label for="exampleInputEmail1">Event Description</label>
                           <input type="text" name="event_description" class="form-control" 
                              id="exampleInputEmail1" aria-describedby="emailHelp">
                           @error('event_description')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="mb-2">
                           <label for="exampleInputEmail1">Covid Limit</label>
                           <input type="number" min="0" name="covid_limit" class="form-control" 
                              id="exampleInputEmail1" aria-describedby="emailHelp">
                           @error('covid_limit')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
         
                        <button type="submit" class="btn btn-primary">Confirm Event</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--Trash Part -->
      <div id="archived-table" class= "container">
         <div class = "row">
            <div class="col-md-10">
               <div class="card">
                  <div class="card-header">Trash List</div>
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">ID</th>
                           <th scope="col">Event Name</th>
                           <th scope="col">Event Organiser</th>
                           <th scope="col">Event Postcode</th>
                           <th scope="col">Event Date</th>
                           <th scope="col">Event Description</th>
                           <th scope="col">Covid Limit</th>
                           <th scope="col">Created At</th>
                           <th scope="col">Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        <!-- @php( $i= 1) -->
                        @foreach($trashEvent as $event)
                        <tr>
                           <th scope="row">{{$events->firstItem()+$loop->index}}</th>
                           <td style="text-align:center;">{{$event->event_name}}</td>
                           <td style="text-align:center;">{{$event->user->name}}</td>
                           <td style="text-align:center;">{{$event->event_location}}</td>
                           <td style="text-align:center;">{{$event->event_date}}</td>
                           <td style="text-align:center;">{{$event->event_description}}</td>
                           <td style="text-align:center;">{{$event->covid_limit}}</td>
                           <td>
                              @if($event->created_at == NULL)
                              <span class ="texts-danger">No Date Set</span>
                              @else
                              {{ Carbon\Carbon::parse($event->created_at)->diffForHumans()}}
                              @endif
                           </td>
                           <td>
                              <div class="btn-group">
                           <button type="button" class="btn btn-danger">Event Actions</button>
                           <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                           <span class="caret"></span>
                           <span class="sr-only">Toogle Dropdown</span>
                           </button>
                           <ul class="dropdown-menu" role="menu">
                              <li class="event-actions"><a href="{{ url('event/restore/'.$event->id) }}" class="btn btn-info">Restore</a>
                              <li class="event-actions"><a href="{{url('pdelete/event/'.$event->id) }}" class="btn btn-danger">Delete</a>
                        </ul>
                           </div>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                  {{$trashEvent->links()}}
               </div>
            </div>
            <div class="col-md-4">
            </div>
         </div>
      </div>
      <!-- End Trash -->


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
</x-app-layout>