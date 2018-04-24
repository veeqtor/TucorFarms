/* ========================================================================= */
/*	Preloader
/* ========================================================================= */

import $ from "jquery";

$(window).on('load', function () {
    $('.spinner-wrapper').fadeOut('slow');
});


$(document).ready(function () {


    $(window).on('scroll', scrollCheck);
    $(window).on('touchmove', scrollCheck);


    function scrollCheck() {
        let scrollPosition = $(window).scrollTop();
        if (scrollPosition < 15) {
            $('#bg').addClass('fixed-top-custom');
        } else if (scrollPosition >= 15) {
            $('#bg').removeClass('fixed-top-custom');
        }
    }


    $('.icon').on('click', function () {
        $('.side-nav').toggleClass('showSide').focus();
        $('.icon > i').removeClass('fa-bars').addClass('fa-times').fadeIn('slow');
        // $('.main-content').toggleClass('shiftMainContent');
    });

    $('.side-nav').on({
        focusout: function () {
            $('.side-nav').data('timer', setTimeout(function () {
                $('.side-nav').removeClass('showSide');
                // $('.icon > i').removeClass('fa-times').addClass('fa-bars').fadeIn('slow');

                // $('.main-content').removeClass('shiftMainContent');

            }.bind('.side-nav'), 0));
        },
        focusin: function () {
            clearTimeout($('.side-nav').data('timer'));
        },
        keydown: function (e) {
            if (e.which === 27) {
                $('.side-nav').removeClass('showSide');
                // $('.main-content').removeClass('shiftMainContent');
                e.preventDefault();
            }
        }
    });

    $('.icon').on({
        focusout: function () {
            $('.side-nav').data('timer', setTimeout(function () {
                $('.side-nav').removeClass('showSide');
                $('.icon > i').removeClass('fa-times').addClass('fa-bars').fadeIn('slow');
                // $('.main-content').removeClass('shiftMainContent');

            }.bind('.side-nav'), 0));
        },
        focusin: function () {
            clearTimeout($('.side-nav').data('timer'));
        }
    });


    // Select all links with hashes
    $('a[href^="#"]')
    // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function (event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                let target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function () {
                        // Callback after animation
                        // Must change focus!
                        let $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        }
                    });
                }
            }
        });


//Scroll Top link
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrolltop').fadeIn();
        } else {
            $('.scrolltop').fadeOut();
        }
    });

    $('.scrolltop, #logo a').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
        return false;
    });


    $('[data-fancybox]').fancybox({
        buttons: [
            'slideShow',
            'zoom',
            'close'
        ],
        keyboard: true,
        protect: true,
        arrows: true
    });


    /**
     *
     * START Carousel
     *
     */

    $('.remark-body,.availProduct').each(function () {
        $(this).owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            nav: false,
            animateOut: 'slideOutDown',
            animateIn: 'zoomIn',
            margin: 40,
            stagePadding: 30,
            smartSpeed: 450,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
    });

    $('.gallery').owlCarousel({
        loop: true,
        margin: 2,
        autoplay: true,
        autoplayTimeout: 5000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });

    $('.products').owlCarousel({
        loop: true,
        margin: 30,
        autoplay: true,
        autoplayTimeout: 5000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });

    $('.maywant').owlCarousel({
        loop: true,
        margin: 30,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });


    /**
     *
     * END Carousel
     *
     */

    window.wow.init();


    /**
     * START
     * Shopping cart
     *
     */

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let bookingCart = (function () {
        /*********************
         *  Private Variables
         * *******************/
        let cart = [];

        function Item(id, name, price, qty, per) {
            this.id = id;
            this.item = name;
            this.price = price;
            this.qty = qty;
            this.per = per;
        }

        function saveCart() {
            localStorage.setItem('bookingCart', JSON.stringify(cart));
        }

        function loadCart() {
            cart = JSON.parse(localStorage.getItem('bookingCart'));
            if (cart === null) {
                cart = [];
            }
        }

        loadCart();


        /*********************************
         *  Public Methods and Properties
         *********************************/

        let obj = {};

        obj.addToCart = function (id, name, price, qty, per) {
            for (let i in cart) {
                if (cart[i].id === id && cart[i].item === name) {
                    cart[i].qty += qty;
                    cart[i].per = per;
                    saveCart();
                    return;
                }
            }
            let item = new Item(id, name, price, qty, per);
            cart.push(item);
            saveCart();
        };

        obj.setItemQty = function (id, qty) {
            for (let i in cart) {
                if (cart[i].id === id) {
                    cart[i].qty = qty;
                    saveCart();
                    return;
                }
            }
        };

        obj.removeFromCart = function (id) {
            for (let i in cart) {
                if (cart[i].id === id) {
                    cart[i].qty--;
                    if (cart[i].qty === 0) {
                        cart.splice(i, 1);
                    }
                    saveCart();
                    break;
                }
            }
        };

        obj.removeAllFromCart = function (id) {
            for (let i in cart) {
                if (cart[i].id === id) {
                    cart.splice(i, 1);
                    saveCart();
                    break;
                }
            }
        };

        obj.clearCart = function () {
            localStorage.removeItem('bookingCart');
            cart = [];
        };

        obj.countCart = function () {
            let totalCount = 0;
            for (let i in cart) {
                totalCount += cart[i].qty;
            }
            return totalCount;
        };

        obj.totalCart = function (charge = 0) {
            let totalCost = 0;
            for (let i in cart) {
                totalCost += (cart[i].price * cart[i].qty);
            }
            totalCost += charge;
            return totalCost.toLocaleString(undefined, {maximumFractionDigits: 2});
        };

        obj.listCart = function () {
            let cartCopy = [];
            for (let i in cart) {
                let item = cart[i];
                let itemCopy = {};
                for (let p in item) {
                    itemCopy[p] = item[p];
                }
                itemCopy.total = (cart[i].qty * cart[i].price).toLocaleString(undefined, {maximumFractionDigits: 2});
                cartCopy.push(itemCopy);
            }
            return cartCopy;
        };

        return obj;
    })();

    displayCart();

    displayReviewCart();

    if (window.location.pathname === '/user/checkout/print') {
        printReceipt();
    }

    $('.add-to-cart').click(function (e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        let item = $(this).attr('data-item');
        let price = Number($(this).attr('data-price'));
        let per = $(this).attr('data-per');

        bookingCart.addToCart(id, item, price, 1, per);
        displayCart();
    });

    $('#clearCart').click(function () {
        bookingCart.clearCart();
        displayCart();
    });

    $('#show-cart').on('click', '.delete-item', function () {
        let id = $(this).attr('data-id');
        bookingCart.removeAllFromCart(id);
        displayCart();
    });

    $('#show-cart').on('change', '.item-count', function () {
        let qty = Number($(this).val());
        let id = $(this).attr('data-id');
        bookingCart.setItemQty(id, qty);
        displayCart();
    });

    $('.checkout-btn').click(function (e) {
        e.preventDefault();
        saveForReceipt();
    });

    // $('#historyData').on('click', '.view-print', function () {
    //     let ref = $(this).attr('data-ref');
    //     window.location.replace('history/print#' + ref);
    // });

    $('.view-print').on('click', function () {
        let ref = $(this).attr('data-ref');
        window.location.replace('history/print#' + ref);
    });

    //All functions


    // function loadHistory() {
    //     $.ajax({
    //         type: 'GET',
    //         url: '/user/accounts/history/load',
    //     }).done(function (data) {
    //         let sn = 0;
    //         for (let i in data) {
    //             sn++;
    //             let tableData = "";
    //             let itemArray = JSON.parse(data[i].purchases);
    //             let keys = Object.keys(itemArray);
    //             tableData = "<tr>\n";
    //             tableData += "<td>" + sn + "</td>\n";
    //             tableData += "<td>";
    //             for (let i = 0; i < keys.length - 1; i++) {
    //                 let key = keys[i];
    //                 tableData += "<i class='text-muted'>" + itemArray[key].item + "</i>&nbsp;&times;&nbsp;<small>" + itemArray[key].qty + "</small></br>";
    //             }
    //             tableData += "</td>";
    //             tableData += "<td>&#8358;&nbsp;" + itemArray[keys.length - 1].grandTotal + "</td>\n";
    //
    //             let date = new Date(data[i].created_at).toLocaleDateString(undefined, {
    //                 day: 'numeric',
    //                 month: 'short',
    //                 year: 'numeric'
    //             });
    //
    //             tableData += "<td>" + date + "</td>\n";
    //             tableData += "<td>\n";
    //             tableData += "<a href='javascript:void(0)' data-ref=" + data[i].reference_id + "  class='view-print btn btn-custom btn-sm'>\n";
    //             tableData += "<i class='fa fa-eye'>&nbsp;</i>View\n";
    //             tableData += "</a>\n";
    //             tableData += "</td>\n";
    //             tableData += "</tr>";
    //
    //             $('#historyData').append(tableData);
    //         }
    //     });
    // }
    // $('.order-history').on('click', function () {
    //     // window.location.href = '/user/accounts/history/';
    //     loadHistory();
    // });


    function displayCart() {
        let cartArray = bookingCart.listCart();
        let output = "";
        let empty = "<div class='cart-list'>\n" +
            "          <div class='row'>\n" +
            "             <div class='col' style='margin-bottom: 1rem'>\n" +
            "                <span class='text-muted p-4'>Your cart is empty</span>\n" +
            "             </div>\n" +
            "          </div>\n" +
            "        </div>";

        for (let i in cartArray) {
            output += "<tr>\n" +
                "          <td>" +
                "             " + cartArray[i].item + "\n" +
                "          </td>" +
                "          <td class='d-inline-flex'>" +
                "              <input type='number' min='1' data-id='" + cartArray[i].id + "' name='qty' class='item-count form-control form-control-sm' value='" + cartArray[i].qty + "'>&nbsp;" + cartArray[i].per + "\n" +
                "          </td>" +
                "          <td>" + cartArray[i].price.toLocaleString() + "</td>" +
                "          <td>" + cartArray[i].total + "</td>" +
                "          <td><a class='delete-item' data-id='" + cartArray[i].id + "'  href='javascript:void(0)'><i class='fa fa-trash-o'></i></a></td>" +
                "      </tr>";
        }
        if (cartArray && cartArray.length <= 0) {
            $('#show-cart').html(empty);
        } else {
            $('#show-cart').html(output);
        }

        $('#cartCount').html(bookingCart.countCart());

        $('.sub-total').html(bookingCart.totalCart());

        $('.total').html(bookingCart.totalCart(charge));
    }

    function displayReviewCart() {
        let cartArray = bookingCart.listCart();
        let output = "";

        for (let i in cartArray) {
            output += "<tr>\n" +
                "          <td>\n" +
                "             " + cartArray[i].item + "\n" +
                "          </td>\n" +
                "          <td>\n" +
                "               " + cartArray[i].qty + "\ " + cartArray[i].per +
                "          </td>\n" +
                "          <td>" + cartArray[i].price.toLocaleString() + "</td>\n" +
                "          <td>" + cartArray[i].total + "</td>\n" +
                "      </tr>";
        }

        $('#show-cart-review').html(output);

    }

    function displayPrintItems(ObjArray, reference_id) {
        let ItemsArray = ObjArray;
        let output = "";
        let itemKeys = Object.keys(ItemsArray);

        for (let i = 0; i < itemKeys.length - 1; i++) {
            let key = itemKeys[i];

            output += "<tr>\n" +
                "          <td>\n" +
                "             " + ItemsArray[key].item + "\n" +
                "          </td>\n" +
                "          <td>\n" +
                "               " + ItemsArray[key].qty + "\ " + ItemsArray[i].per +
                "          </td>\n" +
                "          <td>" + ItemsArray[key].price + "</td>\n" +
                "          <td>" + ItemsArray[key].total + "</td>\n" +
                "      </tr>";
        }

        $('#print').html(output);

        $('#reference_id').html(reference_id);

        $('.sub-total-print').html(totalItems(0, ItemsArray));

        $('.total-print').html(totalItems(charge, ItemsArray));

    }

    function saveForReceipt() {

        let items = bookingCart.listCart();

        items.push({grandTotal: bookingCart.totalCart(charge)});

        let json = JSON.stringify(items);

        if (bookingCart.countCart() === 0) {
            window.location.replace('/products');
        } else {
            $.ajax({
                type: 'POST',
                url: '/user/checkout/ajaxRequest',
                contentType: 'application/json',
                dataType: 'json',
                data: json,

            }).done(function () {
                bookingCart.clearCart();
                window.location.href = '/user/checkout/print';
            });
        }
    }

    function printReceipt() {
        $.ajax({
            type: 'GET',
            url: '/user/checkout/ajaxRequest',
            success: function (data) {
                let reference_id = data.reference_id;
                let ItemsArray = JSON.parse(data.purchases);

                displayPrintItems(ItemsArray, reference_id);
            }
        });
    }

    function totalItems(charge = 0, ObjArray) {
        let ItemsArray = ObjArray;
        let totalCost = 0;
        let itemKeys = Object.keys(ItemsArray);

        for (let i = 0; i < itemKeys.length - 1; i++) {
            let key = itemKeys[i];
            totalCost += (ItemsArray[key].price * ItemsArray[key].qty);
        }
        totalCost += charge;

        return totalCost.toLocaleString(undefined, {maximumFractionDigits: 2});
    }

    /**
     *
     * END
     * Shopping cart
     *
     */
});