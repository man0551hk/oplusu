function SetCookieLang(lang_code, page)
{
  //console.log(lang_code, page);
  var d = new Date();
  d.setTime(d.getTime() + (30*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = "lang=" + lang_code + "; expires=" + expires +"; path=/";

  var parameter = location.search;
  page = page.replace(parameter, "");


  var redirect = page.replace(parameter, "").replace("/zh/", "").replace("/cn/", "").replace("/jp/", "").replace("/it/", "").replace("/zh", "").replace("/cn", "").replace("/jp", "").replace("/it", "");
  redirect = redirect.replace("//", "/");
  if(redirect == "/" || redirect == "")
  {
    redirect = "http://www.oplusu.net";
  }

  console.log(lang_code);
  if(lang_code.toLowerCase() != "zh")
  {
    //window.location = redirect + "/" + lang_code.toLowerCase() + parameter;
    redirect +=  lang_code.toLowerCase() + parameter;
    
  }
  else
  {
    //window.location = redirect + parameter;
    redirect = redirect + parameter;
  }
  redirect = redirect.replace("//", "/");
  //window.location =redirect;
  //console.log(redirect);
}
