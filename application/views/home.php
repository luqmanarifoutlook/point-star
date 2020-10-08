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
            <a href="<?php echo base_url('profile/' . $self->id); ?>" class="btn btn-primary book-seat">My Profile</a>
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
                <a href="<?php echo base_url('profile/' . $self->id); ?>">My Profile</a>
            </div>
        </div>
    </div>
</header>
<section class="section bg-light bg-half-170" style="background: url('<?php echo base_url('assets/images/home.png'); ?>') top center;">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-12">
                <div class="title-heading text-center">
                    <h4 class="display-4 font-weight-bold mb-4">Better Environment <br> for Relationship</h4>
                    <p class="para-desc mx-auto text-muted"><span class="font-weight-bold">Cospace</span> offer a wealth of advantages for self starters, including networking opportunities, and increased productivity</p>
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
                    <p class="text-muted mb-0 para-desc mx-auto">We are making your programs accessible through a seamless and dynamic users communications and benefits others.</p>
                </div>
            </div>
        </div>
        <div class="row">         
            <div class="col-lg-4 col-md-6 col-12 mt-5">
                <div class="media feature">
                    <div class="icons m-0 rounded-md h2 text-primary text-center px-3">
                        <i class="uil uil-users-alt"></i>
                    </div>
                    <div class="content ml-4">
                        <h5 class="mb-1"><a href="javascript:void(0)" class="title text-dark">Group Events</a></h5>
                        <p class="text-muted mb-0">Find Meetup events so you can do more, create your own group and meet people near you.</p>
                    </div>
                </div>
            </div>            
            <div class="col-lg-4 col-md-6 col-12 mt-5">
                <div class="media feature">
                    <div class="icons m-0 rounded-md h2 text-primary text-center px-3">
                        <i class="uil uil-process"></i>
                    </div>
                    <div class="content ml-4">
                        <h5 class="mb-1"><a href="javascript:void(0)" class="title text-dark">Meeting Room</a></h5>
                        <p class="text-muted mb-0">Enjoy the support of our market team. Tailor-made and customized for your business growth.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mt-5">
                <div class="media feature">
                    <div class="icons m-0 rounded-md h2 text-primary text-center px-3">
                        <i class="uil uil-glass-tea"></i>
                    </div>
                    <div class="content ml-4">
                        <h5 class="mb-1"><a href="javascript:void(0)" class="title text-dark">Coffee &amp; Tea</a></h5>
                        <p class="text-muted mb-0">The world's most popular beverages, but you may wonder whether one is healthier.</p>
                    </div>
                </div>
            </div>   
        </div>
    </div>
    <?php if (!is_null($users)) { ?>
    <div class="container mt-100 mt-60">
        <div class="row align-items-end mb-4 pb-4">
            <div class="col-md-8">
                <div class="section-title text-center text-md-left">
                    <h4 class="title mb-4">Popular Users</h4>
                    <p class="text-muted mb-0 para-desc">With around 1 mio monthly active users, we are a massive platform and hugely popular all over the world with the rise of influencers.</p>
                </div>
            </div>
            <div class="col-md-4 mt-4 mt-sm-0">
                <div class="text-center text-md-right">
                    <a href="<?php echo base_url('explore'); ?>" class="text-primary">View more <i data-feather="arrow-right" class="fea icon-sm"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($users as $user) { ?>
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="card blog-post rounded border-0 shadow overflow-hidden">
                    <div class="position-relative">
                        <a href="<?php echo base_url('profile/' . $user->id); ?>"><img src="<?php echo base_url('assets/images/users/' . $user->avatar); ?>" class="card-img-top"></a>
                    </div>
                    <div class="card-body content">
                        <h5 class="text-center"><a href="<?php echo base_url('profile/' . $user->id); ?>" class="title text-dark"><?php echo $user->name; ?></a></h5>
                        <p class="text-center text-muted line-clamp"><?php echo $user->bio; ?></p>
                        <ul class="list-unstyled d-flex justify-content-between border-top mt-3 pt-3 mb-0 profiler">
                            <li class="text-muted small"><i data-feather="user" class="fea icon-sm text-primary"></i> <?php echo $user->friends; ?></li>
                            <li class="text-muted small"><i data-feather="message-square" class="fea icon-sm text-primary"></i> <?php echo $user->comments; ?></li>
                            <?php if ($user->id == $self->id) { ?>
                            <li class="text-muted small">
                                <a href="#!" class="text-primary">It's Me!</a>
                            </li>
                            <?php } else { ?>
                            <li class="text-muted small">
                                <?php if (is_null($user->relate)) { ?>
                                <a href="<?php echo base_url('add/' . $user->id); ?>" class="text-primary"><i data-feather="plus" class="fea icon-sm"></i> Add</a>
                                <?php } else { ?>
                                <a href="#!" class="text-primary"><i data-feather="check" class="fea icon-sm"></i> Added</a>
                                <?php } ?>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="col-12 mt-4 pt-2 text-center">
                <a href="<?php echo base_url('explore'); ?>" class="btn btn-primary">Explore <i data-feather="arrow-right" class="fea icon-sm"></i></a>
            </div>
        </div>
    </div>
    <?php } ?>
</section>
<?php $this->load->view('include/footer'); ?>
</body>
</html>