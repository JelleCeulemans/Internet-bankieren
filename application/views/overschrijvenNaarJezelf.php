<script>
    var bedrag, rekOpdrachtgever, land, rekBegunstigde, naamAdres1;
    function ophalenFormulier () {
        bedrag = $('#bedrag').val();
        rekOpdrachtgever = $('#rekOpdrachtgever').val();
        land = $('#land').val();
        rekBegunstigde = $('#rekBegunstigde').val();
        naamAdres1 = $('#naamAdres1').val();
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
        var antwoord1 = validatieMelding(bedrag, '115.20', 'meldingBedrag', 'Het bedrag is niet correct ingegeven!');
        var antwoord2 = validatieMelding(rekOpdrachtgever, '2', 'meldingRekOpdr', 'Je hebt een verkeerde rekening gekozen!');
        var antwoord3 = validatieMelding(land, '0', 'meldingLand', 'Je hebt het verkeerde land gekozen!');
        var antwoord4 = validatieMelding(rekBegunstigde, 'BE65 5832 4865 0503', 'meldingRekBeg', 'Je hebt een verkeerde rekening gekozen!');
        if (naamAdres1) {
            var antwoord5 = true;
        }
        else {
            $('#meldingNaamAdres').text('Vul minimum het eerste veld in!');
        }

        if (antwoord1 && antwoord2 && antwoord3 && antwoord4 && antwoord5) {
            return true;
        }
        else {
            return false;
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
            console.log($('#naamAdres1').val());
            if (validatie()) {
                $('.modal-title').text('PROFICIAT');
                $('.modal-body').text('U heeft de opdracht perfect opgelost!');
                $('#uitkomst').modal('show');
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
        width: 1100px;
        height: auto;
        margin-bottom: 50px;
	
	
    }
</style>
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
        <?php echo form_button(array('content' => 'Overschrijven', 'class' => 'btn btn-info', 'id' => 'betalen')); ?>
    </div>
    <hr>
</div>

<div class="alert alert-secondary ml-3 mb-5" id="oefening" role="alert">
    <h5 class="ml-3">Oefening overschrijven naar jezelf</h5>
    <hr>
    <ul>
        <li style="list-style-type: none;">We gaan €115,20 overschrijven van onze spaarrekening naar onze zichtrekening.</li>
        <li><b>Van:</b>
            <ol>
                <li>Vul € 115,20  in als bedrag.</li>
                <li>Kies bij Rekening opdrachtgever voor spaarrekening2 (Je ziet dat bij rekening begunstigde en de naam en adres als automatisch worden ingevuld (dit komt omdat je enkel van je spaarboekje naar je zichtrekening kan overschrijven.</li>
                <li>Vul optioneel een persoonlijke nota in (dit is optioneel en wordt gebruikt ter herkenning van de opdracht).</li>
            </ol></li>
        <li><b>Naar:</b>
            <ol>
                <li>Kies hier voor het land België. </li>
                <li>Kies voor zichtrekening bij rekening begunstigde (bij 'Naam en adres van begunstigde' zie je dat de gegevens automatisch worden ingevuld, als je bij rekening opdrachtgever al een spaarrekening hebt gekozen staat de zichtrekening al automatisch klaar).</li>
                <li>Bij mededeling kan u optioneel een mededeling ingeven.</li>
                <li>Druk op 'Overschrijven'.</li>
            </ol>
        </li>
    </ul>
</div>


<div id="uitkomst" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>
