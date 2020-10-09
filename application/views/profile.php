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
        <div class="row">
            <div class="col-lg-4 col-md-5 col-12">
                <div class="sidebar sticky-sidebar">
                    <div class="p-4 rounded border bg-white text-center">
                        <img src="<?php echo base_url('assets/images/users/' . $user->avatar); ?>" class="card-img-top" alt="">
                        <div class="mt-4">
                            <h5><?php echo $user->name; ?></h5>
                            <p><small class="text-muted mb-0">Joined <?php echo date('j F Y', strtotime($user->created)); ?></small></p>
                            <?php if ($user->id == $self->id) { ?>
                            <a href="<?php echo base_url('edit'); ?>" class="btn btn-primary mt-2">Edit Profile</a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php if ($user->id == $self->id) { ?>                            
                    <div class="p-4 rounded border mt-4">
                        <a href="<?php echo base_url('logout'); ?>" class="btn btn-block btn-danger">Logout</a>
                    </div>
                    <?php } elseif ($this->data->friendCheck($user->id, $self->id) == false) { ?>
                    <div class="p-4 rounded border mt-4">
                        <a href="<?php echo base_url('add/' . $user->id); ?>" class="btn btn-block btn-primary">Add</a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-12">
                <div class="row">
                    <?php if (!is_null($user->phone)) { ?>
                    <div class="col-md-6">
                        <div class="media feature">
                            <div class="icons m-0 rounded-md h2 text-primary text-center px-3">
                                <i class="uil uil-phone"></i>
                            </div>
                            <div class="content ml-4">
                                <h5>Phone</h5>
                                <a href="tel:<?php echo $user->phone; ?>" class="text-primary"><?php echo $user->phone; ?></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-md-6">
                        <div class="media feature">
                            <div class="icons m-0 rounded-md h2 text-primary text-center px-3">
                                <i class="uil uil-envelope"></i>
                            </div>
                            <div class="content ml-4">
                                <h5>Email</h5>
                                <a href="mailto:<?php echo $user->email; ?>" class="text-primary"><?php echo $user->email; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <h5 class="mt-4">Bio</h5>
                <p class="text-muted mt-4"><?php echo nl2br($user->bio); ?></p>
                <h5 class="mt-4">Comments (<?php echo count($comments); ?>)</h5>
                <div class="row">
                    <div class="col-12 mt-4">
                        <form class="p-4 rounded border" action="<?php echo base_url('comment'); ?>" method="post">
                            <input type="hidden" name="id_friend" value="<?php echo $user->id; ?>">
                            <?php if (!is_null($comments)) { ?>
                            <ul class="media-list list-unstyled mb-0">
                                <?php foreach ($comments as $comment) { ?>
                                <li class="comment-desk">
                                    <div class="d-flex align-items-center">
                                        <a class="float-left pr-3" href="<?php echo base_url('profile/' . $comment->id); ?>">
                                            <img src="<?php echo base_url('assets/images/users/' . $comment->avatar); ?>" class="avatar avatar-md-sm rounded-circle shadow">
                                        </a>
                                        <div class="overflow-hidden d-block">
                                            <h6 class="media-heading mb-0"><a href="<?php echo base_url('profile/' . $comment->id); ?>" class="text-dark"><?php echo $comment->name; ?></a></h6>
                                            <small class="text-muted"><?php echo date('j F Y H:i', strtotime($comment->created)); ?></small>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <p class="text-muted font-italic p-3 bg-light rounded"><?php echo $comment->message; ?></p>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                            <?php } else { ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>There are no comments yet!</label>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if ($this->data->friendCheck($user->id, $self->id)) { ?>
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
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h5 class="mb-0">Friends (<?php echo count($friends); ?>)</h5>
            </div>
        </div>
        <div class="row">
            <?php foreach ($friends as $friend) { ?>
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="card blog-post rounded border-0 shadow overflow-hidden">
                    <div class="position-relative">
                        <a href="<?php echo base_url('profile/' . $friend->id); ?>"><img src="<?php echo base_url('assets/images/users/' . $friend->avatar); ?>" class="card-img-top"></a>
                    </div>
                    <div class="card-body content">
                        <h5 class="text-center"><a href="<?php echo base_url('profile/' . $friend->id); ?>" class="title text-dark"><?php echo $friend->name; ?></a></h5>
                        <p class="text-center text-muted line-clamp"><?php echo $friend->bio; ?></p>
                        <ul class="list-unstyled d-flex justify-content-between border-top mt-3 pt-3 mb-0 profiler">
                            <li class="text-muted small"><i data-feather="user" class="fea icon-sm text-primary"></i> <?php echo $friend->friends; ?></li>
                            <li class="text-muted small"><i data-feather="message-square" class="fea icon-sm text-primary"></i> <?php echo $friend->comments; ?></li>
                            <?php if ($friend->id == $self->id) { ?>
                            <li class="text-muted small">
                                <a href="#!" class="text-primary">It's Me!</a>
                            </li>
                            <?php } else { ?>
                            <li class="text-muted small">
                                <?php if ($this->data->friendCheck($friend->id, $self->id) == false) { ?>
                                <a href="<?php echo base_url('add/' . $friend->id); ?>" class="text-primary"><i data-feather="plus" class="fea icon-sm"></i> Add</a>
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
    </div>
</section>
<?php $this->load->view('include/footer'); ?>
</body>
</html>