<script>
    var bedrag, rekOpdrachtgever, persNota, land, rekBegunstigde, naamAdres1, mededeling;
    function ophalenFormulier () {
        bedrag = $('#bedrag').val();
        rekOpdrachtgever = $('#rekOpdrachtgever').val();
        persNota = $('#persNota').val();
        land = $('#land').val();
        rekBegunstigde = $('#rekBegunstigde').val();
        naamAdres1 = $('#naamAdres1').val();
        if (!$('#strMed input:text').prop('disabled')) {
            mededeling = $('#strMededeling1').val() + $('#strMededeling2').val() + $('#strMededeling3').val();
        }
        else {
            mededeling = $('#gwnMededeling1').val() + "\n" + $('#gwnMededeling2').val() + "\n" + $('#gwnMededeling3').val();
        }
    }
    
    function validatieMelding(variablele, condition, selector, tekst) {
        if (variablele !== condition) {
            $('#'+selector).text(tekst);
        }
        else {
            return true;
        }
    }

    function validatie() {
        var antwoord1 = validatieMelding(bedrag, '268.91', 'meldingBedrag', 'Het bedrag is niet correct ingegeven!');
        var antwoord2 = validatieMelding(rekOpdrachtgever, '0', 'meldingRekOpdr', 'Je hebt een verkeerde rekening gekozen!');
        var antwoord3 = validatieMelding(land, '0', 'meldingLand', 'Je hebt het verkeerde land gekozen!');
        var antwoord4 = validatieMelding(rekBegunstigde, 'BE68245093785249', 'meldingRekBeg', 'Je hebt een verkeerde rekening gekozen');
        var antwoord5 = validatieMelding(mededeling, '632089174528', 'meldingMededeling', 'U heeft niet de juiste mededeling ingegeven');
        if (naamAdres1) {
            var antwoord6 = true;
        }
        else {
            $('#meldingNaamAdres').text('Vul minimum het eerste veld in!');
        }

        if (antwoord1 && antwoord2 && antwoord3 && antwoord4 && antwoord5 && antwoord6) {
           return true;
        }
    }

    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    $(document).ready(function () {
        $('input:radio').click(function () {
            if ($(this).val() === '0') {
                $('#strMed input').prop('disabled', true);
                $('#gwnMed input').prop('disabled', false);
            }
            else {
                $('#gwnMed input').prop('disabled', true);
                $('#strMed input').prop('disabled', false);
            }
        });
        $('#betalen').click(function () {
            ophalenFormulier();
            if (validatie()) {
                $('#rekeningFormulier').submit();
            }
        });
        $('input, select').change(function () {
            $(this).next('.melding').text('');
        });
        $('#mededeling').change(function () {
            $('#meldingMededeling').text('');
        });
        $('#naamAdres1').change(function () {
            $('#meldingNaamAdres').text('');
        });

        $('#rekOpdrachtgever').change(function () {
            var veld = $(this).val();
            if (veld === '1' || veld === '2') {
                $('#naamAdres1').val('Bart Coppens').prop('readonly', true);
                $('#naamAdres2').val('Molenstraat 582').prop('readonly', true);
                $('#naamAdres3').val('2200 Herentals').prop('readonly', true);
                $('#rekBegunstigde').val('BE65 5832 4865 0503').prop('readonly', true);
                $('#meldingNaamAdres').text('');
                $('#meldingRekBeg').text('');

            }
            else {
                $('#naamAdres1').val('').prop('readonly', false);
                $('#naamAdres2').val('').prop('readonly', false);
                $('#naamAdres3').val('').prop('readonly', false);
                $('#rekBegunstigde').val('').prop('readonly', false);
            }
        });


        $('#rekBegunstigde').change(function () {
            var veld = $(this).val();
            if (veld === 'BE65 5832 4865 0503' || veld === 'BE32 9642 0052 9867' || veld === 'BE71 2687 9960 8452') {
                $('#naamAdres1').val('Bart Coppens').prop('readonly', true);
                $('#naamAdres2').val('Molenstraat 582').prop('readonly', true);
                $('#naamAdres3').val('2200 Herentals').prop('readonly', true);
                $('#meldingNaamAdres').text('');
            }
            else {
                $('#naamAdres1').val('').prop('readonly', false);
                $('#naamAdres2').val('').prop('readonly', false);
                $('#naamAdres3').val('').prop('readonly', false);
            }
        });
    });
</script>

<style>
    .text-danger {
        font-size: 0.8em;
    }
    #vl {
        margin-left: 50px;
        margin-right: -50px;
        border-left: 2px solid #aaa;
        height: 200px;
    }

    #v2 {
        margin-left: 50px;
        margin-right: -50px;
        border-left: 2px solid #aaa;
        height: 350px;
    }

    #strMed {
        font-size: 1.5em;
    }

    img {
	margin: -280px auto -260px 300px;
        width: auto;
        height: 1100px;
	transform: rotate(-90deg);
    }
</style>
<?php echo form_open('OverschrijvenNaarAnderen/naarBetalen', array('id' => 'rekeningFormulier'));?>
<div class="card border-info bg-light mt-4">

   <div class="m-5">
       <h5>Van</h5>
       <hr>
       <div class="row">
           <div class="col-6 row">
               <div class="form-group col-12">
                   <?php
                   echo form_label('Bedrag');
                   echo form_input(array('type' => 'number',
                       'name' => 'bedrag',
                       'id' => 'bedrag',
                       'class' => 'form-control border-info')); ?>
                   <div id="meldingBedrag" class="text-danger ml-2 melding"></div>
               </div>

               <div class="form-group col-12">
                   <?php
                   echo form_label('Rekening opdrachtgever');
                   $options = array(
                       '0' => 'BE65 5832 4865 0503 || Bart Coppens (zichtrekening)',
                       '1' => 'BE32 9642 0052 9867 || Bart Coppens (spaarrekening1)',
                       '2' => 'BE71 2687 9960 8452 || Bart Coppens (spaarrekening2)',
                   );
                   echo form_dropdown('rekOpdrachtgever', $options, '', array(
                       'id' => 'rekOpdrachtgever',
                       'class' => 'form-control border-info')); ?>
                   <div id="meldingRekOpdr" class="text-danger ml-2 melding"></div>
               </div>
           </div>
           <div class="col-1" id="vl"></div>
           <div class="form-group col-5 mt-5">
               <?php
               echo form_label('Persoonlijke nota');
               echo form_input(array('id' => 'persNota',
                   'name' => 'persNota',
                   'class' => 'form-control border-info')); ?>
           </div>

       </div>
   </div>
</div>

<div class="card border-info bg-light mt-4 mb-5">
    <div class="m-5">
        <h5>Naar</h5>
        <hr>
        <div class="row">
            <div class="col-6 row">
                <div class="form-group col-12">
                    <?php
                    echo form_label('Land van begunstigde');
                    $options = array(
                        '0' => 'België',
                        '1' => 'Nederland',
                        '2' => 'Duitsland',
                        '3' => 'Frankrijk',
                        '4' => 'Luxemburg',
                    );
                    echo form_dropdown('rekOpdrachtgever', $options, '', array(
                        'id' => 'land',
                        'class' => 'form-control border-info'));?>
                    <div id="meldingLand" class="text-danger ml-2 melding"></div>
                </div>

                <div class="form-group col-12">
                    <?php
                    echo form_label('Rekening van begunstigde'); ?>
                    <input list="begRek" id="rekBegunstigde" name="rekBegunstigde" class="form-control border-info">
                    <div id="meldingRekBeg" class="text-danger ml-2 melding"></div>
                    <datalist id="begRek">
                        <option value="BE65 5832 4865 0503">Bart Coppens (zichrekening)</option>
                        <option value="BE32 9642 0052 9867">Bart Coppens (spaarrekening1)</option>
                        <option value="BE71 2687 9960 8452">Bart Coppens (spaarrekening2)</option>
                    </datalist>

                </div>
                <div class="form-group col-12">
                    <?php
                    echo form_label('Naam en adres van begunstigde');
                    echo form_input(array('class' => 'form-control border-info', 'name' => 'naamAdres1', 'id' => 'naamAdres1', 'placeholder' => 'Naam en adres'));
                    echo form_input(array('class' => 'form-control border-info', 'name' => 'naamAdres2', 'id' => 'naamAdres2', 'placeholder' => 'Naam en adres'));
                    echo form_input(array('class' => 'form-control border-info', 'name' => 'naamAdres3', 'id' => 'naamAdres3', 'placeholder' => 'Naam en adres'));
                    ?>
                    <div id="meldingNaamAdres" class="text-danger ml-2 melding"></div>
                </div>
            </div>
            <div class="col-1" id="v2"></div>
            <div class="col-5" id="mededeling">
                <div class="form-group col-12 mt-5">
                    <?php
                    echo form_radio('mededeling','0', true);
                    echo form_label('Gewone mededeling'); ?>
                    <div id="gwnMed">
                        <?php
                        echo form_input(array('class' => 'form-control border-info', 'id' => 'gwnMededeling1'));
                        echo form_input(array('class' => 'form-control border-info', 'id' => 'gwnMededeling2'));
                        echo form_input(array('class' => 'form-control border-info', 'id' => 'gwnMededeling3'));
                        ?>
                    </div>
                </div>
                <div class="col-12 form-group">
                    <?php
                    echo form_radio('mededeling','1');
                    echo form_label('Gestructureerde mededeling');
                    ?>
                    <div id="strMed" class="row ml-1">
                        <div>+++</div>
                        <?php echo form_input(array('class' => 'form-control col-2 border-info', 'disabled' => 'disabled', 'id' => 'strMededeling1', 'maxlength' => '3', 'onkeypress' => 'return isNumberKey(event)')); ?>
                        <div>/</div>
                        <?php echo form_input(array('class' => 'form-control col-2 border-info', 'disabled' => 'disabled', 'id' => 'strMededeling2', 'maxlength' => '4', 'onkeypress' => 'return isNumberKey(event)')); ?>
                        <div>/</div>
                        <?php echo form_input(array('class' => 'form-control col-3 border-info', 'disabled' => 'disabled', 'id' => 'strMededeling3', 'maxlength' => '5', 'onkeypress' => 'return isNumberKey(event)')); ?>
                        <div>+++</div>
                    </div>
                </div>
                <div id="meldingMededeling" class="text-danger ml-2"></div>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="text-center">
        <?php echo form_button(array('content' => 'Verder naar betalen', 'class' => 'btn btn-info', 'id' => 'betalen')); ?>
    </div>
    <hr>
</div>
<?php echo form_close(); ?>


 <?php echo img(base_url() . 'assets/images/overschrijvingsopdracht.jpg')?>

<div class="alert alert-secondary ml-3 mb-5" id="oefening" role="alert">
    <h5 class="ml-3">Oefening betalen</h5>
    <hr>
    <ul>
        <li><b>Van:</b>
            <ol>
                <li>Vul het bedrag in van de rekening (u kan dit terugvinden in de rechter bovenhoek).</li>
                <li>Kies bij Rekening opdrachtgever voor zijn zichtrekening.</li>
                <li>Vul optioneel een persoonlijke nota in (dit is optioneel en wordt gebruikt ter herkenning van de opdracht).</li>
            </ol></li>
        <li><b>Naar:</b>
            <ol>
                <li>Kies hier voor het land België (Dit kan u herkennen aan de BE vooraan de rekening nummer van de begunstigde). </li>
		<li>Geef bij rekening begunstigde het rekeningnummer op (dit kan u herkennen aan de BE voorafgaand). </li>
                <li>Geef het naam en adres in van de begunstigde (Hier moet minimaal het eerste veld zijn ingevuld).</li>
                <li>Kies voor gestructureerde mededeling en vul hier het nummer in (dit kan u herkennen aan het patroon +++xxx/xxxx/xxxxx+++).</li>
                <li>Druk op 'Verder naar betalen'.</li>
            </ol>
        </li>
    </ul>
</div>
