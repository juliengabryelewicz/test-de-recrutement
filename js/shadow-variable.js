const ARTICLE_LIST = [{name:"article 1", kudos:3},{name:"article 2", kudos:4},{name:"article 3", kudos:10}]; // In a real app this list would be full of articles.
const MAX_KUDOS = 5;

function calculateTotalKudos(articles) {
  var totalKudos = 0;
  
  for (let article of articles) {
    totalKudos += article.kudos;
  }
  
  return totalKudos;
}

document.write(`
  <p>Maximum kudos you can give to an article: ${MAX_KUDOS}</p>
  <p>Total Kudos already given across all articles: ${calculateTotalKudos(ARTICLE_LIST)}</p>
`);