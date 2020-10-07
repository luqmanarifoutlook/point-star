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
    <div class="bg-overlay bg-overlay-white"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="text-center">
                    <img src="<?php echo base_url('assets/images/error.svg'); ?>" class="img-fluid" alt="">
                    <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i data-feather="arrow-left" class="fea icon-sm"></i> Back to Home</a>
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
</body>
</html>