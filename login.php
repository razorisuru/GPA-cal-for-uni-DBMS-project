<?php session_start(); ?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/login.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css?v=<?php echo time(); ?>">
</head>

<body class="homee">
    <?php
    include("connection.php");
    include("header.php");

    if (isset($_POST['submit'])) {
        $user = mysqli_real_escape_string($mysqli, $_POST['username']);
        $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

        if ($user == "" || $pass == "") {
            echo "<div class='h-100 d-flex align-items-center justify-content-center bgg'><div><p class='text-danger p-4 fs-3 text-uppercase alert alert-success rounded-5 text-center'><br/>Either username or password field is empty.<br/><br/><a class='btn btn-primary' href='login.php'>Go back <i class='bi bi-house-door-fill'></i></a><br/><br/></p></div></div>";
        } else {
            $result = mysqli_query($mysqli, "SELECT * FROM user_details WHERE username='$user' AND password=md5('$pass')")
                or die("Could not execute the select query.");

            $row = mysqli_fetch_assoc($result);

            if (is_array($row) && !empty($row)) {
                $validuser = $row['username'];
                $_SESSION['valid'] = $validuser;
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['index'] = $row['index'];
            } else { ?>
                <section class="vh-100" style="background: linear-gradient(to right, #6600cc 0%, #ff66ff 100%);animation:gradient 10s ease infinite;background-size: 200% 200%;">
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col col-xl-10">
                                <div class="card shadow-5-strong" style="border-radius: 1rem;background: hsla(0, 0%, 100%, 0.35);
        backdrop-filter: blur(30px);">
                                    <div class="row g-0">
                                        <div class="col-md-6 col-lg-5 d-none d-md-block" style="border-radius: 1rem 0 0 1rem; height:40rem;">

                                            <img src="img/login.jpeg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height:40rem;" />
                                        </div>
                                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                            <div class="card-body p-4 p-lg-5 text-black">



                                                <div class="d-flex align-items-center mb-3 pb-1">
                                                    <!-- <i class="fa-solid fa-house fa-2x me-3" style="color: #ff6162;"></i> -->
                                                    <img src="img/rz.png" alt="login form" class="img-fluid" width="50" />
                                                    <span class="h1 fw-bold ">ABC University</span>
                                                </div>
                                                <div>
                                                    <p class='text-light p-3 fs-3 text-uppercase  rounded-5 text-center'><br />Invalid username or password.<br /><br /><a class='btn btn-primary' href='login.php'><i class='bi bi-house-door-fill'></i> Go back</a><br /><br /></p>
                                                </div>






                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- echo "<div style='background: linear-gradient(to right, #6600cc 0%, #ff66ff 100%);animation:gradient 10s ease infinite;background-size: 200% 200%;' class='h-100 d-flex align-items-center justify-content-center bgg'><div><p class='text-danger p-3 fs-3 text-uppercase alert alert-danger rounded-5 text-center'><br/>Invalid username or password.<br/><br/><a class='btn btn-primary' href='login.php'><i class='bi bi-house-door-fill'></i> Go back</a><br/><br/></p></div></div>"; -->
                <!-- // echo "<script type='text/javascript'> 'use strict' const forms = document.querySelectorAll('.needs-validation') Array.from(forms).forEach(form => { form.addEventListener('submit', event => { if (!form.checkValidity()) { event.preventDefault() event.stopPropagation() } form.classList.add('was-validated') }, false) }) } </script>"; -->
        <?php
            }


            if (isset($_SESSION['valid'])) {
                if ($_SESSION['role'] == "super_admin") {
                    header('Location: index.php');
                } else {
                    header('Location: index.php');
                }
            }
        }
    } else {
        ?>
        <section class="vh-100" style="background: linear-gradient(to right, #6600cc 0%, #ff66ff 100%);animation:gradient 10s ease infinite;background-size: 200% 200%;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card shadow-5-strong" style="border-radius: 1rem;background: hsla(0, 0%, 100%, 0.35);
        backdrop-filter: blur(30px);">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block" style="border-radius: 1rem 0 0 1rem; height:40rem;">

                                    <img src="img/login.jpeg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height:40rem;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <form name="form1" method="post" action="" class="needs-validation" novalidate>

                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <!-- <i class="fa-solid fa-house fa-2x me-3" style="color: #ff6162;"></i> -->
                                                <img src="img/rz.png" alt="login form" class="img-fluid" width="50" />
                                                <span class="h1 fw-bold ">ABC University</span>
                                            </div>
                                            <p style="display: none;" id="Lerror">Invalid</p>

                                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your
                                                account</h5>

                                            <div class="form-floating mt-2">
                                                <input type="text" name="username" class="form-control" placeholder="Enter Username" id="validationCustomUsername" required>
                                                <label>Username</label>
                                                <div class="invalid-feedback">
                                                    Please insert your username.
                                                </div>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            <div class="form-floating mt-2">
                                                <input type="password" name="password" class="form-control" placeholder="Enter Password" id="validationCustom02" required>
                                                <label>Password</label>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please insert your password.
                                                </div>
                                            </div>

                                            <div class="pt-1 mb-4">
                                                <button class="btn btnlogin btn-lg btn-block mt-2" type="submit" name="submit">Login <i class="fa-sharp fa-solid fa-arrow-right-to-bracket"></i></button>
                                            </div>

                                            <a class="small text-muted" data-bs-toggle="modal" data-bs-target="#forgotpassword" href="#!">Forgot password?</a>
                                            <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a class=" regbtn text-light p-1 rounded-2 " href="register.php" style="color: #393f81;">Register here</a></p>
                                            <a href="#!" class="small text-muted" data-bs-toggle="modal" data-bs-target="#terms">Terms of use.</a>
                                            <a href="#!" class="small text-muted" data-bs-toggle="modal" data-bs-target="#privacy">Privacy policy</a>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal -->
        <div class="modal fade" id="forgotpassword" tabindex="-1" aria-labelledby="forgotpassword" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content rounded-2 modi">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="forgotpassword">Forgot Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <h1 class=" text-center p-2">Password Reset</h1>
                            <form action="login.php" method="post">
                                <div class="row mb-3 justify-content-center">
                                    <div class="col-auto">
                                        <input type="email" name="email" placeholder="Email address" class="form-control">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btnprofile" name="reset">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="terms" tabindex="-1" aria-labelledby="terms" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content rounded-2 modi">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="terms">Terms of use</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-dark">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam ducimus voluptatibus itaque,
                        aspernatur laborum odit vitae eveniet neque odio nesciunt, similique reprehenderit minus enim non
                        architecto nisi necessitatibus earum sit repellendus velit in quod. Aliquam quas, repudiandae
                        debitis neque atque aliquid qui ab consequatur veritatis quis est incidunt sapiente facilis.
                        Voluptas beatae pariatur aut explicabo, illum cupiditate sequi delectus dolorum amet. Necessitatibus
                        veritatis ex vitae asperiores reiciendis totam ratione nesciunt porro, quae, rem eveniet aut
                        doloremque delectus saepe assumenda at itaque quia quaerat harum. Eaque odit laudantium quo
                        cupiditate, harum ea consectetur neque, dignissimos numquam repudiandae laborum nesciunt eligendi
                        dolorum similique deserunt nobis et. In voluptate dolor optio eos quasi unde quod nesciunt enim ea
                        inventore dolores, molestias ipsum earum quam sunt autem perferendis veniam possimus mollitia error
                        quo delectus? Itaque libero, quisquam voluptatibus, nemo nulla ab sint nobis hic recusandae
                        laudantium assumenda repudiandae quibusdam ipsa nostrum natus minus ea magnam explicabo atque
                        ratione ut debitis tempore exercitationem earum! Assumenda quidem accusamus iusto eum, reprehenderit
                        error distinctio beatae doloremque cupiditate quia tempore molestias fugit, dolorum saepe explicabo
                        rerum? Aliquid quibusdam sequi tempore ea suscipit nulla maxime quaerat ipsam commodi labore ducimus
                        similique iste qui, aspernatur animi explicabo corporis vel. Eveniet.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Accept</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="privacy" tabindex="-1" aria-labelledby="privacy" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content rounded-2 modi">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="privacy">Privacy policy</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-dark">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam ducimus voluptatibus itaque,
                        aspernatur laborum odit vitae eveniet neque odio nesciunt, similique reprehenderit minus enim non
                        architecto nisi necessitatibus earum sit repellendus velit in quod. Aliquam quas, repudiandae
                        debitis neque atque aliquid qui ab consequatur veritatis quis est incidunt sapiente facilis.
                        Voluptas beatae pariatur aut explicabo, illum cupiditate sequi delectus dolorum amet. Necessitatibus
                        veritatis ex vitae asperiores reiciendis totam ratione nesciunt porro, quae, rem eveniet aut
                        doloremque delectus saepe assumenda at itaque quia quaerat harum. Eaque odit laudantium quo
                        cupiditate, harum ea consectetur neque, dignissimos numquam repudiandae laborum nesciunt eligendi
                        dolorum similique deserunt nobis et. In voluptate dolor optio eos quasi unde quod nesciunt enim ea
                        inventore dolores, molestias ipsum earum quam sunt autem perferendis veniam possimus mollitia error
                        quo delectus? Itaque libero, quisquam voluptatibus, nemo nulla ab sint nobis hic recusandae
                        laudantium assumenda repudiandae quibusdam ipsa nostrum natus minus ea magnam explicabo atque
                        ratione ut debitis tempore exercitationem earum! Assumenda quidem accusamus iusto eum, reprehenderit
                        error distinctio beatae doloremque cupiditate quia tempore molestias fugit, dolorum saepe explicabo
                        rerum? Aliquid quibusdam sequi tempore ea suscipit nulla maxime quaerat ipsam commodi labore ducimus
                        similique iste qui, aspernatur animi explicabo corporis vel. Eveniet.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Accept</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (() => {
                'use strict'

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                const forms = document.querySelectorAll('.needs-validation')

                // Loop over them and prevent submission
                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
            })()
        </script>

    <?php
    }
    ?>

    <?php
    include("footer.php");
    ?>

</body>

</html>