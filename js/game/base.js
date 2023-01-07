var canvas = document.getElementById("canvas")
var context = canvas.getContext("2d")
var playerX = 0
var playerY = 0



function loop() {
   update()
   render()
}

function update() {
   
}

function render() {
   context.fillStyle = "red"
   context.fillRect(playerX,playerY)
}


var keys = []
window.addEventListener("keydown",function(e) {
    keys[e.keyCode] = true
})
window.addEventListener("keyup",function(e) {
    keys[e.keyCode] = false
})



if(keys[37] == true) {
    playerX = playerX - 10
}
if(keys[38] == true) {
    playerY = playerY - 10
}
if(keys[39] == true) {
    playerX = playerX + 10
}
if(keys[40] == true) {
    playerY = playerY + 10
}


context.clearRect(0,0,800,600)
context.fillStyle = "red"
context.fillRect(playerX,playerY,playerSize,playerSize)