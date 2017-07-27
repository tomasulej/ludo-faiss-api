

<?php
$theme="l-theme-violet";
$prislovia_tab='class="active"';

require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_header.php";
require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_prislovia_header.php";


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
            <h1>Vyhľadávanie v prísloviach <span>máme ich vyše 12-tisíc</span></h1>
           <form action="hladat.php" method="get" id="hladat">
            <!--    <div class="input-group">
                    <input type="text" class="form-control-lg form-control" id="q" name="q" placeholder="Hľadať v piesňach" <?php if ($_GET['q']<>"") {echo "value='".$_GET['q']."'";} ?>>
                    <span class="input-group-btn">
                    <button class="btn btn-lg l-btn--primary" type="button" onclick="$( '#hladat' ).submit();">Hľadať!</button>
                </span>
                </div> -->

            
                <div id="search-box"></div>

            </form>

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
                        <h3 class="list-group-item-heading">Zobraziť len:</h3>
                        
                        <div id="filter_utvar">
                            <!-- RefinementList widget will appear here -->
                        </div>
                        
                    </span>    
                        


                </div>







                <div class="list-group">
                    <span href="#" class="list-group-item list-group-item-action ">
                        <h3 class="list-group-item-heading">Len útvary z témy:</h3>
                        
                        <div id="filter_kategoria">
                            <!-- RefinementList widget will appear here -->
                        </div>
                        
                    </span>    
                        


                </div>


   <div class="list-group">
                    <span href="#" class="list-group-item list-group-item-action ">
                        <h3>Zúžiť pomocou kľúčových slov:</h3>
                        <div id="filter_kluc_slova_spolu" style="align:right">
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



   function detaily(id,kluc) {
        $('#detaily_'+id).load('prislovie_p.php?id='+id);
        $('#sipka_'+id).hide();
  }





</script>

<script>
  
const search = instantsearch({
  appId: 'T0C73PKUJS',
  apiKey: '6b6aaa22a081bdb3ec67737512ed48f2',
  indexName: 'prislovia',
  urlSync: true
});

search.start();



  // initialize RefinementList
  search.addWidget(
    instantsearch.widgets.refinementList({
      container: '#filter_utvar',
      attributeName: 'utvar',
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
  instantsearch.widgets.refinementList({
    container: '#filter_kategoria',
    attributeName: 'kategoria',
       limit: 3,
    showMore: {
        limit:10,
        templates: {
            inactive: '<div><small><a href="javascript:undefined"><i class="fa fa-angle-double-down"></i> Zobraziť viac</a></small></div>',
            active: ""
        }
    }, 
    
    templates: {
        item: "<a href='{{url}}'>{{#isRefined}}<strong>{{/isRefined}}{{value}}{{#isRefined}}</strong>{{/isRefined}}</a> <sup>{{count}}</sup></a>",
 
    
    }
  })
);



  search.addWidget(
    instantsearch.widgets.refinementList({
      container: '#filter_kluc_slova_spolu',
      attributeName: 'kluc_slova_spolu',
      templates: {
          item: "<a href='{{url}}'>{{#isRefined}}<strong>{{/isRefined}}{{value}}{{#isRefined}}</strong>{{/isRefined}}</a> <sup>{{count}}</sup>"
      },
      limit: 7,
    showMore: {
        limit:10,
        templates: {
            inactive: '<div><small><a href="javascript:undefined"><i class="fa fa-angle-double-down"></i> Zobraziť viac</a></small></div>',
            active: ""
        }
    } 

    })
  );

  search.addWidget(
    instantsearch.widgets.hits({
      container: '#hits',
      hitsPerPage: 8,
      templates: {
        empty: 'No results',
        
        item: '<li class="list-group-item justify-content-between"><div class="row"><div class="col-md-11"><big>{{{_highlightResult.txt.value}}}</strong></big><small>({{utvar}})</small><BR><div id="detaily_{{id}}"></div><small><strong>Kategória</strong>: <a href="kategoria.php?id={{kategoria_id}}">{{{_highlightResult.kategoria.value}}}</a></div><div class="col-md-1" id="sipka_{{id}}"><big><strong><a onclick="detaily({{id}})" href="javascript:undefined"><i class="fa fa-angle-double-down"></i></a></big></div></li>'
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

</script>

<?php require $_SERVER["DOCUMENT_ROOT"]."/templates/tmpl_footer.php";?>





