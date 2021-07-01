<?php

use App\News;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = file_get_contents("https://www.france24.com/fr/decouvertes/rss");
 
        // Instantiate XML element
        $a = new SimpleXMLElement($content);
            
        //['category_id','title','description','pubDate','thumbnail_url']
         
        foreach($a->channel->item as $entry) {
            News::create(['category_id'=>12,'user_id'=>1	,'title'=>$entry->title,'description'=>$entry->description,'pubDate'=>Carbon::parse($entry->pubDate)->format('Y-m-d H:i'),'thumbnail_url'=>$entry->enclosure->attributes()->url[0]->__toString()]);
        }
    }
}
