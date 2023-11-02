
<div class="uc81Ff wKBl8c bbRbR RELBvb">
    <div class="LJtPoc qmmlRd" id="initialView" role="presentation"> 
        <div class="bdf4dc" role="presentation">
            <div class="">                        
                
                <div id="" class=" ">
                    <?php
                    $attributes = array("name" => "registrationform");
                    echo form_open("user/register", $attributes);
                    ?>
                    <div class=" bxPAYd" role="presentation">
                        
                        <div class="iUe6Pd Us7fWe JhUD8d" role="presentation">
                            <h1 Style="text-indent:0px; font-family: Maiandra GD; font-size: 20px;" id="headingText">Create your Security Service Management Web APP Account</h1>
                            <span style="color:red"><?php echo form_error('empname'); ?></span>
                            <span style="color:red"><?php echo form_error('username'); ?></span>
                            <span style="color:red"><?php echo form_error('password'); ?></span>
                            <span style="color:red"><?php echo form_error('cpassword'); ?></span>
                            <span style="color:red"><?php echo form_error('userlevel'); ?></span>
                            <div class="RCum0c">
                                <div class="m6Azde DbQnIe">
                                    <div class="fQxwff cDSmF  h7xxQe" role="presentation" data-is-rendered="true">
                                        <div class="rFrNMe uIZQNc zKHdkd sdJrJc Tyc9J" >
                                            <div class="aCsJod oJeWuf">
                                                <div class="aXBtI Wic03c">
                                                    <div class="Xb9hP">
                                                        <input class="whsOnd zHQkBf" autocomplete="off" spellcheck="false" tabindex="0" aria-label="First name" name="firstname" value="<?php echo set_value('fname'); ?>" autocapitalize="sentences" id="firstName" type="text">
                                                        <div class="AxOyFc snByac" aria-hidden="true">Employee Name</div>            
                                                    </div>
                                                    <div class="i9lrp mIZh1c"></div>
                                                    <p> <?php echo $this->session->flashdata('verify_msg'); ?> </p>
                                                </div>                                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="fQxwff cDSmF " role="presentation">
                                <div class="rFrNMe uIZQNc KKdlBd zKHdkd sdJrJc Tyc9J">
                                    <div class="aCsJod oJeWuf">
                                        <div class="aXBtI I0VJ4d Wic03c">
                                            <div class="Xb9hP">
                                                <input class="whsOnd zHQkBf" autocomplete="username" spellcheck="false" tabindex="0" aria-label="Username" name="username" id="username" type="text" value="<?php echo set_value('email'); ?>">
                                                <div class="AxOyFc snByac" aria-hidden="true">Username</div>                                                                       
                                            </div>
                                            <div class="i9lrp mIZh1c"></div>                                                                    
                                        </div>                                                                
                                    </div>
                                </div>                                                        

                            </div>
                            <div class="NTB7sf DbQnIe ">
                                <div class="XNyfPb">
                                    <div  class="jQ9OEf OcVpRe LK0i9">
                                        <div class="fZA7Dc">
                                            <div id="passwd" class="rFrNMe P7gl3b zKHdkd sdJrJc Tyc9J">
                                                <div class="aCsJod oJeWuf">
                                                    <div class="aXBtI Wic03c">
                                                        <div class="Xb9hP">
                                                            <input class="whsOnd zHQkBf" autocomplete="new-password" spellcheck="false" tabindex="0" aria-label="Password" name="password" autocapitalize="off" autocorrect="off" dir="ltr" type="password">
                                                            <div class="AxOyFc snByac" aria-hidden="true">Password</div>                
                                                        </div>
                                                        <div class="i9lrp mIZh1c"></div>                                                                          
                                                    </div>                                                                        
                                                </div>                                                                   
                                            </div>                                                                
                                        </div>                                                            
                                    </div>
                                    <div class="jQ9OEf OcVpRe LK0i9">
                                        <div  class="fZA7Dc">
                                            <div id="confirm-passwd" class="rFrNMe P7gl3b zKHdkd sdJrJc Tyc9J">
                                                <div class="aCsJod oJeWuf">
                                                    <div class="aXBtI Wic03c">
                                                        <div class="Xb9hP">
                                                            <input class="whsOnd zHQkBf" autocomplete="new-password" spellcheck="false" tabindex="0" aria-label="Confirm password" name="cpassword" autocapitalize="off" autocorrect="off" type="password">
                                                            <div class="AxOyFc snByac" aria-hidden="true">Confirm password</div>                  
                                                        </div>
                                                        <div class="i9lrp mIZh1c"></div>                                                                  
                                                    </div>                                                                
                                                </div>                                                        
                                            </div>                                                        
                                        </div>                                                    
                                    </div>
                                    <div class="kTNrif" style="padding-top:19px;"aria-live="assertive">Use 8 or more characters with a mix of letters, numbers &amp; symbols</div>
                                </div>
                                <div class="WBCose">
                                    <div role="button" class="U26fgb mUbCce fKz7Od" tabindex="0">
                                        <div class="VTBa7b MbhUzd" ></div>
                                        <content class="xjKiLb"><span style="top: -18px">
                                                <span class="JIzqne y7T4L">
                                                    <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="https://www.w3.org/TR/svg">
                                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"></path>
                                                    </svg>
                                                </span>
                                                <span class="JIzqne IMVfif">
                                                    <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="https://www.w3.org/TR/svg">
                                                    <path d="M0 0h24v24H0zm0 0h24v24H0zm0 0h24v24H0zm0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 7c2.76 0 5 2.24 5 5 0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.43-4.75-1.73-4.39-6-7.5-11-7.5-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 7.13 11.35 7 12 7zM2 4.27l2.28 2.28.46.46C3.08 8.3 1.78 10.02 1 12c1.73 4.39 6 7.5 11 7.5 1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22 21 20.73 3.27 3 2 4.27zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65 0 1.66 1.34 3 3 3 .22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53-2.76 0-5-2.24-5-5 0-.79.2-1.53.53-2.2zm4.31-.78l3.15 3.15.02-.16c0-1.66-1.34-3-3-3l-.17.01z"></path>
                                                    </svg>
                                                </span>
                                            </span>
                                        </content>
                                    </div>
                                </div>
                            </div>
                            <div  class="GtglAe">
                                <div class="OZliR">
                                    <button class="RveJvd snByac" name="submit" type="submit">Next</button>
                                </div>
                                <div class="AIu8h">
                                    <div class="IMH1vc lUHSR Hj2jlf" tabindex="0" ><a href="login">Already a member, Sign in instead</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="zj4yYb">
                <div  class="lNk8ad">
                    <figure class="btOOZe">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </figure>
                </div>
            </div>

        </div>
    </div>
    <?php echo form_close(); ?>
    <p style="color:green; font-style:bold"><?php echo $this->session->flashdata('msg_success'); ?></p>
    <p style="color:red; font-style:bold"><?php echo $this->session->flashdata('msg_error'); ?></p>

</div>