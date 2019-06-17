<?php
/**
 * This view displays the login form. Its layout differs from other pages of the application.
 * @copyright  Copyright (c) 2014-2018 Benjamin BALET
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/jorani
 * @since      0.1.0
 */
?>



<style>
    body {
        background:url("<?php echo base_url();?>assets/images/login.jpg");
        background-size: 100%;
    }

    /* body {
        background: url("<?php echo base_url();?>assets/images/office_big_pc.jpg") no-repeat;
        background-attachment: fixed; 
        background-size: cover;
        display: grid;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }
*/
    .container {
        width: 30rem;
        height: 20rem;
        box-shadow: 0 0 1rem 0 rgba(0, 0, 0, .2);   
        border-radius: 5px;
        position: relative;
        z-index: 1;
        background: inherit;
        overflow: hidden;
    }

    .container:before {
        content: "";
        position: absolute;
        background: inherit;
        z-index: -1;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        box-shadow: inset 0 0 2000px rgba(255, 255, 255, .5);
        filter: blur(10px);
        margin: -20px;
    } 



    .vertical-center {
        min-height: 90%;  /* Fallback for browsers not supporting vh unit */
        min-height: 90vh;
        display: flex;
        align-items: center;
    }

    .form-box {
        padding: 20px;
        border: 1px #e4e4e4 solid;
        border-radius: 4px;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, .2);
        background-color: #fff;
    }

    .horizontal-center{
        text-align:center;
    }

    @font-face{
        font-family: "BebasNeue-Regular";
        src: url("<?php echo base_url();?>assets/fonts/BebasNeue-Regular.ttf");
    }

    @font-face{
        font-family: "Lato-Thin";
        src: url("<?php echo base_url();?>assets/fonts/Lato-Thin.ttf");
    }

    @font-face{
        font-family: "Lato-Bold";
        src: url("<?php echo base_url();?>assets/fonts/Lato-Bold.ttf");
    }
    
    .tool_title{
        font-family: 'Lato-Thin';
        font-size: 25px;
        color: #003a86;
        font-weight: -30;
        text-decoration: none;
        font-style: normal;
        font-variant: small-caps;
        text-transform: uppercase;
    }

    .login{
        font-family: 'Lato-Bold';
        font-size: 18px;
        color: #003a86;
        font-weight: 1700;
        text-decoration: none;
        font-style: normal;
        font-variant: normal;
        text-transform: uppercase;
        
    }

    .id_pass_label{
        font-family: 'Lato-Thin';
        font-size: 18px;
        letter-spacing: 2px;
        word-spacing: 2px;
        color: #000000;
        font-weight: 400;
        text-decoration: none;
        font-style: normal;
        font-variant: normal;
        text-transform: none;
        
    }

    .big_blue_label{
        font-family: 'BebasNeue-Regular';
        font-size: 70px;
        color: #003a86;
        font-weight: 700;
        text-decoration: none;
        font-style: normal;
        font-variant: normal;
        text-transform: none;
        margin-top:-50px !important;
        
    }

    .mid_blue_label{
        font-family: 'BebasNeue-Regular';
        font-size: 50px;
        color: #003a86;
        font-weight: 700;
        text-decoration: none;
        font-style: normal;
        font-variant: normal;
        text-transform: none;
        margin-top:-40px !important;
        margin-bottom:-20px !important;
    }

    .mid_slim_label{
        font-family: 'BebasNeue-Regular';
        font-size: 20px;
        color: #003a86;
        text-decoration: none;
        font-style: normal;
        font-variant: normal;
        text-transform: none;
        margin-top:-10px !important;
    }
    

    
</style>

            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
            
            <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
            

            <?php
            $attributes = array('id' => 'loginFrom');
            echo form_open('session/login', $attributes);
            $languages = $this->polyglot->nativelanguages($this->config->item('languages'));?>

            <input type="hidden" name="last_page" value="session/login" />

            <input type="hidden" name="language" value="<?php echo $language_code; ?>" />

            <div class="container-fluid">
            

            
            <div style="display: flex; justify-content: flex-end;">
                <img src="<?php echo base_url();?>assets/images/logo.png" style="width: 10%; height: 10%">
            </div>
                       
                <div class="row vertical-center" style = "margin: auto;width:90%;padding: 5px;">
                    <div class="col-md-6 horizontal-center login-form">
                        
                        <div class="tool_title">SCL LEAVE MANAGEMENT SYSTEM</div>
                        <br/>
                        <div class="login"><b><strong>Log in</strong></b></div>
                        <br/>
                        <div class="id_pass_label">ID</div>
                        <div><input type="text" style="box-shadow: 5px 5px 5px rgba(0, 0, 0, .3); width:300px; font-size: 20px; padding: 15px 15px;line-height: 30px !important; border-radius:5px !important;" class="input-medium" name="login" id="login" required /></div>
                        <input type="hidden" name="CipheredValue" id="CipheredValue" />
                        </form>
                        <input type="hidden" name="salt" id="salt" value="<?php echo $salt; ?>" />
                        <div><label for="password" class="id_pass_label"><?php echo lang('session_login_field_password');?></label></div>
                        <div><input class="input-medium" style="box-shadow: 5px 5px 5px rgba(0, 0, 0, .3); width:300px; font-size: 20px; padding: 15px 15px;line-height: 30px !important; border-radius:5px !important;"  type="password" name="password" id="password" /><br /></div>
                        <div>
                            <br>
                            <button id="send" style="box-shadow: 5px 5px 5px rgba(0, 0, 0, .3); width: 160px; height: 50px ;font-size: 20px;" class="btn btn-primary"><i class="mdi mdi-login"></i>&nbsp;<?php echo lang('session_login_button_login');?></button>
                            <?php if ($this->config->item('oauth2_enabled') == TRUE) { ?>
                            <?php if ($this->config->item('oauth2_provider') == 'google') { ?>
                            <button id="cmdGoogleSignIn" class="btn btn-primary"><i class="mdi mdi-google"></i>&nbsp;<?php echo lang('session_login_button_login');?></button>
                            <?php } ?>
                            <?php } ?>
                            <button id="cmdForgetPassword" style="box-shadow: 5px 5px 5px rgba(0, 0, 0, .3); width:130px; height: 50px; font-size: 10px; color: #fff; background: #FFBD00;" class="btn "><i class="mdi mdi-email"></i>&nbsp;Forgot Password</button>
                            <?php echo $flash_partial_view;?>
                            <?php echo validation_errors(); ?>
                        </div>

                        <textarea id="pubkey" style="visibility:hidden;"><?php echo $public_key; ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <table style="margin:10px;">
                            <tr>
                                <td  style="margin:20px; padding:20px;" class="big_blue_label">MANAGE YOUR LEAVE</td>
                            </tr>
                            <tr>
                                <td style="margin:20px;padding:20px;" class="mid_blue_label">MORE EFFECTIVELY NOW!</td>
                            </tr>
                            <tr>
                                <td style="margin:20px;padding:20px;" class="mid_slim_label">TRACK AND CONTROL YOUR LEAVE APPROVAL STATUS</td>
                            </tr>
                            <tr>
                                <td style="margin:20px;padding:20px;" class="mid_slim_label">AND MORE AT ONE PLACE</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>   
            
            <div class="modal hide" id="frmModalAjaxWait" data-backdrop="static" data-keyboard="false">
                <div class="modal-header">
                    <h1><?php echo lang('global_msg_wait');?></h1>
                </div>
                <div class="modal-body">
                    <img src="<?php echo base_url();?>assets/images/loading.gif"  align="middle">
                </div>
            </div>    

<link rel="stylesheet" href="<?php echo base_url();?>assets/select2-4.0.5/css/select2.min.css">
<script src="<?php echo base_url();?>assets/select2-4.0.5/js/select2.full.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/js.state-2.2.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jsencrypt.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootbox.min.js"></script>
<script type="text/javascript">
    //Encrypt the password using RSA and send the ciphered value into the form
    function submit_form() {
        var encrypt = new JSEncrypt();
        encrypt.setPublicKey($('#pubkey').val());
        //Encrypt the concatenation of the password and the salt
        var encrypted = encrypt.encrypt($('#password').val() + $('#salt').val());
        $('#CipheredValue').val(encrypted);
        $('#loginFrom').submit();
    }
    //Attempt to authenticate the user using OAuth2 protocol
    function signInCallback(authResult) {
        if (authResult['code']) {
          $.ajax({
            url: '<?php echo base_url();?>session/oauth2',
            type: 'POST',
            data: {
                      auth_code: authResult.code
                      },
            success: function(result) {
                if (result == "OK") {
                    var target = '<?php echo $last_page;?>';
                    if (target == '') {
                        window.location = "<?php echo base_url();?>";
                    } else {
                        window.location = target;
                    }
                } else {
                    bootbox.alert(result);
                }
            }
          });
        } else {
          // There was an error.
          bootbox.alert("Unknown OAuth2 error");
        }
    }
    $(function () {
<?php if ($this->config->item('csrf_protection') == TRUE) {?>
    $.ajaxSetup({
        data: {
            <?php echo $this->security->get_csrf_token_name();?>: "<?php echo $this->security->get_csrf_hash();?>",
        }
    });
<?php }?>
        //Memorize the last selected language with a cookie
        if(Cookies.get('language') !== undefined) {
            var IsLangAvailable = 0 != $('#language option[value=' + Cookies.get('language') + ']').length;
            if (Cookies.get('language') != "<?php echo $language_code; ?>") {
                //Test if the former selected language is into the list of available languages
                if (IsLangAvailable) {
                    $('#language option[value="' + Cookies.get('language') + '"]').attr('selected', 'selected');
                    $('#loginFrom').prop('action', '<?php echo base_url();?>session/language');
                    $('#loginFrom').submit();
                }
            }
        }
        //Refresh page language
        $('#language').select2({width:'165px'});
        $('#language').on('select2:select', function (e) {
          var value = e.params.data.id;
          Cookies.set('language', value, { expires: 90, path: '/'});
          $('#loginFrom').prop('action', '<?php echo base_url();?>session/language');
          $('#loginFrom').submit();
        });
        $('#login').focus();
        $('#send').click(function() {
            submit_form();
        });
        //If the user has forgotten his password, send an e-mail
        $('#cmdForgetPassword').click(function() {
            if ($('#login').val() == "") {
                alert("Please fill User ID");
            } else {
                if(confirm("Are you sure to reset your password and send it to your Email?")){ 
                        //$('#frmModalAjaxWait').modal('show');
                        $.ajax({
                           type: "POST",
                           url: "<?php echo base_url(); ?>session/forgetpassword",
                           data: { login: $('#login').val() },
                           success: function(){
                               alert("Password reset successfully and sent to your Email")
                           }
                         })
                }
            }
        });
        //Validate the form if the user press enter key in password field
        $('#password').keypress(function(e){
            if(e.keyCode==13)
            submit_form();
        });
        //Alternative authentication methods
<?php if ($this->config->item('oauth2_enabled') == TRUE) { ?>
     <?php if ($this->config->item('oauth2_provider') == 'google') { ?>
        $('#cmdGoogleSignIn').click(function() {
            auth2.grantOfflineAccess({'redirect_uri': 'postmessage'}).then(signInCallback);
        });
    <?php } ?>
<?php } ?>
    });
</script>