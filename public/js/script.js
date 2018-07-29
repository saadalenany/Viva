// CUSTOM SCRIPT

// (+/-) Button 
$("p .btn").on("click", function(){
    var $btn = $(this);
    var oldVal = $btn.parent().find("input").val();
    if($btn.text() == "+"){
        var newVal = parseFloat(oldVal) + 1;
    }else{
        if(oldVal > 0){
            var newVal = parseFloat(oldVal) - 1;
        }else{
            newVal = 0;
        }
    }
    $btn.parent().find("input").val(newVal);
});

// pgwslider
$('.pgwSlider').pgwSlider({
    listPosition: 'left',
    displayControls: 'true'
});