<?php
    include "hra.php";

?>



<script>
    //correctAnswers=<?php echo $lstCorrectAnswers; ?>;
    //answersRequired=<?php echo $solution_count_required ?>;
    currentCorrectAnswers=0;
    currentGuess1=-1;
    currentGuess2=-1;
    function UserGuess(id) {

        if (currentGuess1==-1) {
            currentGuess1=id;

        } else if (currentGuess2==-1) {
            currentGuess2=id;
        } else {
            currentGuess1=id;
            currentGuess2=-1;
        }

//alert(currentGuess1+" ::"+currentGuess2);

       if (currentGuess1>-1) {
           if (currentGuess2>-1){
               if (currentGuess1==currentGuess2) {
                    CorrectAnswers++;
                    currentCorrectAnswers++;
                    //alert(currentCorrectAnswers);
                    $("#divCorrectAnswers").html(currentCorrectAnswers);
                    $('.answer-'+id).css("color","green");
                    currentGuess1=-1;
                    currentGuess2=-1;  

                }  else {
                    currentGuess1=-1;
                    currentGuess2=-1;   


                }
            } } 
       // if (correctAnswers.indexOf(id)>-1) {
       /*
            $('#answer-'+id).css("color","green");
            currentCorrectAnwers++;
            CorrectAnswers++;
            $("#count-current-correct").html(currentCorrectAnwers);
            $("#divCorrectAnswers").html(CorrectAnswers);
            if ((answersRequired-currentCorrectAnwers)<1) {
                $('#question').html('<div class="alert alert-success" role="alert"><strong> <i class="fa fa-refresh"></i> Paráda!</strong> Načítavam ďalšiu otázku. </div>');
                setTimeout(function(){ loadQuestion(); }, 500)

            }
        } else {
            $('#answer-'+id).css("color","red");
        } */
    }



</script>


<div id="question">

<div class="card">

    <div class="card-block" >

        <big>Hľadaj dvojice slov, ktoré spolu súvisia</big>
        </div>

        <?php 
        foreach ($answers as $id=>$answer) { 
            $arrMoznosti[]=sprintf('<button type="button" id="answer-%s-1" class="answer-%s l-btn--large btn-link btn-lg" onclick="UserGuess(%s)">%s</button>',$id,$id,$id,$answer["word_1"]);
            $arrMoznosti[]=sprintf('<button type="button" id="answer-%s-2" class="answer-%s l-btn--large btn-link btn-lg" onclick="UserGuess(%s)">%s</button>',$id,$id,$id,$answer["word_2"]);
        }
        shuffle($arrMoznosti);

        foreach($arrMoznosti as $moznost) {printf($moznost);}

        ?>


    </div>

</div>

</div>
