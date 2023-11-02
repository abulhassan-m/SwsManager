/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */	
// get state 
jQuery(document).on('change', 'select#country', function (e) {
    e.preventDefault();
    var countryID = jQuery(this).val();
    getStatesList(countryID);
});
 
// get city
jQuery(document).on('change', 'select#state', function (e) {
    e.preventDefault();
    var stateID = jQuery(this).val();
    getCityList(stateID);
 
});
 
// function get All States
function getStatesList(countryID) {
    $.ajax({
        url: "http://[::1]/sec-web-app/appln_emp/getstates",
        type: 'post',
        data: {countryID: countryID},
        dataType: 'json',
        beforeSend: function () {
            jQuery('select#state').find("option:eq(0)").html("Please wait..");
        },
        complete: function () {
            // code
        },
        success: function (json) {
            var options = '';
            options +='<option value="">Select State</option>';
            for (var i = 0; i < json.length; i++) {
                options += '<option value="' + json[i].state_id + '">' + json[i].state_name + '</option>';
            }
            jQuery("select#state").html(options);
 
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}
 
// function get All Cities
function getCityList(stateID) {
    $.ajax({
        url: "http://[::1]/sec-web-app/appln_emp/getcities",
        type: 'post',
        data: {stateID: stateID},
        dataType: 'json',
        beforeSend: function () {
            jQuery('select#city').find("option:eq(0)").html("Please wait..");
        },
        complete: function () {
            // code
        },
        success: function (json) {
            var options = '';
            options +='<option value="">Select City</option>';
            for (var i = 0; i < json.length; i++) {
                options += '<option value="' + json[i].city_id + '">' + json[i].city_name + '</option>';
            }
            jQuery("select#city").html(options);
 
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

