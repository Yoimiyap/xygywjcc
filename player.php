<?php
$filename = $_GET["filename"];
$ym =$_SERVER['HTTP_HOST'];
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title><?php echo($filename) ?> - 视频播放器 - 小永高吖的文件存储空间(https://<?php echo($ym) ?>)</title>
<link href="DPlayer.min.css" rel="stylesheet">
<script src="DPlayer.min.js"></script>
<style type="text/css">
    body,html{width:100%;height:99%;background:#000;padding:0;margin:0;overflow-x:hidden;overflow-y:hidden}
    *{margin:0;border:0;padding:0;text-decoration:none}
    #stats{position:fixed;top:5px;left:10px;font-size:12px;color:#fdfdfd;z-index:2147483647;text-shadow:1px 1px 1px #000, 1px 1px 1px #000}
    #dplayer{position:inherit}
</style>
<style type="text/css">
#openplayer {
    border-color:#ccc;
    display: inline-block;
}
.ckbotton {
    background-color:#0d7;
    border:1px solid #000;
    text-shadow:0px 1px 0px #0d7;
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
.ofbotton {
    background-color:#f00;
    border:1px solid #000;
    text-shadow:0px 1px 0px #f00;
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
</style>
<script>document.addEventListener('contextmenu',function(e){e.preventDefault();})</script>
<div id="main" style="z-index:99999"><marquee direction="left" style="color:#fff"><?php echo($filename) ?> - 视频播放器 - 小永高吖的文件存储空间(https://<?php echo($ym) ?>)</marquee></div>
<div id="dplayer" style="z-index:11111"></div>
<script type="text/javascript">
const dp = new DPlayer({
container: document.getElementById('dplayer'),
volume: 1,
playbackSpeed: '0.25,0.5,0.75,1,1.25,1.5,1.75,2,2.5,3,3.5,4,4.5,5,5.5,6,6.5,7,7.5,8,8.5,9,9.5,10',
lang: 'zh-cn',
// screenshot: true,
video: {url: 'f/<?php echo($filename) ?>',pic: 'https://www.xiaoyonggaoya.tbit.top/xygywjcc/?zy=sploading',}, 
contextmenu: [
{text: '使用本地播放器播放',click: (dialog) => {openplayer.showModal();},},
{text: '在新标签页打开视频',link: 'f/<?php echo($filename) ?>'},
{text: '小永高吖的文件存储空间',link: '../'},
{text: '网页全屏模式',link: 'player.php?filename=<?php echo($filename) ?>'},
],});
</script>
<dialog id="openplayer"><div id="win">
<br/><p style="float:right"><a type="botton" class="ofbotton" title="关闭此窗口" onClick="openplayer.close()">关闭此窗口</a></p><br/><br/><br/><p>
<a type="botton" class="ckbotton" title="potplayer" href="potplayer://https://<?php echo($ym) ?>/f/<?php echo($filename) ?>">potplayer</a>&nbsp;
<a type="botton" class="ckbotton" title="vlc" href="vlc://https://<?php echo($ym) ?>/f/<?php echo($filename) ?>">vlc</a>&nbsp;
<a type="botton" class="ckbotton" title="iina" href="iina://weblink?url=https://<?php echo($ym) ?>/f/<?php echo($filename) ?>">iina</a>&nbsp;
<a type="botton" class="ckbotton" title="nplayer" href="nplayer://https://<?php echo($ym) ?>/f/<?php echo($filename) ?>">nplayer</a>&nbsp;
<a type="botton" class="ckbotton" title="mpc-hc" href="mpchc://https://<?php echo($ym) ?>/f/<?php echo($filename) ?>">mpc-hc</a>&nbsp;
<a type="botton" class="ckbotton" title="smplayer" href="smplayer://https://<?php echo($ym) ?>/f/<?php echo($filename) ?>">smplayer</a>&nbsp;
<a type="botton" class="ckbotton" title="kodi" href="kodi://https://<?php echo($ym) ?>/f/<?php echo($filename) ?>">kodi</a>&nbsp;
<a type="botton" class="ckbotton" title="plex" href="plex://https://<?php echo($ym) ?>/f/<?php echo($filename) ?>">plex</a>&nbsp;
<a type="botton" class="ckbotton" title="新标签页" target="_blank" href="https://<?php echo($ym) ?>/f/<?php echo($filename) ?>">新标签页</a></p>
<br/></div></dialog>