<?= $this->extend('templates/single_base')?>
<?= $this->section('content')?>
    <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <img src="<?php echo base_url('assets/img/logo.png')?>" height="150px"/>
                            </div>
                            <form class="user" method="post" action="<?php echo base_url('login/auth');?>">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user"
                                        id="email" name="email"
                                        placeholder="Enter Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                        id="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="remember_me" name="remember_me">
                                        <label class="custom-control-label" for="remember_me">Remember
                                            Me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?php echo base_url('login/forget');?>">Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

        