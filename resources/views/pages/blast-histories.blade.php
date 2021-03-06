<x-layout-dashboard title="Auto Replies">
  
    <div class="app-content">
        <link href="{{asset('plugins/datatables/datatables.min.css')}}" rel="stylesheet">
        <link href="{{asset('plugins/select2/css/select2.css')}}" rel="stylesheet">
        <link href="{{asset('css/custom.css')}}" rel="stylesheet">
        <div class="content-wrapper">
            <div class="container">
                @if (session()->has('alert'))
                <x-alert>
                    @slot('type',session('alert')['type'])
                    @slot('msg',session('alert')['msg'])
                </x-alert>
             @endif
             @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
               
           
                
    
<div class="row mt-4">
  <div class="col">
      <div class="card">
          <div class="card-header d-flex justify-content-between">
          <h5 class="card-title">Histories</h5>

          <div class="d-flex">
          
            <form action="{{route('deleteBlast')}}" method="POST">
              @method('delete')
              @csrf
              <button type="submit" class="btn btn-danger btn-sm">Delete All</button>
            </form>
          </div>
             
          </div>
          <div class="card-body">
              <table id="datatable1" class="display" style="width:100%">
                  <thead>
                      <tr>
                          <th>Receiver</th>
                          <th>Type</th>
                          <th>Message</th>
                          <th>Status</th>
                          {{-- <th class="d-flex justify-content-center">Action</th> --}}
                      </tr>
                  </thead>
                  <tbody>
                     @foreach ($histories as $history)
                         
                     <tr>
                         <td>{{$history->receiver}}</td>
                         <td><span class="badge badge-secondary badge-sm text-warning">{{$history->type}}</span></td>
                         <td> <textarea name="" id="" cols="30" rows="2" disabled>{{Str::limit($history->message,100)}}</textarea> </td>
                         <td><span class="badge badge-{{$history->status === 'success' ? 'success' : 'danger'}}">{{$history->status}}</span></td>
                         {{-- <td>
                             <div class="d-flex justify-content-center">
                                 <button class="btn btn-success btn-sm mx-3">Add to Tag</button>
                                 <form action="{{route('contactDeleteOne',$contact->id)}}" method="POST">
                                  @method('delete')
                                  @csrf
                                     <input type="hidden" name="id" value="{{$contact->id}}">
                                     <button type="submit" name="delete" class="btn btn-danger btn-sm"><i class="material-icons">delete_outline</i>Delete</button>
                                  </form>
                             </div>
                          </td> --}}
                      </tr>
                      @endforeach
                    

                  </tbody>
                  <tfoot></tfoot>
              </table>
          </div>
      </div>
  </div>

</div>



    
            </div>
        </div>
    </div>



    <script src="{{asset('js/pages/datatables.js')}}"></script>
    <script src="{{asset('js/pages/select2.js')}}"></script>
    <script src="{{asset('plugins/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
  <script src="{{asset('js/autoreply.js')}}"></script>
</x-layout-dashboard>





