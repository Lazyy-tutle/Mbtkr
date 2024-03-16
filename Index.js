$(document).ready(function(){
    $("#box").show();
    $('#range').on('change', function() {
        $('#val').text($(this).val());
    });
    $("#x").click(function(){
        $("#box").hide();
    });
    $("#box2").click(function(){
        $("#box").show();
    });
    $("#submit").click(function(){
        let nps = $("#range").val();
        let feedback = $("#feedback").val();
        if(feedback == ''){
            return false;
        }
        $.ajax({
            type: "POST",
            url: "post.php",
            data:{
                nps: nps,
                feedback: feedback
            },
            cache: false,
            success: function(data){
                window.alert(data);
            },
            error: function(xhr, status, error){
                console.error(xhr);
            }
        });
        $('#final').text("تمت العملية بنجاح");
        setTimeout(function() {
            $("#box").hide();
        }, 2000);
        return false;
    });
});
