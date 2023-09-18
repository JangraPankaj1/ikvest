   <!-- sidebar mambers -->
   <div class="main-side-data">
    <i class="fa fa-close   close-btn-sidebar"></i>
    <div class="row mx-0">
        <div class="col-md-12 px-0">
            <div class="family-mbr">
                <h2>Family Members</h2>
                <div class="inr-srch">
                <input type="text" name="search" id="search-input"/>
                    <i class="fa fa-search searchButton" ></i>
                </div>               
                <div id="error-message" style="color: red;"></div>
            </div>
            <div class="profile-mmbr-data">
               <!--------inner Profile card --------->
                @forelse($profileData as $key =>$data)
                  <div class="flex-main-itms">
                    <div class="pic-lft">
                        @if($data->image_path)

                        <a href="{{ route('member.profile',$data->id) }}"> <img src="{{ asset($data->image_path) }}" class="profile" alt="Profile Image" id="existing-image-preview"></a>
                        @else
                        <a href="{{ route('member.profile',$data->id) }}"><img src="{{ asset('images/admin.svg') }}"  alt="Default Profile Image"></a>
                            
                        @endif

                    </div>
                    <div class="right-data">
                  
                    <a href="{{ route('member.profile',$data->id) }}"> {{ $data->f_name }} {{ $data->l_name }}</a>
                      @if($data->bdy_date )
                    <a href="{{ route('member.profile',$data->id) }}"> <p>{{ $data->bdy_date }}</p></a>
                    @endif
                    </div>                 
                </div>
                
                @empty
                <p>No family members found .</p>
                
        @endforelse
                <!--------inner Profile card --------->

            </div>

        </div>
    </div>
</div>
<!-- End sidebar mambers -->
