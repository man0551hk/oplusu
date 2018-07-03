function SetCookieLang(lang_code, page)
{
  //console.log(lang_code, page);
  var d = new Date();
  d.setTime(d.getTime() + (30*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = "lang=" + lang_code + "; expires=" + expires +"; path=/";

  var parameter = location.search;
  page = page.replace(parameter, "");

  var redirect = page.replace(parameter, "").replace("/zh/", "").replace("/en/", "").replace("/cn/", "").replace("/jp/", "").replace("/it/", "").replace("/zh", "").replace("/cn", "").replace("/jp", "").replace("/it", "");

  if(redirect == "/" || redirect == "")
  {
    redirect = "http://www.oplusu.net";
  }

  if(lang_code.toLowerCase() != "zh")
  {
    redirect =  lang_code.toLowerCase() + "/" + redirect + "/" + parameter;
  }
  else
  {
    redirect = redirect + parameter;
  }
  redirect = redirect.replace(/\/\//g, "/");
  if (redirect.indexOf("http://www.oplusu.net") === -1)
  {
    redirect = "http://www.oplusu.net/" + redirect;
  }
  
  //console.log(redirect);
  window.location = redirect;
}
