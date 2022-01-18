var colors = ["#FFFFCC", "#CCFF00", "#33FF00", "#00FF99",
              "#66FFFF", "#00CCFF", "#0099FF", "#FF3333",
              "#F35B20", "#FB9A00", "#FFCC00", "#FEF200"];
    var restaraunts = ["짜장면", "국밥", "제육볶음", "치킨",
                      "피자", "햄버거", "도시락", "부대찌개",
                      "짬뽕", "쌀국수", "초밥", "냉면"];
   
   var startAngle = 0;
   var arc = Math.PI /6;
   var spinTimeout = null;
   
   var spinArcStart = 10;
   var spinTime = 0;
   var spinTimeTotal = 0;
   
   var ctx;
   
   function draw() {
     drawRouletteWheel();
   }
   
   function drawRouletteWheel() {
     var canvas = document.getElementById("wheelcanvas");
     if (canvas.getContext) {
       var outsideRadius = 230;
       var textRadius = 160;
       var insideRadius = 125;
       
       outsideRadius = canvas.width / 2.4;
       textRadius = canvas.width /2.9;
       insideRadius = canvas.width /3.2;
       
       ctx = canvas.getContext("2d");
       ctx.clearRect(0,0,500,500);
       ctx.strokeStyle = "black";
       ctx.lineWidth = 2;
       ctx.font = 'bold 25px Jeju Gothic';
       
       for(var i = 0; i < 12; i++) {
         var angle = startAngle + i * arc;
         ctx.fillStyle = colors[i];
         
         ctx.beginPath();
         ctx.arc(280, 280, outsideRadius, angle, angle + arc, false);
         ctx.arc(280, 280, insideRadius, angle + arc, angle, true);
         ctx.stroke();
         ctx.fill();
         
         ctx.save();
         ctx.shadowOffsetX = -1;
         ctx.shadowOffsetY = -1;
         ctx.shadowBlur    = 0;
         ctx.shadowColor   = "rgb(220,220,220)";
         ctx.fillStyle = "black";
         ctx.translate(280 + Math.cos(angle + arc / 2) * textRadius, 280 + Math.sin(angle + arc / 2) * textRadius);
         ctx.rotate(angle + arc / 2 + Math.PI / 2);
         var text = restaraunts[i];
         ctx.fillText(text, -ctx.measureText(text).width / 2, 0);
         ctx.restore();
       } 
       
       //Arrow
       ctx.fillStyle = "black";
       ctx.beginPath();
       ctx.moveTo(280 - 4, 280 - (outsideRadius + 5));
       ctx.lineTo(280 + 4, 280 - (outsideRadius + 5));
       ctx.lineTo(280 + 4, 280 - (outsideRadius - 5));
       ctx.lineTo(280 + 9, 280 - (outsideRadius - 5));
       ctx.lineTo(280 + 0, 280 - (outsideRadius - 13));
       ctx.lineTo(280 - 9, 280 - (outsideRadius - 5));
       ctx.lineTo(280 - 4, 280 - (outsideRadius - 5));
       ctx.lineTo(280 - 4, 280 - (outsideRadius + 5));
       ctx.fill();
     }
   }
   
   function spin() {
     spinAngleStart = Math.random() * 10 + 10;
     spinTime = 0;
     spinTimeTotal = Math.random() * 3 + 4 * 1000;
     rotateWheel();
   }
   
   function rotateWheel() {
     spinTime += 30;
     if(spinTime >= spinTimeTotal) {
       stopRotateWheel();
       return;
     }
     var spinAngle = spinAngleStart - easeOut(spinTime, 0, spinAngleStart, spinTimeTotal);
     startAngle += (spinAngle * Math.PI / 180);
     drawRouletteWheel();
     spinTimeout = setTimeout('rotateWheel()', 30);
   }
   
   function stopRotateWheel() {
     clearTimeout(spinTimeout);
     var degrees = startAngle * 180 / Math.PI + 90;
     var arcd = arc * 180 / Math.PI;
     var index = Math.floor((360 - degrees % 360) / arcd);
     ctx.save();
     ctx.font = 'bold 30px Jeju Gothic';
     var text = restaraunts[index]
     function answer(x){ //////////////////////////////////////////////////선택된 음식 이름
       text=x;
     }    

     ctx.fillText(text,  - ctx.measureText(text).width / 2 + 280, 280 + 10);
     ctx.restore();
   }
   
   function easeOut(t, b, c, d) {
     var ts = (t/=d)*t;
     var tc = ts*t;
     return b+c*(tc + -3*ts + 3*t);
   }

   draw();
   ///////////////////////// var text : 나온 음식 이름