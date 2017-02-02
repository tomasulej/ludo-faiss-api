<?php

function add_source($txt, $source) {

    switch ($source) {

        case 0:
            $r=$txt;
        break;

        case 1:
            $r=sprintf("[%s]",$txt);
        break;

        case 2:
            $r=sprintf("(%s)",$txt);

            break;

        case 3:
            $r=sprintf("[(%s)]",$txt);
            break;

        case 4:
            $r=sprintf("<i>%s</i>",$txt);
            break;

        case 5:
            $r=sprintf("<i>(%s)</i>",$txt);
            break;

        case 6:
            $r=sprintf("<i>[%s]</i>",$txt);
            break;

        case 7:
            $r=sprintf("<i>([%s])</i>",$txt);
            break;

    }
     return $r;

}

function add_source_vztahy($txt,$source)
{
    switch ($source) {
        case 0:
            $r=$txt;
            break;
        case 1:
            $r=sprintf("<i>%s</i>",$txt);
            break;
        case 2:
            $r=sprintf("%s",$txt);
            break;
        case 3:
            $r=sprintf("[%s]",$txt);
            break;
    }

    return $r;
}






    $nadpis="Schvaľovanie piesní";
    require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_administracia_header.php";
    include $_SERVER["DOCUMENT_ROOT"]."/databaza_piesne.php";


if (!empty($_GET['id_pridat'])) {
    $id_pridat=(int)$_GET['id_pridat'];
    $q=mysql_query("UPDATE piesne SET stav=1 WHERE id_piesen=$id_pridat");
    ?> <div class="alert alert-success" role="alert"><strong>Pieseň je schválená</strong> Ak si dačo doplietol, tak si ma nepraj!</div> <?php

}





$query="SELECT piesne.id_piesen, piesne.id_nadriadeny, piesne.typ_nadriadeny, piesne.nazov_variant, piesne.id_zbierka, 
piesne.strana, piesne.nazov_variant, piesne.id_nadriadeny, piesne.identifikator, piesne.nazov_dlhy, piesne.nazov_kratky, 
piesne.id_zberatel, piesne.source_zberatel, piesne.id_zberatel_miesto, piesne.source_zberatel_miesto, piesne.id_zberatel_vyskyt,
piesne.source_zberatel_vyskyt, piesne.datum_zbieranie, piesne.source_datum_zbieranie, 
miesto1.meno as zberatel_miesto,
miesto2.meno as zberatel_vyskyt,

piesne.datum_digitalizacia, piesne.id_digitalizator, 
piesne.id_digitalizator2, piesne.id_hudba,piesne.id_tempo, piesne.id_tempo2, piesne.source_tempo, piesne.source_tempo2, piesne.id_incipit, piesne.lyrics, piesne.file_xml, piesne.file_png, piesne.file_mp3, piesne.file_pdf, zbierky.nazov as zbierky_nazov, zberatelia.meno as zberatelia_meno, 
digitalizatori.meno as digitalizatori_meno, digitalizatori2.meno as digitalizatori2_meno,  hudobnici.meno as hudobnici_meno, t1.tempo as tempo1, t2.tempo as tempo2, t1.bpm as bpm1, t2.bpm as bpm2 FROM piesne LEFT JOIN zbierky ON piesne.id_zbierka=zbierky.id_zbierka LEFT JOIN zberatelia on piesne.id_zberatel=zberatelia.id_zberatel
LEFT JOIN digitalizatori AS digitalizatori ON piesne.id_digitalizator = digitalizatori.id_digitalizator
LEFT JOIN digitalizatori AS digitalizatori2 ON piesne.id_digitalizator2 = digitalizatori2.id_digitalizator

LEFT JOIN hudobnici ON piesne.id_hudba=hudobnici.id_hudba
LEFT JOIN tempo AS t1 ON piesne.id_tempo <=> t1.id_tempo
LEFT JOIN tempo AS t2 ON piesne.id_tempo2 <=> t2.id_tempo
LEFT JOIN lokality AS miesto1 ON piesne.id_zberatel_miesto <=> miesto1.id_lokalita
LEFT JOIN lokality AS miesto2 ON piesne.id_zberatel_vyskyt <=> miesto2.id_lokalita


WHERE stav=0 AND digitalizatori2.meno<>'' ORDER BY datum_digitalizacia DESC";


$q=mysql_query($query);

?>


<div class="l-page">

    <div class="container">

        <table class="table table-responsive table-sm">
            <tr>
                <th>IČ</th>
                <th></th>

                <th>Názov</th>
                <th></th>

                <th>Tempá</th>
                <th>Zberateľ</th>
                <th>Miesto</th>
                <th>Výskyt</th>
                <th>Dátum zozbierania</th>
                <th>Prepojenia</th>
                <th>Poznámky</th>


                <th>Digitalizátori</th>


            </tr>

            <?php while ($piesen=mysql_fetch_object($q)) { ?>
            <tr>
                <td><?php echo $piesen->identifikator; ?></td>

                <td>           <a href="/piesne/stiahnut.php?id=<?php $piesen->id_piesen;?>&format=xml"><span class="fa-file-code-o fa"></span></a>
                    <a href="/piesne/stiahnut.php?id=<?php echo $piesen->id_piesen;?>&format=pdf"><span class="fa-file-pdf-o fa"></span></a></td>


                <td><a href="/piesne/piesen.php?<?php echo $piesen->id_piesen;?>" target="_blank"><?php echo $piesen->nazov_kratky; ?></a>

                </td>

                <td><a href="piesne_odoslat/03_abc.php?id_piesen=<?php echo $piesen->id_piesen;?>" target="_blank"><span class="fa fa-pencil-square-o"> </span></a>
                    <a href="schvalovanie.php?id_pridat=<?php echo $piesen->id_piesen; ?>"><span class="fa fa-thumbs-up"> </span></a></td>




                <td><?php echo add_source($piesen->tempo1, $piesen->source_tempo); ?> <?php echo add_source($piesen->tempo2, $piesen->source_tempo2); ?></td>
                <td><?php echo add_source($piesen->zberatelia_meno,$piesen->source_zberatel); ?></td>
                <td><?php echo add_source($piesen->zberatel_miesto, $piesen->source_zberatel_miesto); ?></td>
                <td><?php echo add_source($piesen->zberatel_vyskyt, $piesen->source_zberatel_vyskyt); ?></td>
                <td><?php echo add_source($piesen->datum_zbieranie, $piesen->source_datum_zbieranie); ?></td>
                <td>
                <?php
                    $q_vztahy=mysql_query("SELECT id_piesen1, id_piesen2, id_vztah, txt_piesen2, piesne.identifikator FROM vztahy_piesne LEFT JOIN piesne ON piesne.id_piesen=id_piesen1 OR piesne.id_piesen=id_piesen2 WHERE id_piesen1=$piesen->id_piesen OR id_piesen2=$piesen->id_piesen");
                    while ($vztahy=mysql_fetch_object($q_vztahy)) {


                        if ($vztahy->txt_piesen2==""){
                            if ($vztahy->identifikator<>$piesen->identifikator) {
                            echo add_source_vztahy($vztahy->identifikator, $vztahy->id_vztah)." - ";}
                        } else {
                            echo $vztahy->txt_piesen2." - ";
                        }
                     }


                ?>

                </td>

                <td>
                    <?php
                        $q_poznamky=mysql_query("SELECT * FROM poznamky WHERE id_piesen=$piesen->id_piesen");
                        $i=0;
                        while ($poznamky=mysql_fetch_object($q_poznamky)) {
                            $i++;
                            printf("<a title='%s'>%s</a> ",$poznamky->txt, $i);
                        }

                    ?>

                </td>


                <td><?php echo $piesen->digitalizatori_meno; ?>, <?php echo $piesen->digitalizatori2_meno; ?></td>




            </tr>
            <?php } ?>


        </table>


    </div>


</div>

<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })

</script>

<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php"?>

