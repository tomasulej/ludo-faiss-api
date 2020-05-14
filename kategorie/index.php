<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
$p=$_GET['p'];
if ($p=="knihy") {$p="detske";}
include "config.php";

// --------------------------------------------------

//nazov
$nazov=$config[$p]["name"];


//breadcrumbs

//home
$breadcrumbs="<a class=\"breadcrumbs__item text-medium link\" href=\"#\">
                            <svg class=\"icon icon-breadcrumbs icon--small text-color-grey\" role=\"img\" aria-hidden=\"true\">
                              <use xlink:href=\"icons_/app.svg#icon-breadcrumbs\"></use>
                            </svg></a>";
$breadcrumb_icon="<svg class=\"icon icon-chevron-right icon--small text-color-grey\" role=\"img\" aria-hidden=\"true\">
                  <use xlink:href=\"icons_/app.svg#icon-chevron-right\"></use></svg>";


foreach ($config[$p]["breadcrumbs"] as $b) {
    $breadcrumbs .= $breadcrumb_icon;
    $b_s = explode(":", $b);
    if ($b_s[1] <> "") {
        $breadcrumbs .= sprintf("<a class=\"breadcrumbs__item text-medium link\" href=\"index.php?p=%s\"><span>%s</span></a>", $b_s[1], $config[$b_s[0]]["name"]);
    } else {
        $breadcrumbs .= sprintf("<span class='text-medium'>%s</span></a>", $config[$b_s[0]]["name"]);
    }
}




//subs
    $tmplSubs="<a class=\"carousel-lite__slide text-space-right flex align-items-middle\" style=\"width: 12rem; border: 1px solid #eee; padding: 10px 20px;\" href='index.php?p=%s'><i class=\"%s fa-3x fa-fal text-color-error text-space-right\"></i><span class=\"link line-small\">%s</span></a>";
    foreach ($config[$p]["subs"] as $s) {
        $subs.=sprintf($tmplSubs,$config[$s]["link"],$config[$s]["icon"],$config[$s]["name"]);
    }

if (count($config[$p]["subs"])>0) {
    $subs="<a class=\"carousel-lite__slide text-space-right flex align-items-middle\" style=\"width: 12rem; border: 1px solid #eee; padding: 10px 20px;\" href=\"#produkty\"><i class=\"fal fa-3x fa-fal fa-books text-color-error text-space-right\"></i><span class=\"link line-small\">Všetky</span></a>".$subs;
};



//filters
$tmplCheckbox="<div class=\"checkbox\" >
                                <input onclick='addFilter(\"%s (%s)\");' class=\"radiocheck__input\" type=\"checkbox\" id=\"%s\">
                                <label class=\"radiocheck__control\" for=\"%s\"></label>
                                <label class=\"radiocheck__label\" for=\"%s\">%s <span class=\"text-color-grey\">(%s)</span></label>
                              </div>";

$tmplFilters="<dl class=\"filter-small__cat\">
                      <dt class=\"filter-small__cat-name\">
                        <div class=\"btn-layout--vertical no-mrg-bottom\">
                          <button class=\"btn btn--clean btn--icon-right btn--lowercase text-left no-pad-left no-pad-right text-transform-none text-color-black\" data-toggle=\"self, #filter-product-type\" data-toggle-icon=\"../icons_/app.svg#icon-chevron-down\" data-collapse-trigger>%s
<svg class=\"icon icon-chevron-up icon--medium text-color-grey\" role=\"img\" aria-hidden=\"true\">
                                                <use xlink:href=\"icons_/app.svg#icon-chevron-up\"></use>
                                              </svg>
                          </button>
                        </div>
                      </dt>
                      <dd class=\"filter-small__cat-items\" id=\"filter-product-type\" data-toggle-class=\"hide\">
                        <div class=\"form-control form-control--group no-mrg-bottom\">
                          <div class=\"radiocheck-group\">
                            <div class=\"form-control form-control--checkbox\">

                            %s

                            </div>
                          </div>
                        </div>
                      </dd>
                    </dl>";

foreach ($config[$p]["filters"] as $f) {
    $filters_checkbox="";
    foreach ($filter[$f]["subs"] as $fs) {
        $f_s = explode(":", $fs);

        $filters_checkbox.=sprintf($tmplCheckbox,$filter[$f]["name"],$f_s[0], $f_s[0],$f_s[0],$f_s[0],$f_s[0],(!empty($f_s[1]))?$f_s[1]:rand(0,50));
    }
    $filters.=sprintf($tmplFilters,$filter[$f]["name"],$filters_checkbox);

}




require ("category-nav.php");
?>