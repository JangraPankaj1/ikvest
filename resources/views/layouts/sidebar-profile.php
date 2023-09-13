<!-- sidebar mambers -->
<div class="main-side-data">
    <i class="fa fa-close   close-btn-sidebar"></i>
    <div class="row mx-0">
        <div class="col-md-12 px-0">
            <div class="family-mbr">
                <h2>Family Members</h2>
                <div class="inr-srch">
                    <input type="text" />
                    <i class="fa fa-search"></i>
                </div>
            </div>
            <div class="profile-mmbr-data">
               <!--------inner Profile card --------->
                @foreach($profileData as $key =>$data)
                  <div class="flex-main-itms">
                    <div class="pic-lft">
                        @if($data->image_path)
                            <img src="{{ asset($data->image_path) }}" class="profile" alt="Profile Image" id="existing-image-preview">
                        @else
                            <img src="{{ asset('web-images/admin-edit.svg') }}"  alt="Default Profile Image">
                            
                        @endif

                          <img src="/images/who-group.png"/>
                      <!-- <a href="{{ route('searchFamilyMember') }}"><img src="/images/who-group.png"/></a> -->
                    </div>
                    <div class="right-data">
                  
                        <a>{{ $data->f_name }}</a>
                        <p>Status</p>

                    </div>                 
                </div>
                @endforeach
                <!--------inner Profile card --------->
            </div>
        </div>
    </div>
</div>
<!-- End sidebar mambers -->
