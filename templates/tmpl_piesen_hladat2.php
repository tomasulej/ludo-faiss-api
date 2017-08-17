

<?php
$theme="l-theme-green";
$prislovia_tab='class="active"';

require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_piesne_header.php";


?>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.0.0/dist/instantsearch.min.css">
<script src="https://cdn.jsdelivr.net/npm/instantsearch.js@2.0.0/dist/instantsearch.min.js"></script>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=619723681422597";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<div class="l-page l-search l-list">

    <div class="container">

        <div class="l-search-header">
            <h1>Vyhľadávanie v piesňach <span>máme ich vyše päťtisíc</span></h1>
            <!--    <div class="input-group">
                    <input type="text" class="form-control-lg form-control" id="q" name="q" placeholder="Hľadať v piesňach" <?php if ($_GET['q']<>"") {echo "value='".$_GET['q']."'";} ?>>
                    <span class="input-group-btn">
                    <button class="btn btn-lg l-btn--primary" type="button" onclick="$( '#hladat' ).submit();">Hľadať!</button>
                </span>
                </div> -->

            
                <div id="search-box"></div>


              <!--      <div class="input-group">
                <input id="q" type="text" class="form-control-lg form-control" placeholder="Hľadať v piesňach">
                <span class="input-group-btn">
                    
                </span>
            </div>-->
        
        

     
      
      <div id="current-refined-values">
  <!-- CurrentRefinedValues widget will appear here -->
</div>


        </div>

    </div>



    <div class="container">
<div class="row">
          <div class="col-md-4 l-list-filter">

          <div class="list-group">
                    <span href="#" class="list-group-item list-group-item-action ">
                        <h3 class="list-group-item-heading">Iba piesne:</h3>
                        
                        <div id="filter_tempo_bpm">
                            <!-- RefinementList widget will appear here -->
                        </div>
                        
                    </span>    
                        


                </div>



               <div class="list-group">
                    <span href="#" class="list-group-item list-group-item-action ">
                        <h3 class="list-group-item-heading">Tempo:</h3>
                        
                        <div id="filter_tempo">
                            <!-- RefinementList widget will appear here -->
                        </div>
                        
                    </span>    
                        


                </div>




                <div class="list-group">
                    <span href="#" class="list-group-item list-group-item-action ">
                        <h3 class="list-group-item-heading">Týkajúce sa miest:</h3>
                        
                        <div id="filter_miesta">
                            <!-- RefinementList widget will appear here -->
                        </div>
                        
                    </span>    
                        


                </div>

                 <div class="list-group">
                    <span href="#" class="list-group-item list-group-item-action ">
                        
                        <h3 class="list-group-item-heading">Kľúčové slová:</h3>


                        <div id="filter_slova">
                            <!-- RefinementList widget will appear here -->
                        </div>
                        
                    </span>    
                        


                </div>

                    
                <div class="list-group">
                    <span href="#" class="list-group-item list-group-item-action ">
                        <h3 class="list-group-item-heading">Zberatelia:</h3>
                        
                        <div id="filter_zberatelia_meno">
                            <!-- RefinementList widget will appear here -->
                        </div>
                        
                    </span>    
                        


                </div>

              
                <div class="list-group">
                    <span href="#" class="list-group-item list-group-item-action ">
                        <h3 class="list-group-item-heading">Digitalizátori:</h3>
                        
                        <div id="filter_digitalizatori">
                            <!-- RefinementList widget will appear here -->
                        </div>
                        
                    </span>    
                        


                </div>




            </div>



<div class="col-md-8">






        <div class="l-list-items">
            <ul class="list-group">
            <div id="hits">
                
            
            </div>



            </ul>

            <div id="strankovanie"></div>

        </div>
</div>



</div>
        </div>



    </div>


<script>



  



</script>

<script>
  
const search = instantsearch({
  appId: 'DHW83XWZZX',
  apiKey: 'f0ec738b685449a2d75e33f5851d2514',
  indexName: 'piesne',
  urlSync: true
});

search.start();



search.addWidget(
    instantsearch.widgets.numericSelector({
      container: '#filter_tempo_bpm',
      attributeName: 'tempo_bpm',
      operator: '>=',
      options: [
        {label: 'Všetky piesne ({{count}})', value: 0},
        {label: 'Len pomalé', value: 50},
        {label: 'Stredne rýchle', value: 90},
        {label: 'Rýchle', value: 110}
      ]
    })
  );




  // initialize RefinementList
  search.addWidget(
    instantsearch.widgets.refinementList({
      container: '#filter_slova',
      attributeName: 'slova',
      limit: 3,
    showMore: {
        limit:10,
        templates: {
            inactive: '<div><small><a href="javascript:undefined"><i class="fa fa-angle-double-down"></i> Zobraziť viac</a></small></div>',
            active: ""
        }
    }, 
  
        templates: {
            item:    '<input class="{{cssClasses.checkbox}}" type="checkbox" value="{{value}}" {{#isRefined}}checked{{/isRefined}}>  {{value}} <sup>{{count}}</sup>',
 

        },
        cssClasses: {
            header: 'd-inline-block',
            //body: 'd-inline-block',
            //item: 'd-inline-block '

        }


    })
  );

  // initialize RefinementList
  search.addWidget(
    instantsearch.widgets.refinementList({
      container: '#filter_miesta',
      attributeName: 'miesta',
      limit: 3,
    showMore: {
        limit:10,
        templates: {
            inactive: '<div><small><a href="javascript:undefined"><i class="fa fa-angle-double-down"></i> Zobraziť viac</a></small></div>',
            active: ""
        }
    }, 
  
        templates: {
            item:    '<input class="{{cssClasses.checkbox}}" type="checkbox" value="{{value}}" {{#isRefined}}checked{{/isRefined}}>  {{value}} <sup>{{count}}</sup>',
 

        },
        cssClasses: {
            header: 'd-inline-block',
            //body: 'd-inline-block',
            //item: 'd-inline-block '

        }


    })
  );


  // initialize RefinementList
  search.addWidget(
    instantsearch.widgets.refinementList({
      container: '#filter_tempo',
      attributeName: 'tempo',
      limit: 3,
    showMore: {
        limit:10,
        templates: {
            inactive: '<div><small><a href="javascript:undefined"><i class="fa fa-angle-double-down"></i> Zobraziť viac</a></small></div>',
            active: ""
        }
    }, 
  
        templates: {
            item:    '<input class="{{cssClasses.checkbox}}" type="checkbox" value="{{value}}" {{#isRefined}}checked{{/isRefined}}>  {{value}} <sup>{{count}}</sup>',
 

        },
        cssClasses: {
            header: 'd-inline-block',
            //body: 'd-inline-block',
            //item: 'd-inline-block '

        }


    })
  );


  // initialize RefinementList
  search.addWidget(
    instantsearch.widgets.refinementList({
      container: '#filter_digitalizatori',
      attributeName: 'digitalizatori',
      limit: 3,
    showMore: {
        limit:10,
        templates: {
            inactive: '<div><small><a href="javascript:undefined"><i class="fa fa-angle-double-down"></i> Zobraziť viac</a></small></div>',
            active: ""
        }
    }, 
  
        templates: {
            item:    '<input class="{{cssClasses.checkbox}}" type="checkbox" value="{{value}}" {{#isRefined}}checked{{/isRefined}}>  {{value}} <sup>{{count}}</sup>',
 

        },
        cssClasses: {
            header: 'd-inline-block',
            //body: 'd-inline-block',
            //item: 'd-inline-block '

        }


    })
  );
  
  // initialize RefinementList
  search.addWidget(
    instantsearch.widgets.refinementList({
      container: '#filter_zberatelia_meno',
      attributeName: 'zberatelia_meno',
      limit: 3,
    showMore: {
        limit:10,
        templates: {
            inactive: '<div><small><a href="javascript:undefined"><i class="fa fa-angle-double-down"></i> Zobraziť viac</a></small></div>',
            active: ""
        }
    }, 
  
        templates: {
            item:    '<input class="{{cssClasses.checkbox}}" type="checkbox" value="{{value}}" {{#isRefined}}checked{{/isRefined}}>  {{value}} <sup>{{count}}</sup>',
 

        },
        cssClasses: {
            header: 'd-inline-block',
            //body: 'd-inline-block',
            //item: 'd-inline-block '

        }


    })
  );


  search.addWidget(
    instantsearch.widgets.hits({
      container: '#hits',
      hitsPerPage: 8,
      templates: {
        empty: 'No results',
        item: '<div class="l-song-item l-well"><h3><a href="piesen.php?{{id_piesen}}">{{{_highlightResult.nazov_dlhy.value}}}</a></h3><a class="l-btn l-btn--primary l-btn--small l-btn--play" id="playpause_p_{{id_piesen}}" onclick="playpause(\'#aud_{{id_piesen}}\',\'#playpause_p_{{id_piesen}}\');" ><i class="fa fa-play"></i></a><audio id="aud_{{id_piesen}}" controls="controls" src="data/{{id_piesen}}/{{file_mp3}}" style="display:none" onended="alert(\'j\');">Your browser does not support the audio element.</audio><div class="row"><div class="col-md-4"><img src="data/{{id_piesen}}/{{file_png}}" class="t"></div><div class="col-md-8 hidden-sm-down"><p><i>{{{_highlightResult.lyrics_snippet.value}}}</i></p><a  href="piesen.php?{{id_piesen}}" class="l-btn l-btn--primary l-btn--small"><i class="fa fa-music"></i> Zobraziť celú pieseň</a></div></div></div>'
      }
    })
  );

  // initialize SearchBox
  search.addWidget(
    instantsearch.widgets.searchBox({
      container: '#search-box',
      wrapInput: false,
      placeholder: 'Hľadaj',
      cssClasses: {input: 'form-control-lg form-control', root: 'input-group'},
      poweredBy: true,

    })
  );








  search.addWidget(
    instantsearch.widgets.currentRefinedValues({
      container: '#current-refined-values',
      cssClasses: {
          body: 'd-inline-block',
          item: 'tag d-inline-block',
          link: 'tag tag-default fa fa-close'
      },
      templates: {
          header: '<Strong> Filtre: </strong>'
          //clearAll: '<div><small><a href="{{url}}"><i class="fa fa-angle-double-down"></i> Vymazať všetky filtre</a></small></div>'

      },
      // This widget can also contain a clear all link to remove all filters,
      // we disable it in this example since we use `clearAll` widget on its own.
      clearAll: false
    })
  );



search.addWidget(
  instantsearch.widgets.pagination({
    container: '#strankovanie',
    cssClasses: {
        root: 'pagination',
        item: 'page-item',
        link: 'page-link',
        active: 'active'
    },
    scrollTo: 'h2',
    labels: {
       next: 'Ďalšia strana >',
       previous: '< Predchádzajúca' 
    },
    maxPages: 20,
    // default is to scroll to 'body', here we disable this behavior
    scrollTo: false,
    showFirstLast: false,
  })
);



  search.start();


    function playpause(media_id,button_id) 
    {
     if ($(media_id)[0].paused) {
        $(media_id).trigger('play');
        $(button_id+' i').attr('class', "fa fa-pause");
    
     } else {    
        $(media_id).trigger('pause');
        $(button_id+' i').attr('class', "fa fa-play");
     }    
    }


</script>

<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php";?>





