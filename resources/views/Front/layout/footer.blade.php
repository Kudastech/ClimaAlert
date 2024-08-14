<footer class="float-start w-100">
    <div class="container">
        <div class="row">

            <div class="left-footer">






                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 mt-4">
                    <div class="col">
                        <h5>Reference </h5>
                        <ul class="list-unstyled">
                            <li> <a href="#"> Legend </a> </li>
                            <li> <a href="#"> Glossary </a> </li>
                            <li> <a href="#"> World </a> </li>
                            <li> <a href="#"> Knowledge Base </a> </li>
                        </ul>
                    </div>
                    <div class="col">
                        <h5>Company </h5>
                        <ul class="list-unstyled">
                            <li> <a href="photo.html">Photo </a> </li>
                            <li> <a href="news.html"> News </a> </li>
                            <li> <a href="contactus.html"> Conatct Us </a> </li>
                        </ul>
                    </div>
                    <div class="col">
                        <h5>Support </h5>
                        <ul class="list-unstyled">
                            <li> <i class="fas fa-phone-square-alt"></i> 0703 257 4992</li>
                            <li> <i class="fas fa-envelope"></i> support@example.com </li>
                            <li> <i class="fas fa-fax"></i> support@example.com</li>


                        </ul>
                    </div>
                    <div class="col ">
                        <a href="#" class="mt-5 d-table">
                            <img src="{{ url('front/images/logo-white.png') }}" alt="logo" />
                        </a>
                        <p class="mt-3"> Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem</p>

                    </div>


                </div>
                <hr>

                <div class="d-flex justify-content-between">
                    <p class="text-center"> 2022-2023 © Weather. All rights reserved.</p>
                    <ul class="list-unstyled">
                        <li class="d-flex sc1">
                            <a href="#"> <i class="fab fa-facebook-f"></i> </a>
                            <a href="#" class="mx-3"> <i class="fab fa-twitter"></i> </a>
                            <a href="#"> <i class="fab fa-pinterest"></i> </a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </div>
</footer>


<div class="modal fade" id="exampleModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>



<!-- mobile menu -->

<div class="offcanvas offcanvas-start mobile-menu-div" tabindex="-1" id="mobile-menu">
    <div class="offcanvas-header">

        <button type="button" class="close-menu" data-bs-dismiss="offcanvas" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
            </svg>
        </button>
    </div>


    <div class="offcanvas-body">

        <div class="head-contact">
            <a href="index.html" class="logo-side">
                <img src="{{ url('front/images/logo.png') }}" alt="logo">
            </a>

            <div class="mobile-menu-sec mt-3">
                <ul class="list-unstyled">
                    <li class="active-m">
                        <a href="index.html"> Home </a>
                    </li>
                    <li>
                        <a href="news.html"> News </a>
                    </li>

                    <li>
                        <a href="map.html"> About </a>
                    </li>
                 
                    <li>
                        <a href="contact.html"> Contact </a>
                    </li>
                </ul>
            </div>

            <ul class="side-media list-unstyled">
                <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a> </li>
                <li> <a href="#"> <i class="fab fa-twitter"></i> </a> </li>
                <li> <a href="#"> <i class="fab fa-google-plus-g"></i> </a> </li>
                <li> <a href="#"> <i class="fab fa-instagram"></i> </a> </li>
            </ul>
        </div>
    </div>


</div>



<!-- login Modal -->
<div class="modal fade login-div-modal" id="loginModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

            </div>
            <div class="modal-body">
                <form class="form mt-5" action="{{ route('authenticate') }}" method="post">
                    @csrf
                    <div id="login-td-div" class="com-div-md">
                        <span class="text-center d-table m-auto user-icon"> <i class="fas fa-user-circle"></i> </span>
                        <h5 class="text-center mb-3"> Sign In </h5>
                        <button type="button" class="close" data-bs-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="login-modal-pn">

                            <div class="cm-select-login mt-3">
                                <div class="country-dp">

                                    <input type="email" name="email" class="form-control"
                                        placeholder="Username Or Email" />
                                    @error('email')
                                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="phone-div">

                                    <input type="password" name="password" class="form-control"
                                        placeholder="Password" />
                                    @error('password')
                                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                    @enderror
                                </div>


                            </div>



                            <button type="submit" class="btn continue-bn"> <i class="fas fa-lock"></i> SIGN IN
                            </button>
                        </div>

                        <p class="text-center  mt-3">
                            <a data-bs-toggle="modal" class="regster-bn" data-bs-target="#lostpsModal"
                                data-bs-dismiss="modal"> Lost Password ? </a>
                        </p>


                        <p class="text-center  mt-3"> Do not have an account?
                            <a data-bs-toggle="modal" class="regster-bn" data-bs-target="#registerModal"
                                data-bs-dismiss="modal"> Register </a>
                        </p>
                    </div>

                </form>



            </div>

        </div>
    </div>
</div>




<!-- register Modal -->
<div class="modal fade login-div-modal" id="registerModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="com-div-md">
                        <span class="text-center d-table m-auto user-icon"> <i class="fas fa-user-circle"></i> </span>
                        <h5 class="text-center mb-3"> Register </h5>
                        <div class="login-modal-pn">
                            <div class="cm-select-login mt-3">
                                <div class="country-dp">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Full Name" required />
                                    @error('name')
                                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="phone-div">
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                        required />
                                    @error('email')
                                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="phone-div">
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Create Password" required />
                                    @error('password')
                                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="phone-div">
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Confirm Password" required />
                                    @error('password')
                                        <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="forget2 mt-3 ml-3 d-flex justify-content-between">
                                    <input type="checkbox" class="form-check-input" id="termsCheck" required>
                                    <label class="form-check-label" for="termsCheck">
                                        By clicking Register, you agree to our Terms of Use and Cookie Policy
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn continue-bn"> Register </button>
                        </div>

                        <p class="text-center mt-3"> Already have an account?
                            <a data-bs-toggle="modal" class="regster-bn" data-bs-target="#loginModal"
                                data-bs-dismiss="modal"> Login </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- lost password -->

<div class="modal fade login-div-modal" id="lostpsModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <div>
                    <div class="com-div-md">
                        <span class="text-center d-table m-auto user-icon"> <i class="fas fa-user-circle"></i>
                        </span>
                        <h5 class="text-center mb-3"> Forget Your Password? </h5>
                        <button type="button" class="close" data-bs-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="login-modal-pn">
                            <p> We'll email you a link to reset your password</p>
                            <div class="cm-select-login mt-3">

                                <div class="phone-div">

                                    <input type="email" class="form-control" placeholder="Enter Your Email " />
                                </div>


                            </div>



                            <button class="btn continue-bn"> Send Me a password reset Link </button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
