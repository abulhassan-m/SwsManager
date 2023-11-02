/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;

    setProgressBar(current);

    $(".next").click(function () {

        current_fs = (($(this).parent()).parent()).parent();
        next_fs = current_fs.next();

//Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
        next_fs.show();
//hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function (now) {
// for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({'opacity': opacity});
            },
            duration: 500
        });
        setProgressBar(++current);
    });

    $(".previous").click(function () {

         current_fs = (($(this).parent()).parent()).parent();
        previous_fs = current_fs.prev();

//Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
        previous_fs.show();

//hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function (now) {
// for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({'opacity': opacity});
            },
            duration: 500
        });
        setProgressBar(--current);
    });

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
                .css("width", percent + "%")
    }

    $(".submit").click(function () {
         setProgressBar(++current);
    });

});

//                 ----- On render -----
$(function () {

    $('#profile').addClass('dragging').removeClass('dragging');
});

$('#profile').on('dragover', function () {
    $('#profile').addClass('dragging');
}).on('dragleave', function () {
    $('#profile').removeClass('dragging');
}).on('drop', function (e) {
    $('#profile').removeClass('dragging hasImage');

    if (e.originalEvent) {
        var file = e.originalEvent.dataTransfer.files[0];
        console.log(file);

        var reader = new FileReader();

        //attach event handlers here...

        reader.readAsDataURL(file);
        reader.onload = function (e) {
            console.log(reader.result);
            $('#profile').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');

        };

    }
});
$('#profile').on('click', function (e) {
    console.log('clicked');
    $('#mediafile').click();
});
window.addEventListener("dragover", function (e) {
    e = e || event;
    e.preventDefault();
}, false);
window.addEventListener("drop", function (e) {
    e = e || event;
    e.preventDefault();
}, false);
$('#mediafile').change(function (e) {

    var input = e.target;
    if (input.files && input.files[0]) {
        var file = input.files[0];

        var reader = new FileReader();

        reader.readAsDataURL(file);
        reader.onload = function (e) {
            console.log(reader.result);
            $('#profile').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');
        };
    }
});
//# sourceURL=pen.js

$('#nosch').on('blur', function (e) {
    e.preventDefault();
    if (!(document.getElementById('relTable').contains(document.getElementById('table')))) {
        var dat = {nosch: parseInt(document.getElementById("nosch").value)};
        $.ajax({
            url: 'http://[::1]/sec-web-app/appln_emp',
            type: 'POST',
            dataType: 'text',
            data: dat,
        })
                .done(function (response) {
                    console.log("response");
                    //do something with the response
                })
                .fail(function () {
                    console.log("error");
                });
        var row = parseInt(document.getElementById("nosch").value);
        var tbody = '<table id="table" class="table table-bordered padding-t-5">     <thead>      <th>Sl.No</th>  <th>Name</th>               <th>Relationship</th>    <th>Age</th>     <th>Occupation</th>    <th>Date of Birth</th>  ' +
                '</thead><!-- tbody id="data">     </tbody--><tbody> ';
        for (var r = 1; r <= row; r++) {
            tbody += ' <tr><td>' + r
                    + ' </td> <td> <input class="form-control" type="text" name="first' + r
                    + '" />  </td> <td> <select class="select select-text form-control" name="second' + r
                    + '"> <option value="1">Father</option><option value="2">Mother</option> <option value="3">Spouse</option> <option value="4">Son</option> <option value="5">Daugher</option>  </select>  </td> <td> <input class="form-control" type="text" name="third' + r + '" />  </td> <td> <input class="form-control" type="text" name="forth' + r + '" />  </td> <td> <input class="form-control" type="date" name="fifth' + r + '" />  </td>  </tr>';
        }

        tbody += ' </tbody>    </table>';
        var table = document.getElementById("relTable");
        table.innerHTML = tbody;
//        div = document.createElement('div');
//        div.innerHTML = tbody;
//        table.appendChild(div);
    } else {
        var prev = parseInt(document.getElementById("nosch").value);
        var totalRowCount = 0;
        var rowCount = 0;
        var table = document.getElementById("table");
        var rows = table.getElementsByTagName("tr")
        for (var i = 0; i < rows.length; i++) {
            totalRowCount++;
            if (rows[i].getElementsByTagName("td").length > 0) {
                rowCount++;
            }
        }
        var message = "Total Row Count: " + totalRowCount;
        message += "\nRow Count: " + rowCount;
        var diff = prev - rowCount;
        if (diff > 0) {
            for (var i = 0; i < diff; i++) {
                var empTab = document.getElementById('table');
                var rowCnt = empTab.rows.length;   // table row.
                // get the number of rows.
                var tr = empTab.insertRow(rowCnt);
                tr = empTab.insertRow(rowCnt);
                var td = document.createElement('td');          // TABLE DEFINITION.
                td = tr.insertCell(0);
                rowCount = rowCount + 1;
                td.innerHTML = rowCount;
                var td = document.createElement('td');          // TABLE DEFINITION.
                td = tr.insertCell(1);
                td.innerHTML = '<input class="form-control"  type="text" name="first' + rowCount + '" />';
                var td = document.createElement('td');          // TABLE DEFINITION.
                td = tr.insertCell(2);
                td.innerHTML = '<select class="select select-text form-control" name="second' + rowCount
                        + '"> <option value="1">Father</option><option value="2">Mother</option> <option value="3">Spouse</option> <option value="4">Son</option> <option value="5">Daugher</option>  </select>';
                var td = document.createElement('td');          // TABLE DEFINITION.
                td = tr.insertCell(3);
                td.innerHTML = '<input class="form-control"  type="text" name="third' + rowCount + '" />';
                var td = document.createElement('td');          // TABLE DEFINITION.
                td = tr.insertCell(4);
                td.innerHTML = '<input class="form-control"  type="text" name="forth' + rowCount + '" />';
                var td = document.createElement('td');          // TABLE DEFINITION.
                td = tr.insertCell(5);
                td.innerHTML = '<input  class="form-control" type="text" name="fifth' + rowCount + '" />';
            }
        } else if (diff < 0) {    
            for (var i = 0; i > diff; i--) {      
                var empTab = document.getElementById('table');
                var rowCnt = empTab.rows.length-1;   // table row.
                empTab.deleteRow(rowCnt); // buttton -> td -> tr
            }
        }
    }
});
