<?php
  include_once 'php_action/db_connect.php';
  include_once 'includes/header.php';
?>
<h1 class="white-text">Ola
    <!--<?php echo $dados['nome']; ?>-->
    ,
</h1>
<div style="text-align:center;">

    <h4 class="white-text">Bora agendar!</h4>
    <form class="col s12" id="agendar" action="php_action/agendar.php" method="POST">
        <div class="input-field col s12">
            <h5 class="white-text">Quando?</h5>
            <input type="text" id="data" class="datepicker" value="Escolher a data" style="text-align:center;">

            <input type="text" id="horas" class="timepicker" value="Escolher o horario" style="text-align:center;">

        </div>

        <div class="row">
            <h5 class="white-text">O que vamos fazer?</h5>

            <div class="input-field col s12">
                <select multiple>
                    <option value="" disabled selected>Selecionar serviços :</option>
                    <option id="1" value="1">Corte</option>
                    <option id="2" value="2">Barba</option>
                    <option id="3" value="3">sombrancelha</option>
                    </optgroup>
                </select>
            </div>
            <button class="btn waves-effect waves-large blue accent-3" type="submit" name="btn-agendar"
                id="btn-agendar">Agendar
                <i class="large material-icons right">alarm_on</i>
            </button>


    </form>
</div>
</div>
<script>
<!-- Datepicker 
-->
document.addEventListener('DOMContentLoaded',
function()
{
var
elems
=
document.querySelectorAll('.datepicker');
var
instances
=
M.Datepicker.init(elems,
options);
});
//
Or
with
jQuery
$(document).ready(function() {
$('.datepicker').datepicker();
});

</script>

<script>
<!-- Timepicker 
-->
document.addEventListener('DOMContentLoaded',
function()
{
var
elems
=
document.querySelectorAll('.timepicker');
var
instances
=
M.Timepicker.init(elems,
options);
});
//
Or
with
jQuery
$(document).ready(function() {
$('.timepicker').timepicker();
});

</script>
<?php
//footer
include_once 'includes/footer.php'
?>