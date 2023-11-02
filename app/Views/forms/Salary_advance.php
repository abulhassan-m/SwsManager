<style>
    .autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff;
  border-bottom: 1px solid #d4d4d4;
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9;
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important;
  color: #ffffff;
}
</style>
<div class="column-half padding-t-7 margin-t-b-15 ">
    <?php
    $attributes = array('id' => 'form', 'enctype' => 'multipart/form-data');
    echo form_open('transaction/advsaladd', $attributes);
    ?>
    <div class="form-card">
        <div class="column-full">
            <div class="column-half">
                <h2 class="subtitle1">Salary Advance </h2>
            </div>
        </div>
        <div class="column-full padding-t-5 margin-t-b-15 box_panel">
            <div class="column-full">
                                     
                <div class="column-33">
                    <div class="group">    
                        <?php
                        echo form_input(array(
                            'type' => 'date',
                            'name' => 'date',
                            'id' => 'date'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Date</label>
                        <span class="signup-error"><?php echo form_error('date'); ?></span>
                    </div>                                                       
                </div>
                <!--- Height Status  Selection  Ended-->
            </div>
            <div class="column-66 margin-t-b-15">                
                <!--- Weight Status Selection-->                     
                <div class="column-full">
                    <div class="group autocomplete">    
                        <?php
                        echo form_input(array(
                            'type' => 'text',
                            'name' => 'emp',
                            'id' => 'emp'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label for="emp">Employee Name</label>
                        <span class="signup-error"><?php echo form_error('emp'); ?></span>
                    </div>                                                       
                </div>
                <!--- Weight Status  Selection  Ended-->

                <!---  Place of Birth Selection-->                  
                <div class="column-full">
                    <div class="group">    
                        <?php
                        echo form_input(array(
                            'type' => 'text',
                            'name' => 'client',
                            'id' => 'client'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label for="client">Client Name</label>
                        <span class="signup-error"><?php echo form_error('client'); ?></span>
                    </div>                                                       
                </div>
                <!--- Place of Birth  Selection  Ended-->
                
                <!--- Gender Selection-->               
                <div class="column-half padding-r-0">
                    <div class="group">    
                        <?php
                        echo form_dropdown(array('name' => 'mop', 'id' => 'mop'), array(' ' => '', '1' => 'Cash', '2' => 'Cheque'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Mode of Payment</label>
                        <span class="signup-error"><?php echo form_error('mop'); ?></span>
                    </div>                                                       
                </div>
                <!--- Gender Selection  Ended-->                  
                <div class="column-half padding-r-0">
                    <div class="group">    
                        <?php
                        echo form_input(array(
                            'type' => 'date',
                            'name' => 'trdate',
                            'id' => 'trdate'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Transaction Date</label>
                        <span class="signup-error"><?php echo form_error('trdate'); ?></span>
                    </div>                                                       
                </div>
                <!--- Proof of Identification -->                  
                <div class="column-full">
                    <div class="group">    
                        <?php
                        echo form_input(array(
                            'type' => 'text',
                            'name' => 'transaid',
                            'id' => 'transaid'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Details</label>
                        <span class="signup-error"><?php echo form_error('transaid'); ?></span>
                    </div>                                                       
                </div>
                <!---  Proof of Identification Ended-->
            </div>
            <div class="column-33 ">
                <!--- DOB Selection-->                
                <div class="column-full">
                    <div class="group">    
                        <?php
                        echo form_input(array(
                            'type' => 'text',
                            'name' => 'amount',
                            'id' => 'amount'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Amount</label>
                        <span class="signup-error"><?php echo form_error('dobirth'); ?></span>
                    </div>                                                       
                </div>
                <!--- DOB Selection  Ended-->
            </div>
            <div class="column-33 ">

                
                <!--- DOJ Selection-->          
                <div class="column-full">
                    <div class="group">    
                        <?php
                        echo form_dropdown(array('name' => 'authorize', 'id' => 'authorize', 'required' => ''), array(' ' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>authorize</label>
                        <span class="signup-error"><?php echo form_error('authorize'); ?></span>
                    </div>                                                       
                </div>
                <div class="column-full">
                    <div class="group">    
                        <?php
                        echo form_dropdown(array('name' => 'manage', 'id' => 'manage', 'required' => ''), array(' ' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>manage by</label>
                        <span class="signup-error"><?php echo form_error('manage'); ?></span>
                    </div>                                                       
                </div> <div class="column-full">
                    <div class="group">    
                        <?php
                        echo form_dropdown(array('name' => 'acc', 'id' => 'acc', 'required' => ''), array(' ' => '', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'));
                        ?>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>accountant</label>
                        <span class="signup-error"><?php echo form_error('acc'); ?></span>
                    </div>                                                       
                </div>
                <!--- DOJ Selection  Ended-->
            </div>                
        </div>
    </div>
    <?= form_submit(array('name' => 'finish', 'id' => 'finish', 'class' => 'submit action-button', 'value' => 'Finish')); ?>  
    <?php echo form_close(); ?>
</div>
<!-- Script --> <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

$.ajax({
    url: 'http://limrasnetwork.com/sw3s/transaction/fetchallempdata/1',
    type: 'post',
    dataType: "json",
    data: {},
    beforeSend: function () {},
    success: function(data){  
        var resp = $.map(data,function(obj){
            return obj.name;
        });
        autocomplete(document.getElementById("emp"), resp);
    },
    error: function (xhr, ajaxOptions, thrownError) { 
        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
    }
});

$.ajax({
    url: 'http://limrasnetwork.com/sw3s/transaction/fetchallclientdata/1',
    type: 'post',
    dataType: "json",
    data: {},
    beforeSend: function () {},
    success: function(data){  
        var resp = $.map(data,function(obj){
            return obj.name;
        });
        autocomplete(document.getElementById("client"), resp);
    },
    error: function (xhr, ajaxOptions, thrownError) { 
        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
    }
});
</script>