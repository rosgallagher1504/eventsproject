<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         All Event<b> </b>
      </h2>
   </x-slot>
   <div class="py-12">
      <div class= "container">
         <div class = "row">
            <div class="col-md-8">
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
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">SL No</th>
                           <th scope="col">Event Name</th>
                           <th scope="col">User Name</th>
                           <th scope="col">Event Location</th>
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
                           <td>{{$event->event_name}}</td>
                           <td>{{$event->user->name}}</td>
                           <td>{{$event->event_location}}</td>
                           <td>{{$event->event_date}}</td>
                           <td>{{$event->event_description}}</td>
                           <td>{{$event->covid_limit}}</td>
                           <td>
                              @if($event->created_at == NULL)
                              <span class ="text-danger">No Date Set</span>
                              @else
                              {{  Carbon\Carbon::parse($event->created_at)->diffForHumans() }}
                              @endif
                           </td>
                           <td>
                              <a href=" {{url('event/edit/'.$event->id) }}" class="btn btn-info">Edit</a>
                              <a href=" {{url('softdelete/event/'.$event->id) }}" class="btn btn-danger">Cancel</a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                  {{ $events->links() }}
               </div>
            </div>
            <div class="col-md-4">
               <div class="card">
                  <div class="card-header">Add Event Field</div>
                  <div class="card-body">
                     <form action="{{route('store.event')}}"method="POST">
                        @csrf
                        <div class="mb-3">
                           <label for="exampleInputEmail1">Event Name</label>
                           <input type="text" name="event_name" class="form-control" 
                              id="exampleInputEmail1" aria-describedby="emailHelp">
                           @error('event_name')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Add Event</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--Trash Part -->
      <div class= "container">
         <div class = "row">
            <div class="col-md-8">
               <div class="card">
                  <div class="card-header">Trash List</div>
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">SL No</th>
                           <th scope="col">Event Name</th>
                           <th scope="col">User Name</th>
                           <th scope="col">Created At</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <!-- @php( $i= 1) -->
                        @foreach($trashEvent as $event)
                        <tr>
                           <th scope="row">{{$events->firstItem()+$loop->index}}</th>
                           <td>{{$event->event_name}}</td>
                           <td>{{$event->user->name}}</td>
                           <td>
                              @if($event->created_at == NULL)
                              <span class ="texts-danger">No Date Set</span>
                              @else
                              {{ Carbon\Carbon::parse($event->created_at)->diffForHumans()}}
                              @endif
                           </td>
                           <td>
                              <a href="{{ url('event/restore/'.$event->id) }}" class="btn btn-info">Restore</a>
                              <a href="{{url('pdelete/event/'.$event->id) }}" class="btn btn-danger">Delete</a>
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
   </div>
</x-app-layout>