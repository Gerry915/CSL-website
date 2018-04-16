    var mainImg = document.getElementsByClassName("main-img")
    var blurImg = document.getElementsByClassName("blur-img")
    //getElementsByClassName return an array using [] when call the var

function myFun(){
    
    var distancePX = $(document).scrollTop();
    if (distancePX <= 300){
    console.log(distancePX)
    console.log(mainImg)
    }else{
        console.log("Not there yet")
        console.log(blurImg)
    }
}