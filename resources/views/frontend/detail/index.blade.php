@extends('frontend.components.container')
@section('dynamicdata')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Child List
                </h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            @include('frontend.components.alert')
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-body">
                        <h3><a href="javascript:;" class="add-detail-table btn btn-sm btn-primary">Add New &nbsp;<i class="fa fa-plus"></i></a></h3>
                        <table id="dataTable" class="table table-bordered table-striped show-search-bar">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Child First Name</th>
                                    <th>Child Middle Name</th>
                                    <th>Child Last Name</th>
                                    <th>Child Age</th>
                                    <th>Gender</th>
                                    <th>Child Address</th>
                                    <th>Child City</th>
                                    <th>Child State</th>
                                    <th>Country</th>
                                    <th>Child Zip Code</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tablebody">
                                @foreach($details as $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $detail->Child_First_Name }}</td>
                                    <td>{{ $detail->Child_Middle_Name }}</td>
                                    <td>{{ $detail->Child_Last_Name }}</td>
                                    <td>{{ $detail->Child_Age }}</td>
                                    <td>{{ $detail->Gender}}</td>
                                    <td>{{ $detail->Child_Address}}</td> 
                                    <td>{{ $detail->Child_State }}</td>
                                    <td>{{ $detail->Child_City }}</td>
                                    <td>{{ $detail->Country}}</td>
                                    <td>{{ $detail->Child_Zip_Code }}</td>
                                   
                                    <td> @if($detail->status == 1)
                                        <small class="label btn-sm  bg-green">Active</small>
                                        @else
                                        <small class="label btn-sm  bg-red">Deactive</small>
                                        @endif
                                    </td>
                                    <td>
                                    <a href="{{ route('details.edit', $detail->id) }}" title="Edit detail">
                                            <button type="button" class="btn btn-sm  bg-green btn-circle waves-effect waves-circle waves-float">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>&nbsp;

                                        <a href="javascript:;" title="Delete detail" class="delete-detail" id="{{ $detail->id }}"><button class="btn btn-sm bg-red btn-circle waves-effect waves-circle waves-float"><i class="fa fa-trash"></i></button></a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>SN</th>
                                <th>Child First Name</th>
                                <th>Child Middle Name</th>
                                <th>Child Last Name</th>
                                <th>Child Age</th>
                                <th>Gender</th>
                                <th>Child Address</th>
                                <th>Child City</th>
                                <th>Child State</th>
                                <th>Country</th>
                                <th>Child Zip Code</th>
                                <th>Status</th>
                                <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!-- Add Form Start -->
                    <div class="modal fade" id="adddetailForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="card-header">
                                    <h3 class="card-title" id="myModalLabel">Add Detail</h3>
                                </div>
                             
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('details.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="title">Child First Name <span class="text-danger">*</span></label>
                                                <input type="text" name="Child_First_Name" class="form-control" placeholder="Enter Child First Name" required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="title">Child Middle Name<span class="text-danger">*</span></label>
                                                <input type="text" name="Child_Middle_Name" class="form-control" placeholder="Enter Child Middle Name" required/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="title">Child Last Name <span class="text-danger">*</span></label>
                                                <input type="text" name="Child_Last_Name" class="form-control" placeholder="Enter Child Last Name" required/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="title">Child Age <span class="text-danger">*</span> </label>
                                                <input type="text" name="Child_Age" class="form-control" placeholder="Enter Child Age" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label for="Gender">Gender<span class="text-danger">*</span> </label>
                                        <select name="Gender" class="form-control" required>
                                            <option value="">--Select Gender--</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <div>
                                           <label>
                                            <input type="checkbox" id="different-address-checkbox">
                                                Different Address
                                            </label>
                                        </div>
                                        </div>
                                    <div class="child-address-fields" style="display:none;">
                                        <div>
                                            <label for="child-address">Child Address</label>
                                            <input type="text" name="Child_Address" class="form-control" id="child-address" disabled>
                                        </div>

                                        <div>
                                            <label for="child-city">Child City</label>
                                            <input type="text" name="Child_City" class="form-control" id="child-city" disabled>
                                        </div>

                                        <div>
                                            <label for="child-state">Child State</label>
                                            <input type="text" name="Child_State"class="form-control"  id="child-state" disabled>
                                        </div>

                                        <div>
                                        <label for="Country">Country </label>
                                        <select name="Country" class="form-control">
                                            <option value="">--Select Country--</option>
                                            <option value="usa">USA</option>
                                            <option value="nepal">Nepal</option>
                                            <option value="japan">Japan</option>
                                            <option value="canada">Canada</option>
                                            <option value="australia">Australia</option>
                                            <option value="other">Other</option>
                                        </select>
                                        </div>

                                        <div>
                                            <label for="Child-zip-code">Zip Code</label>
                                            <input type="text" name="Child_Zip_Code" class="form-control" id="Child-zip-code" disabled>
                                        </div>
                                    </div>

                                      

                                       
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control m-bot15" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary waves-effect">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Add Form -->

                </div>

            </div>
        </div>
    </div>
    </div>
</section>
@endsection

@section('footer_js')

<script type="text/javascript">
    $(document).ready(function() {
      $(document).on('click', '.add-detail-table', function(e) {
        e.preventDefault();
        $('#adddetailForm').modal('show');
      });
    });
  </script>

<script type="text/javascript">
    $(document).ready(function() {
        var oTable = $('.show-search-bar').dataTable();

        $('#tablebody').on('click', '.delete-detail', function(e) {
            e.preventDefault();
            $object = $(this);
            var id = $object.attr('id');
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'red',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }, function() {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}",
                    },
                    type: "DELETE",
                    url: "{{ url('/details/') }}" + "/" + id,
                    dataType: 'json',
                    success: function(response) {
                        var nRow = $($object).parents('tr')[0];
                        oTable.fnDeleteRow(nRow);
                        swal('success', response.message, 'success');
                    },
                    error: function(e) {
                        swal('Oops...', 'Something went wrong!', 'error');
                    }
                });
            });
        });
    });
</script>


<script>
    $(document).ready(function() {
        // Hide the child address fields initially
        $('.child-address-fields').hide();

        // Add an event listener to the "Different Address" checkbox
        $('#different-address-checkbox').change(function() {
            if ($(this).is(':checked')) {
                // If the checkbox is checked, enable the child address fields
                $('.child-address-fields').show();
                $('.child-address-fields input').prop('disabled', false);
            } else {
                // If the checkbox is unchecked, disable the child address fields
                $('.child-address-fields').hide();
                $('.child-address-fields input').prop('disabled', true);
            }
        });
    });
</script>
@endsection