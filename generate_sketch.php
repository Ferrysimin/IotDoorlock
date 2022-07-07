<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #1d1d16;
            font-size: 15px;
        }
    </style>

</head>

<body>

    <div class="row" style="position: fixed; right:30px;">
       
            <button id="copy" class="btn btn-primary btn-sm btn-round waves-effect waves-light m-1"><i class="zmdi zmdi-layers"></i> Copy Sketch</button>
        
    </div>
    <div class="row" id="sketch">
        <pre>
<font color="#95a5a6">&#47;*</font>
<font color="#95a5a6"> &nbsp;&nbsp;RTC DS3231</font>
<font color="#95a5a6"> &nbsp;&nbsp;VCC = 3.3v &#47; 5v</font>
<font color="#95a5a6"> &nbsp;&nbsp;GND = GND</font>
<font color="#95a5a6"> &nbsp;&nbsp;SDA = D2</font>
<font color="#95a5a6"> &nbsp;&nbsp;SCL = D1</font>
<font color="#95a5a6"></font>
<font color="#95a5a6"> &nbsp;&nbsp;SERVO</font>
<font color="#95a5a6"> &nbsp;&nbsp;VCC = 3.3v &#47; 5v</font>
<font color="#95a5a6"> &nbsp;&nbsp;GND = GND</font>
<font color="#95a5a6"> &nbsp;&nbsp;DATA = D4</font>
<font color="#95a5a6">*&#47;</font>

<font color="#a99cf2">#include</font> <font color="#a8db75">&lt;</font><font color="#78dbe7">Wire</font><font color="#a8db75">.</font><font color="#f8f8f2">h</font><font color="#a8db75">&gt;</font>
<font color="#a99cf2">#include</font> <font color="#a99cf2">&#34;RTClib.h&#34;</font>
<font color="#a99cf2">#include</font> <font color="#a8db75">&lt;</font><b><font color="#a8db75">Servo</font></b><font color="#a8db75">.</font><font color="#f8f8f2">h</font><font color="#a8db75">&gt;</font>

<b><font color="#a8db75">RTC_DS3231</font></b> <font color="#f8f8f2">rtc</font><font color="#f8f8f2">;</font>
<b><font color="#a8db75">Servo</font></b> <font color="#f8f8f2">myservo</font><font color="#f8f8f2">;</font>

<font color="#434f54">&#47;&#47;=============Konfig Rotasi Servo===============</font>
<font color="#78dbe7">int</font> <font color="#f8f8f2">rotasi_buka</font> <font color="#a8db75">=</font> <font color="#ffcd22">180</font><font color="#f8f8f2">;</font>
<font color="#78dbe7">int</font> <font color="#f8f8f2">rotasi_tutup</font> <font color="#a8db75">=</font> <font color="#ffcd22">0</font><font color="#f8f8f2">;</font>
<font color="#78dbe7">int</font> <font color="#f8f8f2">durasi_swipe</font> <font color="#a8db75">=</font> <font color="#ffcd22">2000</font><font color="#f8f8f2">;</font> <font color="#434f54">&#47;&#47;2 detik</font>

<font color="#434f54">&#47;&#47;=============Konfig rtc rotasi 1===============</font>
<font color="#78dbe7">int</font> <font color="#f8f8f2">rotate1_Hour</font> <font color="#a8db75">=</font> <font color="#ffcd22">20</font><font color="#f8f8f2">;</font>
<font color="#78dbe7">int</font> <font color="#f8f8f2">rotate1_Minute</font> <font color="#a8db75">=</font> <font color="#ffcd22">12</font><font color="#f8f8f2">;</font>
<font color="#78dbe7">int</font> <font color="#f8f8f2">rotate1_Second</font> <font color="#a8db75">=</font> <font color="#ffcd22">10</font><font color="#f8f8f2">;</font>

<font color="#434f54">&#47;&#47;=============Konfig rtc rotasi 2===============</font>
<font color="#78dbe7">int</font> <font color="#f8f8f2">rotate2_Hour</font> <font color="#a8db75">=</font> <font color="#ffcd22">20</font><font color="#f8f8f2">;</font>
<font color="#78dbe7">int</font> <font color="#f8f8f2">rotate2_Minute</font> <font color="#a8db75">=</font> <font color="#ffcd22">12</font><font color="#f8f8f2">;</font>
<font color="#78dbe7">int</font> <font color="#f8f8f2">rotate2_Second</font> <font color="#a8db75">=</font> <font color="#ffcd22">40</font><font color="#f8f8f2">;</font>

<font color="#78dbe7">void</font> <font color="#a99cf2">setup</font> <font color="#e8e2b7">(</font><font color="#e8e2b7">)</font> <font color="#e8e2b7">{</font>

<font color="#a99cf2">#ifndef</font> <font color="#f8f8f2">ESP8266</font>
 &nbsp;<font color="#a99cf2">while</font> <font color="#e8e2b7">(</font><font color="#a8db75">!</font><b><font color="#a8db75">Serial</font></b><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
<font color="#a99cf2">#endif</font>

 &nbsp;<b><font color="#a8db75">Serial</font></b><font color="#a8db75">.</font><font color="#78dbe7">begin</font><font color="#e8e2b7">(</font><font color="#ffcd22">9600</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>

 &nbsp;<font color="#78dbe7">delay</font><font color="#e8e2b7">(</font><font color="#ffcd22">3000</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font> <font color="#434f54">&#47;&#47; wait for console opening</font>

 &nbsp;<font color="#a99cf2">if</font> <font color="#e8e2b7">(</font><font color="#a8db75">!</font> <font color="#f8f8f2">rtc</font><font color="#a8db75">.</font><font color="#78dbe7">begin</font><font color="#e8e2b7">(</font><font color="#e8e2b7">)</font><font color="#e8e2b7">)</font> <font color="#e8e2b7">{</font>
 &nbsp;&nbsp;&nbsp;<b><font color="#a8db75">Serial</font></b><font color="#a8db75">.</font><font color="#78dbe7">println</font><font color="#e8e2b7">(</font><font color="#a99cf2">&#34;Couldn&#39;t find RTC&#34;</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;&nbsp;&nbsp;<font color="#a99cf2">while</font> <font color="#e8e2b7">(</font><font color="#ffcd22">1</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;<font color="#e8e2b7">}</font>

 &nbsp;<font color="#a99cf2">if</font> <font color="#e8e2b7">(</font><font color="#f8f8f2">rtc</font><font color="#a8db75">.</font><font color="#78dbe7">lostPower</font><font color="#e8e2b7">(</font><font color="#e8e2b7">)</font><font color="#e8e2b7">)</font> <font color="#e8e2b7">{</font>
 &nbsp;&nbsp;&nbsp;<b><font color="#a8db75">Serial</font></b><font color="#a8db75">.</font><font color="#78dbe7">println</font><font color="#e8e2b7">(</font><font color="#a99cf2">&#34;RTC lost power, lets set the time!&#34;</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;&nbsp;&nbsp;<font color="#f8f8f2">rtc</font><font color="#a8db75">.</font><font color="#78dbe7">adjust</font><font color="#e8e2b7">(</font><b><font color="#a8db75">DateTime</font></b><font color="#e8e2b7">(</font><font color="#f8f8f2">F</font><font color="#e8e2b7">(</font><font color="#a99cf2">__DATE__</font><font color="#e8e2b7">)</font><font color="#a8db75">,</font> <font color="#f8f8f2">F</font><font color="#e8e2b7">(</font><font color="#a99cf2">__TIME__</font><font color="#e8e2b7">)</font><font color="#e8e2b7">)</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;<font color="#e8e2b7">}</font>
 &nbsp;<font color="#f8f8f2">myservo</font><font color="#a8db75">.</font><font color="#78dbe7">attach</font><font color="#e8e2b7">(</font><font color="#ffcd22">2</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;<font color="#f8f8f2">myservo</font><font color="#a8db75">.</font><font color="#78dbe7">write</font><font color="#e8e2b7">(</font><font color="#f8f8f2">rotasi_tutup</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>

 &nbsp;<font color="#434f54">&#47;&#47; (Tahun, Bulan, Tanggal, Jam, Menit, Detik)</font>
 &nbsp;<font color="#434f54">&#47;&#47;rtc.adjust(DateTime(2014, 8, 3, 20, 0, 0));</font>
<font color="#e8e2b7">}</font>

<font color="#78dbe7">void</font> <font color="#a99cf2">loop</font> <font color="#e8e2b7">(</font><font color="#e8e2b7">)</font> <font color="#e8e2b7">{</font>
 &nbsp;<b><font color="#a8db75">DateTime</font></b> <font color="#78dbe7">now</font> <font color="#a8db75">=</font> <font color="#f8f8f2">rtc</font><font color="#a8db75">.</font><font color="#78dbe7">now</font><font color="#e8e2b7">(</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;<b><font color="#a8db75">Serial</font></b><font color="#a8db75">.</font><font color="#78dbe7">print</font><font color="#e8e2b7">(</font><font color="#78dbe7">now</font><font color="#a8db75">.</font><font color="#78dbe7">year</font><font color="#e8e2b7">(</font><font color="#e8e2b7">)</font><font color="#a8db75">,</font> <font color="#78dbe7">DEC</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;<b><font color="#a8db75">Serial</font></b><font color="#a8db75">.</font><font color="#78dbe7">print</font><font color="#e8e2b7">(</font><font color="#78dbe7">&#39;&#47;&#39;</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;<b><font color="#a8db75">Serial</font></b><font color="#a8db75">.</font><font color="#78dbe7">print</font><font color="#e8e2b7">(</font><font color="#78dbe7">now</font><font color="#a8db75">.</font><font color="#78dbe7">month</font><font color="#e8e2b7">(</font><font color="#e8e2b7">)</font><font color="#a8db75">,</font> <font color="#78dbe7">DEC</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;<b><font color="#a8db75">Serial</font></b><font color="#a8db75">.</font><font color="#78dbe7">print</font><font color="#e8e2b7">(</font><font color="#78dbe7">&#39;&#47;&#39;</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;<b><font color="#a8db75">Serial</font></b><font color="#a8db75">.</font><font color="#78dbe7">print</font><font color="#e8e2b7">(</font><font color="#78dbe7">now</font><font color="#a8db75">.</font><font color="#78dbe7">day</font><font color="#e8e2b7">(</font><font color="#e8e2b7">)</font><font color="#a8db75">,</font> <font color="#78dbe7">DEC</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;<b><font color="#a8db75">Serial</font></b><font color="#a8db75">.</font><font color="#78dbe7">print</font><font color="#e8e2b7">(</font><font color="#78dbe7">&#39; &#39;</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;<b><font color="#a8db75">Serial</font></b><font color="#a8db75">.</font><font color="#78dbe7">print</font><font color="#e8e2b7">(</font><font color="#78dbe7">now</font><font color="#a8db75">.</font><font color="#78dbe7">hour</font><font color="#e8e2b7">(</font><font color="#e8e2b7">)</font><font color="#a8db75">,</font> <font color="#78dbe7">DEC</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;<b><font color="#a8db75">Serial</font></b><font color="#a8db75">.</font><font color="#78dbe7">print</font><font color="#e8e2b7">(</font><font color="#78dbe7">&#39;:&#39;</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;<b><font color="#a8db75">Serial</font></b><font color="#a8db75">.</font><font color="#78dbe7">print</font><font color="#e8e2b7">(</font><font color="#78dbe7">now</font><font color="#a8db75">.</font><font color="#78dbe7">minute</font><font color="#e8e2b7">(</font><font color="#e8e2b7">)</font><font color="#a8db75">,</font> <font color="#78dbe7">DEC</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;<b><font color="#a8db75">Serial</font></b><font color="#a8db75">.</font><font color="#78dbe7">print</font><font color="#e8e2b7">(</font><font color="#78dbe7">&#39;:&#39;</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;<b><font color="#a8db75">Serial</font></b><font color="#a8db75">.</font><font color="#78dbe7">print</font><font color="#e8e2b7">(</font><font color="#78dbe7">now</font><font color="#a8db75">.</font><font color="#78dbe7">second</font><font color="#e8e2b7">(</font><font color="#e8e2b7">)</font><font color="#a8db75">,</font> <font color="#78dbe7">DEC</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;<b><font color="#a8db75">Serial</font></b><font color="#a8db75">.</font><font color="#78dbe7">println</font><font color="#e8e2b7">(</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>

 &nbsp;<font color="#a99cf2">if</font> <font color="#e8e2b7">(</font><font color="#78dbe7">now</font><font color="#a8db75">.</font><font color="#78dbe7">hour</font><font color="#e8e2b7">(</font><font color="#e8e2b7">)</font> <font color="#a8db75">==</font> <font color="#f8f8f2">rotate1_Hour</font> <font color="#a8db75">&amp;&amp;</font> <font color="#78dbe7">now</font><font color="#a8db75">.</font><font color="#78dbe7">minute</font><font color="#e8e2b7">(</font><font color="#e8e2b7">)</font> <font color="#a8db75">==</font> <font color="#f8f8f2">rotate1_Minute</font> <font color="#a8db75">&amp;&amp;</font> <font color="#78dbe7">now</font><font color="#a8db75">.</font><font color="#78dbe7">second</font><font color="#e8e2b7">(</font><font color="#e8e2b7">)</font> <font color="#a8db75">==</font> <font color="#f8f8f2">rotate1_Second</font><font color="#e8e2b7">)</font> <font color="#e8e2b7">{</font>
 &nbsp;&nbsp;&nbsp;<b><font color="#a8db75">Serial</font></b><font color="#a8db75">.</font><font color="#78dbe7">println</font><font color="#e8e2b7">(</font><font color="#a99cf2">&#34; &gt;&gt; Servo bergerak ke &#34;</font> <font color="#a8db75">+</font> <font color="#78dbe7">String</font><font color="#e8e2b7">(</font><font color="#f8f8f2">rotasi_buka</font><font color="#e8e2b7">)</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;&nbsp;&nbsp;<font color="#f8f8f2">myservo</font><font color="#a8db75">.</font><font color="#78dbe7">write</font><font color="#e8e2b7">(</font><font color="#f8f8f2">rotasi_buka</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;&nbsp;&nbsp;<font color="#78dbe7">delay</font><font color="#e8e2b7">(</font><font color="#f8f8f2">durasi_swipe</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;&nbsp;&nbsp;<font color="#f8f8f2">myservo</font><font color="#a8db75">.</font><font color="#78dbe7">write</font><font color="#e8e2b7">(</font><font color="#f8f8f2">rotasi_tutup</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;&nbsp;&nbsp;<b><font color="#a8db75">Serial</font></b><font color="#a8db75">.</font><font color="#78dbe7">println</font><font color="#e8e2b7">(</font><font color="#a99cf2">&#34; &gt;&gt; Servo bergerak ke &#34;</font> <font color="#a8db75">+</font> <font color="#78dbe7">String</font><font color="#e8e2b7">(</font><font color="#f8f8f2">rotasi_tutup</font><font color="#e8e2b7">)</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;&nbsp;&nbsp;<b><font color="#a8db75">Serial</font></b><font color="#a8db75">.</font><font color="#78dbe7">println</font><font color="#e8e2b7">(</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;<font color="#e8e2b7">}</font>
 &nbsp;<font color="#a99cf2">else</font> <font color="#a99cf2">if</font> <font color="#e8e2b7">(</font><font color="#78dbe7">now</font><font color="#a8db75">.</font><font color="#78dbe7">hour</font><font color="#e8e2b7">(</font><font color="#e8e2b7">)</font> <font color="#a8db75">==</font> <font color="#f8f8f2">rotate2_Hour</font> <font color="#a8db75">&amp;&amp;</font> <font color="#78dbe7">now</font><font color="#a8db75">.</font><font color="#78dbe7">minute</font><font color="#e8e2b7">(</font><font color="#e8e2b7">)</font> <font color="#a8db75">==</font> <font color="#f8f8f2">rotate2_Minute</font> <font color="#a8db75">&amp;&amp;</font> <font color="#78dbe7">now</font><font color="#a8db75">.</font><font color="#78dbe7">second</font><font color="#e8e2b7">(</font><font color="#e8e2b7">)</font> <font color="#a8db75">==</font> <font color="#f8f8f2">rotate2_Second</font><font color="#e8e2b7">)</font> <font color="#e8e2b7">{</font>
 &nbsp;&nbsp;&nbsp;<b><font color="#a8db75">Serial</font></b><font color="#a8db75">.</font><font color="#78dbe7">println</font><font color="#e8e2b7">(</font><font color="#a99cf2">&#34; &gt;&gt; Servo bergerak ke &#34;</font> <font color="#a8db75">+</font> <font color="#78dbe7">String</font><font color="#e8e2b7">(</font><font color="#f8f8f2">rotasi_buka</font><font color="#e8e2b7">)</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;&nbsp;&nbsp;<font color="#f8f8f2">myservo</font><font color="#a8db75">.</font><font color="#78dbe7">write</font><font color="#e8e2b7">(</font><font color="#f8f8f2">rotasi_buka</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;&nbsp;&nbsp;<font color="#78dbe7">delay</font><font color="#e8e2b7">(</font><font color="#f8f8f2">durasi_swipe</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;&nbsp;&nbsp;<font color="#f8f8f2">myservo</font><font color="#a8db75">.</font><font color="#78dbe7">write</font><font color="#e8e2b7">(</font><font color="#f8f8f2">rotasi_tutup</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;&nbsp;&nbsp;<b><font color="#a8db75">Serial</font></b><font color="#a8db75">.</font><font color="#78dbe7">println</font><font color="#e8e2b7">(</font><font color="#a99cf2">&#34; &gt;&gt; Servo bergerak ke &#34;</font> <font color="#a8db75">+</font> <font color="#78dbe7">String</font><font color="#e8e2b7">(</font><font color="#f8f8f2">rotasi_tutup</font><font color="#e8e2b7">)</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;&nbsp;&nbsp;<b><font color="#a8db75">Serial</font></b><font color="#a8db75">.</font><font color="#78dbe7">println</font><font color="#e8e2b7">(</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
 &nbsp;<font color="#e8e2b7">}</font>

 &nbsp;<font color="#78dbe7">delay</font><font color="#e8e2b7">(</font><font color="#ffcd22">1000</font><font color="#e8e2b7">)</font><font color="#f8f8f2">;</font>
<font color="#e8e2b7">}</font>

</pre>
    </div>
    <script>
        let copyBtn = document.getElementById('copy');

        copyBtn.addEventListener('click', copyText);

        function copyText(ev) {
           
            let div = document.getElementById('sketch');
            let text = div.innerText;
            let textArea = document.createElement('textarea');
            textArea.width = "1px";
            textArea.height = "1px";
            textArea.background = "transparents";
            textArea.value = text;
            document.body.append(textArea);
            textArea.select();
            document.execCommand('copy'); //No i18n
            document.body.removeChild(textArea);
            swal("Sketch Copied", "Paste Sketch on Arduino IDE", "success")
        }
    </script>
    <div class="overlay toggle-menu"></div>
</body>