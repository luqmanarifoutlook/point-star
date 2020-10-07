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
<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <div>
            <a class="logo" href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url('assets/images/logo.png'); ?>" height="36" alt="">
            </a>
        </div>                  
        <div class="buy-button">
            <a href="<?php echo base_url('profile'); ?>" class="btn btn-primary book-seat">My Profile</a>
        </div>
        <div class="menu-extras">
            <div class="menu-item">
                <a class="navbar-toggle">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
        </div>
        <div id="navigation">
            <ul class="navigation-menu">
                <li class="active"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                <li><a href="<?php echo base_url('explore'); ?>">Explore</a></li>
            </ul>
            <div class="buy-menu-btn d-none mb-2">
                <a href="<?php echo base_url('profile'); ?>">My Profile</a>
            </div>
        </div>
    </div>
</header>
<section class="section bg-light bg-half-170" style="background: url('<?php echo base_url('assets/images/home/bg3.png'); ?>') top center;">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <div class="title-heading text-center">
                    <h4 class="display-4 font-weight-bold mb-4">Better Environment <br> for Co-working</h4>
                    <p class="para-desc mx-auto text-muted"><span class="font-weight-bold">Cospace</span> offer a wealth of advantages for self starters, including networking opportunities, daily structure, and increased productivity</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mb-3">
                    <h4 class="title mb-4">Our Benefits</h4>                            
                    <p class="text-muted mb-0 para-desc mx-auto"><span class="font-weight-bold">Cospace</span> offer a wealth of advantages for self starters, including networking opportunities, daily structure, and increased productivity.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12 mt-5">
                <div class="media feature">
                    <div class="icons m-0 rounded-md h2 text-primary text-center px-3">
                        <i class="uil uil-wifi"></i>
                    </div>
                    <div class="content ml-4">
                        <h5 class="mb-1"><a href="javascript:void(0)" class="title text-dark">Free Internet</a></h5>
                        <p class="text-muted mb-0">If the distribution of letters and 'words' is random, the reader will not be distracted from making.</p>
                    </div>
                </div>
            </div>            
            <div class="col-lg-4 col-md-6 col-12 mt-5">
                <div class="media feature">
                    <div class="icons m-0 rounded-md h2 text-primary text-center px-3">
                        <i class="uil uil-users-alt"></i>
                    </div>
                    <div class="content ml-4">
                        <h5 class="mb-1"><a href="javascript:void(0)" class="title text-dark">Group Events</a></h5>
                        <p class="text-muted mb-0">If the distribution of letters and 'words' is random, the reader will not be distracted from making.</p>
                    </div>
                </div>
            </div>            
            <div class="col-lg-4 col-md-6 col-12 mt-5">
                <div class="media feature">
                    <div class="icons m-0 rounded-md h2 text-primary text-center px-3">
                        <i class="uil uil-crop-alt-rotate-left"></i>
                    </div>
                    <div class="content ml-4">
                        <h5 class="mb-1"><a href="javascript:void(0)" class="title text-dark">Meeting Room</a></h5>
                        <p class="text-muted mb-0">If the distribution of letters and 'words' is random, the reader will not be distracted from making.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-100 mt-60">
        <div class="row align-items-end mb-4 pb-4">
            <div class="col-md-8">
                <div class="section-title text-center text-md-left">
                    <h4 class="title mb-4">Popular Users</h4>
                    <p class="text-muted mb-0 para-desc"><span class="font-weight-bold">Cospace</span> offer a wealth of advantages for self starters, including networking opportunities, daily structure, and increased productivity.</p>
                </div>
            </div>
            <div class="col-md-4 mt-4 mt-sm-0">
                <div class="text-center text-md-right">
                    <a href="javascript:void(0)" class="text-primary">View more <i data-feather="arrow-right" class="fea icon-sm"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="card blog-post rounded border-0 shadow overflow-hidden">
                    <div class="position-relative">
                        <img src="<?php echo base_url('assets/images/work/14.jpg'); ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body content">
                        <h5 class="text-center"><a href="<?php echo base_url('user/1'); ?>" class="title text-dark">Private office</a></h5>
                        <p class="text-center text-muted">The most well-known dummy text is the have originated in the 16th century.</p>
                        <ul class="list-unstyled d-flex justify-content-between border-top mt-3 pt-3 mb-0">
                            <li class="text-muted small"><i data-feather="user" class="fea icon-sm text-primary"></i> 1</li>
                            <li class="text-muted small ml-3"><a href="javascript:void(0)" class="text-primary"><i data-feather="plus" class="fea icon-sm"></i> Add</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="card blog-post rounded border-0 shadow overflow-hidden">
                    <div class="position-relative">
                        <img src="<?php echo base_url('assets/images/work/8.jpg'); ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body content">
                        <h5 class="text-center"><a href="<?php echo base_url('user/1'); ?>" class="title text-dark">Dedicated Space</a></h5>
                        <p class="text-center text-muted">The most well-known dummy text is the have originated in the 16th century.</p>
                        <ul class="list-unstyled d-flex justify-content-between border-top mt-3 pt-3 mb-0">
                            <li class="text-muted small"><i data-feather="user" class="fea icon-sm text-primary"></i> 1</li>
                            <li class="text-muted small ml-3"><a href="javascript:void(0)" class="text-primary"><i data-feather="plus" class="fea icon-sm"></i> Add</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="card blog-post rounded border-0 shadow overflow-hidden">
                    <div class="position-relative">
                        <img src="<?php echo base_url('assets/images/work/13.jpg'); ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body content">
                        <h5 class="text-center"><a href="<?php echo base_url('user/1'); ?>" class="title text-dark">Small office</a></h5>
                        <p class="text-center text-muted">The most well-known dummy text is the have originated in the 16th century.</p>
                        <ul class="list-unstyled d-flex justify-content-between border-top mt-3 pt-3 mb-0">
                            <li class="text-muted small"><i data-feather="user" class="fea icon-sm text-primary"></i> 1</li>
                            <li class="text-muted small ml-3"><a href="javascript:void(0)" class="text-primary"><i data-feather="plus" class="fea icon-sm"></i> Add</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4 pt-2 text-center">
                <a href="<?php echo base_url('explore'); ?>" class="btn btn-primary">Explore <i data-feather="arrow-right" class="fea icon-sm"></i></a>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('include/footer'); ?>
</body>
</html>