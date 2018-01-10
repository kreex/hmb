$(document).ready(function () {

    //GET TRANSACTIONS FORM THE SERVER AND SHOW THEM IN TABLE

    $.get("http://localhost:8000/getTransactions/3", function(data) {
        var transactions = $.parseJSON(data);
        var table_content_string = "";
        transactions.forEach(function (value) {

            table_content_string += "<tr><td>" + value["date"] + "</td>" + "<td>" + value["desc"] + "</td>"  + "<td>" + value["category"] + "</td>" + "<td>" + value["subcategory"] + "</td>" + "<td>" + value["value"] + "</td></tr>";
        });
        $("#transactions").html(table_content_string);
    });

});
