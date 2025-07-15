<?php
$ym =$_SERVER['HTTP_HOST'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
<link rel="icon" href="favicon.ico">
<title>小永高吖的文件存储空间</title>
<!-- 主体css -->
<style>
.yc {
  display: none;
}
ul {
  padding-left: 20px;
}
ul li {
  line-height: 2.3;
}
.srk {
    padding: 8px;
    background-color: #fff9;
    border:1px solid #000;
}
.zhuti {
  width: 70%;
  background-color: #ccc9;
  padding: 2% 5%;
  border-radius: 10px
}
.dilan {
    background-color: #9999;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 10px;
    text-align: center;
}
.dilan a {
    color: #00f;
    text-decoration: none;
}
.dinglan {
    background-color: #9999;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 10px;
}
.dinglan a {
    color: #00f;
    text-decoration: none;
}
.botton {
    background-color:#fff;
    border:1px solid #000;
    text-shadow:0px 1px 0px #fff;
    display:inline-block;
    cursor:pointer;
    color:#000;
    font-family:Arial;
    font-size:15px;
    padding:9px 16px;
    text-decoration:none;
    position:relative;
    top:1px;
}
.fileuploadxz {
    border:3px solid #7779;
    height: 250px; 
    background-image: url('fileuploadxz.png');
    background-repeat: no-repeat;
    background-size: 100%100%;
    background-attachment: scroll;
}
.fileupload {
    width: 100%;
    height: 100%;
}
body {
    background-repeat: no-repeat;
    background-size: 100%100%;
    background-attachment: fixed;
}
@media screen and (orientation: landscape) {
body {
    background-image: url('bg.png');
}
.zhuti {
    margin: 5% auto 0;
}
.srk {
    width: 50%;
}
.fileuploadxz {
    width: 70%;
}
}
@media screen and (orientation: portrait) {
body {
    background-image: url('bg_m.png');
}
.zhuti {
    margin: 20% auto 0;
}
.srk {
    width: 90%;
}
.fileuploadxz {
    width: 100%;
}
}
</style>
</head>
<body>
<!-- 极简上传方式，仅供不支持js环境所使用 -->
<noscript>
<style>.dinglan{display:none;} .zhuti{display:none;} .dilan{display:none;} .scui1{display:none;} .scui2{display:none;}</style>
<p><b>您的浏览器不支持javascript环境或您未启用javascript，所以您正在使用极简上传方式</b></p>
<form action="uploadapi.php" method="post" enctype="multipart/form-data"><input type="file" id="file" name="file" class="file"><input type="submit" class="botton" value="上传"></form>
<a href="filelist.php" target="_blank">文件列表</a>&nbsp;<a href="https://xiaoyonggaoya.pages.dev/xygywjcc" target="_blank">存储空间列表</a>
</noscript>
<div class="dinglan"><b>小永高吖的文件存储空间(https://<?php echo($ym) ?>)</b>
<!-- 最后加五个空格，防止浏览器滚动条遮挡 -->
<span style="float: right"><a href="login.php" target="_blank">登&nbsp;录</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></div>
<div class="zhuti">
<!-- 上传方式1，js提交 -->
<div id="scui1">
<br/><b><a href="?cq=1">切换为备用上传方式</a></b><br/>
<div><h1>请选择要上传的文件</h1>
<p><label><div class="fileuploadxz"><input type="file" id="file" class="fileupload"></div></label></p>
<button class="botton" onclick="pre_upload()">上传</button></div>
<p><div id="tishi"></div></p>
<p><b><label>文件访问链接为：<input type="text" id="wjname" class="srk"></label><br/>
(需等待提示文件上传成功后才可使用)</b></p>
<p><b><label>图片文件直链为：<input type="text" id="imglink" class="srk"></label><br/>
(仅图片文件可用，可以挂在其它网站正常加载)</b></p>
<p><b><label>视频播放链接为：<input type="text" id="player" class="srk"></label><br/>
(仅视频/音频类文件可用，带播放器ui)</b></p>
<p><b><label>图片查看链接为：<input type="text" id="imgview" class="srk"></label><br/>
(仅图片文件可用，非图片直链)</b></p>
</div>
<!-- 上传方式2，form提交 -->
<div id="scui2">
<br/><b><a href="?cq=0">切换为正常上传方式</a></b><br/>
<form action="uploadapi.php" method="post" enctype="multipart/form-data">
<div><h1>请选择要上传的文件</h1>
<p><label><div class="fileuploadxz"><input type="file" id="file" name="file" class="fileupload"></div></label></p>
<input type="submit" class="botton" value="上传"></div></form>
</div>
<!-- 此部分公用 -->
<h3>请勿上传违反中华人民共和国相关法律的文件，如检查时遇到将立即删除</h3>
<b>广告：</b><br/><img src="ad.png" id="adimg" width="100%" max-width="100%" onclick="window.open('https://blog.xiaoyonggaoya.tbit.top')" alt="广告"><br/>
</div>
<div class="dilan">
Copyright&nbsp;©&nbsp;<span class="copyrighttime">114514</span>&nbsp;by&nbsp;小永高吖&nbsp;
页面访问量：<span id="fwltj">0</span>
<!-- 网站备案号，请替换成自己的，没有就直接注释掉 -->
<!--&nbsp;<a href="https://beian.miit.gov.cn/" target="_blank">替换成你自己的备案号</a>--><br/>
<a href="filelist.php" target="_blank">文件列表</a>&nbsp;
<a href="javascript:location.reload();">刷新此页面</a>&nbsp;
<a href="sjwjapiwd.php" target="_blank">随机文件api</a>
</div>
<h2>&nbsp;</h2>
</body>
<!-- js部分 -->
<!-- 底栏年份统计 -->
<script>
var t = null;
    t = setTimeout(time, 1000); 
function time() {
    clearTimeout(t); 
    dt = new Date();
    var y = dt.getFullYear();
    document.querySelector(".copyrighttime").innerHTML =
    y +
    "";
    t = setTimeout(time, 86400000); 
}
</script>
<!-- 访问量统计 -->
<script>
fetch('/fwl.php')
.then(response => response.json())
.then(data => {
document.getElementById('fwltj').innerText = data.visitCount;
})
.catch(error => console.error('0:', error));
</script>
<!-- 上传模式切换 -->
<script>
function getQueryParam(name) {
     const urlParams = new URLSearchParams(window.location.search);
     return urlParams.get(name);
 }
function toggleDivs() {
     const cq = getQueryParam('cq');
     const scui1 = document.getElementById('scui1');
     const scui2 = document.getElementById('scui2');
     if (cq === '1') {
     scui1.classList.add('yc');
     scui2.classList.remove('yc');
     }
     else if (!cq || cq === '' || cq === '0') {
     scui1.classList.remove('yc');
     scui2.classList.add('yc');
     } 
 }
window.onload = toggleDivs;
</script>
<!-- js上传提交部分 -->
<script>
function upload(fileInputId, fileIndex){
var file = document.getElementById(fileInputId).files[fileIndex];
var blob;
var reader = new FileReader();
reader.readAsArrayBuffer(file);
reader.onloadend  = function(evt){
xhr = new XMLHttpRequest();
xhr.open("POST", "upload.php?f=" + file.name, true);
XMLHttpRequest.prototype.mySendAsBinary = function(text){
var ui8a = new Uint8Array(new Int8Array(text));
if(typeof window.Blob == "function"){
blob = new Blob([ui8a]);
}
else{
var bb = new (window.MozBlobBuilder || window.WebKitBlobBuilder || window.BlobBuilder)();
bb.append(ui8a);
blob = bb.getBlob();
}
this.send(blob);
}
var eventSource = xhr.upload || xhr;
eventSource.addEventListener("progress", function(e) {
var position = e.position || e.loaded;
var total = e.totalSize || e.total;
var percentage = Math.round((position/total)*100);
});
xhr.onreadystatechange = function()
{
if(this.readyState == 4 && this.status == 200){
document.getElementById("tishi").innerHTML = `<b>文件上传成功</b>`;
}};
xhr.mySendAsBinary(evt.target.result);
};}
function pre_upload(){
var inp = document.getElementById('file');
for (var i = 0; i < inp.files.length; ++i) {
upload("file", i);
}
var file = document.getElementById('file');
var wjname = document.getElementById('wjname');
if (file.files.length > 0) {
var file = file.files[0];
var fileName = file.name;
var domain = 'https://<?php echo($ym) ?>/f/';
var url = domain + fileName;
wjname.value = url;
}
var file = document.getElementById('file');
var imglink = document.getElementById('imglink');
if (file.files.length > 0) {
var file = file.files[0];
var fileName = file.name;
var domain = 'https://i1.wp.com/<?php echo($ym) ?>/f/';
var url1 = domain + fileName;
imglink.value = url1;
}
var file = document.getElementById('file');
var player = document.getElementById('player');
if (file.files.length > 0) {
var file = file.files[0];
var fileName = file.name;
var domain = 'https://<?php echo($ym) ?>/player.php?filename=';
var url2 = domain + fileName;
player.value = url2;
}
var file = document.getElementById('file');
var imgview = document.getElementById('imgview');
if (file.files.length > 0) {
var file = file.files[0];
var fileName = file.name;
var domain = 'https://<?php echo($ym) ?>/imgview.html?filename=f/';
var url3 = domain + fileName;
imgview.value = url3;
}}
</script>
</html>
