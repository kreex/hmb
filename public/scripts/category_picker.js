/*
    PALCE ALL MAIN CATEGORIES IN CATEGORY INPUT AND SUBCATEGORIES IN SUBCATEGORIES INPUT
 */

$(document).ready(function(){

    var ctgr = $("#ctgr");  //CATEGORY SELECT ELEMENT
    var subctgr =$("#subctgr"); //SUBCATEGORY SELECT ELEMENT
    var initial_category;   //HOLD INITIAL CATEGORY VALUE
    var initial_subcategory;   //HOLD INITIAL SUBCATEGORY VALUE


    //CREATE OPTION TAG LIST AND PUT IT TO GIVEN ELEMENT ON THE PAGE
    function addOptions (option_array, element_id) {
        var  option_string = "";
        option_array.forEach(function (value) {
           option_string += "<option>" + value + "</option>";
        });
        element_id.html(option_string);
    }

    //GET LIST OF ALL MAIN CATEGORIES FROM SERVER
    $.get("http://localhost:8000/categoryLists/main/all", function(data) {
        var categories = $.parseJSON(data);
        addOptions(categories, ctgr);
        initial_category = categories[0];

    });

    //GET LIST OF SUBCATEGORIES FOR GIVEN MAIN CATEGORY
    ctgr.change(function () {
        if(ctgr.val() !== initial_category){
            $.get("http://localhost:8000/categoryLists/spec/" + ctgr.val(), function(data) {
                var subcategories = $.parseJSON(data);
                addOptions(subcategories, subctgr);
                initial_subcategory = subcategories[0];
                subctgr.prop("disabled", false);

            });
        }else {
            subctgr.html("<option>inne</option>");
            subctgr.prop("disabled", true);
        }
    });

});