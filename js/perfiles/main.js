function redir(url,seconds)
{
	var ss = seconds * 1000;
	window.setTimeout('window.location="'+url+'"; ',ss);
}