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

    <!-- SWEETALERT2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* OMITTED: Your original styles stay here unchanged */
    </style>
</head>

<body>

    <section id="order">
        <div class="container">
            <div class="header">
                {{-- <h4 class="text-center">আজই আপনার আতরের জগতে প্রবেশ করুন</h4>
                <p>আপনার পন্যটি দ্রুততম সময়ে পেতে নিচের ফরমটি সঠিক ভাবে পুরন করুন।</p> --}}
            </div>

            <form action="" method="POST" class="shadow-sm p-4 bg-white rounded">
                @csrf

                <div class="row justify-content-center">

                    <!-- Package Section -->
                    <div class="col-12 mb-4">
                        <h5 class="text-center mb-3">আপনার প্যাকেজ নির্বাচন করুন</h5>

                        <div class="row g-3 justify-content-center">

                            <!-- Product Card 1 -->
                            <div class="col-md-6 col-lg-5">
                                <div class="product-card p-3 h-100 border">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input package-checkbox" type="checkbox"
                                                id="product_arabia" data-price="690"
                                                data-name="এহেসাস আল আরাবিয়া ১০ টির প্যাকেজ।">
                                            <label class="form-check-label fw-bold" for="product_arabia">
                                                এহেসাস আল আরাবিয়া ১০ টির প্যাকেজ।
                                            </label>
                                        </div>
                                        <span class="badge bg-success fs-6">৳ ৬৯০</span>
                                    </div>

                                    <input type="number" class="form-control qty-input" id="qty_arabia"
                                        value="1" min="1" disabled>
                                </div>
                            </div>

                            <!-- Product Card 2 -->
                            <div class="col-md-6 col-lg-5">
                                <div class="product-card p-3 h-100 border">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input package-checkbox" type="checkbox"
                                                id="product_aroma" data-price="390"
                                                data-name="এ্যারোমা জেনেসিস ৫ টির প্যাকেজ।">
                                            <label class="form-check-label fw-bold" for="product_aroma">
                                                এ্যারোমা জেনেসিস ৫ টির প্যাকেজ।
                                            </label>
                                        </div>
                                        <span class="badge bg-success fs-6">৳ ৩৯০</span>
                                    </div>

                                    <input type="number" class="form-control qty-input" id="qty_aroma"
                                        value="1" min="1" disabled>
                                </div>
                            </div>

                        </div>

                        <div class="text-center mt-4">
                            <h3 class="text-primary text-dark fw-bold">
                                মোট মূল্য: <span id="total_price">৳ ০</span>
                            </h3>
                        </div>
                        <div class="text-danger small mt-2" id="error-packages"></div>
                    </div>

                    <!-- Client Details -->
                    <div class="col-xl-5 p-3">
                        <label for="client_name">Name:</label>
                        <input type="text" name="client_name" id="client_name" class="form-control mb-1"
                            placeholder="enter your name">
                        <div class="text-danger small mb-2" id="error-client_name"></div>

                        <label for="client_phone">Phone:</label>
                        <input type="number" name="client_phone" id="client_phone" class="form-control mb-1"
                            placeholder="enter your number">
                        <div class="text-danger small mb-2" id="error-client_phone"></div>

                        <label for="client_address">Address:</label>
                        <textarea name="client_address" id="client_address" cols="30" rows="5" class="form-control mb-1"
                            placeholder="client address details"></textarea>
                        <div class="text-danger small mb-2" id="error-client_address"></div>
                    </div>

                    <!-- Address Selects -->
                    <div class="col-xl-5 p-3">
                        <label for="division">Division</label>
                        <select name="division_id" id="division" class="form-control mb-1">
                            <option value="" disabled selected>-- select division --</option>
                            @foreach ($divisions as $division)
                                <option value="{{ $division['id'] }}">{{ $division['name'] }}</option>
                            @endforeach
                        </select>
                        <div class="text-danger small mb-2" id="error-division_id"></div>

                        <label for="district">District</label>
                        <select name="district_id" id="district" class="form-control mb-1">
                            <option value="" disabled selected>-- select district --</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district['id'] }}">{{ $district['name'] }}</option>
                            @endforeach
                        </select>
                        <div class="text-danger small mb-2" id="error-district_id"></div>

                        <label for="upazilla">Upazilla</label>
                        <select name="upazilla_id" id="upazilla" class="form-control mb-1">
                            <option value="" disabled selected>-- select upazilla --</option>
                            @foreach ($upazillas as $upazilla)
                                <option value="{{ $upazilla['id'] }}">{{ $upazilla['name'] }}</option>
                            @endforeach
                        </select>
                        <div class="text-danger small mb-2" id="error-upazilla_id"></div>

                        <button type="submit" class="btn btn-primary w-100 mt-3">
                            Submit Order
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </section>

    <!-- JS Files -->
    <script src="{{ asset('frontend/assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="./assets/js/font-awsome.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/assets/js/nice-select2.js') }}"></script>
    <script src="https://code.iconify.design/iconify-icon/3.0.0/iconify-icon.min.js"></script>
    <script src="./assets/js/app.js"></script>

    <script>
        $(document).ready(function() {

            var options = {
                searchable: true,
                placeholder: 'select',
                searchtext: 'খুঁজুন',
                selectedtext: 'নির্বাচিত'
            };

            if ($("#division").length) {
                NiceSelect.bind(document.getElementById("division"), options);
            }
            if ($("#district").length) {
                NiceSelect.bind(document.getElementById("district"), options);
            }
            if ($("#upazilla").length) {
                NiceSelect.bind(document.getElementById("upazilla"), options);
            }

            $(".package-checkbox").on("change", function() {
                let checked = $(this).is(":checked");
                let qtyInput = $(this).closest(".product-card").find(".qty-input");
                qtyInput.prop("disabled", !checked);
                if (!checked) {
                    qtyInput.val(1);
                }
                calculateTotal();
            });

            $(".qty-input").on("input", function() {
                calculateTotal();
            });

            function calculateTotal() {
                let total = 0;
                $(".package-checkbox:checked").each(function() {
                    let price = parseFloat($(this).data("price")) || 0;
                    let qty = parseInt($(this).closest(".product-card").find(".qty-input").val()) || 1;
                    total += price * qty;
                });
                $("#total_price").text("৳ " + total);
            }

            $("form").on("submit", function(e) {
                e.preventDefault();

                $(".text-danger").html('');
                $(".form-control").removeClass('is-invalid');

                let name = $("#client_name").val().trim();
                let phone = $("#client_phone").val().trim();
                let address = $("#client_address").val().trim();
                let division = $("#division").val();
                let district = $("#district").val();
                let upazilla = $("#upazilla").val();

                if (!name) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'নাম আবশ্যক',
                        text: 'আপনার নাম লিখুন।'
                    });
                    return;
                }
                if (!phone) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'মোবাইল নম্বর আবশ্যক',
                        text: 'আপনার মোবাইল নম্বর লিখুন।'
                    });
                    return;
                }
                if (!address) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'ঠিকানা আবশ্যক',
                        text: 'আপনার সম্পূর্ণ ঠিকানা লিখুন।'
                    });
                    return;
                }
                if (!division) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'বিভাগ নির্বাচন করুন',
                        text: 'একটি বিভাগ নির্বাচন করুন।'
                    });
                    return;
                }
                if (!district) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'জেলা নির্বাচন করুন',
                        text: 'একটি জেলা নির্বাচন করুন।'
                    });
                    return;
                }
                if (!upazilla) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'উপজেলা নির্বাচন করুন',
                        text: 'একটি উপজেলা নির্বাচন করুন।'
                    });
                    return;
                }

                let packages = [];
                $(".package-checkbox:checked").each(function() {
                    let name = $(this).data("name");
                    let price = parseFloat($(this).data("price"));
                    let qty = parseInt($(this).closest(".product-card").find(".qty-input").val());
                    packages.push({
                        name: name,
                        price: price,
                        qty: qty
                    });
                });

                if (packages.length === 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'প্যাকেজ নির্বাচন করুন',
                        text: 'অন্তত একটি প্যাকেজ নির্বাচন করুন।',
                        confirmButtonText: 'ঠিক আছে'
                    });
                    return;
                }

                let totalPrice = $("#total_price").text().replace(/[^\d.]/g, '');

                $.ajax({
                    url: "{{ route('frontend.order.store') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        client_name: name,
                        client_phone: phone,
                        client_address: address,
                        division_id: division,
                        district_id: district,
                        upazilla_id: upazilla,
                        packages: packages,
                        total_price: totalPrice
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'অর্ডার সম্পন্ন!',
                            text: response.message,
                            confirmButtonText: 'ঠিক আছে'
                        }).then(() => {
                            window.location.href = "{{ route('frontend.order.index') }}";
                        });
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        if (errors) {
                            $.each(errors, function(key, value) {
                                $("#error-" + key).html(value[0]);
                                $("#" + key).addClass("is-invalid");
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'ত্রুটি!',
                                text: 'কোনো সমস্যা হয়েছে। আবার চেষ্টা করুন।',
                                confirmButtonText: 'ঠিক আছে'
                            });
                        }
                    }
                });

            });
        });
    </script>

</body>

</html>
