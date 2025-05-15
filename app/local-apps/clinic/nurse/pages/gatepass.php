<section class="sec-spacer">

    <div class="container-xxl col-lg-12">
        

        <div class="card align-items-center justify-content-center mb-3" >
            <div class="card-body">
                <div class="row">
                    <div class="col">
                    <p class="">Please the select the ID field and scan the patients' ID.</p>
                                    
                        <div class="row pb-2">
                            <div class="col">
                                <input type="text" class="form-control no-print" placeholder="Scan ID Barcode" name="patient-barcode" autocomplete="off" autofocus id="patient-barcodegp" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card align-items-center justify-content-center" >
            <div class="card-body" id="printArea">
            <h2 style="font-weight:500;" class="text-center pb-3">Clinic Gate Pass</h2>
                <div class="row">
                    <div class="col-md-6">
                            
                            <form class="" action="#" method="post" id="frm-gate-pass">
                                        
                                <!-- Patient Information -->
                                <span style="color:#212529;" >Patient Information</span>

                                <hr class="mt-1">
        
                                    <input type="hidden"  name="patient-id">
                                    <input type="hidden"  name="patient-barcode">
                                        
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="First Name" name="patient-firstname" readonly required>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Last Name" name="patient-lastname" readonly required>
                                        </div>
                                    </div>
                                    <div class="row pt-3 pb-3">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Classification" name="patient-classification" readonly required>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Level / Dept" name="patient-grade-dept" readonly required>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Section / Position" name="patient-sec-pos" readonly required>
                                        </div>
                                    </div>
    
                                    <!-- Fill out by nurse -->
                                    <span style="color:#212529;">Guardian Information</span>

                                    <hr class="mt-1">
    
                                    <div class="row mb-3">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Guardian Full Name" name="guardian-name" required>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Relation to Patient" name="relationship" required>
                                        </div>
                                    </div>

                                    <hr class="mt-1">
    
                                    <div class="row form-check form-check-inline pt-2">
    
                                        <div class="col">
                                            <input class="form-check-input" type="checkbox" value="For Consultation / Referral with Fetcher" name="remarks" id="check01">
                                                <label class="form-check-label" for="check01">
                                                    For Consultation / Referral with Fetcher
                                                </label>
                                        </div>
                                        <div class="col">
                                            <input class="form-check-input" type="checkbox" value=" For Consultation / Referral without Fetcher" name="remarks" id="check02">
                                                <label class="form-check-label" for="check02">
                                                    For Consultation / Referral without Fetcher
                                                </label>
                                        </div>
                                        <div class="col">
                                            <input class="form-check-input" type="checkbox" value="With Parent / Guardian's Consent" name="remarks" id="check03">
                                                <label class="form-check-label" for="check03">
                                                    With Parent / Guardian's Consent
                                                </label>
                                        </div>
                                        <div class="col">
                                            <input class="form-check-input" type="checkbox" value="Advice to go Home with Fetcher" name="remarks" id="check04">
                                                <label class="form-check-label" for="check04">
                                                    Advice to go Home with Fetcher
                                                </label>
                                        </div>
                                        <div class="col">
                                            <input class="form-check-input" type="checkbox" value="Advice to go Home without Fetcher" name="remarks" id="check05">
                                                <label class="form-check-label" for="check05">
                                                    Advice to go Home without Fetcher
                                                </label>
                                        </div>

                                        <label class="label pt-5" id="prep_by_name">
                                            Prepared by:
                                        </label>
                                        <label class="label" id="prep_role" style="text-transform: uppercase;"></label>

                                        <input type="hidden" name="prepared_by" id="prep_by_name_inp">
                                        <input type="hidden" name="prepared_by_role" id="prepared_by_role_inp">
                                    </div>
    
                                   

                            </form>
                    </div>

                    <div class="col-xl-6">
                        <span style="color:#212529;">Security Guard Section</span>

                        <hr class="mt-1">

                        <label class="label" id="prep_role" style="text-transform: uppercase;">Date :</label><br><br>
                        <label class="label" id="prep_role" style="text-transform: uppercase;">Time :</label><br><br>
                        <label class="label" id="prep_role" style="text-transform: uppercase;">SG :</label><br><br>
                        <label class="label" id="prep_role" style="text-transform: uppercase;">Time-Out : __________</label>
                    </div>

                </div>

                <div class="row pt-3 d-grid">
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary no-print" type="submit" id="btn_issue_gp">Issue Gate Pass</button>
                    </div>
                </div>

            </div>
        </div>
         
    </div>

</section>

<script src="../scripts/js/nurse.gatepass.js"></script>