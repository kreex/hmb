$(document).ready(function () {

    //GET TRANSACTIONS FORM THE SERVER AND SHOW THEM IN TABLE
    function getTransactions(i) {
        $.get("http://localhost:8000/getTransactions/" + i, function(data) {
            var transactions = $.parseJSON(data);
            var table_content_string = "";
            transactions.forEach(function (value) {

                table_content_string += "<tr><td>" + value["date"] + "</td>" + "<td>" + value["description"] + "</td>"  + "<td>" + value["category"] + "</td>" + "<td>" + value["subcategory"] + "</td>" + "<td>" + value["value"] + "</td></tr>";
            });
            $("#transactions_body").html(table_content_string);
        });
    }

    getTransactions(3);


    $("#add_transaction").click(function () {
        console.log("start adding transaction");
        $.post("http://localhost:8000/addTransaction",
        {
            date : $("#tr_date").val(),
            desc : $("#tr_dsc").val(),
            ctg : $("#ctgr").val(),
            sctg : $("#subctgr").val(),
            value : $("#tr-val").val()
        },
            function (data) {
            if(data === "true"){
                alert("good");
                getTransactions(3);
            }
            else{
                alert(data);
            }


            }
        );
    });


});
