//~ Version: 36, Copyright (C) 2015: Willem Vree, contributions Stéphane David.
//~ This program is free software; you can redistribute it and/or modify it under the terms of the
//~ GNU General Public License as published by the Free Software Foundation; either version 2 of
//~ the License, or (at your option) any later version.
//~ This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
//~ without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
//~ See the GNU General Public License for more details. <http://www.gnu.org/licenses/gpl.html>.
var opt, onYouTubeIframeAPIReady, msc_credits, media_height, times_arr, offset_js, abc_arr;
(function() {
    function W() {
        opt = {
            jump: 0,
            no_menu: 0,
            repufld: 0,
            noplyr: 0,
            nocsr: 0,
            media_height: "",
            btns: 1,
            ipadr: "",
            mstr: 0,
            autscl: 0,
            ctrmed: 0,
            ctrnot: 0,
            lncsr: 0,
            opacity: .2,
            synbox: 0,
            speed: 1,
            top_margin: 0,
            yubvid: "",
            nomed: 0,
            delay: 0,
            repskip: 0,
            spdctl: 0,
            lopctl: 0,
            metro: 0
        };
        $("#yubuse").prop("checked", !1);
        $("#yvdlbl, #vidyub").css("display", "none");
        msc_credits = void 0;
        $("#credits").html("");
        media_height = void 0;
        $("#buttons").css("height", "");
        P = "";
        p = 0;
        k = null
    }

    function q(a, b, c, d, e, h, g) {
        this.xs = a;
        this.ymin = b;
        this.ymax = c;
        this.times =
            d;
        this.times.unshift(0);
        this.tixbts = g;
        this.line = 0;
        this.msre = 1;
        this.width = 0;
        this.wijzer = $(document.createElementNS("http://www.w3.org/2000/svg", "svg"));
        this.wijzer.attr("id", "wijzer");
        this.wijzer.css("overflow", "visible");
        this.shade = $(document.createElementNS("http://www.w3.org/2000/svg", "rect"));
        this.shade.attr({
            width: "100%",
            height: "100%"
        });
        this.wijzer.append(this.shade);
        this.tiktak = $(document.createElementNS("http://www.w3.org/2000/svg", "text"));
        this.tiktak.attr("y", 5);
        this.tiktak.css({
            fill: "green",
            stroke: "green",
            "text-anchor": "end",
            "font-size": "xx-large"
        });
        this.wijzer.append(this.tiktak);
        this.atag = $(document.createElementNS("http://www.w3.org/2000/svg", "text"));
        this.atag.attr("id", "atag");
        this.atag.text("<");
        this.atag.css({
            fill: "red",
            stroke: "red",
            "text-anchor": "middle"
        });
        this.btag = $(document.createElementNS("http://www.w3.org/2000/svg", "text"));
        this.btag.attr("id", "btag");
        this.btag.text(">");
        this.btag.css({
            fill: "red",
            stroke: "red",
            "text-anchor": "middle"
        });
        this.loopStart = this.loopBtnPrev = this.loopBtn =
            0;
        this.loopEnd = d[d.length - 1];
        $("#loop").prop("checked", !1);
        this.hmargin = 100;
        this.vmargin = 50;
        this.tmargin = 0 <= opt.top_margin ? opt.top_margin : this.vmargin;
        this.lastSync = 0;
        this.setScale();
        this.cursorTime = 0;
        this.time_ix = 1;
        this.tixlb = e;
        this.lbtix = h;
        this.repcnt = 1;
        this.noCursor = 0
    }

    function z() {
        this.paused = !0;
        this.currentTime = 0;
        this.klok = -1;
        this.step = 200;
        this.playing = 0;
        X(.1, 4, .05)
    }

    function Y() {
        var a = $("#abclbl"),
            b = a.html(),
            c = $("#impbox").prop("checked");
        a.toggleClass("abcimp", c);
        a.html(c ? b.replace("score file",
            "<b>import</b>") : b.replace("<b>import</b>", "score file"));
        c && !opt.btns && $("#btns").click()
    }

    function na(a, b) {
        if (0 > a.indexOf("//# This page")) alert("not a preload file");
        else {
            a = b.replace(/\n/g, "");
            var c = a.match(/offset_js = (.*);/);
            1 < c.length && (m = offset_js = parseFloat(c[1]));
            c = a.match(/times_arr = (.*);abc_arr/);
            1 < c.length && (times = Z(JSON.parse(c[1])));
            f && (f.times = times, f.times.unshift(0));
            $("#impbox").prop("checked", !1);
            Y()
        }
    }

    function aa(a) {
        var b = a.slice(0, 4E3);
        $("#impbox").prop("checked") ? na(b, a) : 0 <=
            b.indexOf("//# This page") ? (W(), eval(a), B()) : 0 <= b.indexOf("X:") ? ba(a) : -1 == b.indexOf("<?xml ") ? alert("not an xml file nor an abc file") : (a = $.parseXML(a), a = vertaal(a, {
                p: "f",
                t: 1,
                u: opt.repufld,
                v: 3
            }), a[1] && $("#err").append(a[1] + "\n"), ba(a[0]))
    }

    function oa(a) {
        $("#err").text("");
        offset_js = times_arr = void 0;
        var b = a[0].link;
        w = a[0].name.split(".")[0];
        $("#wait").toggle(!0);
        $("#err").text("link: " + b + "\n");
        $.get(b, "", null, "text").done(function(a, b) {
            $("#err").append("preload: " + b + "\n");
            abc_arr = a.split("\n");
            B()
        }).fail(function(a,
            b, e) {
            $("#wait").append("\npreload failed: " + b)
        })
    }

    function ca(a, b) {
        $("#err").text("");
        offset_js = times_arr = void 0;
        var c = new FileReader;
        c.onload = function(a) {
            aa(c.result)
        };
        var d = "dd" == a ? b[0] : $("#fknp").prop("files")[0];
        d && (w = d.name.split(".")[0], c.readAsText(d))
    }

    function pa(a) {
        a.stopPropagation();
        a.preventDefault();
        $("body").toggleClass("indrag", !1);
        a = a.dataTransfer.files;
        /video|audio/.test(a[0].type) ? Q("dd", a) : ca("dd", a)
    }

    function Q(a, b) {
        var c, d;
        "dbx" == a ? (c = b[0], d = c.link) : (c = "dd" == a ? b[0] : $("#mknp").prop("files")[0],
            d = window.URL.createObjectURL(c));
        C(c.name, d)
    }

    function qa() {
        $("#yubid")[0].checkValidity() ? (opt.yubvid = $("#yubid").val(), C("", "")) : alert("The youtube video id should be 11 characters long,\neach from 'A' to 'Z', 'a' to 'z', '0' to '9', '-' or '_'")
    }

    function X(a, b, c) {
        for (u = []; a <= b + .001; a += c) u.push(a)
    }

    function da(a) {
        function b(a) {
            $("#yubuse").attr("disabled", a);
            $("#yublbl").css("color", a ? "#aaa" : "#000");
            $("#yubload").toggle(a)
        }
        a && (ea = a);
        "undefined" == typeof YT ? (b(!0), $("#yubuse").prop("checked", !1), $.getScript("https://www.youtube.com/iframe_api")) :
            (b(!1), ea())
    }

    function C(a, b) {
        b = b.replace("www.dropbox", "dl.dropboxusercontent").split("?")[0];
        P = 0 == b.indexOf("http") ? b : a;
        var c;
        a = a.split("?")[0];
        $("#vid, #aud").attr("src", "");
        x && x.stopVideo();
        D.pause();
        if (a) {
            p = 0;
            if (/\.webm$|\.mp4$/i.test(a)) {
                c = $("#vid");
                if (0 == c.length) return;
                $("#vidyub, #aud").css("display", "none");
                c.css("display", "inline-block");
                $("#buttons").toggleClass("video", !0)
            } else {
                c = $("#aud");
                if (0 == c.length) return;
                $("#vidyub, #vid").css("display", "none");
                c.css("display", "inline-block");
                $("#buttons").toggleClass("video", !1)
            }
            k = c.get(0);
            /\.ogg$/i.test(b) && (k.canPlayType("audio/ogg") || (b = b.replace(/\.ogg$/i, ".mp3")));
            /\.webm$/i.test(b) && (k.canPlayType("video/webm") || (b = b.replace(/\.webm$/i, ".mp4")));
            c.attr("src", b + (m ? "#t=" + m : ""));
            c.on("timeupdate", E);
            c.on("playing", function() {
                D.setKlok(null, 0)
            });
            c.on("pause", function() {
                D.clearKlok()
            });
            c.on("loadedmetadata", v);
            X(.5, 2, .05);
            F(0);
            v()
        } else p = 1, $("#vid, #aud").css("display", "none"), $("#vidyub").css("display", "inline-block"), $("#buttons").toggleClass("video", !0), da(function() {
            k =
                x;
            u = k.getAvailablePlaybackRates();
            F(0);
            v();
            k.cueVideoById({
                videoId: opt.yubvid,
                startSeconds: m
            })
        })
    }

    function fa() {
        var a = $("#yubuse").prop("checked");
        $("#medlbl").css("display", a ? "none" : "block");
        $("#yvdlbl").css("display", a ? "block" : "none")
    }

    function R() {
        var a = parseInt($("body").css("width")) / 2,
            b = parseInt($("#vid").css("width")) / 2,
            c = parseInt($("#vidyub").css("width")) / 2,
            d = parseInt($("#aud").css("width")) / 2;
        $("#vid").css("margin-left", opt.ctrmed ? (a - b).toFixed() + "px" : "0px");
        $("#vidyub").css("margin-left",
            opt.ctrmed ? (a - c).toFixed() + "px" : "0px");
        $("#aud").css("margin-left", opt.ctrmed ? (a - d).toFixed() + "px" : "0px");
        $("#meddiv").css("text-align", opt.ctrmed ? "left" : "center")
    }

    function v() {
        k && $(k).toggle(!opt.noplyr);
        $("#buttons").toggleClass("noheight", !!opt.noplyr);
        var a = $("#btns").prop("checked"),
            b = parseFloat($("#buttons").css("height")),
            c = parseFloat($("body").css("height")),
            a = a ? parseFloat($("#err").css("height")) : 0,
            c = 100 - (100 * (b + a) / c).toFixed();
        $("#notation").css("height", c + "%");
        $("#vidyub").css("width",
            (1.52 * b).toFixed());
        R()
    }

    function ba(a) {
        function b(a) {
            a = Object.keys(a).map(function(a) {
                return parseFloat(a)
            });
            a.sort(function(a, b) {
                return a - b
            });
            return a
        }

        function c(a) {
            var b;
            b = '%%beginsvg\n<defs>\n<use id="x" xlink:href="#acc2"/>\n<use id="normal" xlink:href="#hd"/>\n';
            b += '<g id="circle-x"><use xlink:href="#acc2"/><circle r="4" class="stroke"/></g>\n';
            b += '<path id="triangle" d="m-4 -3.2l4 6.4 4 -6.4z" class="stroke" style="stroke-width:1.4"/>\n';
            b += '<path id="triangle+" d="m-4 -3.2l4 6.4 4 -6.4z" class="stroke" style="fill:#000"/>\n';
            b += '<path id="rectangle" d="m-3.5 3l0 -6.2 7.2 0 0 6.2z" class="stroke" style="stroke-width:1.4"/>\n';
            b += '<path id="rectangle+" d="m-3.5 3l0 -6.2 7.2 0 0 6.2z" class="stroke" style="fill:#000"/>\n';
            b += '<path id="diamond" d="m0 -3l4.2 3.2 -4.2 3.2 -4.2 -3.2z" class="stroke" style="stroke-width:1.4"/>\n';
            b += '<path id="diamond+" d="m0 -3l4.2 3.2 -4.2 3.2 -4.2 -3.2z" class="stroke" style="fill:#000"/>\n';
            b += "</defs>\n%%endsvg";
            var c = {
                diamond: 1,
                triangle: 1,
                rectangle: 1
            };
            b = [b];
            var d, e, g, h = "default",
                f = {
                    "default": []
                };
            a = a.split("\n");
            for (d = 0; d < a.length; ++d)
                if (e = a[d], 0 <= e.indexOf("I:percmap") && (e = e.split(" "), g = e[4], g in c && (g = g + "+," + g), e = "%%map perc" + h + " " + e[1] + " print=" + e[2] + " midi=" + e[3] + " heads=" + g, f[h].push(e)), 0 <= e.indexOf("V:") && (g = e.match(/V:\s*(\S+)/))) h = g[1], h in f || (f[h] = []);
            for (h in f) b = b.concat(f[h]);
            for (d = 0; d < a.length; ++d) e = a[d], 0 <= e.indexOf("I:percmap") || (0 <= e.indexOf("V:") || 0 <= e.indexOf("K:") ? ((g = e.match(/V:\s*(\S+)/)) && (h = g[1]), 0 == f[h].length && (h = "default"), b.push(e), 0 <= e.indexOf("perc") && -1 == e.indexOf("map=") &&
                (e += " map=perc"), 0 <= e.indexOf("map=perc") && 0 < f[h].length && b.push("%%voicemap perc" + h), 0 <= e.indexOf("map=off") && b.push("%%voicemap")) : b.push(e));
            return b.join("\n")
        }
        var d = "",
            e = "",
            h, g = {},
            r = {},
            l = [],
            p, n = [],
            S = [],
            t = [],
            u = [],
            v = [],
            A = [],
            w = [],
            G = [
                [0, 0, 1]
            ],
            H = [];
        L = "";
        s = [];
        I = [];
        f = null;
        m = 0;
        J = .1;
        M = 0;
        var y = $("#notation");
        $("body").attr("title", "");
        y.html("");
        var z = function(a) {
            var b, c;
            a = a.replace(/\r\n/g, "\n");
            a = a.split(/^\s*X:/m);
            if (1 == a.length) return [];
            b = a[1].split(/^\s*$/m);
            b = a[0] + "X:" + b[0];
            a = b.split(/\r\n|[\n\r\u0085\u2028\u2029]/);
            for (b = 0; b < Math.min(100, a.length); ++b)(c = a[b].match(/%%scale\s*([\d.]+)/)) && 1 == c[1] && (a[b] = "%%scale 0.99");
            return a
        }(a);
        a = z.join("\n");
        0 <= a.indexOf("percmap") && (a = c(a));
        h = new Abc({
            img_out: function(a) {
                -1 != a.indexOf("<svg") && (g = b(g), r = b(r), 1 < g.length && g[1] < Math.min.apply(null, S) && g.splice(0, 1), l.push({
                    xs: g,
                    ys: r
                }), g = {}, r = {}, S = []);
                d += a
            },
            errmsg: function(a, b, c) {
                e += a + "\n"
            },
            read_file: function(a) {
                return ""
            },
            anno_start: function(a, b, c, d, e, f, k) {
                "note" != a && "rest" != a || S.push(h.sx(d));
                "bar" == a && (d = h.sx(d).toFixed(2),
                    e = h.sy(e).toFixed(2), g[d] = 1, r[e] = 1, p = h.sx(0).toFixed(2), g[p] = 1)
            },
            get_abcmodel: function(a, b, c) {
                var d = 768;
                c = 0;
                var e, g = 0;
                try {
                    e = b[0].meter.a_meter[0].top
                } catch (h) {
                    e = "4"
                }
                for (; a; a = a.ts_next)
                    if (0 == a.v) {
                        for (b = a.extra; b; b = b.next) 14 == b.type && b.tempo_notes && (d = b.tempo_notes.reduce(function(a, b) {
                            return a + b
                        }), d = d * b.tempo_value / 60);
                        switch (a.type) {
                            case 8:
                            case 10:
                                c += a.dur / d;
                                break;
                            case 0:
                                if (a.time == g) {
                                    A[A.length - 1] += a.bar_type;
                                    break
                                }
                                "eoln" in a && (g = a.time);
                                w.push(c);
                                c = 0;
                                e = e.replace("C|", "2").replace("C", "4");
                                v.push(parseInt(e));
                                A.push(a.bar_type);
                                t.push(a.text);
                                break;
                            case 6:
                                e = a.a_meter[0].top
                        }
                    }
            }
        });
        h.tosvg("abc2svg", a);
        "" != e && $("#err").append(e);
        y.html(d);
        s = y.find("svg");
        s.css("overflow", "visible");
        s.children("title").text("");
        y = s.children("g");
        for (a = 0; a < y.length; ++a) I.push(y.eq(a));
        var y = [],
            B = [],
            C = [];
        for (a = 0; a < l.length; ++a) {
            var x = l[a];
            y[a] = x.xs;
            B[a] = x.ys[0];
            C[a] = x.ys[x.ys.length - 1]
        }(function() {
            for (var a = 0, b = 1, c = l[a].xs.length, d = 0, e = 0, g = 1, h = 0, f = 1, k = 0;;) {
                var r = t[d - 1];
                if (r = r ? r.match(/[,\d]*(\d)/) : null) r = parseInt(r[1]), r != k &&
                    (k = r);
                if (!k || k >= f) e += w[d], n.push(e), u.push(v[d]), H[a] || (H[a] = []), H[a][b] || (H[a][b] = []), H[a][b][f] = G.length, G.push([a, b, f]);
                "|" != A[d] && (k = 0);
                if ((r = /^:/.test(A[d])) && 1 == f && !opt.repskip) f = 2, d = h, b = G[g][1], a = G[g][0], c = l[a].xs.length;
                else if (r && (f = 1), /:$/.test(A[d]) && (g = G.length, h = d + 1, f = 1), d += 1, b += 1, b >= c) {
                    b = 1;
                    a += 1;
                    if (a >= l.length) break;
                    c = l[a].xs.length
                }
            }
        })();
        "undefined" != typeof times_arr && (n = Z(times_arr));
        "undefined" != typeof offset_js && (m = offset_js);
        if ("undefined" != typeof endtime_js) var E = endtime_js - m,
            F =
            n[n.length - 1],
            n = n.map(function(a) {
                return a * E / F
            });
        L = z;
        f = new q(y, B, C, n, G, H, u);
        f.setline(0);
        s.each(function() {
            $(this).mousedown(ra)
        });
        k || (k = D);
        K("false:" + (m + .01) + ":false", 0)
    }

    function Z(a) {
        a = a.map(function(a) {
            return a.slice(1)
        });
        return a = a.reduce(function(a, c) {
            return a.concat(c)
        })
    }

    function E() {
        if (k) {
            var a = (p ? k.getCurrentTime() : k.currentTime) - m;
            0 > a && (a = 0);
            f.loopBtn && a > f.loopEnd && (a = f.loopStart, p ? k.seekTo(a + m, !0) : k.currentTime = a + m);
            f && f.time2x(a)
        }
    }

    function ra(a) {
        a.preventDefault();
        a.stopPropagation();
        var b =
            s.get().indexOf(this);
        a = a.clientX;
        a -= $(this).position().left;
        f.x2time(a, b)
    }

    function ga() {
        $("#sync_out").css("display", opt.synbox ? "block" : "none");
        f && opt.synbox && f.showSyncInfo()
    }

    function ha() {
        $("#medbts").css("display", opt.btns ? "inline" : "none");
        $("#err").css("display", opt.btns ? "block" : "none");
        v();
        opt.btns && "undefined" == typeof FileReader && $("#notation").prepend("<h3>Your browser does not support reading of local files ...</h3>but you can use the preload feature.")
    }

    function T() {
        f && f.time2x(f.cursorTime);
        $("#notation").css("text-align", opt.ctrnot ? "center" : "left")
    }

    function ia() {
        var a = $("#spdctl").prop("checked"),
            b = $("#lopctl").prop("checked");
        $("#spdlbl").css("display", a ? "block" : "none");
        $("#looplbl").css("display", b ? "block" : "none")
    }

    function ja() {
        function a(a) {
            $("#drpuse").prop("checked", !a);
            $("#drpuse").attr("disabled", a);
            $("#drplbl").css("color", a ? "#aaa" : "#000")
        }
        if ("undefined" == typeof Dropbox) a(!0), $.ajax({
            url: "https://www.dropbox.com/static/api/2/dropins.js",
            dataType: "script",
            cache: !0
        }).done(function() {
            a(!1);
            Dropbox.init({
                appKey: "ckknarypgq10318"
            });
            sa();
            ja()
        });
        else {
            var b = $("#drpuse").prop("checked");
            $(".dropbox-dropin-btn").css("display", b ? "inline-block" : "none");
            $("#fknp, #mknp").css("display", b ? "none" : "inline-block")
        }
    }

    function ta(a, b) {
        function c() {
            e <= d && (t = setTimeout(c, h), f.tiktak.text(e), e += 1)
        }
        var d, e, h;
        clearInterval(t);
        t = 0;
        d = f.tixbts[a - 1];
        e = 1;
        h = (f.times[a] - b) / d / opt.speed * 1E3;
        t = setTimeout(c, 0)
    }

    function ua(a, b) {
        function c() {
            $("#countin").toggle(!1);
            clearInterval(t);
            t = 0
        }

        function d() {
            $("#countin").html("<b>" +
                e.num + "</b>").toggle(!0);
            0 == e.num-- && (c(), K(a, b))
        }
        if (t) c();
        else {
            a = a.replace(":true", ":false");
            var e = f.compCountIn();
            d();
            t = setInterval(d, 1E3 * e.time)
        }
    }

    function K(a, b) {
        if (k) {
            var c = a.split(":"),
                d = "true" == c[0],
                e = parseFloat(c[1]),
                c = "true" == c[2],
                h = p ? 1 != k.getPlayerState() : k.paused;
            p ? k.seekTo(e, !0) : k.currentTime = e;
            if (h && d || !h && !d) {
                if (c) {
                    ua(a, b);
                    return
                }
                if (b) {
                    setTimeout(function() {
                        K(a, 0)
                    }, b);
                    return
                }
                p ? k.playVideo() : k.play();
                opt.metro && f && (f.time_ix = 0)
            } else p ? k.pauseVideo() : k.pause(), opt.metro && setTimeout(function() {
                clearInterval(t);
                t = 0;
                f.tiktak.text("")
            }, 0);
            d = !opt.lncsr && !d;
            f && f.time2x(e - m, d)
        }
    }

    function U(a, b) {
        var c = a + ":" + b.toFixed(2) + ":" + (a && $("#cntin").prop("checked"));
        n ? n.send(c) : K(c, 0)
    }

    function N(a) {
        var b = a.keyCode ? a.keyCode : a.which,
            c = 1;
        switch (b) {
            case 219:
            case 88:
                f.goMsre(0);
                break;
            case 221:
            case 67:
                f.goMsre(1);
                break;
            case 80:
            case 89:
            case 90:
                if (!k) break;
                U(!0, p ? k.getCurrentTime() : k.currentTime);
                break;
            case 65:
                $("#autscl").click();
                break;
            case 70:
                $("#btns").click();
                break;
            case 72:
                $("#help").toggleClass("showhlp");
            case 76:
                $("#lncsr").click();
                break;
            case 77:
                $("#menu label").toggle();
                break;
            case 83:
                opt.spdctl && !opt.lopctl ? $("#lopctl").click() : opt.lopctl && !opt.spdctl ? $("#spdctl").click() : $("#spdctl, #lopctl").click();
                break;
            case 171:
            case 61:
            case 107:
                $("#plus").click();
                break;
            case 173:
            case 109:
                $("#min").click();
                break;
            default:
                c = 0
        }
        if (opt.synbox && f && !c) {
            switch (b) {
                case 190:
                    a.ctrlKey ? m += J : f.changeTimesKeyb(J);
                    break;
                case 188:
                    a.ctrlKey ? m -= J : f.changeTimesKeyb(-J);
                    break;
                case 87:
                    ka()
            }
            a.preventDefault();
            f.showSyncInfo()
        }
    }

    function V() {
        R();
        f && opt.autscl &&
            (f.setSize.call(f), f.setScale.call(f))
    }

    function va(a) {
        a = a.map(function(a) {
            return window.btoa(unescape(encodeURIComponent(a)))
        }).join("+");
        for (var b = [], c = 0; c <= a.length;) b.push(a.substr(c, 150)), c += 150;
        return b
    }

    function wa(a) {
        return a.join("").split("+").map(function(a) {
            return decodeURIComponent(escape(window.atob(a)))
        }).join("\n")
    }

    function ka() {
        var a, b, c = [],
            d, e, h = "[",
            g, k, l;
        d = 'media_file = "' + (p ? "" : P) + '";\n';
        k = "undefined" != typeof msc_credits ? "msc_credits = " + JSON.stringify(msc_credits) + ";\n" : "";
        e = "offset_js = " +
            m.toFixed(2) + ";\n";
        opt.synbox = 0;
        l = "opt = " + JSON.stringify(opt) + ";\n";
        opt.synbox = 1;
        for (b = f.times.map(function(a) {
                return a.toFixed(2)
            }); b.length;) g = b[9], c.push(h + b.splice(0, 10).join(",") + "]"), h = "[" + g + ",";
        b = "times_arr = [" + c.join(",\n") + "];\n";
        $("#encr").prop("checked") ? (g = va(L).map(function(a) {
            return JSON.stringify(a)
        }), h = ['"X:1"']) : (g = [""], h = L.map(function(a) {
            return JSON.stringify(a)
        }));
        g = "abc_enc = [" + g.join(",\n") + "];\n";
        var h = "abc_arr = [" + h.join(",\n") + "];\n",
            c = "//########################################\n//# This page contains score data, timing data and the media file path. Save it as a text file in\n//# the same folder as abcweb.html. Abcweb preloads score and media when it is opened with the\n",
            c = c + "//# file name as parameter in the url, for example: http://your.domain.org/abcweb.html?file_name\n",
            c = c + "//# Also works locally with file:///path/to/abcweb.html?file_name\n",
            c = c + '//# **** You have to correct the path to the media file below! (media_file="...";) ****\n',
            c = c + "//########################################\n//#\n",
            c = c + (d + k + e + l + b + h + g),
            n = "data:text/plain;charset=utf-8;base64," + btoa(unescape(encodeURIComponent(c)));
        if ($("#drpuse").prop("checked")) $("#err").text(""), Dropbox.save(n, w + ".js", {
            success: function() {
                $("#err").text('"' + w + '.js" saved to your Dropbox.\n')
            },
            progress: function(a) {},
            cancel: function() {},
            error: function(a) {
                $("#err").text("Error: " + a + "\n");
                $("#err").append("fnm: " + w + ", len: " + n.length + "\n")
            }
        });
        else try {
            a = document.createElement("a"), a.href = n, a.download = w + ".js", a.text = "Save synchronization data", $("#saveDiv").append(a), a.click()
        } catch (q) {
            confirm("Do you want to save your synchronization data?") && (document.open("text/html"), document.write("<pre>" + c + "</pre>"), document.close())
        }
    }

    function xa() {
        W();
        $("#err").text("");
        var a, b = "",
            c = "",
            d, e, h, g = "",
            f;
        a = window.location.href.replace("?dl=0", "").split("?");
        if (d = a[0].match(/:\/\/([^/:]+)/)) f = d[1];
        if (1 < a.length) {
            e = a[1].split("&");
            for (h = 0; h < e.length; h++) a = e[h].replace(/d:(\w{15}\/[^.]+\.)/, "https://dl.dropboxusercontent.com/s/$1"), (d = a.match(/xml=(.*)/)) ? b = decodeURIComponent(d[1]).replace("www.dropbox", "dl.dropboxusercontent") : (d = a.match(/med=(.*)/)) ? g = d[1] : (d = a.match(/tmr=(.*)/)) ? l.top_margin = parseInt(d[1]) : (d = a.match(/tb=([\d.]*)/)) ?
                offset_js = parseFloat(d[1]) : (d = a.match(/te=([\d.]*)/)) ? endtime_js = parseFloat(d[1]) : (d = a.match(/ip=(\d+.\d+.\d+.\d+)/)) ? l.ipadr = d[1] : (d = a.match(/^d([\d.]+)$/)) ? l.delay = parseFloat(d[1]) : a.match(/ip=host/) && f ? l.ipadr = f : "mstr" == a ? l.mstr = 1 : "jmp" == a ? l.jump = 1 : "syn" == a ? l.synbox = 1 : "nb" == a ? l.no_menu = 1 : "sp" == a ? l.spdctl = l.lopctl = 1 : "ur" == a ? l.repufld = 1 : "npl" == a ? l.noplyr = 1 : "ncr" == a ? l.nocsr = 1 : "asc" == a ? l.autscl = 1 : "cm" == a ? l.ctrmed = 1 : "cs" == a ? l.ctrnot = 1 : "nomed" == a ? (l.nomed = 1, l.noplyr = 1) : c = a, /(\.xml$)|(\.abc$)/.test(c) &&
                (b = c, c = ""), /(\.mp3$)|(\.mp4$)|(\.ogg$)|(\.webm$)/.test(c) && (g = c, c = "");
            g && (11 == g.length && -1 == g.indexOf(".") ? opt.yubvid = g : media_file = decodeURIComponent(g).replace("www.dropbox", "dl.dropboxusercontent"));
            (c || b) && $("#wait").toggle(!0);
            b ? $.get(b, "", null, "text").done(function(a, b) {
                $("#err").append("preload: " + b + "\n");
                abc_arr = a.split("\n");
                B()
            }).fail(function(a, b, c) {
                $("#wait").append("\npreload failed: " + b)
            }) : c && (0 <= c.indexOf("dropbox.com") && (c += "?dl=1"), d = document.createElement("script"), d.src = c, d.onload =
                function() {
                    B()
                }, d.onerror = function() {
                    $("#wait").append("\npreload failed")
                }, document.head.appendChild(d), document.head.removeChild(d))
        }
        return c || b
    }

    function B() {
        if ("undefined" != typeof abc_arr) {
            var a = abc_arr.join("\n");
            "undefined" != typeof abc_enc && abc_enc.length && (a = wa(abc_enc), opt.no_menu = 1);
            aa(a)
        }
        for (var b in l) opt[b] = l[b];
        "nospd" in opt && (opt.spdctl = opt.lopctl = !opt.nospd, opt.nospd = void 0);
        "undefined" != typeof media_file && media_file && !opt.nomed && (C(media_file, media_file), opt.btns = 0);
        opt.yubvid && !opt.nomed &&
            (C("", ""), opt.btns = 0);
        "undefined" != typeof msc_credits && (a = msc_credits.reduce(function(a, b) {
            return a + b
        }), $("#credits").html(a));
        "undefined" != typeof media_height && (opt.media_height = media_height);
        opt.no_menu && ($("#sync").css("display", "none"), opt.btns = 0, $("body").off("dragenter dragleave drop dragover"), $("body").on("contextmenu", function(a) {
            a.preventDefault()
        }));
        $("#wait").toggle(!1);
        la(!1)
    }

    function la(a) {
        if (a)
            for (var b in l) opt[b] = l[b];
        opt.ipadr && ya(opt.ipadr);
        opt.media_height && $("#buttons").css("height",
            opt.media_height);
        for (b in opt) $("#" + b).prop("checked", opt[b]);
        ha();
        T();
        ia();
        ga();
        V();
        $("#sync, #medbts, #meddiv, #err").css("visibility", "visible")
    }

    function O(a) {
        $("#err").append(a + "\n")
    }

    function ya(a) {
        n ? O("websocket already open") : (n = new WebSocket("ws://" + a + ":8091/"), n.onmessage = function(a) {
            "master" == a.data ? $("#mbar").css("background", "rgba(255,0,0,0.2)") : K(a.data, 100 * opt.delay)
        }, n.onerror = function(a) {
            O("socket error (server inaccessible?)");
            n = null
        }, n.onopen = function(a) {
            $("#mbar").css("background",
                "rgba(0,255,0,0.2)");
            opt.mstr && n.send("master");
            O("connection opened")
        }, n.onclose = function(a) {
            $("#mbar").css("background", "");
            O("connection closed: " + a.code);
            n = null
        })
    }

    function za(a) {
        a.preventDefault();
        $("#buttons").css("opacity", "0.5");
        $("#streep").toggleClass("lang", !0);
        var b = "touchstart" == a.type,
            c = b ? $("#streep") : $("body");
        c.on("mousemove touchmove", function(a) {
            var c = $("body").height();
            opt.media_height = (100 * (b ? a.originalEvent.touches[0].clientY : a.pageY) / c).toFixed() + "%";
            $("#buttons").css("height",
                opt.media_height);
            v()
        });
        c.on("mouseup touchend", function(a) {
            $("#buttons").css("opacity", "1.0");
            $("#streep").toggleClass("lang", !1);
            c.off("mousemove touchmove mouseup touchend")
        })
    }

    function F(a) {
        var b = u.map(function(a, b) {
            return {
                x: Math.abs(a - opt.speed),
                i: b
            }
        }).sort(function(a, b) {
            return a.x - b.x
        })[0].i; - 1 == a && 0 < b && (opt.speed = u[b + a]);
        1 == a && b < u.length - 1 && (opt.speed = u[b + a]);
        $("#rate").html(opt.speed.toFixed(2));
        k && !p && (k.playbackRate = opt.speed);
        k && p && k.setPlaybackRate(opt.speed)
    }

    function sa() {
        var a = Dropbox.createChooseButton({
                success: oa,
                cancel: function() {},
                linkType: "direct",
                multiselect: !1,
                extensions: [".xml", ".abc", ".txt", ".js"]
            }),
            b = Dropbox.createChooseButton({
                success: function(a) {
                    Q("dbx", a)
                },
                cancel: function() {},
                linkType: "preview",
                multiselect: !1,
                extensions: [".ogg", ".mp3", ".webm", ".mp4"]
            });
        $("#abcfile").append(a);
        $("#mediafile").append(b)
    }

    function ma(a) {
        a = $(this).prop("checked");
        var b = $(this).attr("id");
        opt[b] = a;
        switch (b) {
            case "ctrnot":
                T();
                break;
            case "ctrmed":
                R();
                break;
            case "spdctl":
            case "lopctl":
                ia();
                break;
            case "autscl":
                V();
                break;
            case "lncsr":
                T();
                break;
            case "btns":
                ha();
                break;
            case "synbox":
                ga();
                break;
            case "noplyr":
                v();
                break;
            case "nocsr":
                f && !D.paused && (f.noCursor = a)
        }
    }
    var s, I, f, m, P, L, k, w, x, p = 0,
        u = [],
        M = 0,
        ea, l = {},
        n = null,
        J, D = new z;
    opt = {};
    onYouTubeIframeAPIReady = function() {
        x = new YT.Player("vidyub", {
            events: {
                onReady: function() {
                    $("#yubuse").prop("checked", !0);
                    fa();
                    da()
                },
                onStateChange: function(a) {
                    a.data == YT.PlayerState.PLAYING ? D.setKlok(E, 100) : D.clearKlok();
                    a.data == YT.PlayerState.CUED && v()
                }
            }
        })
    };
    q.prototype.setline = function(a) {
        $("#wijzer").remove();
        this.sety(this.ymin[a], this.ymax[a]);
        this.setx(0, 0, 0);
        this.line = a;
        this.wijzer.prependTo(I[a]);
        this.width = s[a].width.baseVal.value;
        var b = $("#notation"),
            c = b.scrollTop(),
            d = c + b.height() - this.vmargin;
        (this.line_offsets[a + 1] > d || this.line_offsets[a] < c + this.vmargin) && b.scrollTop(this.line_offsets[a] - this.tmargin)
    };
    q.prototype.sety = function(a, b) {
        this.wijzer.attr("y", a.toFixed(2));
        this.wijzer.attr("width", "2");
        this.wijzer.attr("height", (30 + b - a).toFixed(2));
        this.shade.attr("fill", "blue")
    };
    q.prototype.setx = function(a,
        b, c) {
        var d = $("#notation"),
            e = d.scrollLeft(),
            h = e + d.width() - this.hmargin;
        opt.lncsr ? (this.wijzer.attr("x", a.toFixed(2)), this.wijzer.attr("width", "2"), this.shade.attr("fill-opacity", this.noCursor ? "0.0" : "0.5"), a /= this.scale, (a > h || a < e + this.hmargin) && d.scrollLeft(a - this.hmargin)) : (this.wijzer.attr("x", b.toFixed(2)), this.wijzer.attr("width", (c - b).toFixed(2)), this.shade.attr("fill-opacity", this.noCursor ? "0.0" : "" + opt.opacity), b /= this.scale, c /= this.scale, (c > h || b < e + this.hmargin) && d.scrollLeft(b - this.hmargin))
    };
    q.prototype.time2x = function(a, b) {
        if (!M) {
            this.cursorTime = a;
            var c, d, e, h, g;
            c = this.times;
            for (g = this.time_ix; g < c.length && a > c[g];) g += 1;
            if (g == c.length) p ? 1 == k.getPlayerState() && k.pauseVideo() : k.paused || k.pause();
            else {
                for (; 0 < g && a < c[g - 1];) --g;
                b && .3 > c[g] - a && (c[g] = a - .01, console.log("tijdcor: " + (a - .01) + ", maat: " + g), g < c.length - 1 && (g += 1));
                opt.metro && g != this.time_ix && ta(g, a);
                this.time_ix = g;
                this.repcnt = this.tixlb[g][2];
                this.msre = h = this.tixlb[g][1];
                d = this.tixlb[g][0];
                this.line != d && this.setline(d);
                e = this.xs[d];
                d = c[g -
                    1];
                g = c[g];
                c = e[h - 1] + 6;
                h = e[h] + 6;
                d = c + (h - c) * (a - d) / (g - d);
                e = this.times[this.times.length - 1];
                0 >= a || a > e ? this.setx(0, 0, 0) : this.setx(d, c, h);
                opt.synbox && this.showSyncInfo()
            }
        }
    };
    q.prototype.putTag = function(a, b, c, d, e, h, g, f) {
        if (!opt.lncsr) {
            var k = this.xs[c];
            h = this.times;
            b = k[g - 1];
            k = k[g];
            g = h[f - 1];
            f = h[f];
            this.loopStart == g + .01 && (a = "btag", e = "loopEnd");
            this.loopEnd == f - .01 && (a = "atag", e = "loopStart");
            "loopStart" == e ? h = g + .01 : (b = k, h = f - .01)
        }
        this[a].prependTo(I[c]);
        this[a].attr("x", b.toFixed(2));
        this[a].attr("y", this.ymin[c]);
        this.loopBtn = d;
        this[e] = h
    };
    q.prototype.x2time = function(a, b) {
        var c, d, e, h, g, f;
        a *= this.scale;
        c = this.xs[b];
        e = 1;
        if (a < c[0]) N({
            keyCode: 80
        });
        else {
            for (; e < c.length && c[e] < a;) e += 1;
            if (e == c.length) N({
                keyCode: 80
            });
            else switch (f = this.lbtix[b][e], f[this.repcnt] || (this.repcnt = 1), f = f[this.repcnt], d = this.times, h = c[e - 1], g = c[e], c = d[f - 1], d = d[f], h = c + (d - c) * (a - h) / (g - h), this.loopBtn) {
                case 1:
                    this.putTag("atag", a, b, 2, "loopStart", h, e, f);
                    break;
                case 2:
                    h > this.loopStart && this.putTag("btag", a, b, 3, "loopEnd", h, e, f);
                    break;
                case 3:
                    c = Math.abs(this.loopStart -
                        h);
                    d = Math.abs(this.loopEnd - h);
                    c < d ? this.putTag("atag", a, b, 3, "loopStart", h, e, f) : this.putTag("btag", a, b, 3, "loopEnd", h, e, f);
                    break;
                default:
                    opt.synbox && (p ? k.getPlayerState() == YT.PlayerState.PLAYING : !k.paused) ? this.syncTimes(a, e, b, f) : U(!1, (opt.lncsr ? h : c + .01) + m)
            }
        }
    };
    q.prototype.goMsre = function(a) {
        var b = this.time_ix;
        k && (a = a ? this.times[b] + .01 : 2 >= b ? .01 : this.times[b - 2] + .01, U(!1, a + m))
    };
    q.prototype.showSyncInfo = function() {
        var a = this.time_ix,
            a = this.times[a] - this.times[a - 1];
        $("#sync_info").html("duration&nbsp;measure:<br>" +
            a.toFixed(3) + " sec.<br>");
        $("#sync_info").append("media&nbsp;offset:<br>" + m.toFixed(3) + " sec.")
    };
    q.prototype.changeTimesKeyb = function(a) {
        this.changeTimes(this.lbtix[this.line][this.msre][this.repcnt] - 1, a, 0)
    };
    q.prototype.changeTimes = function(a, b, c) {
        var d, e = this.times;
        for (a += 1; a < e.length; ++a) d = c ? e[a - 1] + c : e[a] + b, e[a] = d
    };
    q.prototype.syncTimes = function(a, b, c, d) {
        a = this.lbtix[c][b][this.repcnt] - 1;
        c = (p ? k.getCurrentTime() : k.currentTime) - m - .2;
        0 == a ? (m += c, p ? k.seekTo(m + .01, !0) : k.currentTime = m + .01, M && $("#woff").click()) :
            (--a, b = 2 == d ? 0 : this.times[d - 2], d = this.times[d - 1], c < b + .5 ? alert("tempo faster than 240 bpm: first sync previous measures") : (this.lastSync > a ? this.changeTimes(a, c - d, 0) : (this.changeTimes(a, 0, c - b), this.lastSync = a), opt.jump && (p ? k.seekTo(b + m + .01, !0) : k.currentTime = b + m + .01)))
    };
    q.prototype.setSize = function() {
        if (opt.autscl) {
            var a, b, c, d, e;
            for (a = 0; a < s.length; ++a) b = s[a], c = b.width.baseVal.value, d = b.height.baseVal.value, e = $("#notation").prop("clientWidth"), b.width.baseVal.value = e, b.height.baseVal.value = e * d / c
        }
    };
    q.prototype.setScale =
        function() {
            var a, b, c, d;
            a = s[0].width.baseVal.value;
            try {
                b = s[0].viewBox.baseVal.width
            } catch (e) {
                b = a
            }
            c = I[0][0].transform.baseVal.getItem(0).matrix.a;
            this.scale = b / a / c;
            c = $("#notation").position();
            d = $("#notation").scrollTop();
            this.line_offsets = [];
            for (a = 0; a < s.length; ++a) b = $(s[a]).position(), this.line_offsets[a] = d + b.top - c.top;
            this.line_offsets[a] = $("#notation").prop("scrollHeight")
        };
    q.prototype.setLoop = function() {
        0 == this.loopBtn ? this.loopBtn = this.loopBtnPrev || 1 : (this.loopBtnPrev = this.loopBtn, this.loopBtn = 0);
        $("#atag").css("visibility", this.loopBtn ? "visible" : "hidden");
        $("#btag").css("visibility", this.loopBtn ? "visible" : "hidden")
    };
    q.prototype.compCountIn = function() {
        var a = {
                time: .25,
                num: 4
            },
            b = 1 < this.time_ix ? this.time_ix - 1 : this.time_ix,
            c = Math.min(this.times.length - 1, b + 3);
        if (c > b) {
            var d = this.tixbts.slice(b, c).reduce(function(a, b) {
                return a + b
            }, 0);
            a.time = (this.times[c] - this.times[b]) / d / opt.speed;
            a.num = this.tixbts[b]
        }
        return a
    };
    z.prototype.pause = function() {
        this.clearKlok();
        this.paused = !0;
        this.klok = -1
    };
    z.prototype.play =
        function() {
            this.paused = !1;
            if (-1 == this.klok) {
                var a = this;
                this.setKlok(function() {
                    a.currentTime += a.step / 1E3 * opt.speed;
                    E()
                }, this.step)
            }
        };
    z.prototype.setKlok = function(a, b) {
        -1 != this.klok && clearInterval(this.klok);
        this.klok = a ? setInterval(a, b) : -1;
        this.paused = !1;
        f && opt.nocsr && (f.noCursor = 1)
    };
    z.prototype.clearKlok = function() {
        -1 != this.klok && clearInterval(this.klok);
        this.klok = -1;
        this.paused = !0;
        f && (f.noCursor = 0);
        E()
    };
    var t = 0;
    $(document).ready(function() {
        $("#drpuse").prop("checked", !1);
        xa() || la(!0);
        $(window).resize(V);
        $("body").keydown(N);
        $("#save").click(ka);
        $("#plus").click(function() {
            F(1)
        });
        $("#min").click(function() {
            F(-1)
        });
        $("#loop").click(function() {
            f && f.setLoop()
        });
        var a;
        a = '<a href="http://wim.vree.org/js/">abcweb</a> (version: 36)</br>\u00a9Willem Vree<br>using:<br><a href="http://moinejf.free.fr/js/">abc2svg</a>, \u00a9Jef Moine';
        $("#help").prepend('<div style="position: absolute; right: 5px;">' + a + "</div>");
        $("#help").on("mouseleave", function() {
            $("#help").toggleClass("showhlp", !1)
        });
        $("#helpm").click(function() {
            $("#help").toggleClass("showhlp")
        });
        $("#streep").on("mousedown touchstart", za);
        $("#fknp").change(function() {
            ca("btn", [])
        });
        $("#mknp").change(function() {
            Q("btn", [])
        });
        $("#yknp").click(qa);
        $("#yubid").keydown(function(a) {
            a.stopPropagation()
        });
        $("#yubuse").change(fa);
        $("#drpuse").click(ja);
        $("#notation").mousedown(function() {
            N({
                keyCode: 80
            })
        });
        $("#jump").change(ma);
        $("#impbox").change(Y);
        $("#menu * input").change(ma);
        $("#menu label").toggle();
        $("#menu").hover(function() {
            $("#menu label").toggle(!0)
        }, function() {
            $("#menu label").toggle(!1)
        });
        $("#woff").change(function() {
            M = $(this).prop("checked")
        });
        $.event.props.push("dataTransfer");
        $("body").on("drop", pa);
        $("body").on("dragover", function(a) {
            a.stopPropagation();
            a.preventDefault();
            a.dataTransfer.dropEffect = "copy"
        });
        $("body").on("dragenter dragleave", function() {
            $(this).toggleClass("indrag")
        })
    })
})();