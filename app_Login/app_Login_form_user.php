<!DOCTYPE html>
<html lang="es">
  <head>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
    <title>SISTEMA DE COMPLEMENTARIAS</title>

    <!-- Scriptcase tags obligatorios -->
     <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </SCRIPT>
        <SCRIPT type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" />

<script>
var scFocusFirstErrorField = true;
var scFocusFirstErrorName  = "<?php if (isset($this->scFormFocusErrorName)) {echo $this->scFormFocusErrorName;} ?>";
</script>

<?php
include_once("app_Login_sajax_js.php");
?>
<script type="text/javascript">
var Nm_Proc_Atualiz = false;
</script>
<script type="text/javascript">
<?php

include_once('app_Login_jquery.php');

?>
</script>
<script type="text/javascript">
 $(function() {
  scJQElementsAdd('');
  scJQGeneralAdd();
<?php
if (!isset($this->scFormFocusErrorName) || '' == $this->scFormFocusErrorName)
{
?>
  scFocusField('login');

<?php
}
?>
 });

</script>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("app_Login_js0.php");
?>
<?php
$msgDefClose = isset($this->arr_buttons['bmessageclose']) ? $this->arr_buttons['bmessageclose']['value'] : 'Ok';
?>
<script type="text/javascript">
var scMsgDefTitle = "<?php if (isset($this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'])) {echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'];} ?>";
var scMsgDefButton = "Ok";
var scMsgDefClose = "<?php echo $msgDefClose; ?>";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->sc_page; ?>";
</script>
<script type='text/javascript'>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_Login']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_Login']['sc_modal'])
{
?>
  parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
elseif ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<?php
$sIconTitle = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
$sErrorIcon = (isset($_SESSION['scriptcase']['error_icon']['app_Login']) && '' != $_SESSION['scriptcase']['error_icon']['app_Login']) ? $_SESSION['scriptcase']['error_icon']['app_Login']  : "";
$sCloseIcon = (isset($_SESSION['scriptcase']['error_close']['app_Login']) && '' != trim($_SESSION['scriptcase']['error_close']['app_Login'])) ? $_SESSION['scriptcase']['error_close']['app_Login'] : "<td><input class=\"scButton_default\" type=\"button\" onClick=\"document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false\" value=\"X\" /></td>";
if ('' != $sIconTitle && '' != $sErrorIcon) {
    $sErrorIcon = '';
}
?>
<script type="text/javascript">
$(function() {
    $(document.F1).on("submit", function (e) {
        e.preventDefault();
    });
});

if (typeof scDisplayUserError === "undefined") {
    function scDisplayUserError(errorMessage) {
        scJs_alert("ERROR:\r\n" + errorMessage.replace(/<br \/>/gi, "<!--SC_NL-->"), function() {}, {type: "error"});
    }
}
if (typeof scDisplayUserDebug === "undefined") {
    function scDisplayUserDebug(debugMessage) {
        scJs_alert("DEBUG:\r\n" + debugMessage.replace(/<br \/>/gi, "<!--SC_NL-->"), function() {}, {type: "warning"});
    }
}
if (typeof scDisplayUserMessage === "undefined") {
    function scDisplayUserMessage(userMessage) {
        scJs_alert("MESSAGE:\r\n" + userMessage.replace(/<br \/>/gi, "<!--SC_NL-->"), function() {}, {type: "info"});
    }
}
</script>

<script>
$(function() {
<?php
if (isset($this->nmgp_cmp_hidden) && !empty($this->nmgp_cmp_hidden)) {
    foreach($this->nmgp_cmp_hidden as $fieldDisplayFieldName => $fieldDisplayFieldStatus) {
        if ('on' == $fieldDisplayFieldStatus) {
?>
if (typeof scShowUserField === "function") {
    scShowUserField("<?php echo $fieldDisplayFieldName ?>");
}
<?php
        }
        if ('off' == $fieldDisplayFieldStatus) {
?>
if (typeof scHideUserField === "function") {
    scHideUserField("<?php echo $fieldDisplayFieldName ?>");
}
<?php
        }
    }
}
?>
<?php
?>
});
</script>


    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome para el ojito -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <style>
      body {
        background-color: #ffffff;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      }
      .form {
        display: grid;
        place-items: center;
        width: 100%;
        max-width: 340px;
        padding: 25px;
        background-color: #ffffff;
        box-shadow: 0px 0px 25px #e5ebe8, 0px 0px 30px #313332;
        outline: 1px solid #e8edea;
        border-radius: 30px;
        position: relative;
        z-index: 1;
      }
      .welcome-line-2 {
        color: #1f7d23 !important;
        font-size: 1rem;
        text-align: center;
      }

      .form-inp {
        width: 100%;
        margin-bottom: 1rem;
        position: relative;
      }

      .form-inp input {
        width: 100%;
        padding: 0.7rem 1rem;
        background: transparent;
        border: 1px solid #1f7d23;
        border-radius: 8px;
        font-size: 1rem;
        color: #1f7d23;
      }

      .form-inp input::placeholder {
        color: #ccc;
      }

      .form-inp input:focus {
        outline: none;
        border-color: #00ff7f;
      }

      /* Estilos del ojito */
      .toggle-password {
        position: absolute;
        top: 50%;
        right: 12px;
        transform: translateY(-50%);
        cursor: pointer;
        color: #999;
        font-size: 1.1rem;
        transition: color 0.3s;
      }

      .toggle-password:hover {
        color: #1f7d23;
      }

      .submit-button-cvr {
        margin-top: 1.5rem;
        width: 100%;
      }

      .submit-button {
        width: 100%;
        color: #1f7d23;
        background-color: transparent;
        font-weight: 600;
        font-size: 1rem;
        padding: 0.75rem 1rem;
        border: 1px solid #08a556;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s ease-in-out;
      }

      .submit-button:hover {
        background-color: #05994e;
        color: #ffffff;
      }

      .extra-links {
        text-align: center;
        margin-top: 1rem;
      }

      .extra-links a {
        display: block;
        margin-top: 0.5rem;
        color: #1f7d23;
        font-size: 0.9rem;
        text-decoration: none;
        font-weight: 600;
      }

      .logo {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: contain;
        background-color: #fff;
        padding: 10px;
        display: block;
        margin: 0 auto 20px;
      }
		
	a {
    	color: #1f7d23 !important;
	}
		
	label {
    	color: #1f7d23 !important;
	}
		


    </style>
	  
	  
  </head>

  <body>
    <div class="form">
      <img
        src="../_lib/libraries/grp/Login/login/img/logo.png"
        alt="Logo SENA"
        class="logo"
      />
      <div class="welcome-line-2">
        <strong>SISTEMA DE COMPLEMENTARIAS</strong>
      </div>
      <br/>

      <!-- Formulario Scriptcase -->
      <form  name="F1" method="post" 
               action="./" 
               target="_self" id="sc-custom-login" sc-custom-login>
        <input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nmgp_url_saida); ?>">
<input type="hidden" name="bok" value="OK">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />


        <div class="form-inp">
          <input
            type="text"
            name="login"
            id="login_field"
            class=" sc-js-input "
            placeholder="Usuario"
             name="login" id="id_sc_field_login" value="<?php echo $this->form_encode_input($login) ?>"  alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: true, autoTab: false, selectOnFocus: false, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" 
          />
        </div>

        <div class="form-inp">
          <input
            type="password"
            name="pswd"
            id="pswd_field"
            class=" sc-js-input "
            placeholder="Contraseña"
             name="pswd" id="id_sc_field_pswd" value="<?php echo $this->form_encode_input($pswd) ?>"  alt="{datatype: 'text', maxLength: 32, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: true, autoTab: false, selectOnFocus: false, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  
				 />
					
          <i id="id_pwd_fa_pswd" class="fa-solid fa-eye-slash toggle-password"></i>
        </div>

        <div class="submit-button-cvr">
          <input
            type="button"
            id="btn_sc_login"
            class="submit-button"
            value="Ingresar"
             onclick="nm_atualiza('alterar');" 
          />
			
        </div>

        <div class="extra-links">
          <input type="hidden" name="retrieve_pswd" value = "">
<input type="hidden" name="retrieve_pswd_sc_target_name" value = "">
<div id="id-retrieve_pswd-1" class="class-retrieve_pswd ">
 <a href="javascript:nm_menu_link_retrieve_pswd('app_retrieve_pswd', '_self')"><?php echo $this->Ini->Nm_lang['lang_subject_mail'] ?></a>
</div>
          <input type="hidden" name="new_user" value = "">
<input type="hidden" name="new_user_sc_target_name" value = "">
<div id="id-new_user-1" class="class-new_user ">
 <a href="javascript:nm_menu_link_new_user('app_form_add_users', '_self')"><?php echo $this->Ini->Nm_lang['lang_new_user'] ?></a>
</div>
          <br />
          <?php

$lookupInfo = $this->Form_lookup_remember_me();
$fieldCount = 1;

?>
<div id="idAjaxCheckbox_remember_me" style="display: inline-block">
<?php
foreach ($lookupInfo as $i => $lookupOption) {
        if ('' != trim($lookupOption)) {
                $optionData = explode('?#?', $lookupOption);

?>
        <div><input type="checkbox" name="remember_me[]" id="id_sc_field_remember_me_<?php echo $fieldCount; ?>" value="<?php echo $optionData[1]; ?>" class="sc-ui-checkbox-remember_me" /> <label for="id_sc_field_remember_me_<?php echo $fieldCount; ?>"><?php echo $optionData[0]; ?></label></div>
<?php

                $fieldCount++;
        }
}

?>
</div>

        </div>
      </form>
    </div>
	
	<div style="position: relative;">
  	<form method="post" style="
    position: absolute;
    top: -20px;
    right: -200px;
    z-index: 1000;
  ">
    <button type="submit" name="btn_salir" style="
      background-color: #1f7d23 ;
      color: white;
      border: none;
      padding: 12px 22px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
	  right: 50px;
	  position: fixed;	
	  top: 50px;
      transition: all 0.3s ease;
      " 
	onmouseover="this.style.backgroundColor='#1f7d23';"
    onmouseout="this.style.backgroundColor=' rgb(37 161 43)';">
      <strong>Salir</strong>
    </button>
  </form>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
  var loginBox = document.querySelector('.scLoginBlock, .scFormPage, .scLoginBox');
  var btn = document.querySelector('button[onclick*=\"app_login.php\"]');
  if (loginBox && btn) {
    loginBox.style.position = 'relative';
    loginBox.appendChild(btn);
  }
});
</script>

	 
	 <script>
      document.addEventListener("DOMContentLoaded", function () {
        const toggle = document.getElementById("id_pwd_fa_pswd");
        const passwordField = document.getElementById("pswd_field");

        if (toggle && passwordField) {
          // El ojito inicia cerrado
          toggle.classList.remove("fa-eye");
          toggle.classList.add("fa-eye-slash");

          toggle.addEventListener("click", function () {
            const isPassword = passwordField.getAttribute("type") === "password";

            // Alternar tipo del input
            passwordField.setAttribute("type", isPassword ? "text" : "password");

            // Cambiar ícono según estado
            if (isPassword) {
              this.classList.remove("fa-eye-slash");
              this.classList.add("fa-eye");
              this.style.color = "#1f7d23"; // color verde al abrir
            } else {
              this.classList.remove("fa-eye");
              this.classList.add("fa-eye-slash");
              this.style.color = "#999"; // color gris al cerrar
            }
          });
        }
      });
    </script>

    <script
      type="text/javascript"
      src="../_lib/libraries/grp/Login/libs/js/error.js"
    ></script>
  </body>
</html>
