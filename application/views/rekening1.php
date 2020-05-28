<style>
    .bg-grey{
        background-color: #ddd;
        color: #000;
    }
    a.bg-grey:hover, a.bg-grey:active,a.bg-grey:link,a.bg-grey:visited{
        background-color: #ddd;
        color: #000;
    }
</style>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><?php echo anchor('/rekeningBekijken/index', 'Mijn Rekeningen');?></a></li>
        <li class="breadcrumb-item active"><a href="#">Zichtrekening</a></li>
    </ol>
</nav>
<div class="list-group">

    <a href="#" class="list-group-item list-group-item-action bg-grey">
        <div class="d-flex w-100 justify-content-between">
            <p class="mb-1">Verrichtingen</p>
            <medium id="bedragTotaalZicht"></medium>
        </div>
    </a>

    <a href="#" class="list-group-item list-group-item-action bg-white">
        <div class="d-flex w-100 justify-content-between">
            <p class="mb-1">Overschrijving van {naam}</p>
            <medium>+ € 10,00</medium>
        </div>
    </a>
    <a href="#" class="list-group-item list-group-item-action bg-white">
        <div class="d-flex w-100 justify-content-between">
            <p class="mb-1">Overschrijving naar {naam}</p>
            <medium>- € 35,00</medium>
        </div>
    </a>
    <a href="#" class="list-group-item list-group-item-action bg-white">
        <div class="d-flex w-100 justify-content-between">
            <p class="mb-1">Betaling met bankkaart
            <br>
            <small>Kaart 1234 56XX XXXX X987 6</small></p>
            <medium>- € 96,65</medium>
        </div>
    </a>
</div>

<script>
    $( document ).ready(function() {
        var zicht1 = 200;
        $('#zicht1').text('€ ' + zicht1);
        $('#bedragTotaalZicht').text('€ ' + zicht1);

    });
</script>