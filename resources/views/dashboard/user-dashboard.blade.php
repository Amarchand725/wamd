<x-layout-dashboard title="Home">
    <div class="app-content">
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
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-primary">
                                        <i class="material-icons-outlined">contacts</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">CONTACTS NUMBER</span>
                                        <span class="widget-stats-amount">{{ Auth::user()->contacts()->count()}}</span>
                                        <span>Saved number.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-warning">
                                        <i class="material-icons-outlined">phone_iphone</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Devices</span>
                                        <span class="widget-stats-amount">{{ count($devices) }}</span>
                                        <span>Registered device.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-danger">
                                        <i class="material-icons-outlined">pending_actions</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Schedule Message</span>
                                        <span class=""><small>Pending : 0 <br> Failed : 0 <br> Sent : 0</small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h5>List Devices</h5>
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addDevice"><i class="material-icons">add</i>Add Device</button>
                                <table class="display dataTable no-footer" style="width: 1098.2px; margin-left: 0px;" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 0px;" aria-sort="ascending" aria-label="Number: activate to sort column descending">Number
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" style="width: 0px;" aria-label="#: activate to sort column ascending">#
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($devices as $device)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{ $device->body }}</td>
                                                <td>
                                                    <a href="{{ route('scan', $device->body) }}" class="btn btn-primary btn-burger"><i class="material-icons">qr_code_scanner</i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="addDevice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Device</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="SubmitForm">
                    @csrf
                    <div class="modal-body">
                        <label for="sender" class="form-label">Number</label>
                        <input type="number" name="sender" class="form-control" id="sender" placeholder="Enter device number">
                        <p class="text-small text-danger" id="error-sender"></p>
                        <label for="urlwebhook" class="form-label">Link webhook</label>
                        <input type="text" name="urlwebhook" class="form-control" id="urlwebhook" placeholder="Enter url webhook">
                        <p class="text-small text-danger" id="error-urlwebook"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit"  name="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '.edit-btn', function(){
            var url = $(this).attr('data-url');
            $.ajax({
                url: url,
                type:"GET",
                success:function(response){
                    $('#edit-modal-body').html(response);
                    $('#edit-user-modal').modal('show');  
                },
            });
        });

        $('#EditForm').on('submit',function(e){
            e.preventDefault();
            var url = $('.edit-form').attr('data-url');
            let lif_time = $(".life-time:checked").val() ? $(".life-time:checked").val() : '';
            let expired_date = $('.expired_date').val();
            let device_limit = $('.device_limit').val();
            let role_id = $('.role-id').val();
            let password = $('.password').val();
            let username = $('.username').val();
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                type:"PATCH",
                data:{
                    lif_time : lif_time,
                    expired_date : expired_date,
                    device_limit : device_limit,
                    role_id : role_id,
                    password : password,
                    username : username,
                },
                
                success:function(response){
                    if(response=='success'){
                        $(".life-time").prop("checked", false);
                        $('.expired_date').val('');
                        $('.device_limit').val('');
                        $('.role-id').val('');
                        $('.password').val('');
                        $('.username').val('');
                        $('.add-user-modal').hide();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'User has updated successfully.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        location.reload();
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong try again.',
                        })
                    }
                },
                error: function(response) {
                    $('#error-user_name').text(response.responseJSON.errors.username);
                    $('#error-password').text(response.responseJSON.errors.password);
                    $('#error-role_id').text(response.responseJSON.errors.role_id);
                    $('#error-device_limit').text(response.responseJSON.errors.device_limit);
                },
            });
        });

        $('#SubmitForm').on('submit',function(e){
            e.preventDefault();
            let sender = $('#sender').val();
            let urlwebhook = $('#urlwebhook').val();
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('addDevice')}}",
                type:"POST",
                data:{
                    sender : sender,
                    urlwebhook : urlwebhook,
                },
                
                success:function(response){
                    if(response=='success'){
                        $('#sender').val('');
                        $('#urlwebhook').val('');
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Device added successfully.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        location.reload();
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Your device limit is over.!.',
                        })
                    }
                },
                error: function(response) {
                    $('#error-sender').text(response.responseJSON.errors.sender);
                    $('#error-urlwebook').text(response.responseJSON.errors.urlwebhook);
                },
            });
        });
    </script>
</x-layout-dashboard>