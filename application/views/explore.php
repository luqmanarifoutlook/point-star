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
                <li><a href="<?php echo base_url('home'); ?>">Home</a></li>
                <li class="active"><a href="<?php echo base_url('explore'); ?>">Explore</a></li>
            </ul>
            <div class="buy-menu-btn d-none mb-2">
                <a href="<?php echo base_url('profile/' . $self->id); ?>">My Profile</a>
            </div>
        </div>
    </div>
</header>
<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mb-3">
                    <h4 class="title mb-4">Explore</h4>                            
                    <p class="text-muted mb-0 para-desc mx-auto">With around 1 mio monthly active users, we are a massive platform and hugely popular all over the world with the rise of influencers.</p>
                </div>
            </div>
        </div>
        <?php if (!is_null($users)) { ?>
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
        </div>
        <?php } ?>
    </div>
</section>
<?php $this->load->view('include/footer'); ?>
</body>
</html>