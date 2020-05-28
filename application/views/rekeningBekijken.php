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
        <li class="breadcrumb-item active"><a href="#">Mijn rekeningen</a></li>
    </ol>
</nav>
<div class="list-group">

    <a href="#" class="list-group-item list-group-item-action bg-grey">
        <div class="d-flex w-100 justify-content-between">
            <p class="mb-1">Zichtrekening</p>
            <small id="bedragTotaalZicht"></small>
        </div>
    </a>

    <?php echo anchor('/rekeningBekijken/naarzichtrekening', '<div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Bart Coppens</h5>
            <medium id="zicht1"></medium>
        </div>
        <p class="mb-1">Zichtrekening</p>
        <small>BE65 5832 4865 0503</small>', array('class' => 'list-group-item list-group-item-action')); ?>

    <a href="#" class="list-group-item list-group-item-action bg-grey">
        <div class="d-flex w-100 justify-content-between">
            <p class="mb-1">Spaarrekening</p>
            <small id="bedragTotaalSpaar"></small>
        </div>
    </a>

    <?php echo anchor('/rekeningBekijken/naarspaar1', '<div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Bart Coppens</h5>
            <medium id="spaar1"></medium>
        </div>
        <p class="mb-1">Spaarrekening 1</p>
        <small>BE32 9642 0052 9867</small>', array('class' => 'list-group-item list-group-item-action')); ?>


    <?php echo anchor('/rekeningBekijken/naarspaar2', ' <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Bart Coppens</h5>
            <medium id="spaar2"></medium>
        </div>
        <p class="mb-1">Spaarrekening 2</p>
        <small>BE71 2687 9960 8452</small>', array('class' => 'list-group-item list-group-item-action')); ?>
</div>

<script>
    $( document ).ready(function() {
        var zicht1 = 200;
        $('#zicht1').text('€ ' + zicht1);
        $('#bedragTotaalZicht').text('€ ' + zicht1);
        var spaar1 = 1000;
        $('#spaar1').text('€ ' + spaar1);
        var spaar2 = 1500;
        $('#spaar2').text('€ ' + spaar2);

        $('#bedragTotaalSpaar').text('€ ' + (spaar1+spaar2));
    });
</script>