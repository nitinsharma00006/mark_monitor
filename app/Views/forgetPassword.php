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
                                <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                    and we'll send you a link to reset your password!</p>
                            </div>
                            <form class="user" method="POST" action="<?= base_url('login/forget')?>">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user"
                                        id="email" name="email"
                                        placeholder="Enter Email Address...">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">Reset Password</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('login') ?> ">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?= $this->endSection() ?>
