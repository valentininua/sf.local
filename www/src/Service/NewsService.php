<?php

namespace App\Service;

use App\Repository\NewsRepository;
use App\Entity\News;
use Api\Dto\NewsDto;
use jcobhams\NewsApi\NewsApi;

class NewsService  implements NewsStrategyInterface
{

    public function __construct(
        private readonly string         $apiKeyNews,
        private readonly NewsRepository $newsRepository,
    )
    {
    }


    public function handle(): void
    {
        $this->loadNews();
        dd($this->newsRepository->findAll());

    }


    private function loadNews(): ?NewsDto
    {
         $newsApi = (new NewsApi($this->apiKeyNews))->getEverything('bitcoin');

        dd($newsApi);
        return (new NewsDto())
            ->setDescription('-')
            ->setTitle('-')
            ->setImage('-');


//        if (self::STATUS_OK !== $news->status) {
//            return $news->status;
//        }
//        if (0 === $news->totalResults) {
//            return $news->totalResults;
//        }


//       dd($news);
////        $this->news->setTitle('title');
//
//        //$this->repository->add($this->news, true);
//
//
//        dump($this->news);
    }


    private function test(): string
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
