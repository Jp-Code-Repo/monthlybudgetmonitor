<div id="loader"></div>

<section class="sec-spacer">

    <div class="container-fluid col-lg-12">
        <h2 class="text-center" style="font-weight:500;">User Management</h2>

        <div class="row pt-4">
            <div class="col-lg-12">
                <div class="card" style="width: 100%;">
                    
                    <div class="card-body table-responsive">
                    <!-- <h5 class="card-title px-3" style="font-weight:300;">User Masterlist</h5> -->
                    <!-- <div class="row float-end my-3 mx-3">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#new-user-modal"><i class="bi bi-person-add"></i>&nbsp&nbspAdd User</button>
                    </div> -->
                            <table id="tbl_users" class="table text-center align-middle table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Date Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                  </div>
                </div>
            </div>

         </div>
    </div>

</section>

        <!-- New User Modal-->
        <div class="portfolio-modal modal fade" data-bs-backdrop="static" id="new-user-modal" tabindex="-1" aria-labelledby="new-user-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <span class="portfolio-modal-title text-secondary text-uppercase mb-0" style="font-weight:600;font-size:18px;">User Registration Form</span>
                            <form class="pt-4" action="#" method="post" id="frm_user_register">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="First name" name="firstname">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Last name" name="lastname">
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col">
                                        <input type="email" class="form-control" placeholder="Email" name="email">
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-sm-4">
                                        <select class="form-select" name="gender">
                                            <option disabled selected>Gender</option>
                                            <option value="male">male</option>
                                            <option value="female">female</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-select" name="role">
                                            <option disabled selected>Role</option>
                                            <option value="nurse">Nurse</option>
                                            <option value="guest">Guest</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-select" name="status">
                                            <option disabled >Status</option>
                                            <option value="active" selected>Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" placeholder="Username" name="username">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-sm-4">
                                       <input type="password" class="form-control" placeholder="Confirm Password" name="repeat_pass">
                                    </div>
                                </div>
                                <div class="row pt-3 d-grid">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary" type="submit" id="btn_register_user">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Update User Modal-->
        <div class="portfolio-modal modal fade" data-bs-backdrop="static" id="update-user-modal" tabindex="-1" aria-labelledby="update-user-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <span class="portfolio-modal-title text-secondary text-uppercase mb-0" style="font-weight:600;font-size:18px;">Update User Form</span>
                            <form class="pt-4" action="#" method="post" id="frm_user_update">
                                <div class="row">
                                    <div class="col">
                                        
                                        <input type="text" class="form-control" placeholder="First name" name="firstname" id="update-firstname">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Last name" name="lastname" id="update-lastname">
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col">
                                        <input type="email" class="form-control" placeholder="Email" name="email" id="update-email">
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-sm-4">
                                        <select class="form-select" name="gender" id="update-gender">
                                            <option disabled selected>Gender</option>
                                            <option value="male">male</option>
                                            <option value="female">female</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-select" name="role" id="update-role">
                                            <option disabled selected>Role</option>
                                            <option value="nurse">Nurse</option>
                                            <option value="guest">Guest</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-select" name="status" id="update-status">
                                            <option disabled >Status</option>
                                            <option value="active" selected>Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" placeholder="Username" name="username" id="update-username">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" placeholder="Password" name="password" id="update-password">
                                    </div>
                                </div>
                                <input type="text" name="uid" id="update-uid" hidden>
                                <div class="row pt-3 d-grid">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary" type="submit" id="btn_update_user">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script src="../scripts/js/nurse.users.js"></script>