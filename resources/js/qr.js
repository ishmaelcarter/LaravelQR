function generateUUID()
{
	var d = new Date().getTime();

	if( window.performance && typeof window.performance.now === "function" )
	{
		d += performance.now();
	}

	var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c)
	{
		var r = (d + Math.random()*16)%16 | 0;
		d = Math.floor(d/16);
		return (c=='x' ? r : (r&0x3|0x8)).toString(16);
	});

return uuid;
}

function generateQR()
{
  const Http = new XMLHttpRequest();
  const url ='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' + generateUUID();
  Http.open("GET", url);
  Http.send();

  Http.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
        console.log(Http.responseText)
    }
  }
}

$( '#keygen' ).on('click',function()
{
	$( '#apikey' ).val( generateQR() );
});
