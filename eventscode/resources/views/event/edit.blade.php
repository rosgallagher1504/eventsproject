<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         Edit Event<b> </b>
      </h2>
   </x-slot>
   <div class="py-12">
      <div class= "container">
         <div class = "row">
            <div class="col-md-8">
               <div class="card">
                  <div class="card-header">Edit Event</div>
                  <div class="card-body">
                     <form action="{{url('event/update/'.$events->id})}}"method="POST">
                        @csrf
                        <div class="mb-3">
                           <label for="exampleInputEmail1">Update Event</label>
                           <input type="text" name="event_name" class="form-control" 
                              id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$events->event_name}}">
                           @error('event_name')
                           <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Event</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>