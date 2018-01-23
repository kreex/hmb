$(document).ready(function () {

    //CREATE TABLE ROW
    function TransactionTableRow(id, transaction_info) {

        var row_string = "<tr id='" + id + "'>" ;
        transaction_info.forEach(function (value) {

            row_string += "<td>" + value + "</td>";
        });

        row_string += "<td><button class='close' id='delete_transaction' >&times;</button></td></tr>";

        return row_string;
    }

    //GET TRANSACTIONS FORM THE SERVER AND SHOW THEM IN TABLE
    function getTransactions() {
        $.get("http://localhost:8000/getTransactions/", function(data) {
            var transactions = $.parseJSON(data);
            var table_content_string = "";

            transactions.forEach(function (value) {

                table_content_string += TransactionTableRow
                (value["id"], [
                    value["date"],
                    value["description"],
                    value["category"],
                    value["subcategory"],
                    value["value"]
                ]);
            });
            $("#transactions_body").html(table_content_string);
        });
    }

    //GET BALANCE FROM TRANSACTIONS ON THE SERVER AND SHOW IN BALANCE DIV
    function getBalance() {
        $.get("http://localhost:8000/getBalance", function(data) {
            var balance = $.parseJSON(data);

            $("#income_balance").html(balance["income"]);
            $("#outcome_balance").html(balance["outcome"]);
            $("#balance").html(balance["balance"]);
        });
    }

    //ADD TRANSACTION TO DATABASE
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

    //DELETE TRANSACTION FROM DB
    (function(d)
    {
        d.getElementById('transactions').addEventListener('click', function(e)
        {
            if(e.target.tagName.toLocaleLowerCase() === "button" && e.target.id === "delete_transaction"){

                var id_to_delete = e.target.parentNode.parentNode.id;
                $.post("http://localhost:8000/deleteTransaction/",
                    {
                        "id" : id_to_delete
                    },
                    function(data) {
                            alert(data);
                    });
            }

        }, false);
    }(document));

    //EDIT TRANSACTION IN DB
    // (function(d)
    // {
    //     d.getElementById('transactions').addEventListener('click', function(e)
    //     {
    //         if(e.target.tagName.toLocaleLowerCase() === "button" && e.target.id === "delete_transaction"){
    //
    //             var id_to_delete = e.target.parentNode.parentNode.id;
    //             $.post("http://localhost:8000/editTransaction/",
    //                 {
    //                     "id" : id_to_delete
    //                 },
    //                 function(data) {
    //                     alert(data);
    //                 });
    //         }
    //
    //     }, false);
    // }(document));

    //INITIALIZE CONTENT ON TRANSACTION PAGE
    getTransactions();
    getBalance();


});
