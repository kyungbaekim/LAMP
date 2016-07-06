<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>NCBI API TEST</title>
  <script type="text/javascript" src='http://code.jquery.com/jquery-2.2.2.js'></script>
  <script>
    var db = 'pubmed';
    var retmax = '5';
    var base = 'http://eutils.ncbi.nlm.nih.gov/entrez/eutils/';
    $(document).ready(function() {
      $('.keyword').focus();
      $('form').submit(function() {
        $('.information').html('');
        var query = $('.keyword').val().replace(/[^a-z0-9]+/gi, '+');
        var url = base + 'esearch.fcgi?db='+db+'&retmode=json&term='+query+'&field=title&retmax='+retmax+'&usehistory=y';
        $.get(url, function(res) {
          display(res.esearchresult.idlist);
        }, 'json');
        return false;
      });
    });

    function display(idlist){
      var base2 = 'http://eutils.ncbi.nlm.nih.gov/entrez/eutils/efetch.fcgi';
      for(var i=0; i<idlist.length; i++){
        var url2 = base2 + '?db='+db+'&retmode=xml&id='+idlist[i];
        $.get(url2, function(xml) {
          var json = (xmlToJson(xml));
          var title = json.PubmedArticleSet[1].PubmedArticle.MedlineCitation.Article.ArticleTitle["#text"];
          var pmid = json.PubmedArticleSet[1].PubmedArticle.MedlineCitation.PMID["#text"];
          $('.information').append("<br><a href='http://www.ncbi.nlm.nih.gov/pubmed/" + pmid + "'>" + title + "</a>");
        }, 'xml');
      }
    }

    function xmlToJson(xml) {
    	var obj = {};
    	if (xml.nodeType == 1) { // element
    		// do attributes
    		if (xml.attributes.length > 0) {
    		obj["@attributes"] = {};
    			for (var j = 0; j < xml.attributes.length; j++) {
    				var attribute = xml.attributes.item(j);
    				obj["@attributes"][attribute.nodeName] = attribute.nodeValue;
    			}
    		}
    	} else if (xml.nodeType == 3) {
    		obj = xml.nodeValue;
    	}

    	// do children
    	if (xml.hasChildNodes()) {
    		for(var i = 0; i < xml.childNodes.length; i++) {
    			var item = xml.childNodes.item(i);
    			var nodeName = item.nodeName;
    			if (typeof(obj[nodeName]) == "undefined") {
    				obj[nodeName] = xmlToJson(item);
    			} else {
    				if (typeof(obj[nodeName].push) == "undefined") {
    					var old = obj[nodeName];
    					obj[nodeName] = [];
    					obj[nodeName].push(old);
    				}
    				obj[nodeName].push(xmlToJson(item));
    			}
    		}
    	}
    	return obj;
    };

  </script>
  <style>
    .wrapper{
      width: 1000px;
    }
  </style>
</head>
<body>
  <div class='wrapper'>
    <form>
      <input type='text' name='keyword' class='keyword'>
      <input type='submit' value='Search'>
    </form>
    <div class='information'></div>
  </div>
</body>
</html>
