function quickSearch(search_text, search_textResult, min_symb, url)
{   if($F(search_text).length > min_symb)
    { 
       var params = 'stext=' + $F(search_text);
	   var ajax   = new Ajax.Updater( {success: search_textResult}, url,									
                                       {method: 'get',
                                        parameters: params,
                                        onFailure: 'reportError', evalScripts: true}
                                     );		

    }	
}

function quickSearchJournal(search_text, search_textResult, tab, min_symb, url)
{   if($F(search_text).length > min_symb)
    { 
       var params = 'stext=' + $F(search_text)+'&tab=' + $F(tab);
	   var ajax   = new Ajax.Updater( {success: search_textResult}, url,									
                                       {method: 'get',
                                        parameters: params,
                                        onFailure: 'reportError', evalScripts: true}
                                     );		

    }	
}

function updateTag(search_textResult, url, params)
{ var ajax   = new Ajax.Updater( {success: search_textResult}, url,									
                                       {method: 'get',
                                        parameters: params,
                                        onFailure: 'reportError', evalScripts: true}
                                     );		
//  new Effect.Fade(search_textResult); 
 new Effect.Grow(search_textResult); 

}
  
  
function institution(instVar)
{
       var url    = 'src/responses/institution.php';
       var params = 'inst=' + instVar;
       var ajax   = new Ajax.Updater(
                                       {success: 'institution_Result'},
                                        url,
                                       {method: 'get',
                                        parameters: params,
                                        onFailure: 'reportError', evalScripts: true}
                                     );
      var ajax2   = new Ajax.Updater( {success: 'subdepTAG'}, 'src/responses/subdepTAG.php',
                                       {method: 'get',
                                        parameters: 'IDdep=0&stat=0',
                                        onFailure: 'reportError', evalScripts: true}
                                     );

}

function subdeps()
{
       var url    = 'src/responses/subdepTAG.php';
       var params = 'IDdep='+$F(IDdep)+'&stat=1';
       var ajax   = new Ajax.Updater(
                                       {success: 'subdepTAG'},
                                        url,
                                       {method: 'get',
                                        parameters: params,
                                        onFailure: 'reportError', evalScripts: true}
                                     );
}


  
//  open(url+'?'+params);  
//document.write('search_text='+$F(search_text)+', search_textResult='+search_textResult); 	   
