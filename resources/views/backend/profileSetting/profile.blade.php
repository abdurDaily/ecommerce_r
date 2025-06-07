@extends('backendLayout')
@section('backend_contains')
<div class="content-wrapper">
  <!-- Content -->



  <!-- / Content -->

  <div class="container-xxl flex-grow-1 container-p-y ">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
          type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
          type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile image</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
          type="button" role="tab" aria-controls="pills-contact" aria-selected="false">password update</button>
      </li>
    </ul>
    <div class="tab-content px-0" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
        tabindex="0">







        <div class="row">
          <div class="col-md-12">

            <div class="card mb-4">
              <h5 class="card-header">Profile Details</h5>
              <!-- Account -->

              <hr class="my-0">
              <div class="card-body ">
                <form id="formAccountSettings" method="POST" onsubmit="return false">

                  @csrf

                  <div class="row">
                    <div class="mb-3 col-md-6">
                      <label for="firstName" class="form-label">First Name</label>
                      <input value="{{ $userData->name }}" class="form-control" type="text" id="firstName" name="name"
                        value="John" autofocus="">
                    </div>


                    <div class="mb-3 col-md-6">
                      <label for="lastName" class="form-label">Last Name</label>
                      <input value="{{ $userData->email }}" class="form-control" type="text" name="email" id="lastName"
                        value="Doe">
                    </div>

                  </div>


                  <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                  </div>


                </form>


              </div>
              <!-- /Account -->
            </div>
          </div>
        </div>






      </div>
      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">


        <div class="card-body bg-light shadow-sm">
          <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img src="../assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="100" width="100"
              id="uploadedAvatar">
            <div class="button-wrapper">
              <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                <span class="d-none d-sm-block">Upload new photo</span>
                <i class="bx bx-upload d-block d-sm-none"></i>
                <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
              </label>

              <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
            </div>
          </div>
        </div>


      </div>


      <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">


        <div class="card-body bg-light shadow-sm">
          <div class="d-flex align-items-start align-items-sm-center gap-4">

            <form action="" class="w-100" method="post">
              @csrf

              <div class="row ">
                <div class="col-xl-6">

                  <label for="old_password">old password</label>
                  <input class="form-control py-3 mt-2" placeholder="enter your old password" type="pass"
                    name="old_password" id="old_password">
                </div>


                
                <div class="col-xl-6">

                  <label for="new_password">new password</label>
                  <input class="form-control py-3 mt-2" placeholder="enter your old password" type="pass"
                    name="new_password" id="new_password">
                </div>
                
                <div class="col-xl-6 mt-3">

                  <label for="confirm_password">confirm password</label>
                  <input class="form-control py-3 mt-2" placeholder="enter your old password" type="pass"
                    name="confirm_password" id="confirm_password">
                </div>

                <div class="col-xl-6 d-flex align-items-end">

                  <button class="btn btn-primary w-25 py-3">update</button>
                </div>



              </div>



            </form>

          </div>
        </div>
      </div>


    </div>


  </div>
</div>

<div class="content-backdrop fade"></div>
</div>
@endsection