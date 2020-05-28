<script>

    $(document).ready(function () {
        var teller=1;
        var punten=0;

        var juisteAntwoorden = ["Een techniek om personen handelingen te laten doen om van slachtoffers hun persoonlijke gegevens te bemachtigen.","Wanneer er dringend en beveiligingsprobleem moet worden opgelost om je bankrekening terug veilig te maken.",
            "Bedrag, rekeningnummer opdrachtgever,  land begunstigde, rekeningnummer begunstigde, naam en adres.","Een gestructureerde mededeling.","Nee dit is niet nodig enkel bevestigen is voldoende."];

        toonVragen(teller);
        $('#feedback').hide();
        $('#feedbackOK').hide();
        $('#opnieuw').hide();

        $('#volgende').click(function () {
            if (($("#antwoord input[name='antwoorden']:checked").length == 1)) {
                $('#validatie').hide();
                juistFout = $("#antwoord input[name='antwoorden']:checked").data('iets');
                console.log($("#antwoord input[name='antwoorden']:checked").data('iets'));
                if ($("#antwoord input[name='antwoorden']:checked").data('iets') == 0) {
                    var juisteAntwoord = juisteAntwoorden[teller-1];
                    console.log(juisteAntwoord);
                }
                punten = berekenScore(juistFout, punten, juisteAntwoord);
            }
            else {
                $('#validatie').html('Kies 1 antwoord');
                $('#validatie').show();
            }
        });
        $('#feedbackOK').click(function () {
            $('#feedbackOK').hide();
            $('#feedback').hide();
            $('#volgende').show();
            $('form').show();
            teller++;
            if (teller == 6) {
                $('#resultaat').text( punten + ' /5');
                $('#opnieuw').show();
            }
            toonVragen(teller);
        });

        $('#opnieuw').click(function () {
           location.reload();
        });
    });
    function toonUL(tekst,teller,juist=false){
        if (juist ==true) {
            bewerkt = '<div><input data-iets="1" type="radio" name="antwoorden" id="antwoord'+teller +'" value="'+ tekst +'"><label for="antwoord'+teller +'">'+ tekst +'</label></div>';
            console.log("antwoord" +teller);
        } else
        {
            bewerkt = '<div><input data-iets="0" type="radio" name="antwoorden" id="antwoord'+teller+'" value="'+ tekst +'"><label for="antwoord'+teller +'">'+ tekst +'</label></div>';
        }

        return bewerkt;
    }
    function toonVraag(tekst) {
        $('.card-title').html(tekst);
    }
    function toonVragen(teller) {
        $('.card-header, #locatie').html('Vraag ' + teller);
        switch(teller) {
            case 1:
                toonVraag("Wat is phishing?");
                antwoorden = toonUL("Een techniek om personen handelingen te laten doen om van slachtoffers hun persoonlijke gegevens te bemachtigen.",'1',true);
                antwoorden += toonUL("Een cybercrimineel die inbreekt in je computer (hacken).",'2');
                antwoorden += toonUL("Dit is softwareprogramma die de bestanden op je computer versleuteld.",'3');
                $('#antwoord').html(antwoorden);
                break;
            case 2:
                toonVraag("Wanneer mag je geen gegevens doorgeven?");
                antwoorden = toonUL('Bij een betaling via een bank-app.','1');
                antwoorden += toonUL('Wanneer er dringend een beveiligingsprobleem moet worden opgelost om je bankrekening terug veilig te maken.','2',true);
                antwoorden += toonUL('Bij een HTTPS URL (link in de zoekbalk).','3');
                $('#antwoord').html(antwoorden);
                break;
            case 3:
                toonVraag("Welke gegevens zijn belangrijk bij het overmaken van een bedrag?");
                antwoorden = toonUL("Bedrag, rekeningnummer opdrachtgever,  land begunstigde, rekeningnummer begunstigde, naam en adres.",'1',true);
                antwoorden += toonUL("Bedrag, rekeningnummer opdrachtgever, rekeningnummer begunstigde, gestructureerde mededeling.",'2');
                antwoorden += toonUL("Bedrag, rekeningnummer opdrachtgever, persoonlijke nota, land begunstigde, rekeningnummer begunstigde, naam en adres, gewone mededeling.",'3');
                $('#antwoord').html(antwoorden);
                break;
            case 4:
                toonVraag('Waarvan is dit het patroon (+++XXX/XXXX/XXXXX+++)?');
                antwoorden = toonUL('Een BIC (bank identificeer code).','1');
                antwoorden += toonUL('Een gestructureerde mededeling.','2',true);
                antwoorden += toonUL('Een IBAN (bankrekeningnummer).','3');
                $('#antwoord').html(antwoorden);
                break;
            case 5:
                toonVraag('Moet je jezelf identificeren en/of tekenen om een bedrag over te schrijven naar jezelf?');
                antwoorden = toonUL('Ja, eerst identificeren en daarna tekenen.','1');
                antwoorden += toonUL('Ja, maar enkel identificeren.','2');
                antwoorden += toonUL('Nee dit is niet nodig enkel bevestigen is voldoende.','3',true);
                $('#antwoord').html(antwoorden);
                break;
            case 6:
                $('#volgende').text('Beëindigen');
                $('#antwoord').hide();
                $('#resultaat').show();
                $('#feedbackOK').hide();
                $('#volgende').hide();
                break;
        }
    }
    function berekenScore(antwoord,punten,juisteAntwoord) {
        $('form').hide();
        $('h5').text('Feedback');
        //$('#locatie').text("Feedback vraag " + teller);
        if (antwoord == 1) {

            string = '<i class="far fa-check-circle green"></i>' + '<p>Proficiat! U heeft goed geantwoord!</p>';
            $('#feedback').html(string);
            $('#feedbackOK').show();
            $('#feedback').show();
            $('#volgende').hide();
            punten ++;
        }
        else{
            string = '<i class="far fa-times-circle red"></i>' + '<p>Spijtig! U heeft fout geantwoord.</p>';
            string += 'Dit was het juiste antwoord: ' + juisteAntwoord;
            $('#feedback').html(string);
            $('#feedbackOK').show();
            $('#feedback').show();
            $('#volgende').hide();
        }
        return punten;
    }
</script>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Quiz</li>
        <li class="breadcrumb-item active" id="locatie"></li>
    </ol>
</nav>
<div class="card mb-3">
<div class="card-header"></div>
<div class="card-body ">
    <h5 class="card-title"></h5>
    <p class="card-text">
    <form id="antwoord">
    </form>
    </p>
    <p class="card-text" id="feedback">

    </p>
    <p class="card-text" id="resultaat"></p>
</div>
<div class="card-footer ">
    <button class="btn btn-primary" id="volgende">Volgende</button>
    <button class="btn btn-primary" id="feedbackOK">Volgende</button>
    <button class="btn btn-primary" id="opnieuw">Opnieuw</button>

</div>
</div>
<p class="card-text" id="validatie">