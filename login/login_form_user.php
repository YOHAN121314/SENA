

<!DOCTYPE html>
<html lang="es">
	<head>
		<META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
		<title>SISTEMA DE COMPLEMENTARIAS</title>
		<link rel="stylesheet" href="../_lib/libraries/grp/Login/login/css/login04.css">
		<link rel="stylesheet" type="text/css" href="../_lib/libraries/grp/Login/libs/bootstrap/css/bootstrap.min.css" />   
		<link rel="stylesheet" type="text/css" href="../_lib/libraries/grp/Login/libs/css/styles.css">
		<style>
			span.sc-ui-pwd-toggle-icon {
				position: relative;
				display: inline-block;
				cursor: pointer;
				right: 0.5rem;
				z-index: 2;
				float: right;
				bottom: 4rem;
			}
		</style>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<script type="text/javascript">

			function scHideUserField(fieldName)
			{
				if(fieldName == 'new_user')
				{
					$('#id-new_user-1').hide();
				}

				else if(fieldName == 'retrieve_pswd')
				{
					$('#id-retrieve_pswd-1').hide();					
				}

				else if(fieldName == 'remember_me')
				{
					$('#id_sc_field_remember_me_1').hide();	
					$('#txtremember').hide();
				}
			}


			function scShowUserField(fieldName)
			{
				if(fieldName == 'new_user')
				{
					$('#id-new_user-1').show();
				}

				else if(fieldName == 'retrieve_pswd')
				{
					$('#id-retrieve_pswd-1').show();
				}

				else if(fieldName == 'remember_me')
				{
					$('#id_sc_field_remember_me_1').show();
					$('#txtremember').show();
				}	
			}

		</script>        

	</head>
	<body class="page-sidebar page-background">
		<div class="page">
			<div class="container">
				<div class="card card-container">
					<img id="profile-img" class="profile-img-card" src="../_lib/libraries/grp/Login/login/img/logo.png" />
					<!--                   <p id="profile-name" class="profile-name-card"></p> -->
					<div class="welcome-line-2"><strong>SISTEMA DE COMPLEMENTARIAS</strong></div><br>
					<form class="form-signin"  name="F1" method="post" 
               action="./" 
               target="_self">
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

						<!--                       <span id="reauth-email" class="reauth-email"></span>
<input type="text" id="Usuario" class="form-control  sc-js-input "  name="login" id="id_sc_field_login" value="<?php echo $this->form_encode_input($login) ?>"  alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  placeholder="Usuario" required autofocus> -->
						<div class="form-inp">
							<input type="text" name="login" id="login_field" class=" sc-js-input " placeholder="Usuario"  name="login" id="id_sc_field_login" value="<?php echo $this->form_encode_input($login) ?>"  alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
						</div>
						<!--SC_FIELD_INI_pswd-->
						<!--                       <input type="password" id="Contraseña" class="form-control  sc-js-input "  name="pswd" id="id_sc_field_pswd" value="<?php echo $this->form_encode_input($pswd) ?>"  alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  placeholder="Contraseña" required> -->
						<div class="form-inp">
							<input type="password" name="pswd" id="pswd_field" class=" sc-js-input " placeholder="Contraseña"  name="pswd" id="id_sc_field_pswd" value="<?php echo $this->form_encode_input($pswd) ?>"  alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
						</div>
						<!--SC_FIELD_END_pswd-->
						<!--SC_REQUIRED_MSG-->
						<!--SC_CAPTCHA-->
						<input class="btn btn-lg btn-primary btn-block btn-signin" type="button" value="Ingresar"  onclick="nm_atualiza('alterar');"  /><br/>
						{SC_FIELD_INFO_new_user}
						{SC_FIELD_INFO_retrieve_pswd}

						<span id="txtremember"><?php

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
</span>
					</form><!-- /form -->
				</div><!-- /card-container -->
			</div><!-- /container -->

			<div class="alert-message negative">
				<span class="message"></span>
				<span class="close">&times;</span>
			</div>

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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/viewerjs/viewer.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/viewerjs/viewer.js"></SCRIPT>
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
include_once("login_sajax_js.php");
?>
<script type="text/javascript">
var Nm_Proc_Atualiz = false;
</script>
<script type="text/javascript">
<?php

include_once('login_jquery.php');

?>
</script>
<script type="text/javascript">
 $(function() {
  scJQElementsAdd('');
  scJQGeneralAdd();
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
 include_once("login_js0.php");
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['login']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['login']['sc_modal'])
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

			<script type="text/javascript" src="../_lib/libraries/grp/Login/libs/js/error.js"></script>
			</body>
		</html>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			const toggle = document.getElementById("id_pwd_fa_pswd");
			const passwordField = document.getElementById("pswd_field");

			if (toggle && passwordField) {
				toggle.addEventListener("click", function() {
					// alternar tipo de input
					const isPassword = passwordField.getAttribute("type") === "password";
					passwordField.setAttribute("type", isPassword ? "text" : "password");

					// opcional: cambiar ícono visual si usas Font Awesome
					if (this.classList.contains("fa-eye")) {
						this.classList.remove("fa-eye");
						this.classList.add("fa-eye-slash");
					} else {
						this.classList.remove("fa-eye-slash");
						this.classList.add("fa-eye");
					}
				});
			}
		});
	</script>
