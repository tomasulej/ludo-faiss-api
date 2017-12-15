<?php
    include "hra.php";

?>



<script>
    correctAnswers=<?php echo $lstCorrectAnswers; ?>;
    answersRequired=<?php echo $solution_count_required ?>;
    currentCorrectAnwers=0;

    function UserGuess(id) {
        if (correctAnswers.indexOf(id)>-1) {
            $('#answer-'+id).css("color","green");
            currentCorrectAnwers++;
            CorrectAnswers++;
            $("#count-current-correct").html(currentCorrectAnwers);
            $("#divCorrectAnswers").html(CorrectAnswers);
            if ((answersRequired-currentCorrectAnwers)<1) {
                $('#question').html('<div class="alert alert-success" role="alert"><strong> <i class="fa fa-refresh"></i> Paráda!</strong> Načítavam ďalšiu otázku. </div>');
                setTimeout(function(){ loadQuestion(); }, 1000)

            }
        } else {
            $('#answer-'+id).css("color","red");
        }
    }



</script>


<div id="question">

<div class="card">

    <div class="card-block" >

        <big>Označ <strong>tri slová</strong>, ktoré nejako súvisia s výrazom <strong><?php echo $solution_question; ?></strong>. <span id="count-current-correct" style="color:green">0</span>/<?php echo $solution_count_required ?></big>
        </div>

        <?php foreach ($answers as $id=>$answer) { ?>
            <button type="button" id="answer-<?php echo $answer["id"]; ?>" class="l-btn--large btn-link btn-lg" onclick="UserGuess(<?php echo $answer["id"]; ?>)"><?php echo $answer["word"]?></button>
        <?php }


        ?>

    </div>

</div>
<div style="text-align:right"><button type="button" class="l-btn btn-link btn-sm" onclick="loadQuestion()"> <i class="fa fa-refresh"></i> Vzdávam sa. Ďalšia otázka</button></div>

</div>
