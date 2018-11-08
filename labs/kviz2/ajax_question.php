<?php
    include "hra.php";

?>



<script>
    //correctAnswers=<?php echo $lstCorrectAnswers; ?>;
    answersRequired=<?php echo $solution_count_required; ?>;
    currentCorrectAnswers=0;
    currentGuess1=-1;
    currentGuess2=-1;
    currentKarticka1=-1;
    currentKarticka2=-1;
    function UserGuess(id,Karticka) {

                    $('#karticka-'+Karticka).addClass("bg-warning");


        if (currentGuess1==-1) {
            currentGuess1=id;
            currentKarticka1=Karticka;

        } else if (currentGuess2==-1) {
            currentGuess2=id;
            currentKarticka2=Karticka;

            
        } else {
            currentGuess1=id;
            currentKarticka1=Karticka;

            currentGuess2=-1;
            currentKarticka2=-1;

        }

//alert(currentGuess1+" ::"+currentGuess2);

       if (currentGuess1>-1) {
           if (currentGuess2>-1){
               if ((currentGuess1==currentGuess2) && (currentKarticka1!=currentKarticka2)) {
                    CorrectAnswers++;
                    currentCorrectAnswers++;
                    currentGuess1=-1;
                    currentGuess2=-1; 
                    //alert(currentCorrectAnswers);
                    $("#divCorrectAnswers").html(CorrectAnswers);
                    $('.karticka-'+id).removeClass("bg-warning").addClass("bg-success");
                    //$( ".karticka-"+id).each(function() {$( this ).prop("onclick","alert('sss')");$(this).off('click')});
                    $('.answer-'+id).prop("onclick", null);
                    $('.answer-'+id).off('click'); 
 

                }  else {
                    currentGuess1=-1;
                    currentGuess2=-1;   
                    currentKarticka1=-1;
                    currentKarticka2=-1;
                    $( ".karticka" ).each(function() {$( this ).removeClass( "bg-warning" ).addClass("bg-primary");});
                    $('#karticka-'+Karticka).effect("shake");

                }
            } } 

            if ((answersRequired-currentCorrectAnswers)<1) {
                $('#question').html('<div class="alert alert-success" role="alert"><strong> <i class="fa fa-refresh"></i> Paráda!</strong> Načítavam ďalšiu otázku. </div>');
                setTimeout(function(){ loadQuestion(); }, 500)

            }

       // if (correctAnswers.indexOf(id)>-1) {
       /*
            $('#answer-'+id).css("color","green");
            currentCorrectAnwers++;
            CorrectAnswers++;
            $("#count-current-correct").html(currentCorrectAnwers);
            $("#divCorrectAnswers").html(CorrectAnswers);



        } else {
            $('#answer-'+id).css("color","red");
        } */
    }



</script>


<div id="question">



        <p><big>Hľadaj <strong>dvojice slov</strong>, ktoré <strong>spolu súvisia</strong>. Koľko toho stihneš za minútu?</big></p>
        </div>

<style>
.karticka {
    float: left;
    padding: 0.1rem;
    width:100%;
    height:6vh;
    margin-bottom: 0.2rem;
    border: 0;
    text-align:center
}
</style>
 




        <?php 
        $idKarticka=0;
        foreach ($answers as $id=>$answer) { 
            $idKarticka++;
            $arrMoznosti[]=sprintf('<div class="col-md-4 col-4 "><a id="answer-%s-1" class="answer-%s " onclick="UserGuess(%s,%s)"><div id="karticka-%s" class="card d-flex bg-primary text-white karticka karticka-%s"><div class="card-body align-items-center d-flex justify-content-center">%s</div></div></div></a>', $id,$id,$id, $idKarticka,$idKarticka, $id,  $answer["word_1"]);
            $idKarticka++;
            $arrMoznosti[]=sprintf('<div class="col-md-4 col-4 "><a id="answer-%s-2" class="answer-%s  " onclick="UserGuess(%s,%s)"><div id="karticka-%s" class="card d-flex bg-primary text-white karticka karticka-%s"><div class="card-body align-items-center d-flex justify-content-center">%s</div></div></div></a>',$id,$id,$id, $idKarticka,$idKarticka, $id,  $answer["word_2"]);
        }
        shuffle($arrMoznosti);

        $tmpl_row='<div class="row">%s</div>';

        $countAnswers=0;
        printf('<div class="row">');

        foreach($arrMoznosti as $moznost) {  
            $countAnswers++;
            if (($countAnswers % 3)==1) {
                $zaciatok='</div><div class="row">';
                $koniec='';
            } else { 
                $zaciatok='';
                $koniec='';
            }

            printf($zaciatok);
            printf($moznost);
            printf($koniec);

        }

        ?>


</div>
