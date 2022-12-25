<?php
$file = file_get_contents('route-list-kyoto.txt', true);
$strR = str_replace('-', '', $file);
$strR2 = str_replace('+', '', $strR);
$arrs = explode('| ', $strR2);

$exclude = [];
for ($i = 0; $i <= 7; $i++) {
    array_push($exclude, $arrs[$i]);
}

$outExclude = array_values(array_diff($arrs, $exclude));
$countElementArrayToGenerateSubArray = count($outExclude);
$numberSubArray = $countElementArrayToGenerateSubArray/5;
//print_r($outExclude);

$arrElements = [];

for($i = 0; $i < $numberSubArray; $i++) {
    $arrElements[$i] = [];
    $num = 0;
    foreach($outExclude as $key => $val){
        if(++$num > 5) break;
        $arrElements[$i][$key] = $val;
        unset($outExclude[$key]);
    }
}

print_r($arrElements);
//$resetArrs = array_map('array_values', $arrElements);
//$method = "";
//$url = "";
//$routeName = "";
//$action = "";
//$str = "";
//$middleware = "";
//$middlewareGroups = [];
//$flagCheckMiddle = 0;
//foreach ($resetArrs as $item) {
//    $item[0] = str_replace(" ", "",$item[0]);
//    $item[1] = str_replace(" ", "",$item[1]);
//    $item[2] = str_replace(" ", "",$item[2]);
//    $item[3] = str_replace(" ", "",$item[3]);
//    $item[4] = str_replace(" ", "",$item[4]);
//    $item[4] = str_replace("|", "",$item[4]);
//    // process method
//    if ($item[0] == "POST") {
//        $method = "post";
//    }
//
//    if ($item[0] == "GET|HEAD") {
//        $method = "get";
//    }
//
//    if ($item[0] == "PUT") {
//        $method = "put";
//    }
//
//    if ($item[0] == "GET|HEAD|POST|PUT|PATCH|DELETE") {
//        continue;
//    }
//
//    //process url
//    $url = $item[1];
//
//    //process routename
//    if (!empty($item[2])) {
//        $routeName = trim("->name($item[2]);");
//    } else {
//        $routeName = ";";
//    }
//    //process action
//    $a = "App\Http\Controllers\'";
//    if (str_contains($item[3],"App\Http\Controllers")) {
//        $action = '"' .substr($item[3], 21) .'"';
//    } else {
//        $action = 'function() {}';
//    }
//
//    $middleware = $item[4];
//    array_push($middlewareGroups, $middleware);
//    $str .= 'Route::' . $method . '("'. $url. '",'. $action . ')' .$routeName;
////    echo $str;
////    echo "--------------------------";
////    break;
//}
//$allRoutes = explode(";", $str);
//$middlewareGroups = array_values(array_unique($middlewareGroups));
//
//$arrsMiddleware = [];
//foreach ($middlewareGroups as $middlewareGroup) {
////    echo $middlewareGroup;
////    $arrsMiddleware[$middlewareGroup] = [];
//    foreach ($allRoutes as $route) {
//        echo $route;
////        if (str_contains($middlewareGroup, $route)) {
////            array_push($arrsMiddleware[$middlewareGroup], $route);
////        }
//    }
//}
////print_r($arrsMiddleware);
