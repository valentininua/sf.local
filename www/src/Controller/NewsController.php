<?php

namespace App\Controller;

use App\Repository\NewsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{

//    public function __construct(
//        private NewsRepository $newsRepository
//    )
//    {
//    }
//
//    #[Route('/news', name: 'app_news')]
//    public function index(): Response
//    {
////        dd($this->newsRepository->test());
//
////            dd($this->newsRepository->findAll());
////        public function findAllField(): ?News
//
//
//        return $this->render('news/index.html.twig', [
//            'controller_name' => 'NewsController',
//        ]);
//    }

    #[Route('/news', defaults: ['page' => '1', '_format' => 'html'], methods: ['GET'], name: 'news_index')]
    #[Route('/news/page/{page<[1-9]\d*>}', defaults: ['_format' => 'html'], methods: ['GET'], name: 'news_index_paginated')]
    #[Cache(smaxage: 10)]
    public function index(int $page, NewsRepository $news): Response
    {
        $latestPosts = $news->findLatest($page);

        return $this->render('news/index.html.twig', [
            'paginator' => $latestPosts,
        ]);
    }
}
