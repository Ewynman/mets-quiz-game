$(document).ready(function()
{
    $("#but1").click(function()
    {
        $(".radoptions").show();
        $(".radoptions").attr("disabled",true);
        $("#but1").attr("disabled",true);
    })

})

    function displayans()
    {
        document.getElementById("Labmsg").innerHTML="";
        var results=document.getElementsByTagName('input');
        for(i=0;i<results.length;i++)
        {
            if(results[i].type=="radio")
            {
                if(results[i].checked)
                {
                    document.getElementById("Labmsg").innerHTML+="Q"+results[i].name+")"+"You Selected: "+results[i].value+"<br/>";
                }
            }
        }
    }