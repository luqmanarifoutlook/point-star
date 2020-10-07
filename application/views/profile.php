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
                <li><a href="<?php echo base_url('home'); ?>">Home</a></li>
                <li><a href="<?php echo base_url('explore'); ?>">Explore</a></li>
            </ul>
            <div class="buy-menu-btn d-none mb-2">
                <a href="<?php echo base_url('profile'); ?>">My Profile</a>
            </div>
        </div>
    </div>
</header>
<section class="section bg-light">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-4 col-md-5 col-12">
                <div class="sidebar sticky-sidebar">
                    <div class="p-4 rounded border bg-white text-center">
                        <img src="assets/images/client/01.jpg" class="card-img-top" alt="">
                        <div class="mt-4">
                            <h5>Calvin Carlo</h5>
                            <p><small class="text-muted mb-0">Joined October 10, 2020</small></p>
                            <a href="<?php echo base_url('edit'); ?>" class="btn btn-primary mt-2">Edit Profile</a>
                        </div>
                    </div>
                    <div class="p-4 rounded border mt-4">
                        <a href="<?php echo base_url('logout'); ?>" class="btn btn-block btn-danger">Logout</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="media feature">
                            <div class="icons m-0 rounded-md h2 text-primary text-center px-3">
                                <i class="uil uil-phone"></i>
                            </div>
                            <div class="content ml-4">
                                <h5>Phone</h5>
                                <a href="tel:+152534-468-854" class="text-primary">+152 534-468-854</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="media feature">
                            <div class="icons m-0 rounded-md h2 text-primary text-center px-3">
                                <i class="uil uil-envelope"></i>
                            </div>
                            <div class="content ml-4">
                                <h5>Email</h5>
                                <a href="mailto:contact@example.com" class="text-primary">contact@example.com</a>
                            </div>
                        </div>
                    </div>
                </div>
                <h5 class="mt-4">Bio</h5>
                <p class="text-muted mt-4">This is required when, for example, the final text is not yet available. Dummy text is also known as 'fill text'. It is said that song composers of the past used dummy texts as lyrics when writing melodies in order to have a 'ready-made' text to sing with the melody. Dummy texts have been in use by typesetters since the 16th century.</p>
                <h5 class="mt-4">Comments (2)</h5>
                <div class="row">
                    <div class="col-12 mt-4">
                        <form class="p-4 rounded border">
                            <ul class="media-list list-unstyled mb-0">
                                <li class="comment-desk">
                                    <div class="d-flex align-items-center">
                                        <a class="float-left pr-3" href="page-blog-detail.html#">
                                            <img src="assets/images/client/01.jpg" class="avatar avatar-md-sm rounded-circle shadow" alt="">
                                        </a>
                                        <div class="overflow-hidden d-block">
                                            <h6 class="media-heading mb-0"><a href="javascript:void(0)" class="text-dark">Lorenzo Peterson</a></h6>
                                            <small class="text-muted">October 19, 2020 at 01:25</small>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <p class="text-muted font-italic p-3 bg-light rounded">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour "</p>
                                    </div>
                                </li>
                                
                                <li class="comment-desk mt-4">
                                    <div class="d-flex align-items-center">
                                        <a class="float-left pr-3" href="page-blog-detail.html#">
                                            <img src="assets/images/client/02.jpg" class="avatar avatar-md-sm rounded-circle shadow" alt="">
                                        </a>
                                        <div class="overflow-hidden d-block">
                                            <h6 class="media-heading mb-0"><a href="javascript:void(0)" class="text-dark">Tammy Camacho</a></h6>
                                            <small class="text-muted">October 20, 2020 at 05:44</small>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <p class="text-muted font-italic p-3 bg-light rounded">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour "</p>
                                    </div>
                                </li>
                            </ul>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Your Comment</label>
                                        <textarea id="message" placeholder="Leave your comment here..." rows="5" name="message" class="form-control" required=""></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="send">
                                    <button type="submit" class="btn btn-block btn-primary">Send Comment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h5 class="mb-0">Friends (3)</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="card blog-post rounded border-0 shadow overflow-hidden">
                    <div class="position-relative">
                        <img src="<?php echo base_url('assets/images/work/14.jpg'); ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body content">
                        <h6 class="text-center"><a href="<?php echo base_url('user/1'); ?>" class="title text-dark">Private office</a></h6>
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
                        <h6 class="text-center"><a href="<?php echo base_url('user/1'); ?>" class="title text-dark">Dedicated Space</a></h6>
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
                        <h6 class="text-center"><a href="<?php echo base_url('user/1'); ?>" class="title text-dark">Small office</a></h6>
                        <p class="text-center text-muted">The most well-known dummy text is the have originated in the 16th century.</p>
                        <ul class="list-unstyled d-flex justify-content-between border-top mt-3 pt-3 mb-0">
                            <li class="text-muted small"><i data-feather="user" class="fea icon-sm text-primary"></i> 1</li>
                            <li class="text-muted small ml-3"><a href="javascript:void(0)" class="text-primary"><i data-feather="plus" class="fea icon-sm"></i> Add</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('include/footer'); ?>
</body>
</html>