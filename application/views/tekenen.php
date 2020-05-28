<style>
    label {
        font-weight: bold;
    }
    span {
        font-weight: bold;
        text-decoration: underline;
        color: red;
    }
</style>
<script>
    var input = '';
    var status = 0;

    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    $(document).ready(function () {
        $('#melding').hide();
        $('#knopWissen').click(function () {
            input = input.slice(0, -1);
            $('#resultaat').val(input);
        });
        $('#opnieuw').click(function () {
            $('#resultaat').val('');
            $('#melding').hide();
            input = '';
            status = 0;
        });

        $('#knopOK').click(function () {
            if (status === '0') {
                $('#resultaat').val('Identificeren of Tekenen');
                status = 1;
            }
            if (status === '2') {
                if (input === '9523') {
                    $('#resultaat').val('PIN CORRECT');
                    input = '';
                    status = 3;
                    setTimeout(function () {
                        $('#resultaat').val('Geef de eerste transactiecode in');
                    }, 1000);
                }
                else {
                    $('#resultaat').val('PIN FOUT');
                    console.log(input);
                    $('#melding').text('U heeft een verkeerde PIN ingegeven. Druk op Opnieuw om te herbeginnen.').show();

                }
            }
            if (status === '3' && input !== '') {
                if (input === '26891') {
                    input = '';
                    status = 4;
                    $('#resultaat').val('Geef de tweede transactiecode in');
                }
                else {
                    $('#melding').text('U heeft een verkeerde transactiecode ingegeven. Druk op Opnieuw om te herbeginnen.').show();
                }
            }
            if (status === '4' && input !== '') {
                $('#melding').text('U moest op Tekenen drukken in plaats van op OK. Druk op Opnieuw om te herbeginnen.').show();
                status = 7;
            }
        });
        $('#sign').click(function () {
            console.log(status);
            if (status === '1') {
                $('#resultaat').val('Geef pin in gevolgd door OK');
                status = 2
            }
            if (status === '8') {
                $('#resultaat').val('Geef pin in gevolgd door OK');
                status = 2;
                $('#melding').hide();
            }
            if (status === '4') {
                if (input === '937852') {
                    input = '';
                    status = 5;
                    $('#resultaat').val('8462 9910');
                }
                else {
                    $('#melding').text('U heeft een verkeerde transactiecode ingegeven. Druk op Opnieuw om te herbeginnen.').show();
                }

            }
        });

        $('#identify').click(function () {
            if (status === '1') {
                $('#melding').text('U heeft Identificeren gekozen in plaats van Identificeren. Druk nu op Tekenen om verder te gaan.').show();
                status = 8;
            }
        });

        $('.btn-outline-secondary').click(function () {
            if (status === '2' || status === '3' || status === '4'){
                input += $(this).val();
                $('#resultaat').val(input);
            }
        });

        $('#antwoord').change(function () {
            $('#meldingAntwoord').text('');
        });

        $('#betalen').click(function () {
            var antwoord = $('#antwoord').val();

            if (antwoord) {
                if (antwoord === '84629910')  {
                    $('.modal-title').text('PROFICIAT');
                    $('.modal-body').text('U heeft de opdracht perfect opgelost!');
                }
                else {
                    $('.modal-title').text('SPIJTIG');
                    $('.modal-body').text('De opgegeven oplossing is niet juist. Probeer het nogmaals.');
                }
                $('#uitkomst').modal('show');
            }
            else  {
                $('#meldingAntwoord').text('Geef hier het verkregen antwoord in van het banktoestel.');
            }
        });
    });
</script>

<div class="row">
    <div class="row mb-5">
        <div class="card border-info bg-light mt-4 mb-5 ml-3 mr-5 col-5">
            <div class="m-5">
                <h5>Van</h5>
                <hr>
                <div class="row">
                    <div class="col-12 row">
                        <div class="form-group col-12">
                            <?php echo form_label('Bedrag'); ?>
                            <div>€ <span>268</span>,<span>91</span></div>
                        </div>

                        <div class="form-group col-12">
                            <?php echo form_label('Rekening opdrachtgever'); ?>
                            <div>IBAN: BE65 5832 4865 0503</div>
                            <div>BART COPPENS</div>
                            <div>Zichtrekening</div>
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <?php echo form_label('Persoonlijke nota'); ?>
                        <div>
                            <?php
                            if ($persNota) {
                                echo $persNota;
                            }
                            else {
                                echo '/';
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-1"></div>
        <div class="card border-info bg-light mt-4 mb-5 ml-3 col-5">
            <div class="m-5">
                <h5>Naar</h5>
                <hr>
                <div class="row">
                    <div class="form-group col-12">
                        <?php
                        echo form_label('Rekening van begunstigde'); ?>
                        <div>BE68 2450 <span>9378 52</span>49</div>
                    </div>
                    <div class="form-group col-12">
                        <?php echo form_label('Naam en adres van begunstigde'); ?>
                        <div><?php echo $naamAdres; ?></div>
                    </div>
                    <div class="col-12 form-group">
                        <?php echo form_label('Mededeling begunstigde'); ?>
                        <div>+++632/0891/74528+++</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-danger mt-3 col-12" role="alert" id="melding"></div>

        <div class="alert alert-secondary col-7 ml-3" id="oefening" role="alert">
            <h5 class="ml-3">Oefening tekenen</h5>
            <hr>
            <ol>
                <li>Druk op OK om het toestel te starten.</li>
                <li>Druk hierna op Tekenen.</li>
                <li>Geef je PIN in en druk op OK (uw pincode van uw bankkaart is: 9523).</li>
                <li>Geef volgende transactiecode in zonder spatie en druk op OK: <span>268 91</span></li>
                <li>Geef volgende transactiecode in zonder spatie en druk op Tekenen: <span>9378 52</span></li>
                <li>Vul de verkregen code in het antwoordveld en druk op Betalen</li>
            </ol>
            <div class="form-group ml-3">
                <?php
                echo form_label('ANTWOORD', '', array('class' => 'font-weight-normal'));
                echo form_input(array('class' => 'form-control', 'id' => 'antwoord', 'placeholder' => 'xxxx xxxx', 'maxlength' => '8', 'onkeypress' => 'return isNumberKey(event)')); ?>
                <div class="text-danger ml-2" id="meldingAntwoord"></div>
                <?php echo form_button(array('class' => 'btn btn-info mt-2', 'content' => 'Betalen', 'id' => 'betalen')); ?>
            </div>
        </div>
        <div class="col-4 text-center ml-5">
            <?php echo form_button(array('class' => 'btn btn-warning ml-5', 'content' => 'Opnieuw', 'id' => 'opnieuw')); ?>
            <div id="kaartlezer" class="mt-3">
                <table class="text-center" cellpadding="3">
                    <tr>
                        <td colspan="4">
                            <?php
                            echo form_input(array('class' => 'form-control',
                                'id' => 'resultaat', 'size' => '1', 'readonly' => 'readonly'));
                            ?>
                        </td>
                    <tr>
                        <td colspan="3">
                            <div style="float: left;">
                                <?php
                                echo form_button(array('class' => 'btn btn-primary',
                                    'style' => 'width:165px', 'id' => 'identify', 'content' => 'Identificeren'));
                                ?>
                            </div>
                            <div style="float: right;">
                                <?php
                                echo form_button(array('class' => 'btn btn-primary',
                                    'style' => 'width:165px', 'id' => 'sign', 'content' => 'Tekenen'));
                                ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                            echo form_button(array('class' => 'btn btn-outline-secondary',
                                'style' => 'width:110px', 'value' => '7', 'content' => '7'));
                            ?>
                        </td>
                        <td>
                            <?php
                            echo form_button(array('class' => 'btn btn-outline-secondary',
                                'style' => 'width:110px', 'value' => '8', 'content' => '8'));
                            ?>
                        </td>
                        <td>
                            <?php
                            echo form_button(array('class' => 'btn btn-outline-secondary',
                                'style' => 'width:110px', 'value' => '9', 'content' => '9'));
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                            echo form_button(array('class' => 'btn btn-outline-secondary',
                                'style' => 'width:110px', 'value' => '4', 'content' => '4'));
                            ?>
                        </td>
                        <td>
                            <?php
                            echo form_button(array('class' => 'btn btn-outline-secondary',
                                'style' => 'width:110px', 'value' => '5', 'content' => '5'));
                            ?>
                        </td>
                        <td>
                            <?php
                            echo form_button(array('class' => 'btn btn-outline-secondary',
                                'style' => 'width:110px', 'value' => '6', 'content' => '6'));
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                            echo form_button(array('class' => 'btn btn-outline-secondary',
                                'style' => 'width:110px', 'value' => '1', 'content' => '1'));
                            ?>
                        </td>
                        <td><?php
                            echo form_button(array('class' => 'btn btn-outline-secondary',
                                'style' => 'width:110px', 'value' => '2', 'content' => '2'));
                            ?>
                        </td>
                        <td><?php
                            echo form_button(array('class' => 'btn btn-outline-secondary',
                                'style' => 'width:110px', 'value' => '3', 'content' => '3'));
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                            echo form_button(array('class' => 'btn btn-warning',
                                'style' => 'width:110px', 'id' => 'knopWissen', 'value' => 'delete', 'content' => 'Verwijderen'));
                            ?>
                        </td>
                        <td>
                            <?php
                            echo form_button(array('class' => 'btn btn-outline-secondary',
                                'style' => 'width:110px', 'id' => 'knop0', 'value' => '0', 'content' => '0'));
                            ?>
                        </td>
                        <td>
                            <?php
                            echo form_button(array('class' => 'btn btn-success',
                                'style' => 'width:110px', 'id' => 'knopOK', 'value' => '=', 'content' => 'OK'));
                            ?>
                        </td>

                    </tr>
                </table>
            </div>

        </div>
    </div>
</div>

<div id="uitkomst" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <div aria-hidden="true">&times;</div>
                </button>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>




