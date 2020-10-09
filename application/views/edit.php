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
                <a href="<?php echo base_url('profile/' . $self->id); ?>">My Profile</a>
            </div>
        </div>
    </div>
</header>
<section class="section bg-light">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-12">
                <div class="section-title text-center mb-3">
                    <h4 class="title mb-4">Update Profile</h4>
                    <p class="text-muted mb-0 para-desc mx-auto"><span class="font-weight-bold">Cospace</span> offer a wealth of advantages for self starters, including networking opportunities, and increased productivity</p>
                </div>
                <form class="faq-content mt-5" action="<?php echo base_url('update'); ?>" enctype="multipart/form-data" method="post" id="form-update">
                    <div class="accordion">
                        <div class="card border rounded mb-2">
                            <div class="faq position-relative">
                                <div class="card-header border-0 bg-light p-3 pr-5">
                                    <div class="media">
                                        <h6 class="title mb-0">Avatar</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse show">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <img src="<?php echo base_url('assets/images/users/' . $self->avatar); ?>" class="card-img-top mt-0 mb-3" alt="" id="avatar">
                                                <input name="avatar" type="file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border rounded mb-2">
                            <div class="faq position-relative">
                                <div class="card-header border-0 bg-light p-3 pr-5">
                                    <div class="media">
                                        <h6 class="title mb-0">Information</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse show">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Name</label>
                                                <input name="name" type="text" maxlength="100" class="form-control" value="<?php echo $self->name; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Phone</label>
                                                <input name="phone" type="number" maxlength="15" class="form-control" value="<?php echo $self->phone; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Email</label>
                                                <input name="email" type="email" maxlength="30" class="form-control" value="<?php echo $self->email; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group position-relative">
                                                <label>Bio</label>
                                                <textarea name="bio" rows="4" class="form-control" required><?php echo $self->bio; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border rounded mb-2">
                            <div class="faq position-relative">
                                <div class="card-header border-0 bg-light p-3 pr-5">
                                    <div class="media">
                                        <h6 class="title mb-0">Account</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse show">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Change Password</label>
                                                <input name="password" type="password" maxlength="30" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Confirm Password</label>
                                                <input name="retype" type="password" maxlength="30" class="form-control">
                                                <small class="mt-0 text-danger" id="alert-retype">Password not match</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <button type="submit" name="id" class="submitBnt btn btn-primary btn-block" value="1">Save Changes</button>
                                <div id="simple-msg"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('include/footer'); ?>
<script>
$('#alert-retype').hide();
$('#form-update').submit(function(e) {    
    if ($('input[name=password]').val() || $('input[name=retype]').val()) {
        if ($('input[name=password]').val() != $('input[name=retype]').val()) {
            $('#alert-retype').show();
            $('input[name=retype]').focus();
            return false;
        }
    }
    return true;
});
$('input[name=retype]').on('keydown', function(e) {
    $('#alert-retype').hide();
});
</script>
</body>
</html>