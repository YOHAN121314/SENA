
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField)) {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["id_area" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_curso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descripcion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["intensidad_horas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_0" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_nivel" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["activo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cupo_maximo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_modalidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_inicio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_fin" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["horario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["created_at" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_area" + iSeqRow] && scEventControl_data["id_area" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_area" + iSeqRow] && scEventControl_data["id_area" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_curso" + iSeqRow] && scEventControl_data["nombre_curso" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_curso" + iSeqRow] && scEventControl_data["nombre_curso" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descripcion" + iSeqRow] && scEventControl_data["descripcion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descripcion" + iSeqRow] && scEventControl_data["descripcion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["intensidad_horas" + iSeqRow] && scEventControl_data["intensidad_horas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["intensidad_horas" + iSeqRow] && scEventControl_data["intensidad_horas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow] && scEventControl_data["sc_field_0" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow] && scEventControl_data["sc_field_0" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_nivel" + iSeqRow] && scEventControl_data["id_nivel" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_nivel" + iSeqRow] && scEventControl_data["id_nivel" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["activo" + iSeqRow] && scEventControl_data["activo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["activo" + iSeqRow] && scEventControl_data["activo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cupo_maximo" + iSeqRow] && scEventControl_data["cupo_maximo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cupo_maximo" + iSeqRow] && scEventControl_data["cupo_maximo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_modalidad" + iSeqRow] && scEventControl_data["id_modalidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_modalidad" + iSeqRow] && scEventControl_data["id_modalidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_inicio" + iSeqRow] && scEventControl_data["fecha_inicio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_inicio" + iSeqRow] && scEventControl_data["fecha_inicio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_fin" + iSeqRow] && scEventControl_data["fecha_fin" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_fin" + iSeqRow] && scEventControl_data["fecha_fin" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["horario" + iSeqRow] && scEventControl_data["horario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["horario" + iSeqRow] && scEventControl_data["horario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["created_at" + iSeqRow] && scEventControl_data["created_at" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["created_at" + iSeqRow] && scEventControl_data["created_at" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("id_area" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_nivel" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("activo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_modalidad" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_id_area' + iSeqRow).bind('blur', function() { sc_form_public_cursos_id_area_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_public_cursos_id_area_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_curso' + iSeqRow).bind('blur', function() { sc_form_public_cursos_nombre_curso_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_public_cursos_nombre_curso_onfocus(this, iSeqRow) });
  $('#id_sc_field_descripcion' + iSeqRow).bind('blur', function() { sc_form_public_cursos_descripcion_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_public_cursos_descripcion_onfocus(this, iSeqRow) });
  $('#id_sc_field_intensidad_horas' + iSeqRow).bind('blur', function() { sc_form_public_cursos_intensidad_horas_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_public_cursos_intensidad_horas_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_0' + iSeqRow).bind('blur', function() { sc_form_public_cursos_sc_field_0_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_public_cursos_sc_field_0_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_nivel' + iSeqRow).bind('blur', function() { sc_form_public_cursos_id_nivel_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_public_cursos_id_nivel_onfocus(this, iSeqRow) });
  $('#id_sc_field_cupo_maximo' + iSeqRow).bind('blur', function() { sc_form_public_cursos_cupo_maximo_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_public_cursos_cupo_maximo_onfocus(this, iSeqRow) });
  $('#id_sc_field_activo' + iSeqRow).bind('blur', function() { sc_form_public_cursos_activo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_public_cursos_activo_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_inicio' + iSeqRow).bind('blur', function() { sc_form_public_cursos_fecha_inicio_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_public_cursos_fecha_inicio_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_fin' + iSeqRow).bind('blur', function() { sc_form_public_cursos_fecha_fin_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_public_cursos_fecha_fin_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_modalidad' + iSeqRow).bind('blur', function() { sc_form_public_cursos_id_modalidad_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_public_cursos_id_modalidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_created_at' + iSeqRow).bind('blur', function() { sc_form_public_cursos_created_at_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_public_cursos_created_at_onfocus(this, iSeqRow) });
  $('#id_sc_field_created_at_hora' + iSeqRow).bind('blur', function() { sc_form_public_cursos_created_at_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_public_cursos_created_at_onfocus(this, iSeqRow) });
  $('#id_sc_field_horario' + iSeqRow).bind('blur', function() { sc_form_public_cursos_horario_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_public_cursos_horario_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_public_cursos_id_area_onblur(oThis, iSeqRow) {
  do_ajax_form_public_cursos_mob_validate_id_area();
  scCssBlur(oThis);
}

function sc_form_public_cursos_id_area_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_public_cursos_nombre_curso_onblur(oThis, iSeqRow) {
  do_ajax_form_public_cursos_mob_validate_nombre_curso();
  scCssBlur(oThis);
}

function sc_form_public_cursos_nombre_curso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_public_cursos_descripcion_onblur(oThis, iSeqRow) {
  do_ajax_form_public_cursos_mob_validate_descripcion();
  scCssBlur(oThis);
}

function sc_form_public_cursos_descripcion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_public_cursos_intensidad_horas_onblur(oThis, iSeqRow) {
  do_ajax_form_public_cursos_mob_validate_intensidad_horas();
  scCssBlur(oThis);
}

function sc_form_public_cursos_intensidad_horas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_public_cursos_sc_field_0_onblur(oThis, iSeqRow) {
  do_ajax_form_public_cursos_mob_validate_sc_field_0();
  scCssBlur(oThis);
}

function sc_form_public_cursos_sc_field_0_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_public_cursos_id_nivel_onblur(oThis, iSeqRow) {
  do_ajax_form_public_cursos_mob_validate_id_nivel();
  scCssBlur(oThis);
}

function sc_form_public_cursos_id_nivel_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_public_cursos_cupo_maximo_onblur(oThis, iSeqRow) {
  do_ajax_form_public_cursos_mob_validate_cupo_maximo();
  scCssBlur(oThis);
}

function sc_form_public_cursos_cupo_maximo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_public_cursos_activo_onblur(oThis, iSeqRow) {
  do_ajax_form_public_cursos_mob_validate_activo();
  scCssBlur(oThis);
}

function sc_form_public_cursos_activo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_public_cursos_fecha_inicio_onblur(oThis, iSeqRow) {
  do_ajax_form_public_cursos_mob_validate_fecha_inicio();
  scCssBlur(oThis);
}

function sc_form_public_cursos_fecha_inicio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_public_cursos_fecha_fin_onblur(oThis, iSeqRow) {
  do_ajax_form_public_cursos_mob_validate_fecha_fin();
  scCssBlur(oThis);
}

function sc_form_public_cursos_fecha_fin_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_public_cursos_id_modalidad_onblur(oThis, iSeqRow) {
  do_ajax_form_public_cursos_mob_validate_id_modalidad();
  scCssBlur(oThis);
}

function sc_form_public_cursos_id_modalidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_public_cursos_created_at_onblur(oThis, iSeqRow) {
  do_ajax_form_public_cursos_mob_validate_created_at();
  scCssBlur(oThis);
}

function sc_form_public_cursos_created_at_onblur(oThis, iSeqRow) {
  do_ajax_form_public_cursos_mob_validate_created_at();
  scCssBlur(oThis);
}

function sc_form_public_cursos_created_at_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_public_cursos_created_at_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_public_cursos_horario_onblur(oThis, iSeqRow) {
  do_ajax_form_public_cursos_mob_validate_horario();
  scCssBlur(oThis);
}

function sc_form_public_cursos_horario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("id_area", "", status);
	displayChange_field("nombre_curso", "", status);
	displayChange_field("descripcion", "", status);
	displayChange_field("intensidad_horas", "", status);
	displayChange_field("sc_field_0", "", status);
	displayChange_field("id_nivel", "", status);
	displayChange_field("activo", "", status);
	displayChange_field("cupo_maximo", "", status);
	displayChange_field("id_modalidad", "", status);
	displayChange_field("fecha_inicio", "", status);
	displayChange_field("fecha_fin", "", status);
	displayChange_field("horario", "", status);
	displayChange_field("created_at", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_id_area(row, status);
	displayChange_field_nombre_curso(row, status);
	displayChange_field_descripcion(row, status);
	displayChange_field_intensidad_horas(row, status);
	displayChange_field_sc_field_0(row, status);
	displayChange_field_id_nivel(row, status);
	displayChange_field_activo(row, status);
	displayChange_field_cupo_maximo(row, status);
	displayChange_field_id_modalidad(row, status);
	displayChange_field_fecha_inicio(row, status);
	displayChange_field_fecha_fin(row, status);
	displayChange_field_horario(row, status);
	displayChange_field_created_at(row, status);
}

function displayChange_field(field, row, status) {
	if ("id_area" == field) {
		displayChange_field_id_area(row, status);
	}
	if ("nombre_curso" == field) {
		displayChange_field_nombre_curso(row, status);
	}
	if ("descripcion" == field) {
		displayChange_field_descripcion(row, status);
	}
	if ("intensidad_horas" == field) {
		displayChange_field_intensidad_horas(row, status);
	}
	if ("sc_field_0" == field) {
		displayChange_field_sc_field_0(row, status);
	}
	if ("id_nivel" == field) {
		displayChange_field_id_nivel(row, status);
	}
	if ("activo" == field) {
		displayChange_field_activo(row, status);
	}
	if ("cupo_maximo" == field) {
		displayChange_field_cupo_maximo(row, status);
	}
	if ("id_modalidad" == field) {
		displayChange_field_id_modalidad(row, status);
	}
	if ("fecha_inicio" == field) {
		displayChange_field_fecha_inicio(row, status);
	}
	if ("fecha_fin" == field) {
		displayChange_field_fecha_fin(row, status);
	}
	if ("horario" == field) {
		displayChange_field_horario(row, status);
	}
	if ("created_at" == field) {
		displayChange_field_created_at(row, status);
	}
}

function displayChange_field_id_area(row, status) {
    var fieldId;
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_area__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_area" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_area");
	}
}

function displayChange_field_nombre_curso(row, status) {
    var fieldId;
}

function displayChange_field_descripcion(row, status) {
    var fieldId;
}

function displayChange_field_intensidad_horas(row, status) {
    var fieldId;
}

function displayChange_field_sc_field_0(row, status) {
    var fieldId;
}

function displayChange_field_id_nivel(row, status) {
    var fieldId;
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_nivel__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_nivel" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_nivel");
	}
}

function displayChange_field_activo(row, status) {
    var fieldId;
}

function displayChange_field_cupo_maximo(row, status) {
    var fieldId;
}

function displayChange_field_id_modalidad(row, status) {
    var fieldId;
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_modalidad__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_modalidad" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_modalidad");
	}
}

function displayChange_field_fecha_inicio(row, status) {
    var fieldId;
}

function displayChange_field_fecha_fin(row, status) {
    var fieldId;
}

function displayChange_field_horario(row, status) {
    var fieldId;
}

function displayChange_field_created_at(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
	displayChange_field_id_area("all", "on");
	displayChange_field_id_nivel("all", "on");
	displayChange_field_id_modalidad("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_public_cursos_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(30);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fecha_inicio" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_inicio" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_public_cursos_mob_validate_fecha_inicio(iSeqRow); }, 200);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha_inicio']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_fecha_fin" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_fin" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_public_cursos_mob_validate_fecha_fin(iSeqRow); }, 200);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fecha_fin']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_created_at" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_created_at" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['created_at']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['created_at']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_public_cursos_mob_validate_created_at(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['created_at']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_updated_at" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_updated_at" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['updated_at']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['updated_at']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_public_cursos_mob_validate_updated_at(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['updated_at']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
} // scJQCalendarAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

var api_cache_requests = [];
function ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, hasRun, img_before){
    setTimeout(function(){
        if(img_name == '') return;
        iSeqRow= iSeqRow !== undefined && iSeqRow !== null ? iSeqRow : '';
        var hasVar = p.indexOf('_@NM@_') > -1 || p_cache.indexOf('_@NM@_') > -1 ? true : false;

        p = p.split('_@NM@_');
        $.each(p, function(i,v){
            try{
                p[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p[i] = v;
            }
        });
        p = p.join('');

        p_cache = p_cache.split('_@NM@_');
        $.each(p_cache, function(i,v){
            try{
                p_cache[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p_cache[i] = v;
            }
        });
        p_cache = p_cache.join('');

        img_before = img_before !== undefined ? img_before : $(t).attr('src');
        var str_key_cache = '<?php echo $this->Ini->sc_page; ?>' + img_name+field+p+p_cache;
        if(api_cache_requests[ str_key_cache ] !== undefined && api_cache_requests[ str_key_cache ] !== null){
            if(api_cache_requests[ str_key_cache ] != false){
                do_ajax_check_file(api_cache_requests[ str_key_cache ], field  ,t, iSeqRow);
            }
            return;
        }
        //scAjaxProcOn();
        $(t).attr('src', '<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif');
        api_cache_requests[ str_key_cache ] = false;
        var rs =$.ajax({
                    type: "POST",
                    url: 'index.php?script_case_init=<?php echo $this->Ini->sc_page; ?>',
                    async: true,
                    data:'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + encodeURI(img_name) +'&rsargs='+ field + '&p=' + p + '&p_cache=' + p_cache,
                    success: function (rs) {
                        if(rs.indexOf('</span>') != -1){
                            rs = rs.substr(rs.indexOf('</span>') + 7);
                        }
                        if(rs.indexOf('/') != -1 && rs.indexOf('/') != 0){
                            rs = rs.substr(rs.indexOf('/'));
                        }
                        rs = sc_trim(rs);

                        // if(rs == 0 && hasVar && hasRun === undefined){
                        //     delete window.api_cache_requests[ str_key_cache ];
                        //     ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, 1, img_before);
                        //     return;
                        // }
                        window.api_cache_requests[ str_key_cache ] = rs;
                        do_ajax_check_file(rs, field  ,t, iSeqRow)
                        if(rs == 0){
                            delete window.api_cache_requests[ str_key_cache ];

                           // $(t).attr('src',img_before);
                            do_ajax_check_file(img_before+'_@@NM@@_' + img_before, field  ,t, iSeqRow)

                        }


                    }
        });
    },100);
}

function do_ajax_check_file(rs, field  ,t, iSeqRow){
    if (rs != 0) {
        rs_split = rs.split('_@@NM@@_');
        rs_orig = rs_split[0];
        rs2 = rs_split[1];
        try{
            if(!$(t).is('img')){

                if($('#id_read_on_'+field+iSeqRow).length > 0 ){
                                    var usa_read_only = false;

                switch(field){

                }
                     if(usa_read_only && $('a',$('#id_read_on_'+field+iSeqRow)).length == 0){
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_public_cursos_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
                     }
                }
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href', target.join(','));
                }else{
                    var target = $(t).attr('href').split(',');
                     target[1] = "'"+rs2+"'";
                     $(t).attr('href', target.join(','));
                }
            }else{
                $(t).attr('src', rs2);
                $(t).css('display', '');
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $(t).attr('href', target.join(','));
                }else{
                     var t_link = $(t).parent('a');
                     var target = $(t_link).attr('href').split(',');
                     target[0] = "javascript:nm_mostra_img('"+rs_orig+"'";
                     $(t_link).attr('href', target.join(','));
                }

            }
            eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        } catch(err){
                        eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        }
    }
   /* hasFalseCacheRequest = false;
    $.each(api_cache_requests, function(i,v){
        if(v == false){
            hasFalseCacheRequest = true;
        }
    });
    if(hasFalseCacheRequest == false){
        scAjaxProcOff();
    }*/
}

$(document).ready(function(){
});

function scJQPasswordToggleAdd(seqRow) {
  $(".sc-ui-pwd-toggle-icon" + seqRow).on("click", function() {
    var fieldName = $(this).attr("id").substr(17), fieldObj = $("#id_sc_field_" + fieldName), fieldFA = $("#id_pwd_fa_" + fieldName);
    if ("text" == fieldObj.attr("type")) {
      fieldObj.attr("type", "password");
      fieldFA.attr("class", "fa fa-eye sc-ui-pwd-eye");
    } else {
      fieldObj.attr("type", "text");
      fieldFA.attr("class", "fa fa-eye-slash sc-ui-pwd-eye");
    }
  });
} // scJQPasswordToggleAdd

function scJQSelect2Add(seqRow, specificField) {
  if (null == specificField || "id_area" == specificField) {
    scJQSelect2Add_id_area(seqRow);
  }
  if (null == specificField || "id_nivel" == specificField) {
    scJQSelect2Add_id_nivel(seqRow);
  }
  if (null == specificField || "id_modalidad" == specificField) {
    scJQSelect2Add_id_modalidad(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_id_area(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_area_obj" : "#id_sc_field_id_area" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_area_obj',
      dropdownCssClass: 'css_id_area_obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add

function scJQSelect2Add_id_nivel(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_nivel_obj" : "#id_sc_field_id_nivel" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_nivel_obj',
      dropdownCssClass: 'css_id_nivel_obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add

function scJQSelect2Add_id_modalidad(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_modalidad_obj" : "#id_sc_field_id_modalidad" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_modalidad_obj',
      dropdownCssClass: 'css_id_modalidad_obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_area) { displayChange_field_id_area(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_nivel) { displayChange_field_id_nivel(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_modalidad) { displayChange_field_id_modalidad(iLine, "on"); } }, 150);
} // scJQElementsAdd

function scGetFileExtension(fileName)
{
    fileNameParts = fileName.split(".");

    if (1 === fileNameParts.length || (2 === fileNameParts.length && "" == fileNameParts[0])) {
        return "";
    }

    return fileNameParts.pop().toLowerCase();
}

function scFormatExtensionSizeErrorMsg(errorMsg)
{
    var msgInfo = errorMsg.split("||"), returnMsg = "";

    if ("err_size" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_size'] ?>. <?php echo $this->Ini->Nm_lang['lang_errm_file_size_extension'] ?>".replace("{SC_EXTENSION}", msgInfo[1]).replace("{SC_LIMIT}", msgInfo[2]);
    } else if ("err_extension" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_invl'] ?>";
    }

    return returnMsg;
}

