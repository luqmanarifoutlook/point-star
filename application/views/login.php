<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('include/header', $page); ?>
<body>
<div id="preloader">
    <div id="status">
        <div class="logo">
            <img src="<?php echo base_url('assets/images/l-icon.png'); ?>" height="100" class="d-block mx-auto" alt="">
        </div>
    </div>
</div>
<div class="back-to-home rounded d-none d-sm-block">
    <a href="<?php echo base_url(); ?>" class="text-white rounded d-inline-block text-center"><i data-feather="home" class="fea icon-sm"></i></a>
</div>
<section class="vh-100 d-flex align-items-center">
    <div class="container-fluid mt-100 mt-60" id="signup">
        <div class="rounded-lg px-md-5 py-5 px-4 bg-dark shadow" style="background: url('<?php echo base_url('assets/images/cta.png'); ?>') center center;">
            <div class="row">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-6 col-12">
                            <div class="section-title text-center text-md-left mb-4 mb-sm-0 pb-2 pb-sm-0">
                                <img src="<?php echo base_url('assets/images/logo-light.png'); ?>" class="mb-4" height="52" alt="">
                                <h4 class="title text-white mb-4">Join the platform and make friends!</h4>
                                <p class="text-white mb-0 para-desc"><span class="font-weight-bold">Cospace</span> offer a wealth of advantages for self starters, including networking opportunities, and increased productivity.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0" id="div-login">
                            <div class="login-page bg-white shadow rounded p-4 position-relative">
                                <div class="text-center">
                                    <h5 class="mb-4 pb-2">Login</h5>  
                                </div>
                                <form class="login-form mt-4" action="<?php echo base_url('auth'); ?>" method="post">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="email" class="form-control"  name="email" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary btn-block">Let's go!</button>
                                        </div>
                                        <div class="col-12 login-footer">
                                            <p class="mb-0 mt-3"><small class="text-dark mr-2">Don't have an account ?</small> <a href="#!" id="btn-signup" class="text-dark font-weight-bold">Sign Up</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0" id="div-signup">
                            <div class="login-page bg-white shadow rounded p-4 position-relative">
                                <div class="text-center">
                                    <h5 class="mb-4 pb-2">Sign Up</h5>  
                                </div>
                                <form class="login-form mt-4" action="<?php echo base_url('register'); ?>" method="post">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control"  name="name" placeholder="Name" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="email" class="form-control"  name="email" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary btn-block">Create Account</button>
                                        </div>
                                        <div class="col-12 login-footer">
                                            <p class="mb-0 mt-3"><small class="text-dark mr-2">Already have an account ?</small> <a href="#!" id="btn-login" class="text-dark font-weight-bold">Login</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<a href="#" class="btn btn-icon btn-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
<script src="<?php echo base_url('assets/js/jquery-3.5.1.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.easing.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/scrollspy.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.magnific-popup.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/magnific.init.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/feather.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/owl.init.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/flickity.pkgd.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/flickity.init.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app.js'); ?>"></script>
<script>
$('#div-signup').hide();
$('#btn-login').on('click', function() {
    $('#div-signup').hide();
    $('#div-login').show('fast');
});
$('#btn-signup').on('click', function() {
    $('#div-login').hide();
    $('#div-signup').show('fast');
});
</script>
</body>
</html>