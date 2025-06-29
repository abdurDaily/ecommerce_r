<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>commone links</title>

    <link rel="stylesheet" href="{{ asset('frontend/assets/style/nice-select2.css') }}">
    <!-- FONT STYLE -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet" />



    <!-- FAV ICON -->
    <link rel="shortcut icon" href="./assets/images/fav.png" type="image/x-icon" />
    <!-- SLICK -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/style/slick.css') }}" />
    <!-- BOOTSTRAP 5 -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/style/bootstrap.min.css') }}" />
    <!-- FONT-AWSOME -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/style/all.min.css') }}" />
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/style/style.css') }}" />
    <!-- RESPONSIVE CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/style/responsive.css') }}" />


    <style>
        .nice-select.open .nice-select-dropdown {
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- HERO -->
    <section id="hero" style="background: url({{ asset('frontend/assets/images/hero.png') }})">
        <div class="container">
            <img style="width: 180px" src="https://raafidan.com/images/raafidan.png" alt="" />
            <h1>
                প্রিমিয়াম প্রডাক্টের সংকলন <br />
                আপনার পছন্দে বিশেষ ঘ্রাণ
            </h1>
            <p>
                বিশ্বস্ত সুগন্ধির অভিজ্ঞতা এখন এক সেটেই উপহার কিংবা নিজের ব্যবহারের
                জন্য উপযুক্ত।
            </p>
            <div>
                <a href="#product" class="purchase">এই প্যাকেজটি কিনুন</a>
            </div>
        </div>
    </section>
    <!-- HERO END -->

    <!-- characteristics start -->
    <section id="characteristics">
        <div class="container">
            <div class="header">
                <h4>আমাদের বৈশিষ্ট্য সমুহ</h4>
                <p>১০০% অ্যালকোহল মুক্ত পারফিউম</p>
            </div>

            <div class="row g-5">
                <div class="col-xl-3 characteristics_box">
                    <div>
                        <span><iconify-icon icon="mdi:smell" width="129" height="129"></iconify-icon></span>
                        <h4>দীর্ঘস্থায়ী ঘ্রাণ</h4>
                    </div>
                </div>

                <div class="col-xl-3 characteristics_box">
                    <div>
                        <span>
                            <iconify-icon icon="ic:baseline-mosque" width="129" height="129"></iconify-icon></span>
                        <h4>নামায ও ইসলামী অনুষ্ঠানে উপযোগী</h4>
                    </div>
                </div>

                <div class="col-xl-3 characteristics_box">
                    <div>
                        <span><iconify-icon icon="mdi:gift" width="129" height="129"></iconify-icon></span>
                        <h4>উপহার দেওয়ার জন্য দারুণ প্যাকেজিং</h4>
                    </div>
                </div>

                <div class="col-xl-3 characteristics_box">
                    <div>
                        <span><iconify-icon icon="material-symbols:editor-choice-rounded" width="129"
                                height="129"></iconify-icon></span>
                        <h4>আপনার পছন্দমতো আতর নির্বাচন করার সুবিধা</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- characteristics end -->

    <!-- product -->
    <section id="product">
        <div class="container">
            <div class="header">
                <h4>আমাদের প্যাকেজ সমূহ</h4>
                <p>
                    আপনার পছন্দের জন্য বেছে নেওয়া জনপ্রিয় আতরের সংগ্রহ। প্রতিটি ঘ্রাণই
                    <br />
                    আলাদা আবেশ ও অনুভূতি নিয়ে আসবে।
                </p>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-xl-4 product_cart">
                    <div>
                        <div class="img">
                            <img class="img-fluid" src="./assets/images/product_1.png" alt="" />
                        </div>
                        <div class="contains">
                            <h4>এ্যারোমা জেনেসিস ৫ টির প্যাকেজ।</h4>
                            <p>
                                জনপ্রিয় বিশ্বাসের বিপরীতে, লোরেম ইপসাম কেবল এলোমেলো লেখা নয়।
                                এর শিকড় ৪৫ খ্রিস্টপূর্বাব্দের ধ্রুপদী ল্যাটিন সাহিত্যের একটি
                                অংশে রয়েছে।
                            </p>
                            <div class="retting">
                                <span>রেটিং:</span>
                                <ul class="p-0">
                                    <li>
                                        <iconify-icon icon="material-symbols:star-rounded" width="18"
                                            height="18"></iconify-icon>
                                    </li>
                                    <li>
                                        <iconify-icon icon="material-symbols:star-rounded" width="18"
                                            height="18"></iconify-icon>
                                    </li>
                                    <li>
                                        <iconify-icon icon="material-symbols:star-rounded" width="18"
                                            height="18"></iconify-icon>
                                    </li>
                                    <li>
                                        <iconify-icon icon="material-symbols:star-rounded" width="18"
                                            height="18"></iconify-icon>
                                    </li>
                                    <li>
                                        <iconify-icon icon="proicons:star" width="18" height="18"></iconify-icon>
                                    </li>
                                </ul>
                                <span>(১৮)</span>
                            </div>

                            <div class="d-flex justify-content-between pricing align-items-center">
                                <span>৳ ৩৯০</span>
                                <a href="#order">এই প্যাকেজটি কিনুন</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 product_cart">
                    <div>
                        <div class="img">
                            <img class="img-fluid" src="./assets/images/product_1.png" alt="" />
                        </div>
                        <div class="contains">
                            <h4>এহেসাস আল আরাবিয়া ১০ টির প্যাকেজ।</h4>
                            <p>
                                জনপ্রিয় বিশ্বাসের বিপরীতে, লোরেম ইপসাম কেবল এলোমেলো লেখা নয়।
                                এর শিকড় ৪৫ খ্রিস্টপূর্বাব্দের ধ্রুপদী ল্যাটিন সাহিত্যের একটি
                                অংশে রয়েছে।
                            </p>
                            <div class="retting">
                                <span>রেটিং:</span>
                                <ul class="p-0">
                                    <li>
                                        <iconify-icon icon="material-symbols:star-rounded" width="18"
                                            height="18"></iconify-icon>
                                    </li>
                                    <li>
                                        <iconify-icon icon="material-symbols:star-rounded" width="18"
                                            height="18"></iconify-icon>
                                    </li>
                                    <li>
                                        <iconify-icon icon="material-symbols:star-rounded" width="18"
                                            height="18"></iconify-icon>
                                    </li>
                                    <li>
                                        <iconify-icon icon="material-symbols:star-rounded" width="18"
                                            height="18"></iconify-icon>
                                    </li>
                                    <li>
                                        <iconify-icon icon="proicons:star" width="18"
                                            height="18"></iconify-icon>
                                    </li>
                                </ul>
                                <span>(১৮)</span>
                            </div>

                            <div class="d-flex justify-content-between pricing align-items-center">
                                <span>৳ ৬৯০</span>
                                <a href="#order">এই প্যাকেজটি কিনুন</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product end -->

    <!-- review -->
    <section id="review">
        <div class="container">
            <div class="header">
                <h4>আমাদের ক্রেতারা যা বলেছেন</h4>
                <p>
                    আপনার পছন্দের জন্য বেছে নেওয়া জনপ্রিয় আতরের সংগ্রহ। প্রতিটি ঘ্রাণই
                    <br />
                    আলাদা আবেশ ও অনুভূতি নিয়ে আসবে।
                </p>
            </div>
            <div class="sliders mt-4">
                <div class="slider">
                    <img class="img-fluid" src="./assets/images/review_1.jpg" alt="" />
                </div>
                <div class="slider">
                    <img class="img-fluid" src="./assets/images/review_1.jpg" alt="" />
                </div>
                <div class="slider">
                    <img class="img-fluid" src="./assets/images/review_1.jpg" alt="" />
                </div>
                <div class="slider">
                    <img class="img-fluid" src="./assets/images/review_1.jpg" alt="" />
                </div>
                <div class="slider">
                    <img class="img-fluid" src="./assets/images/review_1.jpg" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- review end -->

    <!-- FAQ -->
    <section id="faq">
        <div class="container">


            <div class="header">
                <h4 class="text-center">আপনাদের কিছু প্রশ্ন এবং উত্তর</h4>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="accordion shadow" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    প্রশ্ন: আতরগুলোতে কি এলকোহল আছে?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>উত্তর: হ্যাঁ, ১০ টি আতরের সেটে আপনি ১৫ টির মধ্য থেকে নিজের
                                        পছন্দমতো ১০ টি নির্বাচন করতে পারবেন।</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    প্রশ্ন: আমি কি আমার পছন্দের আতরগুলো বেছে নিতে পারবো?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>উত্তর: হ্যাঁ, ১০ টি আতরের সেটে আপনি ১৫ টির মধ্য থেকে নিজের
                                        পছন্দমতো ১০ টি নির্বাচন করতে পারবেন।</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    প্রশ্ন: ডেলিভারি কতদিনে হবে?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>উত্তর: হ্যাঁ, ১০ টি আতরের সেটে আপনি ১৫ টির মধ্য থেকে নিজের
                                        পছন্দমতো ১০ টি নির্বাচন করতে পারবেন।</p>
                                </div>
                            </div>
                        </div>


                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    প্রশ্ন: ডেলিভারি কতদিনে হবে?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>উত্তর: হ্যাঁ, ১০ টি আতরের সেটে আপনি ১৫ টির মধ্য থেকে নিজের
                                        পছন্দমতো ১০ টি নির্বাচন করতে পারবেন।</p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                {{-- <div class="col-xl-5">
                    <img style="height: 340px;" class="img-fluid" src="./assets/images/faq.png" alt="" />
                </div> --}}
            </div>
        </div>
    </section>
    <!-- FAQ END -->


    <section id="order">
        <div class="container">
            <div class="header">
                <h4 class="text-center">আজই আপনার আতরের জগতে প্রবেশ করুন</h4>
                <p>আপনার পন্যটি দ্রুততম সময়ে পেতে নিচের ফরমটি সঠিক ভাবে পুরন করুন।</p>
            </div>
            <form action="" method="POST" class="shadow py-3">
                <div class="row justify-content-center">
                    <div class="col-5 p-3">
                        @csrf

                        <label for="client_name"> name: </label>
                        <input type="text" class="form-control mb-3" placeholder="enter your name">


                        <label for="client_phone"> phone: </label>
                        <input type="number" class="form-control mb-3" placeholder="enter your number">


                        <label for="client_address"> Address : </label>
                        <textarea class="form-control" name="client_address" id="client_address" cols="30" rows="5"
                            placeholder="client address details"></textarea>

                    </div>

                    <div class="col-5">
                        <label for=""></label>
                        <select name="division" id="division" class="form-control mb-3">
                            <option value="" disabled selected> -- select division --</option>
                            @foreach ($divisions as $division)
                                <option value="{{ $division['id'] }}">{{ $division['name'] }}</option>
                            @endforeach
                        </select>


                        <select name="district" id="district" class="form-control mb-3">
                            <option value="" disabled selected> -- select district --</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district['id'] }}">{{ $district['name'] }}</option>
                            @endforeach
                        </select>

                        <select name="upazillas" id="upazilla" class="form-control mb-3">
                            <option value="" disabled selected> -- select upazilla --</option>
                            @foreach ($upazillas as $upazilla)
                                <option value="{{ $upazilla['id'] }}">{{ $upazilla['name'] }}</option>
                            @endforeach
                        </select>

                        <button class="w-100" type="submit">submit</button>
                    </div>
                </div>
                
            </form>
        </div>
    </section>






    <!-- JQUERY -->
    <script src="{{ asset('frontend/assets/js/jquery-3.7.1.min.js') }}"></script>
    <!-- FONT AWSOME -->
    <script src="./assets/js/font-awsome.js"></script>
    <!-- SLICK -->
    <script src="./assets/js/slick.min.js"></script>
    <!-- BOOTSTRAP 5 -->
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    {{-- NICE SELECT 2 --}}
    <script src="{{ asset('frontend/assets/js/nice-select2.js') }}"></script>
    <!-- iconify -->
    <script src="https://code.iconify.design/iconify-icon/3.0.0/iconify-icon.min.js"></script>
    <!-- APP -->
    <script src="./assets/js/app.js"></script>
    <script>
        var options = {
            searchable: true,
            placeholder: 'select',
            searchtext: 'zoek',
            selectedtext: 'geselecteerd'
        };
        NiceSelect.bind(document.getElementById("division"), options);
        NiceSelect.bind(document.getElementById("district"), options);
        NiceSelect.bind(document.getElementById("upazilla"), options);
    </script>
</body>

</html>
