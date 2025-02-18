<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use SimpleXMLElement;
use Phpfastcache\Helper\Psr16Adapter;



class NewsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    private $xmlUrlSpain = "https://feeds.elpais.com/mrss-s/pages/ep/site/elpais.com/section/internacional/portada";
    private $xmlUrlGerman = "https://www.tagesschau.de/infoservices/alle-meldungen-100~rss2.xml";
    private $xmlUrlItalian = "https://www.ansa.it/sito/notizie/mondo/mondo_rss.xml";
    private $xmlUrlEnglish = "https://www.reutersagency.com/feed/?taxonomy=best-sectors&post_type=best";
    private $cache;
    


    public function __construct()
    {
        $this->cache = new Psr16Adapter('files');
    }
    
    public function getNews($lang)
{
    // Check si existe cache data
    $cacheKey = 'rss_data_' . $lang;
    if ($this->cache->has($cacheKey)) {
        return response()->json($this->cache->get($cacheKey), 200, [
            'Access-Control-Allow-Origin' => '*'
        ]);
    }
    // fetchea
    $rss = $this->fetchRssData($lang);
    $this->cache->set($cacheKey, $rss, 86400); // 24 horas
    return response()->json($rss, 200, [
        'Access-Control-Allow-Origin' => '*'
    ]);
}
    public function fetchRssData($lang)
{
    // Select the RSS feed URL based on language
    switch ($lang) {
        case 'es':
            $xmlUrl = $this->xmlUrlSpain;
            break;
        case 'de':
            $xmlUrl = $this->xmlUrlGerman;
            break;
        case 'it':
            $xmlUrl = $this->xmlUrlItalian;
            break;
        case 'en':
            $xmlUrl = $this->xmlUrlEnglish;
            break;
        default:
            return []; // Retorna array vacío en caso de error
    }
    
    $xmlContent = @file_get_contents($xmlUrl);
    $rss = simplexml_load_string($xmlContent);
    
    if ($rss === false) {
        return []; // Retorna array vacío en caso de error
    }
    
    $maxItems = 10;
    $items = [];
    $count = 0;
    
    foreach ($rss->channel->item as $item) {
        // Limpiamos y procesamos cada campo
        $items[] = [
            'title' => preg_replace('/\s+/', ' ', trim(html_entity_decode(strip_tags((string)$item->title)))),
            'link' => preg_replace('/\s+/', ' ', trim(strip_tags((string)$item->link))),
            'description' => preg_replace('/\s+/', ' ', trim(html_entity_decode(strip_tags((string)$item->description)))),
            'pubDate' => preg_replace('/\s+/', ' ', trim(strip_tags((string)$item->pubDate)))
        ];
        $count++;
        if ($count >= $maxItems) {
            break;
        }
    }
    
    return $items; // Retorna solo el array de items
}}
