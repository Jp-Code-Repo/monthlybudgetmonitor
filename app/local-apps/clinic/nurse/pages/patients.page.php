<section class="sec-spacer">

    <div class="container-fluid col-lg-12">
        <h2 style="font-weight:500;" class="text-center">Patient Masterlist</h2>

        <div class="row pt-4">
            <div class="col-lg-12">
                <div class="card" style="width: 100%;">
                    <div class="card-body table-responsive">
                        <table class="table text-center align-middle table-striped" id="tbl_patients">
                            <thead>
                                <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Address</th>
                                <th scope="col">Dept/Level</th>
                                <th scope="col">Position/Section</th>
                                <th scope="col">Date Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                  </div>
                </div>
            </div>

         </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="add-patient-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                ...
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="../scripts/js/nurse.patients.js"></script>