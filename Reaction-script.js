            var start = new Date().getTime(); 
            
            function shapeAppear() {
                // make shape
                var top = Math.random() * 400;
                var left = Math.random() * 400;
                var width = Math.random() * 300 + 10;
                var height = Math.random() * 300 + 10;
                
                // Appear circle with probability of 50%
                if(Math.random() > 0.5) {
                    document.getElementById("shape").style.borderRadius = "50%";
                }
                else {
                    document.getElementById("shape").style.borderRadius = "0";
                }
                
                document.getElementById("shape").style.top = top+"px";
                document.getElementById("shape").style.left = left+"px";
                document.getElementById("shape").style.width = width+"px";
                document.getElementById("shape").style.height = height+"px";
                document.getElementById("shape").style.backgroundColor = getRandomColor();
                
                document.getElementById("shape").style.display = "block"
                start = new Date().getTime(); 
            }
            
            // random delay
            function appearAfterDelay() {
                setTimeout(shapeAppear,Math.random()*2000);
            }
            
            function getRandomColor() {
                var letter = "0123456789ABCDEF".split('');
                var color = "#";
                var i = 0;
                while(i < 6) {
                    color += letter[Math.floor(Math.random()*16)];
                    i++;
                }
                return color;
            }
            
            appearAfterDelay();

            document.getElementById("shape").onclick = function() {
                var end = new Date().getTime();
                document.getElementById("shape").style.display = "none";
                var timeTaken = (end-start)/1000;
                document.getElementById("timeTaken").innerHTML = timeTaken+"s";
                
                appearAfterDelay();
            }
