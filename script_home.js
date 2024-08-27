function hamburgerFunc(){
    document.getElementById('sidebar').classList.toggle("animationSideBar")
    document.getElementById('navbar').classList.toggle("animationNavbar")
    document.getElementById('dashboardData').classList.toggle("animationDashboardData")
}
function displaySearch(e){
    console.log(e)
    if(e.keyCode === 13){
        var elm = document.getElementById('searchInput')
        alert('You are search for text"'+ elm.value +'"')
    }
}