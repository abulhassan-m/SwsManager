/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */	
// get state 
jQuery(document).on('change', 'select#country', function (e) {
    e.preventDefault();
    var postID = jQuery(this).val();
    var url = "http://localhost/manage-app/location/getstates";
    var selectID = 'select#state';
    var type = 'states';
    getList(postID,url,selectID,type);
});
 
// get city
jQuery(document).on('change', 'select#state', function (e) {
    e.preventDefault();
    var postID = jQuery(this).val();
    var url = "http://localhost/manage-app/location/getcities";
    var selectID = 'select#city';
    var type = 'city';
    getList(postID,url,selectID,type);
});
// get company state 
jQuery(document).on('change', 'select#ccountry', function (e) {
    e.preventDefault();
    var postID = jQuery(this).val();
    var url = "http://localhost/manage-app/location/getstates";
    var selectID = 'select#cstate';
    var type = 'states';
    getList(postID,url,selectID,type);
});
 
// get company city
jQuery(document).on('change', 'select#cstate', function (e) {
    e.preventDefault();
    var postID = jQuery(this).val();
    var url = "http://localhost/manage-app/location/getcities";
    var selectID = 'select#ccity';
    var type = 'city';
    getList(postID,url,selectID,type);
});
// get state 
jQuery(document).on('change', 'select#bcountry', function (e) {
    e.preventDefault();
    var postID = jQuery(this).val();
    var url = "http://localhost/manage-app/location/getstates";
    var selectID = 'select#bstate';
    var type = 'states';
    getList(postID,url,selectID,type);
});
 
// get city
jQuery(document).on('change', 'select#bstate', function (e) {
    e.preventDefault();
    var postID = jQuery(this).val();
    var url = "http://localhost/manage-app/location/getcities";
    var selectID = 'select#bcity';
    var type = 'city';
    getList(postID,url,selectID,type);
});
// get state 
jQuery(document).on('change', 'select#dcountry', function (e) {
    e.preventDefault();
    var postID = jQuery(this).val();
    var url = "http://localhost/manage-app/location/getstates";
    var selectID = 'select#dstate';
    var type = 'states';
    getList(postID,url,selectID,type);
});
 
// get city
jQuery(document).on('change', 'select#dstate', function (e) {
    e.preventDefault();
    var postID = jQuery(this).val();
    var url = "http://localhost/manage-app/location/getcities";
    var selectID = 'select#dcity';
    var type = 'city';
    getList(postID,url,selectID,type);
});
 
// function get All States
function getList(postID, url, selectID, type) {
    $.ajax({
        url: url,
        type: 'post',
        data: {postID: postID},
        dataType: 'json',
        beforeSend: function () {
            jQuery(selectID).find("option:eq(0)").html("Please wait..");
        },
        complete: function () { 
            // code
        },
        success: function (json) {
            var options = setjsonvalue(json,type);
            jQuery(selectID).html(options);
 
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}
function setjsonvalue(json,type){
    var options = '';
    if (type === 'states') {
            options +='<option value="">Select State</option>';
            for (var i = 0; i < json.length; i++) {
                options += '<option value="' + json[i].state_id + '">' + json[i].state_name + '</option>';
            }
        } else if (type === 'city') {
            options +='<option value="">Select City</option>';
            for (var i = 0; i < json.length; i++) {
                options += '<option value="' + json[i].city_id + '">' + json[i].city_name + '</option>';
            }
        }
        return options;
} 
