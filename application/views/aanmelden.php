<style>
    ol {
        font-weight: bold;
    }
    ol span {
        font-weight: normal;
    }

    #oefening ol {
        font-weight: normal;
    }


  #bankkaart {
      border-radius: 20px;
      width: 475px;
  }

  #getal {
      border-radius: 50%;
      width: 25px;
      text-align: center;
  }

    .alert span {
        font-weight: bold;
    }
    #oefening {
        width: 500px;
    }
    #opnieuw {
        margin-left: 150px;
    }

</style>
<script>
    var klant, kaart, antwoord;
    function validatieMelding(variablele, condition, selector, tekst) {
        if (variablele !== condition) {
            $('#'+selector).text(tekst);
        }
        else {
            return true;
        }
    }

    function validatie() {
        kaart = $('#kaartID').val();
        klant = $('#klantID').val();
        antwoord = $('#antwoord').val();
        var antwoord1 = validatieMelding(klant, '0462856463', 'meldingKlant', 'Je klantnummer is niet correct!');
        var antwoord2 = validatieMelding(kaart, '67039568163278954', 'meldingKaart', 'Je hebt een verkeerde kaartnummer ingegeven!');
        var antwoord3 = validatieMelding(antwoord, '95206842', 'meldingAntwoord', 'Je hebt een verkeerd antwoord opgegeven!');

        if (antwoord1 && antwoord2 && antwoord3) {
            return true;
        }
        else {
            return false;
        }
    }

    var input = '';
    var status = 0;
    $(document).ready(function () {
        $('.text-danger').text('');
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
                   setTimeout(function () {
                       $('#resultaat').val('9520 6842');
                   }, 1000);
               }
               else {
                   $('#resultaat').val('PIN FOUT');
                   $('#melding').text('U heeft een verkeerde PIN ingegeven. Druk op Opnieuw om te herbeginnen.').show();

               }
           }
        });
        $('#identify').click(function () {
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
        });

        $('#sign').click(function () {
            if (status === '1') {
                $('#melding').text('U heeft Tekenen gekozen in plaats van Identificeren. Druk nu op Identificeren om verder te gaan.').show();
                status = 8;
            }
        });

        $('.btn-outline-secondary').click(function () {
            if (status === '2'){
                input += $(this).val();
                $('#resultaat').val(input);
            }
        });

        $('input, select').change(function () {
            console.log('test');
            $(this).next().text('');
        });

        $('#aanmelden').click(function () {
            if (validatie()) {
                $('.modal-title').text('PROFICIAT');
                $('.modal-body').text('U heeft de opdracht perfect opgelost!');
                $('#uitkomst').modal('show');
            }
        });
    });
</script>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h5>Welke gegevens kan je allemaal terugvinden op de bankkaart ?</h5>
        <hr>
        <hr>
        <ol>
            <li>Kaartnummer: <span>Deze nummer begint altijd met 6703 en bestaat in totaal uit 17 getallen</span></li>
            <li>Bankrekeningnummer: <span>Ook wel IBAN genoemd (International Bank Account Number) in België begint dit altijd met 'BE' gevolgd door 14 cijfers. Dit is het nummer dat gekoppeld is aan je zichtrekening.</span></li>
            <li>Je voor en achternaam: </li>
            <li>Je klantennummer: <span>De is bij elke bank anders, dit is een specifieke nummer waar de bank jou aan herkent.</span></li>
            <li>Vervaldatum: <span>Deze datum geeft aan tot wanneer je bankkaart geldig is.</span></li>
            <li>BIC code: <span>Dit is de afkorting voor 'Bank Identifier Code', Deze identificeert bij welke bank je zit. Dit is bijvoorbeeld bij ING: 'BRUBEBB' en bij KBC: 'KREDEBB'</span></li>
            <li>PIN: <span>Dit staat niet op je bankkaart te lezen, maar staat op de chip van je bankkaart . Dit is de sleutel van je bankkaart.(Dit getal kan je niet aflezen op je bankkaart)</span></li>
        </ol>
    </div>
</div>
<div class="alert alert-danger mt-3" role="alert" id="melding"></div>
<div class="row">
    <div class="col-7 mt-5">
        <h3>Bankkaart</h3>
        <div class="alert alert-secondary" id="bankkaart" role="alert">
            <div class="row">
                <div class="col-1 mt-2">
                    <div id="getal" class="bg-info text-white">1</div>
                </div>
                <div class="col-11 mt-2"><span>KAART NR: </span>6703 9568 1632 7895 4</div>
                <div class="col-1 mt-2">
                    <div id="getal" class="bg-info text-white">2</div>
                </div>
                <div class="col-11 mt-2"><span>BANK NR: </span>BE65 5832 4865 0503</div>
                <div class="col-1 mt-2">
                    <div id="getal" class="bg-info text-white">3</div>
                </div>
                <div class="col-11 mt-2"><span>NAAM: </span>Bart Coppens</div>
                <div class="col-1 mt-2">
                    <div id="getal" class="bg-info text-white">4</div>
                </div>
                <div class="col-11 mt-2"><span>KLANT ID: </span>04628564 63</div>
                <div class="col-1 mt-2">
                    <div id="getal" class="bg-info text-white">5</div>
                </div>
                <div class="col-11 mt-2"><span>VERVALDATUM: </span>08/20</div>
                <div class="col-1 mt-2">
                    <div id="getal" class="bg-info text-white">7</div>
                </div>
                <div class="col-11 mt-2"><span>PIN: </span>9523</div>
            </div>
        </div>
    </div>
    <div class="col-5">
        <?php echo form_button(array('class' => 'btn btn-warning', 'content' => 'Opnieuw', 'id' => 'opnieuw')); ?>
        <div id="kaartlezer" class=" mt-3">
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
    <div class="col-7 mt-5 mb-5">
        <div class="alert alert-secondary" id="oefening" role="alert">
            <h5 class="ml-2">Oefening aanmelden</h5>
            <hr>
            <ol>
                <li>Vul je kaartnummer in.</li>
                <li>Vul je klantennummer in.</li>
                <li>Identificeren
                <ul>
                    <li>Druk op OK om het toestel te starten.</li>
                    <li>Druk hierna op identificeren.</li>
                    <li>Geef je PIN in en druk op OK</li>
                    <li>Vul het gekregen getal in het antwoordveld.</li>
                </ul></li>
                <li>Druk op AANMELDEN om jezelf aan te melden</li>
            </ol>
        </div>
    </div>
    <div class="col-5 mt-5 mb-5" id="oplossing">
        <div class="form-group">
        <?php
        echo form_label('KAART ID');
        echo form_input(array('type' => 'number',
            'id' => 'kaartID',
            'placeholder' => '6703 xxxx xxxx xxxx x',
            'class' => 'form-control')); ?>
        <div class="ml-2 text-danger" id="meldingKaart">Geef uw kaartnummer in.</div>
        </div>

        <div class="form-group">
        <?php echo form_label('KLANT ID');
        echo form_input(array('type' => 'number',
            'id' => 'klantID',
            'placeholder' => 'xxxxxxxx xx',
            'class' => 'form-control')); ?>
        <div class="ml-2 text-danger" id="meldingKlant">Geef uw klantennummer in.</div>
        </div>

        <div class="form-group">
        <?php echo form_label('ANTWOORD');
        echo form_input(array('type' => 'number',
            'id' => 'antwoord',
            'placeholder' => 'xxxx xxxx',
            'class' => 'form-control')); ?>
        <div class="ml-2 text-danger" id="meldingAntwoord">Geef een code in.</div>
        </div>
        <?php echo form_button('aanmelden', 'Aanmelden', array('class' => 'btn btn-success', 'id' => 'aanmelden'));  ?>
    </div>
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

