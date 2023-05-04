@extends('frontend.components.container')
@section('dynamicdata')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Edit Details
                </h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- ./row -->
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-outline card-tabs">

                    <form id="EditForm" action="{{ route('details.update', $detail->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                        @include('frontend.components.alert')
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-three-general" role="tabpanel" aria-labelledby="custom-tabs-three-general-tab">

                                    <div class="form-group">
                                        <label for="Child First Name">Child First Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="Child_First_Name" placeholder="Enter Child First Name " value="{{ $detail->Child_First_Name }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="Child Middle Name">Child Middle Name <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control" name="Child_Middle_Name" placeholder="Enter Child Middle Name " value="{{ $detail->Child_Middle_Name}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="Child Last Name ">Child Last Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="Child_Last_Name" placeholder="Enter Child Last Name  " value="{{ $detail->Child_Last_Name}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="Child Age">Child Age<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="Child_Age" placeholder="Enter Child Age " value="{{ $detail->Child_Age}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="Gender">Gender<span class="text-danger">*</span></label>
                                        <select name="Gender" class="form-control">
                                          <option value="">--Select Gender--</option>
                                          <option value="male" {{(($detail->Gender=='male')? 'selected':'')}}>Male</option>
                                          <option value="female" {{(($detail->Gender=='female')? 'selected':'')}}>Female</option>
                                          <option value="other" {{(($detail->Gender=='other')? 'selected':'')}}>Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="different_address" id="different_address" {{ old('different_address', $detail->different_address) ? 'checked' : '' }}>
                                        Different Address
                                    </label>

                                    <div id="child-address-fields" @if(old('different_address', $detail->different_address)) style="display: block" @else style="display: none" @endif>
                                      <div>
                                        <label for="Child_Address">Child Address</label>
                                        <input type="text" name="Child_Address" class="form-control" id="Child_Address" value="{{ old('Child_Address', $detail->Child_Address) }}" {{ old('different_address', $detail->different_address) ? '' : 'disabled' }}>
                                      </div>

                                        <label for="Child_City">Child City</label>
                                        <input type="text" name="Child_City" class="form-control" id="Child_City" value="{{ old('Child_City', $detail->Child_City) }}" {{ old('different_address', $detail->different_address) ? '' : 'disabled' }}>

                                        <label for="Child_State">Child State</label>
                                        <input type="text" name="Child_State" class="form-control" id="Child_State" value="{{ old('Child_State', $detail->Child_State) }}" {{ old('different_address', $detail->different_address) ? '' : 'disabled' }}>


                                        <div class="form-group">
                                        <label for="Country">Country</label>
                                        <select name="Country" class="form-control">
                                          <option value="">--Select Country--</option>
                                          <option value="usa" {{(($detail->Country=='usa')? 'selected':'')}}>USA</option>
                                          <option value="nepal" {{(($detail->Country=='nepal')? 'selected':'')}}>Nepal</option>
                                          <option value="japan" {{(($detail->Country=='japan')? 'selected':'')}}>Japan</option>
                                          <option value="canada" {{(($detail->Country=='canada')? 'selected':'')}}>Canada</option>
                                          <option value="australia" {{(($detail->Country=='australia')? 'selected':'')}}>Australia</option>
                                          <option value="other" {{(($detail->Country=='other')? 'selected':'')}}>Other</option>
                                        </select>
                                        </div>

                                        <label for="Child-zip-code">Zip Code</label>
                                        <input type="text" name="Child_Zip_Code" class="form-control" id="Child_Zip_Code" value="{{ old('Child-zip-code', $detail->Child_Zip_Code) }}" {{ old('different_address', $detail->different_address) ? '' : 'disabled' }}>
                                    </div>
                                </div>

                  

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control m-bot15" name="status">
                                            <option value="1" {{ ($detail->status == 1) ? 'selected="selected"' : '' }}>Active</option>
                                            <option value="0" {{ ($detail->status == 0) ? 'selected="selected"' : '' }}>Deactive</option>
                                        </select>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <input type="hidden" name="_method" value="PUT">

                    </form>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<script>
    var differentAddressCheckbox = document.getElementById('different_address');
    var childAddressFields = document.getElementById('child-address-fields');

    differentAddressCheckbox.addEventListener('change', function() {
        if (differentAddressCheckbox.checked) {
            childAddressFields.style.display = 'block';
            // Enable child address fields
            document.getElementById('child_address').disabled = true;
            document.getElementById('child_city').disabled = false;
            document.getElementById('child_state').disabled = false;
            document.getElementById('country').disabled = false;
            document.getElementById('zip_code').disabled = false;
        } else {
            childAddressFields.style.display = 'none';
            // Disable child address fields
            document.getElementById('child_address').disabled = true;
            document.getElementById('child_city').disabled = true;
            document.getElementById('child_state').disabled = true;
            document.getElementById('country').disabled = true;
            document.getElementById('zip_code').disabled = true;
        }
    });
</script>
@endsection