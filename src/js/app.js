var mainImg = document.getElementById("main-img")
var blurImg = document.getElementById("blur-img")
    //getElementsByClassName return an array using [] when call the var

function myFun(){
    
    var distancePX = $(document).scrollTop()
    var test = document.getElementById("test")
    var subtitle = document.getElementById("sub-title")
    var nav = document.getElementById("nav")
    
    var body = document.querySelector(".test")
    var all = body.querySelectorAll("#nav-text1,#nav-text2,#nav-text3,#nav-text4")
    
    if (distancePX <= 300){
        mainImg.classList.add("show")
        mainImg.classList.remove("hide")

        subtitle.classList.add("hide")
        subtitle.classList.remove("show")

        test.classList.add("show")
        test.classList.remove("hide")

        nav.style.background = "transparent"
        nav.classList.remove("navbar-light")
        nav.classList.remove("bg-light")
        
        all.forEach(function(ele){
            ele.classList.add("text-light")
            ele.classList.remove("text-muted")
        })
       
    }else{
        mainImg.classList.add("hide")
        mainImg.classList.remove("show")

        subtitle.classList.add("show")
        subtitle.classList.remove("hide")

        test.classList.add("hide")
        test.classList.remove("show")

        nav.classList.add("navbar-light")
        nav.classList.add("bg-light")

        all.forEach(function(ele){
            ele.classList.add("text-muted")
            ele.classList.remove("text-light")
        })
    }


}




function showSection(buttion_id){
    var warehouse = document.getElementById("warehouse-list")
    var distribution = document.getElementById("distribution-list")
    var fleet = document.getElementById("fleet-list")

    if(buttion_id === "warehouse"){
        console.log(warehouse)
        warehouse.style.display = "block"
        distribution.style.display = "none"
        fleet.style.display = "none"


    }else if(buttion_id ==="distribution"){
        console.log(distribution)

        warehouse.style.display = "none"
        distribution.style.display = "block"
        fleet.style.display = "none"

    }else if(buttion_id ==="fleet"){
        console.log(fleet)

        warehouse.style.display = "none"
        distribution.style.display = "none"
        fleet.style.display = "block"

    }
}