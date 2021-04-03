document.addEventListener("DOMContentLoaded", function(){
    var select = document.querySelector("select[id=pull_down_menu]");
    pull_down_menu.addEventListener('change', function(){
        document.pull_down.submit();
    }, false);
}, false);