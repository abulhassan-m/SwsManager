                        <input type="text" required name="firstname" required  value="<?php echo set_value('fname'); ?>"  id="firstName"  pattern="(?=.*[a-z])(?=.*[A-Z]).{2,}">
                        <input type="text" required name="lastname" required  value="<?php echo set_value('lname'); ?>"  id="lastName" placeholder=" " >                                                    
                        <input type="text" required name="blood" value="<?php echo set_value('blood'); ?>"  id="marstatus" >
                        <input type="text" required name="Height" value="<?php echo set_value('Height'); ?>"  id="Height" >
                        <input type="text" required name="Weight" value="<?php echo set_value('Weight'); ?>"  id="Weight" >
                        <input type="text" required name="religion" value="<?php echo set_value('religion'); ?>"  id="marstatus" >
                        <!--- Community Selection-->              <input type="text" required name="comm"  id="comm" >
                        <!---  Place of Birth Selection-->          <input type="text" required name="pob" value="<?php echo set_value('pob'); ?>"  id="pob" >
                        <!--- Proof of Identification -->      <input type="text" required name="ProofMentioned" value=""  id="ProofMentioned" >
                        <input type="text" required name="ProofID" value=""  id="ProofID" >
                        <input class="date_input" type="date" required name="dob" value="<?php echo set_value('dob'); ?>"  id="dob" >
                        <!--- Gender Selection-->  <select class="select-text" required name="gender" id="gender"> <option value="" disabled selected></option> <option value="1">Male</option><option value="2">Female</option>                            <option value="3">Transgender</option>                        </select>
                        <!--- Marital Status Selection-->                         <select class="select-text" required>                            <option value="" disabled selected></option>                            <option value="1">Single</option>                            <option value="2">Married</option>                            <option value="3">Widow</option>                            <option value="3">Separated</option>                            <option value="3">Divorcee</option>                        </select>
                        <input class="date_input" type="date" required name="doj" value="<?php echo set_value('doj'); ?>"  id="dob" >
                        <input class="date_input" type="date" required name="dol" value="<?php echo set_value('dol'); ?>"  id="dob" >
                        <input type="file" id="mediaFile" name="mediaFile" accept="image/*" capture="camera" />
                        <input type="text" required name="father"  id="father" >
                        <input type="text" required name="mother"  id="mother" >
                        <input type="text" required name="spouse"  id="spouse" >
                        <input type="text" required name="fatherocc"  id="fatherocc" >
                        <input type="text" required name="nosch"  id="nosch" >
                        <input type="text" required name="Nominee"  id="Nominee" >                        
                        /// Table (Children Name, Age , Relationship) ////        <div class="col-md-12 navbar-btn" id='relTable'></div>
                        ///Highest Educational Qualification  <input type="text" required name="father"  id="father" >
                        /// Year of Experiance  <input type="text" required name="father"  id="father" >
                        ///If any Experiance in Public Service? <input type="text" required name="father"  id="father" >
                        ///No of Year Experiance in Public Service? <input type="text" required name="father"  id="father" >
                        ///No of Years Experiance in Private Security? <input type="text" required name="father"  id="father" >
                        ///Certificate verification <input type="text" required name="father"  id="father" >
                        ///Languages Known <input type="text" required name="father"  id="father" >
                        ///Account Name <input type="text" required name="father"  id="father" >
                        ///Account No <input type="text" required name="father"  id="father" >
                        ///Bank Name <input type="text" required name="father"  id="father" >
                        ///Branch Name <input type="text" required name="father"  id="father" >
                        ///IFS Code <input type="text" required name="father"  id="father" >
                        ///Phone <input type="text" required name="phone" value="<?php echo set_value('phone'); ?>"  id="phone" >
                        ///Email <input type="text" required name="email" value="<?php echo set_value('email'); ?>"  id="email" >
                        ///Address <textarea name="address" id="address" class="textarea" rows="3" cols="5"></textarea>
                        ///Country            <select class="select-text" required>                <option value="" disabled selected></option>                <option value="1">India</option>                <option value="2">Qatar</option>                <option value="3">Saudi Arabia</option>            </select>
                        ///State  <select class="select-text" required>                 <option value="" disabled selected></option>                <option value="1">Tamil Nadu</option>                <option value="2">Andra Pradesh</option>                <option value="3">Pondicherry</option>            </select>
                        ///City     <select class="select-text" required>                <option value="" disabled selected></option>                <option value="1">Chennai</option>                <option value="2">Dindigul</option>                <option value="3">Pondicherry</option>            </select>
                        ///Pin code <input type="text" required name="pincode" value="<?php echo set_value('phone'); ?>"  id="pincode" >\
                        
                        <?php 
                        
                        $size=sizeof($_POST);
$number=$size/3;   //here 3 is number of column in the HTML table
for($i=1;$i<=$number;$i++)
{
	$index1="first".$i;
	$first[$i]=$_POST[$index1];
	$index2="second".$i;
	$second[$i]=$_POST[$index2];
	$index3="third".$i;
	$third[$i]=$_POST[$index3];	
}	