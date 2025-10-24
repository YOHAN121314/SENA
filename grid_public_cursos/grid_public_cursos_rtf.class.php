<?php

class grid_public_cursos_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("es");
      $this->Texto_tag = "";
   }


function actionBar_isValidState($buttonName, $buttonState)
{
    switch ($buttonName) {
    }

    return false;
}


function actionBar_displayState($buttonName)
{
    switch ($buttonName) {
    }
}

function actionBar_getStateHint($buttonName)
{
    switch ($buttonName) {
    }
}

function actionBar_getStateConfirm($buttonName)
{
    switch ($buttonName) {
    }
}

function actionBar_getStateDisable($buttonName)
{
    if (isset($this->sc_actionbar_disabled[$buttonName]) && $this->sc_actionbar_disabled[$buttonName]) {
        return ' disabled';
    }

    return '';
}

function actionBar_getStateHide($buttonName)
{
    if (isset($this->sc_actionbar_hidden[$buttonName]) && $this->sc_actionbar_hidden[$buttonName]) {
        return ' sc-actionbar-button-hidden';
    }

    return '';
}

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Rtf_f);
          $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
          $Temp = ob_get_clean();
          if ($Temp !== false && trim($Temp) != "")
          {
              $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      else
      {
          $this->progress_bar_end();
      }
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      if (isset($GLOBALS['nmgp_parms']) && !empty($GLOBALS['nmgp_parms'])) 
      { 
          $GLOBALS['nmgp_parms'] = str_replace("@aspass@", "'", $GLOBALS['nmgp_parms']);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $GLOBALS["nmgp_parms"]);
          $todo  = explode("?@?", $todox);
          foreach ($todo as $param)
          {
               $cadapar = explode("?#?", $param);
               if (1 < sizeof($cadapar))
               {
                   if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                   {
                       $cadapar[0] = substr($cadapar[0], 11);
                       $cadapar[1] = $_SESSION[$cadapar[1]];
                   }
                   if (isset($GLOBALS['sc_conv_var'][$cadapar[0]]))
                   {
                       $cadapar[0] = $GLOBALS['sc_conv_var'][$cadapar[0]];
                   }
                   elseif (isset($GLOBALS['sc_conv_var'][strtolower($cadapar[0])]))
                   {
                       $cadapar[0] = $GLOBALS['sc_conv_var'][strtolower($cadapar[0])];
                   }
                   nm_limpa_str_grid_public_cursos($cadapar[1]);
                   nm_protect_num_grid_public_cursos($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_public_cursos']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_public_cursos_total.class.php"); 
      $this->Tot      = new grid_public_cursos_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_public_cursos']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_public_cursos";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_public_cursos.rtf";
   }
   //---- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }


   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_public_cursos']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_public_cursos']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_public_cursos']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['grid_public_cursos']['contr_erro'] = 'on';
 

$_SESSION['scriptcase']['grid_public_cursos']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['c_nombre_curso'])) ? $this->New_label['c_nombre_curso'] : "Nombre Curso"; 
          if ($Cada_col == "c_nombre_curso" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['modalidad'])) ? $this->New_label['modalidad'] : "Modalidad"; 
          if ($Cada_col == "modalidad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['c_intensidad_horas'])) ? $this->New_label['c_intensidad_horas'] : "Intensidad Horas"; 
          if ($Cada_col == "c_intensidad_horas" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['c_cupo_maximo'])) ? $this->New_label['c_cupo_maximo'] : "Cupo Maximo"; 
          if ($Cada_col == "c_cupo_maximo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cupos_disponibles'])) ? $this->New_label['cupos_disponibles'] : "Cupos Disponibles"; 
          if ($Cada_col == "cupos_disponibles" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['c_horario'])) ? $this->New_label['c_horario'] : "Horario"; 
          if ($Cada_col == "c_horario" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nivel'])) ? $this->New_label['nivel'] : "Nivel"; 
          if ($Cada_col == "nivel" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['estado'])) ? $this->New_label['estado'] : "Estado"; 
          if ($Cada_col == "estado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : "año"; 
          if ($Cada_col == "sc_field_0" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['c_fecha_inicio'])) ? $this->New_label['c_fecha_inicio'] : "Fecha Inicio"; 
          if ($Cada_col == "c_fecha_inicio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['c_fecha_fin'])) ? $this->New_label['c_fecha_fin'] : "Fecha Fin"; 
          if ($Cada_col == "c_fecha_fin" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['c_created_at'])) ? $this->New_label['c_created_at'] : "Created At"; 
          if ($Cada_col == "c_created_at" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT c.nombre_curso as c_nombre_curso, m.descripcion as modalidad, c.intensidad_horas as c_intensidad_horas, c.cupo_maximo as c_cupo_maximo, (c.cupo_maximo - COALESCE(COUNT(i.id),0)) as cupos_disponibles, c.horario as c_horario, n.descripcion as nivel, CASE 
        WHEN c.activo = TRUE THEN 'Activo'
        ELSE 'Inactivo'
    END as estado, c.año as sc_field_0, str_replace (convert(char(10),c.fecha_inicio,102), '.', '-') + ' ' + convert(char(8),c.fecha_inicio,20) as c_fecha_inicio, str_replace (convert(char(10),c.fecha_fin,102), '.', '-') + ' ' + convert(char(8),c.fecha_fin,20) as c_fecha_fin, str_replace (convert(char(10),c.created_at,102), '.', '-') + ' ' + convert(char(8),c.created_at,20) as c_created_at, c.id as c_id from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT c.nombre_curso as c_nombre_curso, m.descripcion as modalidad, c.intensidad_horas as c_intensidad_horas, c.cupo_maximo as c_cupo_maximo, (c.cupo_maximo - COALESCE(COUNT(i.id),0)) as cupos_disponibles, c.horario as c_horario, n.descripcion as nivel, CASE 
        WHEN c.activo = TRUE THEN 'Activo'
        ELSE 'Inactivo'
    END as estado, c.año as sc_field_0, c.fecha_inicio as c_fecha_inicio, c.fecha_fin as c_fecha_fin, c.created_at as c_created_at, c.id as c_id from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT c.nombre_curso as c_nombre_curso, m.descripcion as modalidad, c.intensidad_horas as c_intensidad_horas, c.cupo_maximo as c_cupo_maximo, (c.cupo_maximo - COALESCE(COUNT(i.id),0)) as cupos_disponibles, c.horario as c_horario, n.descripcion as nivel, CASE 
        WHEN c.activo = TRUE THEN 'Activo'
        ELSE 'Inactivo'
    END as estado, c.año as sc_field_0, convert(char(23),c.fecha_inicio,121) as c_fecha_inicio, convert(char(23),c.fecha_fin,121) as c_fecha_fin, convert(char(23),c.created_at,121) as c_created_at, c.id as c_id from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT c.nombre_curso as c_nombre_curso, m.descripcion as modalidad, c.intensidad_horas as c_intensidad_horas, c.cupo_maximo as c_cupo_maximo, (c.cupo_maximo - COALESCE(COUNT(i.id),0)) as cupos_disponibles, c.horario as c_horario, n.descripcion as nivel, CASE 
        WHEN c.activo = TRUE THEN 'Activo'
        ELSE 'Inactivo'
    END as estado, c.año as sc_field_0, c.fecha_inicio as c_fecha_inicio, c.fecha_fin as c_fecha_fin, c.created_at as c_created_at, c.id as c_id from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT c.nombre_curso as c_nombre_curso, m.descripcion as modalidad, c.intensidad_horas as c_intensidad_horas, c.cupo_maximo as c_cupo_maximo, (c.cupo_maximo - COALESCE(COUNT(i.id),0)) as cupos_disponibles, c.horario as c_horario, n.descripcion as nivel, CASE 
        WHEN c.activo = TRUE THEN 'Activo'
        ELSE 'Inactivo'
    END as estado, c.año as sc_field_0, EXTEND(c.fecha_inicio, YEAR TO DAY) as c_fecha_inicio, EXTEND(c.fecha_fin, YEAR TO DAY) as c_fecha_fin, EXTEND(c.created_at, YEAR TO FRACTION) as c_created_at, c.id as c_id from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT c.nombre_curso as c_nombre_curso, m.descripcion as modalidad, c.intensidad_horas as c_intensidad_horas, c.cupo_maximo as c_cupo_maximo, (c.cupo_maximo - COALESCE(COUNT(i.id),0)) as cupos_disponibles, c.horario as c_horario, n.descripcion as nivel, CASE 
        WHEN c.activo = TRUE THEN 'Activo'
        ELSE 'Inactivo'
    END as estado, c.año as sc_field_0, c.fecha_inicio as c_fecha_inicio, c.fecha_fin as c_fecha_fin, c.created_at as c_created_at, c.id as c_id from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['where_pesq'];
      $nmgp_select .= " group by c.id,      c.nombre_curso,     c.descripcion,     c.intensidad_horas,     c.año,     n.descripcion,     c.horario,     c.cupo_maximo,     c.activo,     c.fecha_inicio,     c.fecha_fin,     m.descripcion,     c.created_at"; 
      $nmgp_select_count .= " group by c.id,      c.nombre_curso,     c.descripcion,     c.intensidad_horas,     c.año,     n.descripcion,     c.horario,     c.cupo_maximo,     c.activo,     c.fecha_inicio,     c.fecha_fin,     m.descripcion,     c.created_at"; 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select_count;
      $rt = $this->Db->Execute($nmgp_select_count);
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->count_ger = $rt->fields[0];
      $rt->Close();
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Texto_tag .= "<tr>\r\n";
         $this->c_nombre_curso = $rs->fields[0] ;  
         $this->modalidad = $rs->fields[1] ;  
         $this->c_intensidad_horas = $rs->fields[2] ;  
         $this->c_intensidad_horas = (string)$this->c_intensidad_horas;
         $this->c_cupo_maximo = $rs->fields[3] ;  
         $this->c_cupo_maximo = (string)$this->c_cupo_maximo;
         $this->cupos_disponibles = $rs->fields[4] ;  
         $this->cupos_disponibles = (string)$this->cupos_disponibles;
         $this->c_horario = $rs->fields[5] ;  
         $this->nivel = $rs->fields[6] ;  
         $this->estado = $rs->fields[7] ;  
         $this->sc_field_0 = $rs->fields[8] ;  
         $this->sc_field_0 = (string)$this->sc_field_0;
         $this->c_fecha_inicio = $rs->fields[9] ;  
         $this->c_fecha_fin = $rs->fields[10] ;  
         $this->c_created_at = $rs->fields[11] ;  
         $this->c_id = $rs->fields[12] ;  
         $this->c_id = (string)$this->c_id;
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- c_nombre_curso
   function NM_export_c_nombre_curso()
   {
         $this->c_nombre_curso = html_entity_decode($this->c_nombre_curso, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->c_nombre_curso = strip_tags($this->c_nombre_curso);
         $this->c_nombre_curso = NM_charset_to_utf8($this->c_nombre_curso);
         $this->c_nombre_curso = str_replace('<', '&lt;', $this->c_nombre_curso);
         $this->c_nombre_curso = str_replace('>', '&gt;', $this->c_nombre_curso);
         $this->Texto_tag .= "<td>" . $this->c_nombre_curso . "</td>\r\n";
   }
   //----- modalidad
   function NM_export_modalidad()
   {
         $this->modalidad = html_entity_decode($this->modalidad, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->modalidad = strip_tags($this->modalidad);
         $this->modalidad = NM_charset_to_utf8($this->modalidad);
         $this->modalidad = str_replace('<', '&lt;', $this->modalidad);
         $this->modalidad = str_replace('>', '&gt;', $this->modalidad);
         $this->Texto_tag .= "<td>" . $this->modalidad . "</td>\r\n";
   }
   //----- c_intensidad_horas
   function NM_export_c_intensidad_horas()
   {
             nmgp_Form_Num_Val($this->c_intensidad_horas, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->c_intensidad_horas = NM_charset_to_utf8($this->c_intensidad_horas);
         $this->c_intensidad_horas = str_replace('<', '&lt;', $this->c_intensidad_horas);
         $this->c_intensidad_horas = str_replace('>', '&gt;', $this->c_intensidad_horas);
         $this->Texto_tag .= "<td>" . $this->c_intensidad_horas . "</td>\r\n";
   }
   //----- c_cupo_maximo
   function NM_export_c_cupo_maximo()
   {
             nmgp_Form_Num_Val($this->c_cupo_maximo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->c_cupo_maximo = NM_charset_to_utf8($this->c_cupo_maximo);
         $this->c_cupo_maximo = str_replace('<', '&lt;', $this->c_cupo_maximo);
         $this->c_cupo_maximo = str_replace('>', '&gt;', $this->c_cupo_maximo);
         $this->Texto_tag .= "<td>" . $this->c_cupo_maximo . "</td>\r\n";
   }
   //----- cupos_disponibles
   function NM_export_cupos_disponibles()
   {
             nmgp_Form_Num_Val($this->cupos_disponibles, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->cupos_disponibles = NM_charset_to_utf8($this->cupos_disponibles);
         $this->cupos_disponibles = str_replace('<', '&lt;', $this->cupos_disponibles);
         $this->cupos_disponibles = str_replace('>', '&gt;', $this->cupos_disponibles);
         $this->Texto_tag .= "<td>" . $this->cupos_disponibles . "</td>\r\n";
   }
   //----- c_horario
   function NM_export_c_horario()
   {
         $this->c_horario = html_entity_decode($this->c_horario, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->c_horario = strip_tags($this->c_horario);
         $this->c_horario = NM_charset_to_utf8($this->c_horario);
         $this->c_horario = str_replace('<', '&lt;', $this->c_horario);
         $this->c_horario = str_replace('>', '&gt;', $this->c_horario);
         $this->Texto_tag .= "<td>" . $this->c_horario . "</td>\r\n";
   }
   //----- nivel
   function NM_export_nivel()
   {
         $this->nivel = html_entity_decode($this->nivel, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nivel = strip_tags($this->nivel);
         $this->nivel = NM_charset_to_utf8($this->nivel);
         $this->nivel = str_replace('<', '&lt;', $this->nivel);
         $this->nivel = str_replace('>', '&gt;', $this->nivel);
         $this->Texto_tag .= "<td>" . $this->nivel . "</td>\r\n";
   }
   //----- estado
   function NM_export_estado()
   {
         $this->estado = html_entity_decode($this->estado, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->estado = strip_tags($this->estado);
         $this->estado = NM_charset_to_utf8($this->estado);
         $this->estado = str_replace('<', '&lt;', $this->estado);
         $this->estado = str_replace('>', '&gt;', $this->estado);
         $this->Texto_tag .= "<td>" . $this->estado . "</td>\r\n";
   }
   //----- sc_field_0
   function NM_export_sc_field_0()
   {
             nmgp_Form_Num_Val($this->sc_field_0, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->sc_field_0 = NM_charset_to_utf8($this->sc_field_0);
         $this->sc_field_0 = str_replace('<', '&lt;', $this->sc_field_0);
         $this->sc_field_0 = str_replace('>', '&gt;', $this->sc_field_0);
         $this->Texto_tag .= "<td>" . $this->sc_field_0 . "</td>\r\n";
   }
   //----- c_fecha_inicio
   function NM_export_c_fecha_inicio()
   {
             $conteudo_x =  $this->c_fecha_inicio;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->c_fecha_inicio, "YYYY-MM-DD  ");
                 $this->c_fecha_inicio = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->c_fecha_inicio = NM_charset_to_utf8($this->c_fecha_inicio);
         $this->c_fecha_inicio = str_replace('<', '&lt;', $this->c_fecha_inicio);
         $this->c_fecha_inicio = str_replace('>', '&gt;', $this->c_fecha_inicio);
         $this->Texto_tag .= "<td>" . $this->c_fecha_inicio . "</td>\r\n";
   }
   //----- c_fecha_fin
   function NM_export_c_fecha_fin()
   {
             $conteudo_x =  $this->c_fecha_fin;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->c_fecha_fin, "YYYY-MM-DD  ");
                 $this->c_fecha_fin = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->c_fecha_fin = NM_charset_to_utf8($this->c_fecha_fin);
         $this->c_fecha_fin = str_replace('<', '&lt;', $this->c_fecha_fin);
         $this->c_fecha_fin = str_replace('>', '&gt;', $this->c_fecha_fin);
         $this->Texto_tag .= "<td>" . $this->c_fecha_fin . "</td>\r\n";
   }
   //----- c_created_at
   function NM_export_c_created_at()
   {
             if (substr($this->c_created_at, 10, 1) == "-") 
             { 
                 $this->c_created_at = substr($this->c_created_at, 0, 10) . " " . substr($this->c_created_at, 11);
             } 
             if (substr($this->c_created_at, 13, 1) == ".") 
             { 
                $this->c_created_at = substr($this->c_created_at, 0, 13) . ":" . substr($this->c_created_at, 14, 2) . ":" . substr($this->c_created_at, 17);
             } 
             $conteudo_x =  $this->c_created_at;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->c_created_at, "YYYY-MM-DD HH:II:SS  ");
                 $this->c_created_at = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->c_created_at = NM_charset_to_utf8($this->c_created_at);
         $this->c_created_at = str_replace('<', '&lt;', $this->c_created_at);
         $this->c_created_at = str_replace('>', '&gt;', $this->c_created_at);
         $this->Texto_tag .= "<td>" . $this->c_created_at . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $this->Rtf_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $rtf_f       = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
   }

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out);
           return $dt_out;
       }
   }
   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_public_cursos'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>REGISTRO DE CURSOS :: RTF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
  <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
  <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
  <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
  <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
  <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->str_google_fonts ?>" />
 <?php
 }
 ?>
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">RTF</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_public_cursos_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_public_cursos"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
</FORM> 
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $str_highlight_ini = "";
      $str_highlight_fim = "";
      if(substr($nm_campo, 0, 23) == '<div class="highlight">' && substr($nm_campo, -6) == '</div>')
      {
           $str_highlight_ini = substr($nm_campo, 0, 23);
           $str_highlight_fim = substr($nm_campo, -6);

           $trab_campo = substr($nm_campo, 23, -6);
           $tam_campo  = strlen($trab_campo);
      }      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($tam_campo >= $cont2)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
   } 
}

?>
