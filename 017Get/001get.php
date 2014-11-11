<?php 

    $individueelArtikel = false;  

    if ( isset ( $_GET['id'] ) )
    {
        $id = $_GET['id'];
        $individueelArtikel = true;    
    }

$artikels = array(
    array(
        'titel' => 'Haperende cruise control kost man bijna het leven',
        'datum' => '14/10/2014 om 08:37',
        'inhoud' => 'Zoersel - Een haperende cruise control van zijn zware Volvo XC90 kostte Walter Van Lommel uit Zoersel bijna het leven. Hij wil andere bestuurders waarschuwen.

        De autobouwer zelf wijt het euvel aan het feit dat Van Lommel niet naar een officiële Volvogarage ging voor onderhoud.
        Walter Van Lommel heeft zijn vertrouwen in de zo roemrijke veiligheidssystemen van Volvo totaal verloren.

        “Op 2 oktober reed ik van Brasschaat richting Sint-Job. Omdat de snelheid op die baan beperkt is tot 70, had ik mijn cruise control aangezet.
        Toen ik probeerde te vertragen om de rotonde op de brug over de E19 op te rijden, weigerde mijn wagen te vertragen.
        Met een snelheid van 70 kilometer per uur ben ik uit de bocht gegaan en werd ik tegen de verlichtingspaal gekatapulteerd.
        Nog een geluk dat er geen andere voertuigen bij betrokken waren. Mijn wagen is total loss”

        Volgens René Aerts van Volvo Cars Benelux is de betrokken wagen van 3 juni 2005. “De eigenaar heeft de wagen tweedehands gekocht in 2010.
        De laatste passage bij een officiële Volvo-verdeler dateert van 13 augustus 2009. De wagen komt dus al vijf jaar niet meer in het Volvo-net.
        Onze officiële verdelers zijn in staat de wagen in topvorm te houden door regelmatig software updates uit te voeren”, zegt Aerts.',
        'afbeelding' => 'Walter_Van_Lommel.jpg',
        'afbeeldingBeschrijving' => 'Walter toont zijn beschadigde wagen'),

array(
    'titel' => '25-jarige Jeugdhuis De Non heeft oud Mariabeeld als mascotte',
    'datum' => '03/10/2014 om 05:31',
    'inhoud' => 'Zoersel - Jeugdhuis De Non bestaat een kwarteeuw en dat wordt gevierd met een galabal en een fuif.
    “We zijn bijzonder trots op onze mascotte, een oud Mariabeeld, die we onze ‘non’ noemen”, zegt bestuurslid Kim Lefevere.

    De fusiegemeente Zoersel telt drie jeugdhuizen: de Zoezel in Zoerseldorp, Joe-Niz in Sint-Antonius en de jubilerende De Non in Halle.
    Laatstgenoemd jeugdhuis is sinds 1989 onafgebroken gevestigd in een voormalig zusterhuis, recht tegenover de Sint-Martinuskerk in het hartje van
    het dorp.

    “Logisch dus dat het toenmalige bestuur voor de benaming De Non koos”, vertelt huidige voorzitter Floris Bombeke (21).
    “We gaan verder op het elan van onze voorgangers en zijn elke vrijdag- en zaterdagavond open. We nodigen geregeld muzikanten
    en zangers uit en organiseren jaarlijks een Non Stop-party en een kippenfeestje. Sinterklaas- en kerstfeesten staan eveneens op het programma.
    En geregeld brengen we een bezoek aan andere jeugdclubs in de omgeving”, vertelt de voorzitter.

    De viering van het 25-jarig bestaan van JH De Non bestaat uit twee luiken. Zaterdag 4 oktober is er een officiële viering met galabal
    om 20.30u en een week later op 11 oktober volgt een fuif om 21u met twee gratis vaten.',
    'afbeelding' => '25-jarige_Jeugdhuis_De_Non_heeft_oud_Mariabeeld_als_mascotte.jpg',
    'afbeeldingBeschrijving' => 'Jeugdhuis rond Mariabeeld'),

array(
    'titel' => 'PZ Bethaniënhuis neemt actief deel aan Werelddierendag',
    'datum' => '03/10/2014 om 05:16',
    'inhoud' => 'Zoersel - De patiënten van het Psychiatrisch Ziekenhuis Bethaniënhuis beleefden in Sint-Antonius-Zoersel een aangename dag.
    In het kader van Werelddierendag, zaterdag 4 oktober, mochten zij heel wat beestjes knuffelen. En dat deed hen zichtbaar deugd.

    Ter gelegenheid van Werelddierendag nemen heel wat medewerkers hun kat, hond, papegaai, rat, cavia en pony mee naar het werk om de patiënten te
    laten kennismaken met dieren. “Meteen ervaren ze de therapeutische rol die deze beestjes kunnen spelen”, legt Ellen Hermans, ergotherapeute bij de
    dienst vrije tijd uit.

    Uit de praktijk blijkt dat het contact van patiënten met dieren heilzaam werkt. “Het voordeel van dieren is dat ze op onbevooroordeelde wijze affectie
    kunnen geven. Een knuffel helpt veel. Onze patiënten stellen zich daardoor meer open en durven daardoor met hun psychiater
    beter spreken over hun problemen”, aldus nog de therapeute.',
    'afbeelding' => 'PZ_Bethaniënhuis_neemt_actief_deel_aan_Werelddierendag_2.jpg',
    'afbeeldingBeschrijving' => 'Dierenboel')
)



?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cruise Control, veilig?</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="author" href="humans.txt">
</head>
<body>
        <?php if ( !$individueelArtikel ): ?>
    <div id="bigwrapper">
        <?php foreach ( $artikels as $id => $artikel ): ?>
        <div id="wrapper">
            <div id="titel"><h1><?php echo $artikel['titel'] ?></h1>
                <p><?php echo $artikel['datum'] ?></p>
            </div>
            <div id="afbeelding"><img src="img/<?php echo $artikel['afbeelding'] ?>"></img></div>
            <div id="text"><?php echo substr($artikel['inhoud'], 0, 50 )."..."?>
                <a href="001get.php?id=<?php echo $id ?>">Lees Meer...</a>
            </div>
        </div>
    <?php endforeach ?>
    </div>
<?php else : ?>
    <div id="container">
            <div id="titel"><h1><?php echo $artikels[$id]['titel'] ?></h1>
            <p><?php echo $artikels[$id]['datum'] ?></p>
            </div>
            <div id="afbeelding"><img src="img/<?php echo $artikels[$id]['afbeelding'] ?>"></img></div>
            <div id="text"><p><?php echo $artikels[$id]['inhoud']?></p>
            </div>
        </div>

<?php endif?>
<script src="js/main.js"></script>
</body>
</html>