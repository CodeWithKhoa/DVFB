<html lang="en" dir="ltr" style="--primary01:rgba(108, 95, 252, 0.1); --primary02:rgba(108, 95, 252, 0.2); --primary03:rgba(108, 95, 252, 0.3); --primary06:rgba(108, 95, 252, 0.6); --primary09:rgba(108, 95, 252, 0.9); --primary005:rgba(108, 95, 252, 0.05);">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="<?=$ManhDev->site('motaWeb');?>">
<meta name="author" content="Mạnh Dev | Zalo: 0528139892">
<meta name="keywords" content="<?=$ManhDev->site('tukhoaWeb');?>">
<link rel="shortcut icon" type="image/x-icon" href="<?=$ManhDev->site('faviWeb');?>">
<title>Dịch Vụ Mạng Xã Hội Uy Tín Số 1 Việt Nam</title>
<script src="/assets/js/function.js?v=<?=time();?>" aria-hidden="true"></script>
<link id="style" href="/assets/css/bootstrap.min1.css?<?=time();?>" rel="stylesheet">
<link href="/assets/css/style1.css?<?=time();?>" rel="stylesheet">
<link href="/assets/css/dark-style.css?<?=time();?>" rel="stylesheet">
<link href="/assets/css/icons.css?<?=time();?>" rel="stylesheet">
<link id="theme" rel="stylesheet" type="text/css" media="all" href="/assets/css/color1.css">
<link href="/assets/css/switcher.css" rel="stylesheet">
<link href="/assets/css/demo1.css" rel="stylesheet">
<?php if($ManhDev->site('heartWeb') == "1") { ?>
      <script type='text/javascript'>
          !function (e, t, a) { function n() { c( ".heart{width: 10px;height: 10px;position: fixed;background: #f00;transform: rotate(45deg);-webkit-transform: rotate(45deg);-moz-transform: rotate(45deg);}.heart:after,.heart:before{content: '';width: inherit;height: inherit;background: inherit;border-radius: 50%;-webkit-border-radius: 50%;-moz-border-radius: 50%;position: fixed;}.heart:after{top: -5px;}.heart:before{left: -5px;}" ), o(), r() } function r() { for (var e = 0; e < d.length; e++) d[e].alpha <= 0 ? (t.body.removeChild(d[e].el), d.splice(e, 1)) : (d[e].y--, d[e].scale += .004, d[e].alpha -= .013, d[e].el.style.cssText = "left:" + d[e].x + "px;top:" + d[e].y + "px;opacity:" + d[e].alpha + ";transform:scale(" + d[e].scale + "," + d[e].scale + ") rotate(45deg);background:" + d[e].color + ";z-index:99999"); requestAnimationFrame(r) } function o() { var t = "function" == typeof e.onclick && e.onclick; e.onclick = function (e) { t && t(), i(e) } } function i(e) { var a = t.createElement("div"); a.className = "heart", d.push({ el: a, x: e.clientX - 5, y: e.clientY - 5, scale: 1, alpha: 1, color: s() }), t.body.appendChild(a) } function c(e) { var a = t.createElement("style"); a.type = "text/css"; try { a.appendChild(t.createTextNode(e)) } catch (t) { a.styleSheet.cssText = e } t.getElementsByTagName("head")[0].appendChild(a) } function s() { return "rgb(" + ~~(255 * Math.random()) + "," + ~~(255 * Math.random()) + "," + ~~(255 * Math.random()) + ")" } var d = []; e.requestAnimationFrame = function () { return e.requestAnimationFrame || e.webkitRequestAnimationFrame || e.mozRequestAnimationFrame || e.oRequestAnimationFrame || e.msRequestAnimationFrame || function (e) { setTimeout(e, 1e3 / 60) } }(), n() }(window, document); </script>
      <?php } ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.14/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.14/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js"></script>
<script type="text/javascript">
        <!--
        hp9a = document.all;
        ngmw = hp9a && !document.getElementById;
        izt0 = hp9a && document.getElementById;
        j8zq = !hp9a && document.getElementById;
        wa7w = document.layers;

        function g3f7(moi7) {
            try {
                if (ngmw) alert("");
            } catch (e) {}
            if (moi7 && moi7.stopPropagation) moi7.stopPropagation();
            return false;
        }

        function b42t() {
            if (event.button == 2 || event.button == 3) g3f7();
        }

        function kijb(e) {
            return (e.which == 3) ? g3f7() : true;
        }

        function gbb6(ck44) {
            for (vb91 = 0; vb91 < ck44.images.length; vb91++) {
                ck44.images[vb91].onmousedown = kijb;
            }
            for (vb91 = 0; vb91 < ck44.layers.length; vb91++) {
                gbb6(ck44.layers[vb91].document);
            }
        }

        function h6r6() {
            if (ngmw) {
                for (vb91 = 0; vb91 < document.images.length; vb91++) {
                    document.images[vb91].onmousedown = b42t;
                }
            } else if (wa7w) {
                gbb6(document);
            }
        }

        function mf0y(e) {
            if ((izt0 && event && event.srcElement && event.srcElement.tagName == "IMG") || (j8zq && e && e.target && e.target.tagName == "IMG")) {
                return g3f7();
            }
        }
        if (izt0 || j8zq) {
            document.oncontextmenu = mf0y;
        } else if (ngmw || wa7w) {
            window.onload = h6r6;
        }

        function bcla(e) {
            wfme = e && e.srcElement && e.srcElement != null ? e.srcElement.tagName : "";
            if (wfme != "INPUT" && wfme != "TEXTAREA" && wfme != "BUTTON") {
                return false;
            }
        }

        function v1it() {
            return false
        }
        if (hp9a) {
            document.onselectstart = bcla;
            document.ondragstart = v1it;
        }
        if (document.addEventListener) {
            document.addEventListener('copy', function(e) {
                wfme = e.target.tagName;
                if (wfme != "INPUT" && wfme != "TEXTAREA") {
                    e.preventDefault();
                }
            }, false);
            document.addEventListener('dragstart', function(e) {
                e.preventDefault();
            }, false);
        }

        function pt7g(evt) {
            if (evt.preventDefault) {
                evt.preventDefault();
            } else {
                evt.keyCode = 37;
                evt.returnValue = false;
            }
        }
        var tfw9 = 1;
        var ape7 = 2;
        var lgar = 4;
        var a26l = new Array();
        a26l.push(new Array(ape7, 65));
        a26l.push(new Array(ape7, 67));
        a26l.push(new Array(ape7, 80));
        a26l.push(new Array(ape7, 83));
        a26l.push(new Array(ape7, 85));
        a26l.push(new Array(tfw9 | ape7, 73));
        a26l.push(new Array(tfw9 | ape7, 74));
        a26l.push(new Array(tfw9, 121));
        a26l.push(new Array(0, 123));

        function f0ov(evt) {
            evt = (evt) ? evt : ((event) ? event : null);
            if (evt) {
                var dzwr = evt.keyCode;
                if (!dzwr && evt.charCode) {
                    dzwr = String.fromCharCode(evt.charCode).toUpperCase().charCodeAt(0);
                }
                for (var bn14 = 0; bn14 < a26l.length; bn14++) {
                    if ((evt.shiftKey == ((a26l[bn14][0] & tfw9) == tfw9)) && ((evt.ctrlKey | evt.metaKey) == ((a26l[bn14][0] & ape7) == ape7)) && (evt.altKey == ((a26l[bn14][0] & lgar) == lgar)) && (dzwr == a26l[bn14][1] || a26l[bn14][1] == 0)) {
                        pt7g(evt);
                        break;
                    }
                }
            }
        }
        if (document.addEventListener) {
            document.addEventListener("keydown", f0ov, true);
            document.addEventListener("keypress", f0ov, true);
        } else if (document.attachEvent) {
            document.attachEvent("onkeydown", f0ov);
        }
        -->
    </script>
<style type="text/css">
        <!-- input,
        textarea {
            -webkit-touch-callout: default;
            -webkit-user-select: auto;
            -khtml-user-select: auto;
            -moz-user-select: text;
            -ms-user-select: text;
            user-select: text
        }
        
        * {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: -moz-none;
            -ms-user-select: none;
            user-select: none
        }
        
        -->
    </style>
<style type="text/css">
        /* Chart.js */
        
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }
        
        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }
        
        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }
    </style>
<style type="text/css">
        .apexcharts-canvas {
            position: relative;
            user-select: none;
            /* cannot give overflow: hidden as it will crop tooltips which overflow outside chart area */
        }
        /* scrollbar is not visible by default for legend, hence forcing the visibility */
        
        .apexcharts-canvas::-webkit-scrollbar {
            -webkit-appearance: none;
            width: 6px;
        }
        
        .apexcharts-canvas::-webkit-scrollbar-thumb {
            border-radius: 4px;
            background-color: rgba(0, 0, 0, .5);
            box-shadow: 0 0 1px rgba(255, 255, 255, .5);
            -webkit-box-shadow: 0 0 1px rgba(255, 255, 255, .5);
        }
        
        .apexcharts-inner {
            position: relative;
        }
        
        .apexcharts-text tspan {
            font-family: inherit;
        }
        
        .legend-mouseover-inactive {
            transition: 0.15s ease all;
            opacity: 0.20;
        }
        
        .apexcharts-series-collapsed {
            opacity: 0;
        }
        
        .apexcharts-tooltip {
            border-radius: 5px;
            box-shadow: 2px 2px 6px -4px #999;
            cursor: default;
            font-size: 14px;
            left: 62px;
            opacity: 0;
            pointer-events: none;
            position: absolute;
            top: 20px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            white-space: nowrap;
            z-index: 12;
            transition: 0.15s ease all;
        }
        
        .apexcharts-tooltip.apexcharts-active {
            opacity: 1;
            transition: 0.15s ease all;
        }
        
        .apexcharts-tooltip.apexcharts-theme-light {
            border: 1px solid #e3e3e3;
            background: rgba(255, 255, 255, 0.96);
        }
        
        .apexcharts-tooltip.apexcharts-theme-dark {
            color: #fff;
            background: rgba(30, 30, 30, 0.8);
        }
        
        .apexcharts-tooltip * {
            font-family: inherit;
        }
        
        .apexcharts-tooltip-title {
            padding: 6px;
            font-size: 15px;
            margin-bottom: 4px;
        }
        
        .apexcharts-tooltip.apexcharts-theme-light .apexcharts-tooltip-title {
            background: #ECEFF1;
            border-bottom: 1px solid #ddd;
        }
        
        .apexcharts-tooltip.apexcharts-theme-dark .apexcharts-tooltip-title {
            background: rgba(0, 0, 0, 0.7);
            border-bottom: 1px solid #333;
        }
        
        .apexcharts-tooltip-text-value,
        .apexcharts-tooltip-text-z-value {
            display: inline-block;
            font-weight: 600;
            margin-left: 5px;
        }
        
        .apexcharts-tooltip-text-z-label:empty,
        .apexcharts-tooltip-text-z-value:empty {
            display: none;
        }
        
        .apexcharts-tooltip-text-value,
        .apexcharts-tooltip-text-z-value {
            font-weight: 600;
        }
        
        .apexcharts-tooltip-marker {
            width: 12px;
            height: 12px;
            position: relative;
            top: 0px;
            margin-right: 10px;
            border-radius: 50%;
        }
        
        .apexcharts-tooltip-series-group {
            padding: 0 10px;
            display: none;
            text-align: left;
            justify-content: left;
            align-items: center;
        }
        
        .apexcharts-tooltip-series-group.apexcharts-active .apexcharts-tooltip-marker {
            opacity: 1;
        }
        
        .apexcharts-tooltip-series-group.apexcharts-active,
        .apexcharts-tooltip-series-group:last-child {
            padding-bottom: 4px;
        }
        
        .apexcharts-tooltip-series-group-hidden {
            opacity: 0;
            height: 0;
            line-height: 0;
            padding: 0 !important;
        }
        
        .apexcharts-tooltip-y-group {
            padding: 6px 0 5px;
        }
        
        .apexcharts-tooltip-box,
        .apexcharts-custom-tooltip {
            padding: 4px 8px;
        }
        
        .apexcharts-tooltip-boxPlot {
            display: flex;
            flex-direction: column-reverse;
        }
        
        .apexcharts-tooltip-box>div {
            margin: 4px 0;
        }
        
        .apexcharts-tooltip-box span.value {
            font-weight: bold;
        }
        
        .apexcharts-tooltip-rangebar {
            padding: 5px 8px;
        }
        
        .apexcharts-tooltip-rangebar .category {
            font-weight: 600;
            color: #777;
        }
        
        .apexcharts-tooltip-rangebar .series-name {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        
        .apexcharts-xaxistooltip {
            opacity: 0;
            padding: 9px 10px;
            pointer-events: none;
            color: #373d3f;
            font-size: 13px;
            text-align: center;
            border-radius: 2px;
            position: absolute;
            z-index: 10;
            background: #ECEFF1;
            border: 1px solid #90A4AE;
            transition: 0.15s ease all;
        }
        
        .apexcharts-xaxistooltip.apexcharts-theme-dark {
            background: rgba(0, 0, 0, 0.7);
            border: 1px solid rgba(0, 0, 0, 0.5);
            color: #fff;
        }
        
        .apexcharts-xaxistooltip:after,
        .apexcharts-xaxistooltip:before {
            left: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
        }
        
        .apexcharts-xaxistooltip:after {
            border-color: rgba(236, 239, 241, 0);
            border-width: 6px;
            margin-left: -6px;
        }
        
        .apexcharts-xaxistooltip:before {
            border-color: rgba(144, 164, 174, 0);
            border-width: 7px;
            margin-left: -7px;
        }
        
        .apexcharts-xaxistooltip-bottom:after,
        .apexcharts-xaxistooltip-bottom:before {
            bottom: 100%;
        }
        
        .apexcharts-xaxistooltip-top:after,
        .apexcharts-xaxistooltip-top:before {
            top: 100%;
        }
        
        .apexcharts-xaxistooltip-bottom:after {
            border-bottom-color: #ECEFF1;
        }
        
        .apexcharts-xaxistooltip-bottom:before {
            border-bottom-color: #90A4AE;
        }
        
        .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:after {
            border-bottom-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:before {
            border-bottom-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-xaxistooltip-top:after {
            border-top-color: #ECEFF1
        }
        
        .apexcharts-xaxistooltip-top:before {
            border-top-color: #90A4AE;
        }
        
        .apexcharts-xaxistooltip-top.apexcharts-theme-dark:after {
            border-top-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-xaxistooltip-top.apexcharts-theme-dark:before {
            border-top-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-xaxistooltip.apexcharts-active {
            opacity: 1;
            transition: 0.15s ease all;
        }
        
        .apexcharts-yaxistooltip {
            opacity: 0;
            padding: 4px 10px;
            pointer-events: none;
            color: #373d3f;
            font-size: 13px;
            text-align: center;
            border-radius: 2px;
            position: absolute;
            z-index: 10;
            background: #ECEFF1;
            border: 1px solid #90A4AE;
        }
        
        .apexcharts-yaxistooltip.apexcharts-theme-dark {
            background: rgba(0, 0, 0, 0.7);
            border: 1px solid rgba(0, 0, 0, 0.5);
            color: #fff;
        }
        
        .apexcharts-yaxistooltip:after,
        .apexcharts-yaxistooltip:before {
            top: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
        }
        
        .apexcharts-yaxistooltip:after {
            border-color: rgba(236, 239, 241, 0);
            border-width: 6px;
            margin-top: -6px;
        }
        
        .apexcharts-yaxistooltip:before {
            border-color: rgba(144, 164, 174, 0);
            border-width: 7px;
            margin-top: -7px;
        }
        
        .apexcharts-yaxistooltip-left:after,
        .apexcharts-yaxistooltip-left:before {
            left: 100%;
        }
        
        .apexcharts-yaxistooltip-right:after,
        .apexcharts-yaxistooltip-right:before {
            right: 100%;
        }
        
        .apexcharts-yaxistooltip-left:after {
            border-left-color: #ECEFF1;
        }
        
        .apexcharts-yaxistooltip-left:before {
            border-left-color: #90A4AE;
        }
        
        .apexcharts-yaxistooltip-left.apexcharts-theme-dark:after {
            border-left-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-yaxistooltip-left.apexcharts-theme-dark:before {
            border-left-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-yaxistooltip-right:after {
            border-right-color: #ECEFF1;
        }
        
        .apexcharts-yaxistooltip-right:before {
            border-right-color: #90A4AE;
        }
        
        .apexcharts-yaxistooltip-right.apexcharts-theme-dark:after {
            border-right-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-yaxistooltip-right.apexcharts-theme-dark:before {
            border-right-color: rgba(0, 0, 0, 0.5);
        }
        
        .apexcharts-yaxistooltip.apexcharts-active {
            opacity: 1;
        }
        
        .apexcharts-yaxistooltip-hidden {
            display: none;
        }
        
        .apexcharts-xcrosshairs,
        .apexcharts-ycrosshairs {
            pointer-events: none;
            opacity: 0;
            transition: 0.15s ease all;
        }
        
        .apexcharts-xcrosshairs.apexcharts-active,
        .apexcharts-ycrosshairs.apexcharts-active {
            opacity: 1;
            transition: 0.15s ease all;
        }
        
        .apexcharts-ycrosshairs-hidden {
            opacity: 0;
        }
        
        .apexcharts-selection-rect {
            cursor: move;
        }
        
        .svg_select_boundingRect,
        .svg_select_points_rot {
            pointer-events: none;
            opacity: 0;
            visibility: hidden;
        }
        
        .apexcharts-selection-rect + g .svg_select_boundingRect,
        .apexcharts-selection-rect + g .svg_select_points_rot {
            opacity: 0;
            visibility: hidden;
        }
        
        .apexcharts-selection-rect + g .svg_select_points_l,
        .apexcharts-selection-rect + g .svg_select_points_r {
            cursor: ew-resize;
            opacity: 1;
            visibility: visible;
        }
        
        .svg_select_points {
            fill: #efefef;
            stroke: #333;
            rx: 2;
        }
        
        .apexcharts-svg.apexcharts-zoomable.hovering-zoom {
            cursor: crosshair
        }
        
        .apexcharts-svg.apexcharts-zoomable.hovering-pan {
            cursor: move
        }
        
        .apexcharts-zoom-icon,
        .apexcharts-zoomin-icon,
        .apexcharts-zoomout-icon,
        .apexcharts-reset-icon,
        .apexcharts-pan-icon,
        .apexcharts-selection-icon,
        .apexcharts-menu-icon,
        .apexcharts-toolbar-custom-icon {
            cursor: pointer;
            width: 20px;
            height: 20px;
            line-height: 24px;
            color: #6E8192;
            text-align: center;
        }
        
        .apexcharts-zoom-icon svg,
        .apexcharts-zoomin-icon svg,
        .apexcharts-zoomout-icon svg,
        .apexcharts-reset-icon svg,
        .apexcharts-menu-icon svg {
            fill: #6E8192;
        }
        
        .apexcharts-selection-icon svg {
            fill: #444;
            transform: scale(0.76)
        }
        
        .apexcharts-theme-dark .apexcharts-zoom-icon svg,
        .apexcharts-theme-dark .apexcharts-zoomin-icon svg,
        .apexcharts-theme-dark .apexcharts-zoomout-icon svg,
        .apexcharts-theme-dark .apexcharts-reset-icon svg,
        .apexcharts-theme-dark .apexcharts-pan-icon svg,
        .apexcharts-theme-dark .apexcharts-selection-icon svg,
        .apexcharts-theme-dark .apexcharts-menu-icon svg,
        .apexcharts-theme-dark .apexcharts-toolbar-custom-icon svg {
            fill: #f3f4f5;
        }
        
        .apexcharts-canvas .apexcharts-zoom-icon.apexcharts-selected svg,
        .apexcharts-canvas .apexcharts-selection-icon.apexcharts-selected svg,
        .apexcharts-canvas .apexcharts-reset-zoom-icon.apexcharts-selected svg {
            fill: #008FFB;
        }
        
        .apexcharts-theme-light .apexcharts-selection-icon:not(.apexcharts-selected):hover svg,
        .apexcharts-theme-light .apexcharts-zoom-icon:not(.apexcharts-selected):hover svg,
        .apexcharts-theme-light .apexcharts-zoomin-icon:hover svg,
        .apexcharts-theme-light .apexcharts-zoomout-icon:hover svg,
        .apexcharts-theme-light .apexcharts-reset-icon:hover svg,
        .apexcharts-theme-light .apexcharts-menu-icon:hover svg {
            fill: #333;
        }
        
        .apexcharts-selection-icon,
        .apexcharts-menu-icon {
            position: relative;
        }
        
        .apexcharts-reset-icon {
            margin-left: 5px;
        }
        
        .apexcharts-zoom-icon,
        .apexcharts-reset-icon,
        .apexcharts-menu-icon {
            transform: scale(0.85);
        }
        
        .apexcharts-zoomin-icon,
        .apexcharts-zoomout-icon {
            transform: scale(0.7)
        }
        
        .apexcharts-zoomout-icon {
            margin-right: 3px;
        }
        
        .apexcharts-pan-icon {
            transform: scale(0.62);
            position: relative;
            left: 1px;
            top: 0px;
        }
        
        .apexcharts-pan-icon svg {
            fill: #fff;
            stroke: #6E8192;
            stroke-width: 2;
        }
        
        .apexcharts-pan-icon.apexcharts-selected svg {
            stroke: #008FFB;
        }
        
        .apexcharts-pan-icon:not(.apexcharts-selected):hover svg {
            stroke: #333;
        }
        
        .apexcharts-toolbar {
            position: absolute;
            z-index: 11;
            max-width: 176px;
            text-align: right;
            border-radius: 3px;
            padding: 0px 6px 2px 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .apexcharts-menu {
            background: #fff;
            position: absolute;
            top: 100%;
            border: 1px solid #ddd;
            border-radius: 3px;
            padding: 3px;
            right: 10px;
            opacity: 0;
            min-width: 110px;
            transition: 0.15s ease all;
            pointer-events: none;
        }
        
        .apexcharts-menu.apexcharts-menu-open {
            opacity: 1;
            pointer-events: all;
            transition: 0.15s ease all;
        }
        
        .apexcharts-menu-item {
            padding: 6px 7px;
            font-size: 12px;
            cursor: pointer;
        }
        
        .apexcharts-theme-light .apexcharts-menu-item:hover {
            background: #eee;
        }
        
        .apexcharts-theme-dark .apexcharts-menu {
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
        }
        
        @media screen and (min-width: 768px) {
            .apexcharts-canvas:hover .apexcharts-toolbar {
                opacity: 1;
            }
        }
        
        .apexcharts-datalabel.apexcharts-element-hidden {
            opacity: 0;
        }
        
        .apexcharts-pie-label,
        .apexcharts-datalabels,
        .apexcharts-datalabel,
        .apexcharts-datalabel-label,
        .apexcharts-datalabel-value {
            cursor: default;
            pointer-events: none;
        }
        
        .apexcharts-pie-label-delay {
            opacity: 0;
            animation-name: opaque;
            animation-duration: 0.3s;
            animation-fill-mode: forwards;
            animation-timing-function: ease;
        }
        
        .apexcharts-canvas .apexcharts-element-hidden {
            opacity: 0;
        }
        
        .apexcharts-hide .apexcharts-series-points {
            opacity: 0;
        }
        
        .apexcharts-gridline,
        .apexcharts-annotation-rect,
        .apexcharts-tooltip .apexcharts-marker,
        .apexcharts-area-series .apexcharts-area,
        .apexcharts-line,
        .apexcharts-zoom-rect,
        .apexcharts-toolbar svg,
        .apexcharts-area-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
        .apexcharts-line-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
        .apexcharts-radar-series path,
        .apexcharts-radar-series polygon {
            pointer-events: none;
        }
        /* markers */
        
        .apexcharts-marker {
            transition: 0.15s ease all;
        }
        
        @keyframes opaque {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        /* Resize generated styles */
        
        @keyframes resizeanim {
            from {
                opacity: 0;
            }
            to {
                opacity: 0;
            }
        }
        
        .resize-triggers {
            animation: 1ms resizeanim;
            visibility: hidden;
            opacity: 0;
        }
        
        .resize-triggers,
        .resize-triggers>div,
        .contract-trigger:before {
            content: " ";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            overflow: hidden;
        }
        
        .resize-triggers>div {
            background: #eee;
            overflow: auto;
        }
        
        .contract-trigger:before {
            width: 200%;
            height: 200%;
        }
    </style>
<style type="text/css">
        .jqstooltip {
            position: absolute;
            left: 0px;
            top: 0px;
            visibility: hidden;
            background: rgb(0, 0, 0) transparent;
            background-color: rgba(0, 0, 0, 0.6);
            filter: progid: DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
            color: white;
            font: 10px arial, san serif;
            text-align: left;
            white-space: nowrap;
            padding: 5px;
            border: 1px solid white;
            z-index: 10000;
        }
        
        .jqsfield {
            color: white;
            font: 10px arial, san serif;
            text-align: left;
        }
    </style>
<link type="text/css" rel="stylesheet" charset="UTF-8" href="https://translate.googleapis.com/translate_static/css/translateelement.css">
</head>

<body class="app ltr landing-page horizontal">
    <div class="page">
        <div class="page-main">
    <div class="hor-header header">
    <div class="container main-container">
        <div class="d-flex">
            <a class="logo-horizontal " href="/">
                <img src="<?=$ManhDev->site('faviWeb');?>" class="header-brand-img desktop-logo" alt="Mạnh Dev | Zalo: 0528139892" height="50px">
                <img src="<?=$ManhDev->site('faviWeb');?>" class="header-brand-img light-logo1" alt="Mạnh Dev | Zalo: 0528139892" height="50px"> </a>
            <!-- LOGO -->
            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <a class="demo-icon nav-link icon d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon fa fa-ellipsis-vertical"></span> </a>
                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse bg-white px-0" id="navbarSupportedContent-4">
                        <div class="header-nav-right p-5">
                            <a href="/auth/register" class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto">Đăng Kí</a>
                        <a href="/auth/login" class="btn ripple btn-min w-sm btn-primary me-2 my-auto">Đăng Nhập</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="landing-top-header overflow-hidden">
    <div class="top sticky overflow-hidden" style="margin-bottom: 0px;">
        <!--APP-SIDEBAR-->
        <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
        <div class="app-sidebar bg-transparent horizontal-main">
            <div class="container">
                <div class="row">
                    <div class="main-sidemenu navbar px-0">
                        <a class="navbar-brand ps-0 d-none d-lg-block" href="/">
                        <img alt="" class="logo-2" src="<?=$ManhDev->site('faviWeb');?>" height="50px">
                        <img src="<?=$ManhDev->site('faviWeb');?>" height="50px" class="logo-3" alt="logo"> </a>
                        <ul class="side-menu">
                            <li class="slide"> <a class="side-menu__item active" data-bs-toggle="slide" href="/home"><span class="side-menu__label">Trang Chủ</span></a> </li>
                            <li class="slide"> <a class="side-menu__item" data-bs-toggle="slide"><span class="side-menu__label">Features</span></a> </li>
                            <li class="slide"> <a class="side-menu__item" data-bs-toggle="slide"><span class="side-menu__label">About</span></a> </li>
                            <li class="slide"> <a class="side-menu__item" data-bs-toggle="slide"><span class="side-menu__label">Faq's</span></a> </li>
                            <li class="slide"> <a class="side-menu__item" data-bs-toggle="slide"><span class="side-menu__label">Blog</span></a> </li>
                            <li class="slide"> <a class="side-menu__item" data-bs-toggle="slide"><span class="side-menu__label">Clients</span></a> </li>
                            <li class="slide"> <a class="side-menu__item" data-bs-toggle="slide"><span class="side-menu__label">Liên Hệ Hỗ Trợ</span></a> </li>
                        </ul>
                        <div class="header-nav-right d-none d-lg-flex">
                        <a href="/auth/register" class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto">Đăng Kí</a>
                        <a href="/auth/login" class="btn ripple btn-min w-sm btn-primary me-2 my-auto">Đăng Nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/APP-SIDEBAR-->
    </div>
    <div class="jumps-prevent" style="padding-top: 20px;"></div>
    <div class="demo-screen-headline main-demo main-demo-1 spacing-top overflow-hidden reveal active" id="home">
        <div class="container px-sm-0">
            <div class="row">
                <div class="col-xl-6 col-lg-6 mb-5 pb-5 animation-zidex pos-relative">
                    <h1 class="text-start fw-bold"><?=$ManhDev->site('nameWeb');?></h1>
                    <h6 class="pb-3"><?=$ManhDev->site('motaWeb');?></h6>
                    <a href="/auth/login" class="btn ripple btn-min w-lg mb-3 me-2 btn-primary"><i class="fa fa-play me-2"></i> Bắt Đầu</a></div>
                <div class="col-xl-6 col-lg-6 my-auto"> <img src="https://spruko.com/demo/sash/sash/assets/images/landing/market4.png" alt=""> </div>
            </div>
        </div>
    </div>
</div>
<div class="main-content mt-0"> 
<div class="side-app"> 
<div class="main-container"> 
<div class="">
    <div class="section pb-0">
    <div class="container">
        <div class="row text-center services-statistics landing-statistics">
            <div class="col-xl-4 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body bg-primary-transparent">
                        <div class="counter-status">
                            <div class="counter-icon bg-primary-transparent box-shadow-primary"> <i class="fa fa-laptop text-primary fs-23"></i> </div>
                            <div class="test-body text-center">
                                <h1 class="mb-2">Công Nghệ</h1>
                                <div class="counter-text">
                                    <h5 class="font-weight-normal mb-0">Hệ thống vận hành tự động 24/24.</h5> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body bg-secondary-transparent">
                        <div class="counter-status">
                            <div class="counter-icon bg-secondary-transparent box-shadow-secondary"> <i class="fa fa-lock text-secondary fs-23"></i> </div>
                            <div class="text-body text-center">
                                <h1 class="mb-2">Bảo mật</h1>
                                <div class="counter-text">
                                    <h5 class="font-weight-normal mb-0">Bảo mật thông tin người dùng, mã hóa thông tin.</h5> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body bg-success-transparent">
                        <div class="counter-status">
                            <div class="counter-icon bg-success-transparent box-shadow-success"> <i class="fa fa-phone text-success fs-23"></i> </div>
                            <div class="text-body text-center">
                                <h1 class="mb-2">Hỗ trợ</h1>
                                <div class="counter-text">
                                    <h5 class="font-weight-normal mb-0 ">Đội ngũ hỗ trợ nhanh - đáp ứng yêu cầu khách hàng.</h5> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-landing section bg-image-style">
    <div class="container">
        <div class="row">
            <h2 class="text-center fw-semibold">Cấp Bậc Ưu Đãi</h2>
            <div class="pricing-tabs">
                <div class="tab-content">
                    <div class="tab-pane active show" id="month">
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="col-lg-4 col-xl-4 col-md-8 col-sm-12">
                                <div class="card p-3 pricing-card">
                                    <div class="card-header d-block text-justified pt-2">
                                        <p class="fs-18 fw-semibold mb-1">Cộng Tác Viên</p>
                                    </div>
                                    <div class="card-body pt-2 text-center">
                                        <p class="fw-semibold mb-1"> <span class="fs-30 me-2">$</span><span class="fs-30 me-1">500.000</span><span class="fs-25"><span class="op-0-5 text-muted text-20">/</span> Coin</span>
                                        </p>
                                        <p>Có 1 số ưu đãi cho cộng tác viên.</p>
                                    </div>
                                    <div class="card-footer text-center border-top-0 pt-1">
                                        <a class="btn btn-lg btn-outline-primary btn-block" href="/home"> <span class="ms-4 me-4">Xem Ngay</span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-4 col-md-8 col-sm-12">
                                <div class="card p-3 border-primary pricing-card advanced">
                                    <div class="card-header d-block text-justified pt-2">
                                        <p class="fs-18 fw-semibold mb-1 pe-0">Đại Lý</p>
                                    </div>
                                    <div class="card-body pt-2 text-center">
                                        <p class="fw-semibold mb-1"> <span class="fs-30 me-2">$</span><span class="fs-30 me-1">10.000.000</span><span class="fs-25"><span class="op-0-5 text-muted text-20">/</span> Coin</span>
                                        </p>
                                        <p>Có ưu đãi giá dịch vụ đại lý.</p>
                                    </div>
                                    <div class="card-footer text-center border-top-0 pt-1">
                                        <a class="btn btn-lg btn-outline-info btn-block" href="/home"> <span class="ms-4 me-4">Xem Ngay</span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-4 col-md-8 col-sm-12">
                                <div class="card p-3 border-primary pricing-card advanced">
                                    <div class="card-header d-block text-justified pt-2">
                                        <p class="fs-18 fw-semibold mb-1 pe-0">Nhà Phân Phối<span class="tag bg-primary text-white float-end">Limited Deal</span>
                                        </p>
                                    </div>
                                    <div class="card-body pt-2 text-center">
                                        <p class="fw-semibold mb-1"> <span class="fs-30 me-2">$</span><span class="fs-30 me-1">20.000.000</span><span class="fs-25"><span class="op-0-5 text-muted text-20">/</span> Coin</span>
                                        </p>
                                        <p>Có rất nhiều ưu đãi giá, full ưu đãi.</p>
                                    </div>
                                    <div class="card-footer text-center border-top-0 pt-1">
                                        <a class="btn btn-lg btn-outline-danger btn-block" href="/home"> <span class="ms-4 me-4">Xem Ngay</span> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div> 
</div>
</div>
</div>
  <footer class="footer">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-12 col-sm-12 text-center"> Copyright © <span id="year"><?=date('Y');?></span> <a href="javascript:void(0)"><?=$ManhDev->site('nameWeb');?></a>. Website Vận Hành <span class="fa fa-heart text-danger"></span> Bởi <a href="javascript:void(0)"> <?=$ManhDev->site('nameAdmin');?> </a> All rights reserved. </div>
                    </div>
                </div>
            </footer>
</div>
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a> 
<script src="/assets/js/jquery.min1.js"></script>
        <script src="/assets/js/popper.min1.js"></script>
        <script src="/assets/js/bootstrap.min1.js"></script>
        <script src="/assets/js/jquery.sparkline.min.js"></script>
        <script src="/assets/js/sticky.js"></script>
        <script src="/assets/js/circle-progress.min.js"></script>
        <script src="/assets/js/jquery.peity.min.js"></script>
        <script src="/assets/js/peitychart.init.js"></script>
        <script src="/assets/js/sidebar.js"></script>
        <script src="/assets/js/perfect-scrollbar1.js"></script>
        <script src="/assets/js/pscroll.js"></script>
        <script src="/assets/js/pscroll-1.js"></script>
        <script src="/assets/js/Chart.bundle.js"></script>
        <script src="/assets/js/rounded-barchart.js"></script>
        <script src="/assets/js/utils.js"></script>
        <script src="/assets/js/select2.full.min.js"></script>
        <script src="/assets/js/jquery.dataTables.min1.js"></script>
        <script src="/assets/js/dataTables.bootstrap5.js"></script>
        <script src="/assets/js/apexcharts.js"></script>
        <script src="/assets/js/irregular-data-series.js"></script>
        <script src="/assets/js/jquery.flot.js"></script>
        <script src="/assets/js/jquery.flot.fillbetween.js"></script>
        <script src="/assets/js/chart.flot.sampledata.js"></script>
        <script src="/assets/js/dashboard.sampledata.js"></script>
        <script src="/assets/js/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="/assets/js/jquery-jvectormap-world-mill-en.js"></script>
        <script src="/assets/js/sidemenu.js?<?=time();?>"></script>
        <script src="/assets/js/autocomplete.js"></script>
        <script src="/assets/js/typehead.js"></script>
        <script src="/assets/js/index1.js"></script>
        <script src="/assets/js/themeColors.js"></script>
        <script src="/assets/js/custom.js?<?=time();?>"></script>
        <script src="/assets/js/switcher.js"></script>
        <script src="https://spruko.com/demo/sash/sash/assets/js/landing.js"></script>
            </body></html>