<?php

namespace App\Service;

use App\Service\NewsStrategyInterface;
use jcobhams\NewsApi\NewsApi;

class NewsService implements NewsStrategyInterface
{

    private string $apiKeyNews = '1ba8fe1c2b1740e5830e62c971a29bb9';


    /**
     * @throws \jcobhams\NewsApi\NewsApiException
     */
    public function handle()
    {
        $news = (new NewsApi($this->apiKeyNews))->getEverything('bitcoin');
        dump($news);
    }


    private  function news(): string
    {
        $messages = [
            '2 Crypto Stocks to Avoid Like the Plague in September',
            'US stocks close lower as 10-year yield holds above 3% amid rate-hike bets',
            'The founder of a crypto powerhouse says Meta and Microsoft ',
        ];

        $index = array_rand($messages);

        return $messages[$index];
    }

}
