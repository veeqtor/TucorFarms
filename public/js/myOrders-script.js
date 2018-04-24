$(document).ready(function () {

    if (window.location.pathname === '/user/accounts/history/print') {
        let ref_id = window.location.hash;
        ref_id = ref_id.substr(1);
        historyPrint(ref_id);
    }

    function historyPrint(ref) {
        $.ajax({
            type: 'GET',
            url: '/user/accounts/history/load/print',
            data: {ref: ref}
        }).done(function (data) {
            let historyItems = JSON.parse(data[0].purchases);
            let hisDate = new Date(data[0].created_at).toLocaleDateString(undefined, {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
            displayHistoryPrint(historyItems, ref, hisDate);
        });
    }

    function displayHistoryPrint(ObjArray, reference_id, date) {
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
                "               " + ItemsArray[key].qty + "/" + ItemsArray[i].per +
                "          </td>\n" +
                "          <td>" + ItemsArray[key].price + "</td>\n" +
                "          <td>" + ItemsArray[key].total + "</td>\n" +
                "      </tr>";
        }


        $('.history-total-print').html(ItemsArray[itemKeys.length - 1].grandTotal);

        $('#history-date').html(date);

        $('#history-print').html(output);

        $('#reference_id').html(reference_id);


    }


});