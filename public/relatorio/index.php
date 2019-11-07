<!DOCTYPE html>
<html data-cbscriptallow="true" class="perfect-scrollbar-off" lang="en">
<head>
    <title></title>
    <link href="/index_files/bootstrap-datetimepicker/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/index_files/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="/index_files/bootstrap-datetimepicker/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="/index_files/bootstrap-datetimepicker/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/index_files/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="/index_files/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
</head>

<body class="">
  <!-- Extra details for Live View on GitHub Pages -->
  <div class="wrapper">

    <div class="main-panel full-width">
      <div class="content">
        <?php
        require_once '../../bootstrap.php';
        ?>
              <form action="/relatorio_download.php" method="post" name="relatorio_historico">
               <table class="table table-bordered" id="tabela_relatorio">
                <thead>
                      <tr>
                      <th>
                            <select class="form-control" name="type">
                                <option> -- Selecione</option>
                                <option value="operador">Operador</option>
                                <option value="consolidado_chamadas">Consolidado de chamadas</option>
                                <option value="operacao">Operação</option>
                                <option value="volumetria">Volumetria</option>
                                <option value="pausas" disabled>Pausas</option>
                                <option value="analitico_ligacoes">Analítico das Ligações</option>
                              </select>
                              <br>
                      </th>
                      <th>
                        <div class="input-group date form_datetime" data-link-field="dtp_input1">
                            <input class="form-control" size="20" type="text" value="Escolha a data de início" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                        </div>
                        <input type="hidden" id="dtp_input1" value="" name="data_inicio"><br/>
                      </th>

                      <th>
                        <div class="input-group date form_datetime" data-link-field="dtp_input2">
                            <input class="form-control" size="20" type="text" value="Escolha a data fim" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                        </div>
                        <input type="hidden" id="dtp_input2" value="" name="data_fim"><br/>
                      </th>
                      <th>
                          <input class="form-control" type="submit" name="relatorio_historico" value="Gerar Relatório"/>
                          <br>
                      </th>
                      </tr>
                </thead>
            </table>
            </form>
        </div>
      </div>
    </div>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'pt-BR',
        showWeekDays: false,
//         weekStart: 0,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        format: 'dd/mm/yyyy h:ii'

    });
</script>

</body></html>