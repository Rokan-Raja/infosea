$("#m1").keyup(function () { 
    var m3=$("#m3").val();
    var m2=$("#m2").val();
    var m1=$("#m1").val();
    if(m1 == "")
    {
        m1=0;
    }
    if(m2 == "")
    {
        m2=0;
    }
    if(m3 == "")
    {
        m3=0;
    }
    if(parseFloat(m1)>=11)
    {
    $(".form-m1").html("Enter Maximum 10 Mark !!");
    $("#tot").val("0");
    }
    else
    {
    var tot=parseFloat(m1)+parseFloat(m2)+parseFloat(m3);
    if(tot<=30)
    {
    $("#tot").val(tot);
    $(".form-m1").html("");  
    }
    else
    {
    $("#tot").val(0);   
    }
    }
});
$("#m2").keyup(function () { 
    var m3=$("#m3").val();
    var m2=$("#m2").val();
    var m1=$("#m1").val();
    if(m1 == "")
    {
        m1=0;
    }
    if(m2 == "")
    {
        m2=0;
    }
    if(m3 == "")
    {
        m3=0;
    }
    if(parseFloat(m2)>=11)
    {
    $(".form-m2").html("Enter Maximum 10 Mark !!");
    $("#tot").val("0");
    }
    else
    {
    var tot=parseFloat(m1)+parseFloat(m2)+parseFloat(m3);
    if(tot<=30)
    {
    $("#tot").val(tot);
    $(".form-m2").html("");  
    }
    else
    {
    $("#tot").val(0);   
    }
    }
});
    $("#m3").keyup(function () { 
    var m3=$("#m3").val();
    var m2=$("#m2").val();
    var m1=$("#m1").val();
    if(m1 == "")
    {
        m1=0;
    }
    if(m2 == "")
    {
        m2=0;
    }
    if(m3 == "")
    {
        m3=0;
    }
    if(parseFloat(m3)>=11)
    {
    $(".form-m3").html("Enter Maximum 10 Mark !!");
    $("#tot").val("0");
    }
    else
    {
    var tot=parseFloat(m1)+parseFloat(m2)+parseFloat(m3);
    if(tot<=30)
    {
    $("#tot").val(tot);
    $(".form-m3").html("");  
    }
    else
    {
    $("#tot").val(0);   
    }
    }
});