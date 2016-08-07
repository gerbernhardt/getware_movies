<html>
<head>
 <title>Movies 3D::.</title>
 <script type="text/javascript" src="jwplayer.js"></script>
 <script type="text/javascript" src="jwplayer.html5.js"></script>
</head>
<body>

<div id="jwplayer"></div>
<script type="text/javascript">
$file='https://r1---sn-p5qlsnlr.c.docs.google.com/videoplayback?requiressl=yes&id=c58e63b1f690bc92&itag=59&source=webdrive&app=texmex&ip=2607:5300:60:7b55::&ipbits=32&expire=1463955368&sparams=requiressl%2Cid%2Citag%2Csource%2Cip%2Cipbits%2Cexpire&signature=6475E6C19AC70801A6E71AC4FC306A913B36692D.76882563B8BFE0C7911213B0B5A92184B4C00845&key=ck2&mm=30&mn=sn-p5qlsnlr&ms=nxu&mt=1463940844&mv=m&nh=IgpwcjAzLmlhZDA3KgkxMjcuMC4wLjE&pl=49';
$file='https://d24.usercdn.com:443/d/5iltyy2xtz2fvxijch3m7dapb3kgvns4e74g7ptwtggow5cga4cpzanw/video.mp4';
jwplayer.key='1sDia5EOz9GFSUQG4Rxg8jfInvCruw39Wt+GidudOTcSv+lr6XsX5tvutCs=';
jwplayer.key='9crUl/VxYlZgBo5+h/dEAucL0xXfWZM9xNEad4y/T9Yyr/utaZ7aBA==';
jwplayer.defaults={ph:2};
jwplayer('jwplayer').setup({ aspectratio:'16:9',
 width:'50%',
 skin:'blueflat.xml',
 primary:'html5',
 sources:[{file:$file,label:'720p HD',type:'video/mp4',default:true}],
 logo:{file:'logo.png',hide:true,link:'http://localhost/movies3d/'},
 tracks:[{file:'captions.srt',label:'Spanish',kind:'captions',default:true}],
 captions:{color:'f7f976',fontSize:18,fontFamily:'verdana',backgroundOpacity:0,edgeStyle:'uniform'}
});
</script>
<input type="submit" value="Ver" onclick="javascript:ver();">

</body>
</html>