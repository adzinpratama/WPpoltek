<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Creative - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- Third party plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= get_template_directory(dirname(__FILE__), 'css/'); ?>styles.css" rel="stylesheet" />
    <link href="<?= get_template_directory(dirname(__FILE__), 'css/'); ?>add.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Aplikasi Absen</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#absen">Absen</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Daftar</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="admin">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <h1 class="text-uppercase text-white font-weight-bold">SELAMAT DATANG </h1>
                    <hr class="divider my-4" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 font-weight-light mb-5">Ini adalah aplikasi absen karyawan</p>
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#absen">Absen</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="page-section bg-primary" id="absen">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-8 text-center">
                    <form action="<?= base_url('home/absen'); ?>" id="form-absen" method="POST">
                        <h2 class="text-white mt-0">Masuk Setiap Hari</h2>
                        <hr class="divider light my-4" />
                        <div class="page">
                            <label class="field field_v1">
                                <input class="field__input" name="nip" id="nip" placeholder="ex: 18040210">
                                <span class="field__label-wrap">
                                    <span class="field__label">Your Nip</span>
                                </span>
                            </label>
                        </div>

                        <button class="btn btn-light btn-xl js-scroll-trigger" id="submit">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php if ($this->session->flashdata('notif')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Terimakasih Telah Absen',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php elseif ($this->session->flashdata('nothing')) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= $this->session->flashdata('nothing'); ?>'
            })
        </script>
    <?php endif; ?>

    <!-- modal -->
    <!-- Button trigger modal -->

    <div id="mymodal" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data kamu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5">
                            <div class="space"></div>

                            <div class="form-group">
                                <img src="<?= base_url('upload/avatars/') . $photo; ?>" alt="">
                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-7">

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label for="username">Nip</label>
                                <input class="form-control" type="text" value="<?= $nip; ?>" disabled />
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label for="full_name">Nama Lengkap</label>

                                <div>
                                    <input class="form-control" type="text" value="<?= $name; ?>" disabled />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>

                                <div>
                                    <input class="form-control" type="email" value="<?= $email; ?>" disabled />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                    <button onclick="window.loacation.href='<?= base_url(); ?>Home/confirm'" type="button" class="btn btn-primary">Iya Itu saya</button>
                </div>
            </div>
        </div>
    </div>

    <?php if ($this->session->flashdata('command')) : ?>
        <script>
            $('#mymodal').show();
        </script>
    <?php endif; ?>

    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <h2 class="text-center mt-0">Masuk Hari ini</h2>
            <hr class="divider my-4" />
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nip</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Waktu</th>
                        </tr>
                    </thead>
                    <?php foreach ($record as $rc) : ?>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td><?= $rc['nip']; ?></td>
                                <td><?= $rc['name']; ?></td>
                                <td><?= $rc['time']; ?></td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>
    <!-- Call to action-->
    <!-- <section class="page-section bg-dark text-white">
        <div class="container text-center">
            <h2 class="mb-4">Masuk Hari ini</h2>

        </div>
    </section> -->
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mt-0">Let's Get In Touch!</h2>
                    <hr class="divider my-4" />
                    <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                    <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                    <div>+1 (555) 123-4567</div>
                </div>
                <div class="col-lg-4 mr-auto text-center">
                    <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                    <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                    <a class="d-block" href="mailto:contact@yourwebsite.com">contact@yourwebsite.com</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container">
            <div class="small text-center text-muted">Copyright © 2020 - Start Bootstrap</div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?= get_template_directory(dirname(__FILE__), 'js/'); ?>scripts.js"></script>
</body>

</html>