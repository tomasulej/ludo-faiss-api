



    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="otestujsa" id="otestujsa" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title" id="otestovatsa">Poznám ja vôbec noty? Načim sa otestovať!</h3>
                </div>
                <div class="modal-body">

                    <p>Pozri sa na notovú osnovu a <strong>vyber správne odpovede</strong>.</p>

                    <img src="/public/img/noty_otestovat-sa.png" width="100%">

                    <h4>Otázky:</h4>


                    <!-- otázka -->
                    <div class="row">
                     <div class="col-md-8"><strong>Notová osnova začína husľovým kľúčom.</strong></div>
                     <div class="col-md-4">
                         <label class="form-check-inline">
                             <input class="form-check-input" type="radio" name="inlineRadioOptions0" id="0" class="rad" value="1"> Áno</input>
                         </label>
                         <label class="form-check-inline">
                             <input class="form-check-input" type="radio" name="inlineRadioOptions0" id="0" class="rad" value="0"> Nie</input>
                         </label>

                    </div>

                   </div>
                    <div id="odpoved-0"></div>

                    <!-- otázka -->
                    <div class="row">
                        <div class="col-md-8"><strong>Prvá nota v zápise je nota A1.</strong></div>
                        <div class="col-md-4">
                            <label class="form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="1" class="rad" value="1"> Áno</input>
                            </label>
                            <label class="form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="1" class="rad" value="0"> Nie</input>
                            </label>

                        </div>

                    </div>
                    <div id="odpoved-1"></div>

                    <!-- otázka -->
                    <div class="row">
                        <div class="col-md-8"><strong>Prvá nota druhého taktu je štvrťová.</strong></div>
                        <div class="col-md-4">
                            <label class="form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="2" class="rad" value="1"> Áno</input>
                            </label>
                            <label class="form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="2" class="rad" value="0"> Nie</input>
                            </label>

                        </div>

                    </div>
                    <div id="odpoved-2"></div>

                    <!-- otázka -->
                    <div class="row">
                        <div class="col-md-8"><strong>Oba z taktov majú trvanie tri doby.</strong></div>
                        <div class="col-md-4">
                            <label class="form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="3" class="rad" value="1"> Áno</input>
                            </label>
                            <label class="form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="3" class="rad" value="0"> Nie</input>
                            </label>

                        </div>

                    </div>
                    <div id="odpoved-3"></div>

                    <!-- otázka -->
                    <div class="row">
                        <div class="col-md-8"><strong>Druhý takt treba hrať na rozdiel od prvého "tichšie".</strong></div>
                        <div class="col-md-4">
                            <label class="form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions4" id="4" class="rad" value="1"> Áno</input>
                            </label>
                            <label class="form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions4" id="4" class="rad" value="0"> Nie</input>
                            </label>

                        </div>

                    </div>
                    <div id="odpoved-4"></div>


<HR>
                    <div class="alert alert-info" role="alert">Odpovedal(a) si <strong>na väčšinu otázok správne</strong>? Potom sa na Teba tešíme :) Nie? Nevadí, vyplň náš formulár aj tak, my už niečo pre Teba nájdeme :)</div>



                    <script>
                        var spravne_odpovede = [1,0,1,0,0];



                        $('input[type=radio]').on('change', function() {

                            if (spravne_odpovede[this.id]==this.value) {
                                $("#odpoved-"+this.id).html('<div class="alert alert-success" role="alert"><strong>Výborne!</strong> Správna odpoveď:)</div>');

                            } else {

                            $("#odpoved-"+this.id).html('<div class="alert alert-warning" role="alert"><strong>Táto odpoveď veraže nie je správna :(</strong> Netráp sa tým veľmi, skús ďalšiu otázku.</div>');

                            }

                        });




                    </script>



</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" data-dismiss="modal">Zatvoriť</button>

</div>
</div>
</div>
</div>