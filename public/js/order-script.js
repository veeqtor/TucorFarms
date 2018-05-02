$(document).ready(function () {
    let url_string = window.location.href;
    let url = new URL(url_string);
    let ref = url.searchParams.get('reference_id');

    if (ref) {
        loadOrderByRef(ref);
    }
    orders();

    $('#orderData').on('click', '.mark-as-delivered', function () {
        let order_id = $(this).attr('data-id');
        markAsDelivered(order_id);
    });

    $('#orderData').on('click', '.mark-as-processed', function () {
        let order_id = $(this).attr('data-id');
        markAsShipped(order_id);
    });

    $('#orderData').on('click', '.process', function () {
        let order_id = $(this).attr('data-id');
        orderProcessing(order_id);
        markAsShipped(order_id);

    });

    $('#orderData').on('click', '.print', function () {
        let order_id = $(this).attr('data-id');
        orderProcessing(order_id);

    });

    $('#all-pending').on('click', function () {
        loadAllPending();
    });

    $('#all-processed').on('click', function () {
        loadAllProcessed();
    });

    $('#all-delivered').on('click', function () {
        loadAllDelivered();
    });

    function loadOrderByRef(ref) {
        $.ajax({
            type: 'GET',
            data: {reference_id: ref},
            url: '/admin/dashboard/order/reference',
        }).done(function (data) {
            let itemArray = JSON.parse(data[0].purchases);
            let keys = Object.keys(itemArray);
            tableData = "<tr>\n";
            tableData += "<td>";
            for (let i = 0; i < keys.length - 1; i++) {
                let key = keys[i];
                tableData += "<i class='text-muted'>" + itemArray[key].item + "</i>&nbsp;&times;&nbsp;<small>" + itemArray[key].qty + "</small></br>";
            }
            tableData += "</td>";
            tableData += "<td>&#8358;&nbsp;" + itemArray[keys.length - 1].grandTotal + "</td>\n";

            let date = new Date(data[0].created_at).toLocaleDateString(undefined, {
                day: 'numeric',
                month: 'short',
                year: 'numeric'
            });
            tableData += "<td>" + date + "</td>\n";
            tableData += "<td>\n";
            if (data[0].received === null) {
                tableData += "<a href='javascript:void(0)' data-id=" + data[0].id + "  class='process badge  badge-info'>\n";
                tableData += "<i class='fa fa-cogs'>&nbsp;&nbsp;</i>Process\n";
                tableData += "</a>\n";
            } else if (data[0].received == 1) {
                tableData += "<span class='badge badge-pill badge-warning'>Processed</span>\n";
                tableData += "<a href='javascript:void(0)' data-id=" + data[0].id + "  class='print badge  badge-secondary'>\n";
                tableData += "<i class='fa fa-print'>&nbsp;&nbsp;</i>Print\n";
                tableData += "</a>\n";
                tableData += "<a href='javascript:void(0)' data-id=" + data[0].id + "  class='mark-as-delivered badge badge-success'>\n";
                tableData += "<i class='fa fa-check-square'>&nbsp;&nbsp;</i><span>Mark as delivered</span>\n";
                tableData += "</a>\n";
            } else if (data[0].received == 2) {
                tableData += "<span class='badge badge-pill badge-success'>DELIVERED</span>\n";
                tableData += "<a href='javascript:void(0)' data-id=" + data[0].id + "  class='print badge  badge-secondary'>\n";
                tableData += "<i class='fa fa-print'>&nbsp;&nbsp;</i>Print\n";
                tableData += "</a>\n";
            }
            tableData += "</td>\n";
            tableData += "</tr>";

            $('#orderData').html(tableData);
        });
    }

    function loadAllPending() {
        $('#orderData').html("");
        $.ajax({
            type: 'GET',
            url: '/admin/dashboard/order/reference/pending',
        }).done(function (data) {
            for (let i in data) {
                let tableData = "";
                let itemArray = JSON.parse(data[i].purchases);
                let keys = Object.keys(itemArray);
                tableData = "<tr>\n";
                tableData += "<td>";
                for (let i = 0; i < keys.length - 1; i++) {
                    let key = keys[i];
                    tableData += "<i class='text-muted'>" + itemArray[key].item + "</i>&nbsp;&times;&nbsp;<small>" + itemArray[key].qty + "</small></br>";
                }
                tableData += "</td>";
                tableData += "<td>&#8358;&nbsp;" + itemArray[keys.length - 1].grandTotal + "</td>\n";

                let date = new Date(data[i].created_at).toLocaleDateString(undefined, {
                    day: 'numeric',
                    month: 'short',
                    year: 'numeric'
                });

                tableData += "<td>" + date + "</td>\n";
                tableData += "<td>\n";
                tableData += "<a href='javascript:void(0)' data-id=" + data[i].id + "  class='process badge  badge-info'>\n";
                tableData += "<i class='fa fa-cogs'>&nbsp;&nbsp;</i>Process\n";
                tableData += "</a>\n";
                tableData += "</td>\n";
                tableData += "</tr>";

                // $('#orderData').html("");
                $('#orderData').append(tableData);
            }
        });
    }

    function loadAllProcessed() {
        $('#orderData').html("");
        $.ajax({
            type: 'GET',
            url: '/admin/dashboard/order/reference/processed',
        }).done(function (data) {
            for (let i in data) {
                let tableData = "";
                let itemArray = JSON.parse(data[i].purchases);
                let keys = Object.keys(itemArray);
                tableData = "<tr>\n";
                tableData += "<td>";
                for (let i = 0; i < keys.length - 1; i++) {
                    let key = keys[i];
                    tableData += "<i class='text-muted'>" + itemArray[key].item + "</i>&nbsp;&times;&nbsp;<small>" + itemArray[key].qty + "</small></br>";
                }
                tableData += "</td>";
                tableData += "<td>&#8358;&nbsp;" + itemArray[keys.length - 1].grandTotal + "</td>\n";

                let date = new Date(data[i].created_at).toLocaleDateString(undefined, {
                    day: 'numeric',
                    month: 'short',
                    year: 'numeric'
                });

                tableData += "<td>" + date + "</td>\n";
                tableData += "<td>\n";
                tableData += "<a href='javascript:void(0)' data-id=" + data[i].id + "  class='mark-as-delivered badge  badge-success'>\n";
                tableData += "<i class='fa fa-check-square'>&nbsp;&nbsp;</i>Mark as delivered\n";
                tableData += "</a>\n";
                tableData += "<a href='javascript:void(0)' data-id=" + data[i].id + "  class='print badge  badge-secondary'>\n";
                tableData += "<i class='fa fa-print'>&nbsp;&nbsp;</i>Print\n";
                tableData += "</a>\n";
                tableData += "</td>\n";
                tableData += "</tr>";

                $('#orderData').append(tableData);
            }
        });
    }

    function loadAllDelivered() {
        $('#orderData').html("");
        $.ajax({
            type: 'GET',
            url: '/admin/dashboard/order/reference/delivered',
        }).done(function (data) {
            for (let i in data) {
                let tableData = "";
                let itemArray = JSON.parse(data[i].purchases);
                let keys = Object.keys(itemArray);
                tableData = "<tr>\n";
                tableData += "<td>";
                for (let i = 0; i < keys.length - 1; i++) {
                    let key = keys[i];
                    tableData += "<i class='text-muted'>" + itemArray[key].item + "</i>&nbsp;&times;&nbsp;<small>" + itemArray[key].qty + "</small></br>";
                }
                tableData += "</td>";
                tableData += "<td>&#8358;&nbsp;" + itemArray[keys.length - 1].grandTotal + "</td>\n";

                let date = new Date(data[i].created_at).toLocaleDateString(undefined, {
                    day: 'numeric',
                    month: 'short',
                    year: 'numeric'
                });

                tableData += "<td>" + date + "</td>\n";
                tableData += "<td>\n";
                tableData += "<span  class='badge badge-success'>\n";
                tableData += "<i class='fa fa-check-square-o'>&nbsp;&nbsp;</i>Delivered\n";
                tableData += "</span>\n";
                tableData += "<a href='javascript:void(0)' data-id=" + data[i].id + "  class='print badge  badge-secondary'>\n";
                tableData += "<i class='fa fa-print'>&nbsp;&nbsp;</i>Print\n";
                tableData += "</a>\n";
                tableData += "</td>\n";
                tableData += "</tr>";

                $('#orderData').append(tableData);

            }
        });
    }

    function markAsDelivered(id) {
        $.ajax({
            type: 'GET',
            data: {order_id: id},
            url: '/admin/dashboard/order/reference/mark-delivered',
        }).done(function () {
            if (ref) {
                loadOrderByRef(ref);
            }
            orders();
        });
    }

    function markAsShipped(id) {
        $.ajax({
            type: 'GET',
            data: {order_id: id},
            url: '/admin/dashboard/order/reference/shipped',
        }).done(function () {
            if (ref) {
                loadOrderByRef(ref);
            }
            orders();
        });
    }

    function orders() {
        $.ajax({
            type: 'GET',
            url: '/admin/dashboard/allOrder',
        }).done(function (data) {
            $('#pending').html(data[0]);
            $('#shipped').html(data[1]);
            $('#delivered').html(data[2]);
        });
    }

    function orderProcessing(id) {
        $.ajax({
            type: 'GET',
            url: "/admin/dashboard/order/processing",
            data: {order_id: id}
        }).done(function (data) {
            orderProcessingReceipt(data);
        });

    }

    function orderProcessingReceipt(data) {
        let heading = "<div class='col-12'>";
        heading += "<div class='dash-content print-content'>";
        heading += "<div>";
        heading += "<div class='pull-left'>";
        heading += "<strong>Date:&nbsp;</strong>";
        heading += "<small>" + data[0].created_at + "</small>";
        heading += "</div>";
        heading += "<div class='pull-right'>";
        heading += "<strong>Sales Reciept no:&nbsp;</strong><span>" + data[0].reference_id + "</span>";
        heading += "</div>";
        heading += "</div>";
        heading += "<div class='text-center'>";
        heading += "<h3><strong>TUCORfarms</strong></h3><hr>";
        heading += "<span>2 Harold Road,Chelmsford, UK, GL11 4EA</span><br>";
        heading += "<span>+046 226 16161</span><br>";
        heading += "<span>info@example.com</span>";
        heading += "</div>";
        heading += "<div id='billed-to'>";


        let billedTo = "<strong>Billed To:&nbsp;</strong><br><hr>";
        billedTo += "<table class='table table-sm'>";
        billedTo += "<tbody>";
        billedTo += "<tr>";
        billedTo += "<td width='70'><strong>Name:</strong></td>";
        billedTo += "<td>" + data[1].lname + " " + data[1].fname + "</td>";
        billedTo += "</tr>";
        billedTo += "<tr>";
        billedTo += "<td width='70'><strong>Phone:</strong></td>";
        billedTo += "<td>" + data[1].phone + "</td>";
        billedTo += "</tr>";
        billedTo += "<tr>";
        billedTo += "<td width='70'><strong>Address:</strong></td>\n";
        billedTo += "<td>" + data[1].address + "</td>";
        billedTo += "</tr>";
        billedTo += "</tbody>";
        billedTo += "</table>";
        billedTo += "</div>";
        billedTo += "<div class='table-responsive py-4' id='order-details'>";


        let orderDetails = "<table class='table table-sm'>";
        orderDetails += "<thead>";
        orderDetails += "<tr>";
        orderDetails += "<th>Item&nbsp;Name</th>";
        orderDetails += "<th>Qty</th>";
        orderDetails += "<th>Unit&nbsp;Price&nbsp;(&#8358;)</th>";
        orderDetails += "<th colspan='2'>Total</th>";
        orderDetails += "</tr>";
        orderDetails += "</thead>";
        orderDetails += "<tbody>";

        let itemArray = JSON.parse(data[0].purchases);
        let keys = Object.keys(itemArray);
        // console.log(data[0].id);
        for (let i = 0; i < keys.length - 1; i++) {
            key = keys[i];
            // console.log(itemArray[keys.length - 1].grandTotal);
            orderDetails += "<tr>";
            orderDetails += "<td>" + itemArray[key].item + "</td>";
            orderDetails += "<td>" + itemArray[key].qty + "/" + itemArray[key].per + "</td>";
            orderDetails += "<td>" + itemArray[key].price + "</td>";
            orderDetails += "<td>" + itemArray[key].total + "</td>";
            orderDetails += "</tr>";
        }

        orderDetails += "</tbody>";
        orderDetails += "</table>";
        orderDetails += "</div>";
        orderDetails += "<div id='order-footer'>";

        let Orderfooter = "<p class='text-muted'>Shipping and additional costs are calculated based on the values you have entered.</p>";
        Orderfooter += "<table class='table table-sm order-summ'>";
        Orderfooter += "<tbody>";
        Orderfooter += "<tr>";
        Orderfooter += "<td class='text-muted'>Tax</td>";
        Orderfooter += "<td>&#8358;&nbsp;0.00</td></tr>";
        Orderfooter += "<tr>";
        Orderfooter += "<td style='font-weight: bold; font-size: large'>Total</td>";
        Orderfooter += "<td>&#8358;&nbsp;<strong>" + itemArray[keys.length - 1].grandTotal + "</strong></td>";
        Orderfooter += "</tr>";
        Orderfooter += "</tbody>";
        Orderfooter += "</table>";
        Orderfooter += "<hr>";
        Orderfooter += "<div class='text-center my-3'>";
        Orderfooter += "<p>Customer signature</p><br>";
        Orderfooter += "<p>_____________________________________</p>";
        Orderfooter += "<p>Date received/picked-up</p><br>";
        Orderfooter += "<p>_____________________________________</p>";
        Orderfooter += "<p>Thanks for the patronage<br>we expect your next visit!</p>";
        Orderfooter += "<p>For complaints Or suggestions on how to improve our services<br>Please call 07068662986</p>";
        Orderfooter += "</div>";
        Orderfooter += "<a href='javascript:void(0)' onclick='window.print()' data-id = " + data[0].id + " class='btn btn-sm btn-block btn-custom'>";
        Orderfooter += "Print&nbsp;<i class='fa fa-print'></i></a>";
        Orderfooter += "</div>";
        Orderfooter += "</div>";
        Orderfooter += "</div>";

        $('#overall-orders').html(heading);
        $('#billed-to').append(billedTo);
        $('#order-details').append(orderDetails);
        $('#order-footer').append(Orderfooter);
    }

});