<style>
    .bg-grey{
        background-color: #ddd;
        color: #000;
    }
    a.bg-grey:hover, a.bg-grey:active,a.bg-grey:link,a.bg-grey:visited{
        background-color: #ddd;
        color: #000;
    }
    @media screen and (min-width: 800px)  {
        .nrlinks{
            position: relative;
            left: -25%;
        }
    }
    .nrlinks{
        position: relative;
        left: -10%;
    }
    #verrichtingen {
        padding: 2%;
        background-color: #fff;
        color: #000;
        width: 25%;
        margin-top: 2%;
    }
    .infoVAN, .infoNAAR, .infoKAART{
        position: relative;
        left: 5%;
        width: 90%;
        background-color: #eee;
    margin-top: 2%;
    padding:2%;
        p{
            line-height: 2px;
        }
        hr {
            width: 100%;
        }
    }
    .vet{
        font-weight: bold;
    }
</style>

<script>
    $(document).ready(function () {
        $('.infoVAN').hide();
        $('.infoNAAR').hide();
        $('#van').click(function () {
            $('.infoVAN').toggle();
        });
        $('#naar').click(function () {
            $('.infoNAAR').toggle();
        });
    });
</script>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><?php echo anchor('/rekeningBekijken/index', 'Mijn Rekeningen');?></a></li>
        <li class="breadcrumb-item active"><a href="#">Spaarrekening 1</a></li>
    </ol>
</nav>
<a href="#"  class="list-group-item list-group-item-action bg-grey">
        <div class="d-flex w-100 justify-content-between">
            <div class="list-group">
                <h5 class="mb-1">Bart Coppens</h5>

            <p class="mb-1">Spaarrekening</p>
            <small>BE65 5832 4865 0503</small></div>

            <medium id="bedragTotaalZicht"></medium>
        </div>
        <p class="mb-1" id="verrichtingen">Verrichtingen</p>
    </a>

    <a href="#" id="van" class="list-group-item list-group-item-action bg-white">
        <div class="row">
            <medium class ="col-3"> 14 MRT</medium>
            <div class="d-flex w-100 justify-content-between col-9">
                <p class="vet mb-1 nrlinks">EUROPESE OVERSCHRIJVING VAN</p>
                <medium>+ € 107,95</medium>
            </div>
            <div class="infoVAN">

                <p>BART COPPENS <br>
                MOLENSTRAAT 582 <br>
                2200 HERENTALS</p>
                <p>BE32 9642 0052 9867 BIC RABOBE22 <br>
                ZONDER MEDEDELING <br>
                BANKREFERENTIE : 1903111585600878 <br>
                VALUTADATUM : 14/03/2019</p>
                <div>
                    <hr>
                <p>Uitvoeringsdatum 14.03.2019</p>
                </div>
                <div>
                    <hr>
                <p>Valutadatum 14.03.2019</p>
                </div>
                <div>
                    <hr>
                <p>Volgnummer 0002</p>
            </div>
        </div>
        </div>
    </a>
<a href="#" id="naar" class="list-group-item list-group-item-action bg-white">
    <div class="row">
        <medium class ="col-3"> 16 FEB</medium>
        <div class="d-flex w-100 justify-content-between col-9">
            <p class="vet mb-1 nrlinks">EUROPESE OVERSCHRIJVING NAAR</p>
            <medium>- € 68,35</medium>
        </div>
        <div class="infoNAAR">

            <p>BART COPPENS</p>
            <p>BE71 2687 9960 8452<br>
                ZONDER MEDEDELING <br>
                BANKREFERENTIE : 39240584031625 <br>
                VALUTADATUM : 11/03/2019</p>
            <div>
                <hr>
                <p>Uitvoeringsdatum 16.02.2019</p>
            </div>
            <div>
                <hr>
                <p>Valutadatum 17.02.2019</p>
            </div>
            <div>
                <hr>
                <p>Volgnummer 0001</p>
            </div>
        </div>
    </div>
</a>
</div>

<script>
    $( document ).ready(function() {
        var spaar1 = 1000;
        $('#spaar1').text('€ ' + spaar1);

        $('#bedragTotaal').text('€ ' + spaar1);

    });
</script>