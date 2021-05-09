<x-app-layout>
   <x-slot name="header">
      <style type="text/css">
         #edit-event{
         margin-left: 400px;
         }
      </style>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         Edit Event<b> </b>
      </h2>
   </x-slot>
   <div id="edit-event" class="py-12">
      <div class= "container">
         <div class = "row">
            <div class="col-md-8">
               <div class="card">
                  <div class="card-header">Update Event</div>
                  <div class="card-body">
                     <form action="{{url('event/update/'.$events->id)}}"method="POST">
                        @csrf
                        <div class="mb-3">
                           <label for="exampleInputEmail1">Event Name</label>
                           <input type="text" name="event_name" class="form-control" 
                              id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$events->event_name}}">
                           @error('event_name')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="mb-3">
                           <label for="exampleInputEmail1">Event Postcode</label>
                           <input type="text" name="event_location" class="form-control" 
                              id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$events->event_location}}">
                           @error('event_location')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="mb-3">
                           <label for="exampleInputEmail1">Event Date</label>
                           <input type="date" name="event_date" class="form-control" 
                              id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$events->event_date}}">
                           @error('event_date')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="mb-3">
                           <label for="exampleInputEmail1">Event Description</label>
                           <input type="text" name="event_description" class="form-control" 
                              id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$events->event_description}}">
                           @error('event_description')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="mb-3">
                           <label for="exampleInputEmail1">Covid Limit</label>
                           <input type="number" min="0" name="covid_limit" class="form-control" 
                              id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$events->covid_limit}}">
                           @error('covid_limit')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Event</button>
                        <a href="{{url('event/cancelupdate') }}" class="btn btn-danger">Cancel Update</a>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>