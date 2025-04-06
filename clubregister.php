<?php include_once('db_connection.php'); ?>
<?php include('0header.php'); ?>

<section data-bs-version="5.1" class="form5 cid-u88IYzf3mX" id="contact-form-3-u88IYzf3mX">
    
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 content-head">
                <div class="mbr-section-head mb-5">
                    <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><BR><BR>
                        <strong>Club Registration</strong>
                    </h3>
                    
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                <form action="Universal.php" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name">
                  <!-- <input type="hidden" name="email" data-form-email="true" value="nbakCZ2Fm5C8CH2z+HVR/Wcw+bNIoHE7Sk+BRKWdY7R69eDOHtL9bPWrxxvvdOkzQ+3JrINF1iqAYGUmGFysyb0fcPoZiB+B5kM0hh17HdKe0Rh+IlCXjoEyO8C0k9rh"> -->
                    <!-- <div class="row">
                        <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for filling out the form!</div>
                        <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                            Oops...! some problem!
                        </div>
                    </div> -->
                    <div class="dragArea row">
                        <div class="col-md col-sm-12 form-group mb-3" data-for="name">
                            <input type="text" name="name" placeholder="Club Name" data-form-field="name" class="form-control" value="" id="name-contact-form-3-u88IYzf3mX">
                        </div>
                        <div class="col-md col-sm-12 form-group mb-3" data-for="email">
                            <input type="email" name="email" placeholder="Email" data-form-field="email" class="form-control" value="" id="email-contact-form-3-u88IYzf3mX">
                        </div>
                        <div class="col-12 form-group mb-3 mb-3" data-for="url">
                            <input type="password" name="password" placeholder="Password" data-form-field="password" class="form-control" value="" id="url-contact-form-3-u88IYzf3mX">
                        </div>
                        <div class="col-12 form-group mb-3 mb-3" data-for="url">
                            <input type="password" name="cpassword" placeholder="Confirm Password" data-form-field="password" class="form-control" value="" id="url-contact-form-3-u88IYzf3mX">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 align-center mbr-section-btn">
                            <input type="text" name="typeofaccount" value="Club" hidden>
                            <button type="submit" name="registerbtn" class="btn btn-primary display-7">Register Club Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include('0footer.php'); ?>